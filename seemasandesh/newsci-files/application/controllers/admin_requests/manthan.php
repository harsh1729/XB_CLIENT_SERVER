<?php
class Manthan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('manthan_model');
	}
	function save_editorial()
	{
		
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');

			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->model('user_model');

				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);
				
				$dt = new DateTime($this->input->post('date')." 10:10:10",new DateTimeZone("Asia/Kolkata"));
				$dt->setTimeZone(new DateTimeZone("GMT"));
				$date = $dt->format('Y-m-d');
				
				$heading = $this->input->post('heading');
				$content = $this->input->post('content');
				
				$manthanid = $this->manthan_model->save_editorial($clientid,$date,$heading,$content);
				echo json_encode(array("status"=>'login',"data"=>$manthanid));
			}
		}
	}
}