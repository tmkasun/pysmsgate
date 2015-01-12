from twisted.internet.task import deferLater
from twisted.web.resource import Resource

__author__ = 'kbsoft'
#
# class Sms(Resource):
#     isLeaf = True
#
#     def __init__(self, serviceType):
#         Resource.__init__(self)
#         self.serviceType = serviceType
#
#     def render_POST(self, request):
#         if self.serviceType == 'send':
#             print "Got POST a request from {}".format(request.getClientIP())
#             # global debugObject
#             # reactor.callLater(2,reactor.stop)
#             # debugObject = request
#             print(request.args)
#
#             # TODO: Return JSON with status and ACK of sending message
#             # TODO: Use inline call back ratherthan blocking call
#             d = deferLater(reactor, 0, lambda: request)
#             d.addCallback(self._delayedRender)
#
#             request.responseHeaders.addRawHeader(b"content-type", b"application/json")
#             timestamp = int(time.time())
#             return_value = {
#                 u'result': u'true',
#                 u'timestamp': timestamp,
#                 u'status': u'sent',
#                 u'refid': u'N/A',
#             }
#             return json.dumps(return_value)
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
#     def isMobile(self, number):
#         try:
#             int(number)
#             if (len(number) != 10):
#                 return False
#             return True
#         except ValueError:
#             return False
