import json
import time
from twisted.internet.task import deferLater
from twisted.python.util import switchUID
from twisted.web import http
from twisted.web.server import Site
from twisted.internet import reactor
from twisted.web.resource import Resource
import cgi

import sys, logging

from gsmmodem.modem import GsmModem, SentSms
from gsmmodem.exceptions import TimeoutException, PinRequiredError, IncorrectPinError


def initModem(port='/dev/ttyUSB0', baud=460800):
    global modem

    modem = GsmModem(port, baud)

    # Uncomment the following line to see what the modem is doing:
    # logging.basicConfig(format='%(levelname)s: %(message)s', level=logging.DEBUG)

    print('Connecting to GSM modem on {0}...'.format(port))
    try:
        modem.connect()
    except PinRequiredError:
        sys.stderr.write('Error: SIM card PIN required. Please specify a PIN. \n')
        sys.exit(1)
    except IncorrectPinError:
        sys.stderr.write('Error: Incorrect SIM card PIN entered.\n')
        sys.exit(1)
    print('Checking for network coverage...')
    try:
        modem.waitForNetworkCoverage(5)
    except TimeoutException:
        print('Network signal strength is not sufficient, please adjust modem position/antenna and try again.')
        modem.close()
        sys.exit(1)


class Sms(Resource):
    isLeaf = True

    def __init__(self, serviceType):
        Resource.__init__(self)
        self.serviceType = serviceType

    def render_POST(self, request):
        if self.serviceType == 'send':
            print "Got POST a request from {}".format(request.getClientIP())
            # global debugObject
            # reactor.callLater(2,reactor.stop)
            # debugObject = request
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
        if not mode_flag == 1:
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


class Modem(Resource):
    def __init__(self, serviceType):
        Resource.__init__(self)
        self.serviceType = serviceType

    def getChild(self, path, request):
        if path == 'ping':
            return Ping()

            # def render_GET(self, request):
            # pass


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


class UnknownService(Resource):
    isLeaf = True

    def render_GET(self, request):
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
            return Modem(request.postpath[0])
        else:
            return UnknownService()

    def render_GET(self, request):
        request.responseHeaders.addRawHeader(b"content-type", b"application/json")
        return_value = {u'result': u'ok'}
        return json.dumps(return_value)


def sendSms(destination, message, deliver=False):
    if deliver:
        print ('\nSending SMS and waiting for delivery report...')
    else:
        print('\nSending SMS \nmessage ({}) \nto ({})...'.format(message, destination))
    try:
        sms = modem.sendSms(destination, message, waitForDeliveryReport=deliver)
    except TimeoutException:
        print('Failed to send message: the send operation timed out')
    else:
        if sms.report:
            print('Message sent{0}'.format(
                ' and delivered OK.' if sms.status == SentSms.DELIVERED else ', but delivery failed.'))
        else:
            print('Message sent.')


# debugObject = None
#
#
# class Simple(Resource):
# isLeaf = True
#
#     def _delayedRender(self, request):
#         mobile_number = request.args['mobile_number'][0]
#         if not (self.isMobile(mobile_number)):
#             return "Invalid mobile number: {}\nerror code:-1".format(mobile_number)
#         message = request.args['message'][0]
#         if not mode_flag == 1:
#             sendSms(mobile_number, message)
#
#         else:
#             print("[DEBUG_MODE]: Message = {} , \nmobile number = {}".format(mobile_number, message))
#
#     def render_GET(self, request):
#         # reactor.callLater(2, reactor.stop)
#         print "Got a GET request from {}".format(request.getClientIP())
#         return "<html><body><p>REST SMS service</p>Params are <b>mobile_number</b> and <b>message</b></body></html>"
#
#     def render_POST(self, request):
#         print "Got POST a request from {}".format(request.getClientIP())
#         # global debugObject
#         # reactor.callLater(2,reactor.stop)
#         # debugObject = request
#         print(request.args)
#
#         # TODO: Return JSON with status and ACK of sending message
#         # TODO: Use inline call back ratherthan blocking call
#         d = deferLater(reactor, 0, lambda: request)
#         d.addCallback(self._delayedRender)
#         return """<html>
#         <body>
#             You are connected from(IP): {}
#             Arguments are: {}
#             </body>
#         </html>""".format(request.getClientIP(), request.args)
#
#     def isMobile(self, number):
#         try:
#             int(number)
#             if (len(number) != 10):
#                 return False
#             return True
#         except ValueError:
#             return False


port = 3000

mode_flag_file = open("debug_mode", "r")
mode_flag = int(mode_flag_file.readline())

# root = Resource()
# root.putChild('sms_service', Simple())
# site = Site(root)

resource = Service()

root_web = Site(resource)
resource.putChild('service', Service())

print "Starting server on {} url: 127.0.0.1:{}/sms_service".format(port, port)
if not mode_flag == 1:
    initModem()
    print("Connected to modem")
else:
    print("DEBUG_MODE enabled no message will be sent out from the dongle")

reactor.listenTCP(port, root_web)
print("Running reactor")
reactor.run()