import json
from twisted.web import http
from twisted.web.server import Site
import urllib
from twisted.web.resource import Resource, NoResource

__author__ = 'kbsoft'

from twisted.internet import reactor
from twisted.web.client import Agent
from twisted.web.http_headers import Headers
from twisted.internet.defer import succeed
from twisted.web.iweb import IBodyProducer

from zope.interface import implements


class StringProducer(object):
    implements(IBodyProducer)

    def __init__(self, body):
        self.body = body
        self.length = len(body)

    def startProducing(self, consumer):
        consumer.write(self.body)
        return succeed(None)

    def pauseProducing(self):
        pass

    def stopProducing(self):
        pass


class Sms(Resource):
    isLeaf = True

    def render_GET(self, request):
        pass


class Modem(Resource):
    isLeaf = True

    def render_GET(self, request):
        pass


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
            return Sms()
        elif path == "modem":
            return Modem()
        else:
            return UnknownService()

    def render_GET(self, request):
        request.responseHeaders.addRawHeader(b"content-type", b"application/json")
        return_value = {u'result': u'ok'}
        return json.dumps(return_value)


# web_agent = Agent(reactor)
#
# # for reference https://gist.github.com/lukemarsden/846545
# urlEncodedData = urllib.urlencode({'mobile_number': '0711661919', 'message': 'Data'})
# body = StringProducer(urlEncodedData)
#
# d = web_agent.request('POST', 'http://127.0.0.1:3000/sms_service/',
# Headers({'User-Agent': ['Knnect network testing client'],
# 'Content-Type': ['application/x-www-form-urlencoded']}), body)
#
#
# def cbResponse(ignored):
# print(ignored)
#
#
# # d.addCallback(cbResponse)
#
#
# def cbShutdown(ignored):
# reactor.stop()


# d.addBoth(cbShutdown)

resource = Service()

root_web = Site(resource)
resource.putChild('service', Service())

reactor.listenTCP(8080, root_web)
print("Runing reactor")
reactor.run()