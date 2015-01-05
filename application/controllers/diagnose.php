<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Message extends CI_Controller
{

    public function quick()
    {
        $this->load->view("message/quick-message");
    }

    public function quick_send()
    {
        $phone_number = $this->input->post('phone_number');
        $message = $this->input->post('message_body');
        /* TODO: add validation */
        $sms = new Sms($phone_number, $message);
        $status = $sms->send();
        $response = array(
            'status' => $status
        );
        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

}
