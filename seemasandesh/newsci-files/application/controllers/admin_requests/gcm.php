<?php
class Gcm extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('gcm_model');
        $this->load->library('session');
        $this->load->model('user_model');
	}
	function send_notification()
	{
			$this->load->model('userinfo_model');
			$is_logged_in = $this->userinfo_model->is_logged_in();
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
        			$userid = $this->session->userdata('user_id');
			        $client_id = $this->user_model->get_client_id($userid);

			        $heading = $this->input->post('heading');
			        $content = $this->input->post('content');
			        $news_id = $this->input->post('news_id');

				$result = $this->gcm_model->gcm_send_notification($client_id,$heading,$content,$news_id);
				echo $result;
			}
	}
}