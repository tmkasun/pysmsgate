import json
import sys
import time

from twisted.internet.task import deferLater

from twisted.web import http
from twisted.web.resource import Resource
from twisted.web.server import Site
from twisted.internet import reactor
from gsmmodem.modem import GsmModem, SentSms
from gsmmodem.exceptions import TimeoutException, PinRequiredError, IncorrectPinError


from config import config

from libs.services import modem_service
from libs import modem_manager


class Sms(Resource):
    isLeaf = True

    def __init__(self, serviceType):
        Resource.__init__(self)
        self.serviceType = serviceType

    def render_POST(self, request):
        if self.serviceType == 'send':
            print "DEBUG: Got POST a request from {}".format(request.getClientIP())
            # global debugObject
            # reactor.callLater(2,reactor.stop)
            # debugObject = request
            print "DEBUG: ",
            print(request.args)

            # TODO: Return JSON with status and ACK of sending message
            # TODO: Use inline call back ratherthan blocking call
            d = deferLater(reactor, 0, lambda: request)
            d.addCallback(self._delayedRender)

            request.responseHeaders.addRawHeader(b"content-type", b"application/json")
            timestamp = int(time.time())
            return_value = {
                u'result': u'true',
                u'timestamp': timestamp,
                u'status': u'sent',
                u'refid': u'N/A',
            }
            return json.dumps(return_value)

    def _delayedRender(self, request):
        mobile_number = request.args['mobile_number'][0]
        if not (self.isMobile(mobile_number)):
            return "Invalid mobile number: {}\nerror code:-1".format(mobile_number)
        message = request.args['message'][0]
        if not debug_mode:
            print("DEBUG: Running delayed job")
            sendSms(mobile_number, message)

        else:
            print("[DEBUG_MODE]: Message = {} , \nmobile number = {}".format(mobile_number, message))

    def isMobile(self, number):
        try:
            int(number)
            if (len(number) != 10):
                return False
            return True
        except ValueError:
            return False


def sendSms(destination, message, deliver=False):
    if deliver:
        print ('\nSending SMS and waiting for delivery report...')
    else:
        print('\nSending SMS \nmessage ({}) \nto ({})...'.format(message, destination))
    try:
        modem = modem_manager.modems.get_random_modem()
        sms = modem.sendSms(destination, message, waitForDeliveryReport=deliver)
    except TimeoutException:
        print('Failed to send message: the send operation timed out')
    else:
        if sms.report:
            print('Message sent{0}'.format(
                ' and delivered OK.' if sms.status == SentSms.DELIVERED else ', but delivery failed.'))
        else:
            print('Message sent.')


class UnknownService(Resource):
    isLeaf = True

    def render(self, request):
        return self.error_info(request)

    def error_info(self, request):
        request.responseHeaders.addRawHeader(b"content-type", b"application/json")
        request.setResponseCode(http.NOT_FOUND)
        return_value = {
            u'result': u'false',
            u'reason': u'Unknown Service',
            u'request': {
                u'args': request.args,
                u'client': {
                    u'host': request.client.host,
                    u'port': request.client.port,
                    u'type': request.client.type,
                },
                u'code': request.code,
                u'method': request.method,
                u'path': request.path,
            }
        }
        return json.dumps(return_value)


class Service(Resource):
    # isLeaf = True

    def getChild(self, path, request):
        if path == "sms":
            return Sms(request.postpath[0])  # Get the next URL component
        elif path == "modem":
            return modem_service.ModemService(request.postpath[0])
        elif path == "ping":
            return Ping()
        else:
            return UnknownService()

    def render_GET(self, request):
        request.responseHeaders.addRawHeader(b"content-type", b"application/json")
        return_value = {u'result': u'ok'}
        return json.dumps(return_value)


class Ping(Resource):
    isLeaf = True

    def render_GET(self, request):
        request.responseHeaders.addRawHeader(b"content-type", b"application/json")
        timestamp = int(time.time())
        return_value = {
            u'result': u'true',
            u'timestamp': timestamp,
            u'status': u'pong',
        }

        return json.dumps(return_value)


port = config.api['port']
service_name = config.api['service_name']
debug_mode = config.api['debug']

resource = Service()
root_web = Site(resource)
resource.putChild(service_name, Service())

if not debug_mode:
    modem_manager.init()
    print("Connected to modem")
else:
    print("DEBUG_MODE enabled no message will be sent out from the dongle")

reactor.listenTCP(port, root_web)
print "Server running on {} url: localhost:{}/{}".format(port, port,service_name)
reactor.run()