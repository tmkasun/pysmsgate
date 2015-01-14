import random
from serial import SerialException

__author__ = 'kbsoft'
from config import config

import sys

from gsmmodem.modem import GsmModem
from gsmmodem.exceptions import TimeoutException, PinRequiredError, IncorrectPinError


class Modems(object):
    # TODO: This class should only have one instance at a time(Singleton)
    def __init__(self, configuration):
        """

        :param configuration:
        :self.modems
        {
        //fd = File descriptor
        'fd': {GsmModemObject}
        }
        """
        self.modems = self._initialize_modems(configuration)

    def get_random_modem(self):
        index = random.randint(0, self.count) - 1
        random_modem = self.modems.values()[index]
        if not random_modem.alive:
            print("DEBUG: Modem not alive = {}".format(random_modem.port))
            random_modem = self.get_random_modem()
        print("DEBUG: random_modem file descriptor = {}".format(random_modem.port))
        return random_modem

    def reconnect_to(self, modem_fd):
        pass

    def disconnect_from(self, modem_fd):
        pass

    def get(self, modem_fd):
        return self.modems.get(modem_fd)

    def get_status(self, modem_fd):
        pass

    def __iter__(self):
        return self

    def itervalues(self):
        for modem in self.modems.itervalues():
            yield modem

    @property
    def count(self):
        return len(self.modems)

    def _initialize_modems(self, configuration):
        # Uncomment the following line to see what the modem is doing:
        # logging.basicConfig(format='%(levelname)s: %(message)s', level=logging.DEBUG)
        """
        :param configuration:
        :return: Dictionary of modem details
        """
        modems_dic = dict()
        for modem_config in configuration.modems:
            print('Connecting to GSM modem on {0}...'.format(modem_config['fd']))
            baud = modem_config.get('baud')
            if not baud:
                gsm_modem_object = GsmModem(modem_config.get('fd'))
            else:
                gsm_modem_object = GsmModem(modem_config.get('fd'), modem_config.get('baud'))

            connection_status = False
            try:
                gsm_modem_object.connect()
                connection_status = True
            except PinRequiredError:
                sys.stderr.write('Error: SIM card PIN required. Please specify a PIN. \n')

            except (SerialException, IncorrectPinError, TimeoutException) as error:
                # TODO: Bad practice to catch 2 exceptions in 1 clause and give 1 error message divide using or
                sys.stderr.write('Error: Incorrect SIM card PIN entered.\nOr can\'t connect to modem in {}\n'.format(
                    modem_config['fd']))

            print('DEBUG: Checking for network coverage...')

            if not connection_status:
                modems_dic[gsm_modem_object.port] = gsm_modem_object
                continue

            network_status = False
            try:
                gsm_modem_object.waitForNetworkCoverage(5)
                network_status = True
            except TimeoutException:
                print(
                'DEBUG: Network signal strength is not sufficient, please adjust modem position/antenna and try again.')
                gsm_modem_object.close()

            modems_dic[gsm_modem_object.port] = gsm_modem_object

        return modems_dic


def init():
    global modems
    modems = Modems(config)

