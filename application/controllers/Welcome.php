<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		// Dict to pass to view class
		$data['title'] = "My Unique Title Tag";
		$data['page_id'] = "My Clever Page Id";
		
		$data['guts'] = '<p>I am the creamy filling that Bill is teasing you with</p>';
				
		// Pass data to view class via additional param
		$this->load->view('welcome_message', $data);
	}
}
