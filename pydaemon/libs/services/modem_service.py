import json
import time
from gsmmodem.exceptions import CommandError
from twisted.web.resource import Resource

__author__ = 'kbsoft'

from libs import modem_manager


class ModemService(Resource):
    def __init__(self, serviceType):
        Resource.__init__(self)
        self.serviceType = serviceType

    def getChild(self, path, request):
        if path == 'ping':
            return Ping()
        elif path == 'all':
            return ModemsInfo()
        elif path == 'dial':
            return Dial()
            # def render_GET(self, request):
            # pass


class Ping(Resource):
    isLeaf = True

    def render_GET(self, request):
        request.responseHeaders.addRawHeader(b"content-type", b"application/json")
        timestamp = int(time.time())
        live = []
        if len(request.args) != 0 and request.args['fd']:
            modem = modem_manager.modems.get(request.args['fd'][0])
            live = modem.port
        else:
            for modem in modem_manager.modems.itervalues():
                if modem.alive:
                    live.append(modem.port)
        return_value = {
            u'result': u'true',
            u'timestamp': timestamp,
            u'modems_count': modem_manager.modems.count,
            u'live': live,
            u'status': u'pong',
        }

        return json.dumps(return_value)


class ModemsInfo(Resource):
    isLeaf = True

    def render_GET(self, request):
        request.responseHeaders.addRawHeader(b"content-type", b"application/json")
        timestamp = int(time.time())
        modems = []
        failures = 0
        if len(request.args) != 0 and request.args['fd']:
            modem = modem_manager.modems.get(request.args['fd'][0])
            modems = self._modem_to_dict(modem)
            if not modems['alive']:
                failures += 1

        else:
            for modem in modem_manager.modems.itervalues():
                modem_dic = self._modem_to_dict(modem)
                if not modem_dic['alive']:
                    failures += 1
                modems.append(modem_dic)
        return_value = {
            u'result': u'true',
            u'timestamp': timestamp,
            u'modems': modems,
            u'status': u'pong',
            u'failures': failures
        }

        return json.dumps(return_value)

    def _modem_to_dict(self, modem):
        if modem.alive:
            return_value = {
                u'port': modem.port,
                u'baudrate': modem.baudrate,
                u'alive': modem.alive,
                u'imei': modem.imei,
                u'imsi': modem.imsi,
                u'manufacturer': modem.manufacturer,
                u'model': modem.model,
                u'networkName': modem.networkName,
                u'revision': modem.revision,
                u'signalStrength': modem.signalStrength,
                u'smsc': modem.smsc
            }
        else:
            return_value = {
                u'port': modem.port,
                u'baudrate': modem.baudrate,
                u'alive': modem.alive
            }
        return return_value


class Dial(Resource):
    isLeaf = True

    def render_POST(self, request):
        request.responseHeaders.addRawHeader(b"content-type", b"application/json")
        timestamp = int(time.time())
        number = request.args['number']
        modem = modem_manager.modems.get_random_modem()
        if 'fd' in request.args:
            fd = request.args['fd']
            modem = modem_manager.modems.get(fd)
        try:
            modem.dial(number)
            return_value = {
                u'result': u'true',
                u'timestamp': timestamp,
                u'status': u'dialed',
                u'fd': modem.port
            }
        except CommandError as error:
            # TODO: Send error exception string
            return_value = {
                u'result': u'false',
                u'timestamp': timestamp,
                u'status': u'fail',
                u'fd': modem.port,
                u'reason': error.message
            }

        return json.dumps(return_value)
