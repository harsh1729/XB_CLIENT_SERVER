<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Auto_sandesh extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('auto_sandesh_model');
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
					echo $this->auto_sandesh_model->upload_image($upload_path);
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
				$this->auto_sandesh_model->delete_files($filepath);
				
			}
		}
	}
	function save_auto_sandesh()
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
				
				

				$auto_sandesh_text= $this->input->post('auto_sandesh_text');
				$filename = $this->input->post('filename');
				

				

				/*$preview = $this->epaper_model->create_pdf_preview_image($foldername,$filename,0);
				$this->load->database();
				$this->db->reconnect();*/

				 $this->auto_sandesh_model->save_auto_sandesh($clientid,$filename,$auto_sandesh_text);
				
			echo json_encode(array("status"=>'login'));
			}
		}
	}
	
	
}