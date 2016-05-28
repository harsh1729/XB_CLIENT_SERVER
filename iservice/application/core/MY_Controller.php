<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}	
	public function is_LoggedIn()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			$this->session->set_flashdata('login_error','Please Login first!');
			redirect('login');
			die();
		}
	}
}

// END Custom Controller class

/* End of file MY_Controller.php */
/* Location: application/core/MY_Controller.php */