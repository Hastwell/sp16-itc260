<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		// Dict to pass to view class
		$data['title'] = "My Unique Title Tag, now inside Header!";
		$data['page_id'] = "My Clever Page Id, now inside Header!";
		
		$data['guts'] = '<p>I am the creamy filling that Bill is teasing you with</p>';
				
		$this->load->view('templates/header', $data);
		$this->load->view('welcome_message', $data);
		$this->load->view('templates/footer', $data);
	}
}
