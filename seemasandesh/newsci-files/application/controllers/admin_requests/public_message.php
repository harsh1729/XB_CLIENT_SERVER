<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Public_message extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('public_message_model');
	}
	function upload_image()
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
				$this->load->helper('path');
				$this->load->model('user_model');

				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);


				// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
				$this->load->model('client_model');
				$folders = $this->client_model->get_folder_name_by_id($clientid);

				$upload_path = realpath($folders['featuresuploadedfiles']);
				if($upload_path)
				{
					echo $this->public_message_model->upload_image($upload_path);
				}
				else
				{
					echo json_encode(array('status'=>'login','error'=>'uploadpatherror'));
				}
			}
		}
	}
	function remove_image()
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
				$this->load->helper('path');

				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);


				// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
				$this->load->model('client_model');
				$folders = $this->client_model->get_folder_name_by_id($clientid);
				$foldername = $folders['featuresuploadedfiles'];
				$filename = $this->input->post('filename');
				$filepath = realpath($foldername.$filename);
				$this->public_message_model->delete_files($filepath);
				
			}
		}
	}
	function save_public_message()
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
				$this->load->helper('path');
				$this->load->model('client_model');


				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);
				
				

				$public_message_text= $this->input->post('public_message_text');
				$type= $this->input->post('type');
				
				$dt = new DateTime($this->input->post('datetime'),new DateTimeZone("Asia/Kolkata"));
				//$dt->setTimeZone(new DateTimeZone("GMT"));
				$date = $dt->format('Y-m-d');
				
				$filename = $this->input->post('filename');
				
				 $this->public_message_model->save_public_message($clientid,$filename,$public_message_text,$date,$type);
				
			echo json_encode(array("status"=>'login'));
			}
		}
	}
	
	
}