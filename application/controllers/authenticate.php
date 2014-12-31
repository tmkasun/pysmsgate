<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authenticate extends CI_Controller {

	public function index()
	{
		$this->load->view("authentication/login");
	}

	public function login(){
		$post_message = $this->input->post();
		if($post_message['user'] == "kasun" and $post_message['key'] == "kasun"){
			redirect('/landing');
		}
		echo("Authentication fail!");
	}
}
