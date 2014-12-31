<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Testing extends CI_Controller {

	public function mandrill_ping(){
		$mandrill = new Mandrill('r0v0dh55VP6Zwk2Se_RmVQ');
		try {
			$result = $mandrill->users->ping2();
//			$result = $mandrill->users->senders();
			print_r($result);
			/*
            Array
            (
                [PING] => PONG!
            )
            */
		} catch(Mandrill_Error $e) {
			// Mandrill errors are thrown as exceptions
			echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
			// A mandrill error occurred: Mandrill_Invalid_Key - Invalid API key
			throw $e;
		}
	}

	public function send_mail(){
		try {
			$mandrill = new Mandrill('r0v0dh55VP6Zwk2Se_RmVQ');
			$template_name = 'feedback-report';
			$template_content = array(
				array(
					'name' => 'Feedback report',
					'content' => 'Report content'
				)
			);
			$message = array(
				'html' => '<p>Feedback report content</p>',
				'text' => 'Report content',
				'subject' => '[Knnect]Feedback Report',
				'from_email' => 'mailer@knnect.com',
				'from_name' => 'Knnect Mail Service',
				'to' => array(
					array(
						'email' => 'tmkasun@gmail.com',
						'name' => 'Kasun Thennakoon',
						'type' => 'to'
					),
					array(
						'email' => 'tmkasun@live.com',
						'name' => 'Kasun Thennakoon',
						'type' => 'to'
					)
				),
				'headers' => array('Reply-To' => 'kasun@knnect.com'),
				'important' => false,
				'track_opens' => null,
				'track_clicks' => null,
				'auto_text' => null,
				'auto_html' => null,
				'inline_css' => null,
				'url_strip_qs' => null,
				'preserve_recipients' => null,
				'view_content_link' => null,
				'tracking_domain' => null,
				'signing_domain' => null,
				'return_path_domain' => null,
				'merge' => true,
				'merge_language' => 'mailchimp',
				'global_merge_vars' => array(
					array(
						'name' => 'FNAME',
						'content' => 'First Name'
					),
					array(
						'name' => 'LNAME',
						'content' => 'Last Name'
					),
					array(
						'name' => 'UEMAIL',
						'content' => 'User Email'
					),
					array(
						'name' => 'UMESSAGE',
						'content' => 'User Message'
					)
				),
				'tags' => array('User Feedback'),
				'metadata' => array('website' => 'www.knnect.com')
			);
			$async = false;
			$ip_pool = 'Main Pool';
			$result = $mandrill->messages->sendTemplate($template_name, $template_content, $message, $async, $ip_pool);
			print_r($result);
			/*
            Array
            (
                [0] => Array
                    (
                        [email] => recipient.email@example.com
                        [status] => sent
                        [reject_reason] => hard-bounce
                        [_id] => abc123abc123abc123abc123abc123
                    )

            )
            */
		} catch(Mandrill_Error $e) {
			// Mandrill errors are thrown as exceptions
			echo 'A mandrill error occurred: ' . get_class($e) . ' - ' . $e->getMessage();
			// A mandrill error occurred: Mandrill_Unknown_Subaccount - No subaccount exists with the id 'customer-123'
			throw $e;
		}

	}
}
