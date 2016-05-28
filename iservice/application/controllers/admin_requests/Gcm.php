<?php
class Gcm extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('gcm_model');
		$this->load->model('gcmuser_model');
       // $this->load->model('user_model');
	}
	function send_notification()
	{
		
			$this->load->model('user_model');
			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			
			{
        			
			        $heading = $this->input->post('heading');
			        $content = $this->input->post('content');
			        $cityid = $this->input->post('cityid');
			       

				$result = $this->gcm_model->gcm_send_notification($heading,$content,$cityid);
				echo $result;
			}
	 }
	 
	 function getdata()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
		        $this->load->model('user_model');
			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$code= $this->input->post('code');
				echo json_encode(array("status"=>"login","data"=>$this->gcmuser_model->getAllUser($code)));
			}
		}
	}
}