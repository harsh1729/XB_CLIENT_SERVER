<?php

class Advt extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('advt_model');
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

				$upload_path = realpath($folders['advtimagespath']);
				if($upload_path)
				{
					echo $this->advt_model->upload_image($upload_path);
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
				$this->load->library('xerces_globals');

				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);


				// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
				$this->load->model('client_model');
				$folders = $this->client_model->get_folder_name_by_id($clientid);
				$foldername = $folders['advtimagespath'];
				$filename = $this->xerces_globals->str_last_replace("_",".",$this->input->post('filename'));
				$filepath = realpath($foldername.$filename);
				$this->advt_model->delete_image_by_name($filepath);
				echo json_encode(array("status"=>'login',"filename"=>$filename));
			}
		}
	}
	function save_advt()
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
				$this->load->library('xerces_globals');


				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);

				$advttxt = $this->input->post('advttxt');
				$weburl = $this->input->post('weburl');
				$image = $this->xerces_globals->str_last_replace("_",".",$this->input->post('advtImage'));
				$advttype = $this->input->post('advtType');

				$advtid = $this->advt_model->save_advt($advttxt,$image,$advttype,$weburl);
				echo json_encode(array("status"=>'login',"data"=>$advtid));
			}
		}
	}
	function update_advttype_timing()
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

				$intervalvalue = $this->input->post('intervalvalue');
				$intervalfield = $this->input->post('intervalfield');
				$id = $this->input->post('id');

				$this->advt_model->update_advttype_timing($intervalvalue,$intervalfield,$id);
				echo json_encode(array("status"=>'login'));
			}
		}
	}
	function update_advttype_status()
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

				$status = $this->input->post('status');
				if($status == 'true')
					$status = 1;
				else
					$status = 0;
				$id = $this->input->post('id');

				$this->advt_model->update_advttype_status($status,$id);
				echo json_encode(array("status"=>'login'));
			}
		}
	}
	function update_advt_status()
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

				$status = $this->input->post('status');
				if($status == 'true')
					$status = 1;
				else
					$status = 0;
				$id = $this->input->post('id');

				$this->advt_model->update_advt_status($status,$id);
				echo json_encode(array("status"=>'login'));
			}
		}
	}
	function delete_advt()
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

				$id = $this->input->post('advtid');

				//remove image with this advt ...
				$image = $this->advt_model->get_advt_image_name($id);

				if($image != "")
				{
					// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
					$this->load->model('client_model');
					$folders = $this->client_model->get_folder_name_by_id($clientid);
					$foldername = $folders['advtimagespath'];
					$filepath = realpath($foldername.$image);
					$this->advt_model->delete_image_by_name($filepath);
				}
				$this->advt_model->delete_advt($id);

				//$this->advt_model->update_advt_status($status,$id);
				echo json_encode(array("status"=>'login'));
			}
		}
	}
	function update_advt()
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
				$this->load->library('xerces_globals');


				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);

				$advttxt = $this->input->post('advttxt');
				$weburl = $this->input->post('weburl');
				$image = $this->xerces_globals->str_last_replace("_",".",$this->input->post('image'));
				$advtid = $this->input->post('advtid');

				//remove image with this advt ...
				$oldimage = $this->advt_model->get_advt_image_name($advtid);

				if($oldimage != "" && $oldimage != $image)
				{
					// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
					$this->load->model('client_model');
					$folders = $this->client_model->get_folder_name_by_id($clientid);
					$foldername = $folders['advtimagespath'];
					$filepath = realpath($foldername.$oldimage);
					$this->advt_model->delete_image_by_name($filepath);
				}

				$this->advt_model->update_advt($advttxt,$image,$advtid,$weburl);
				echo json_encode(array("status"=>'login'));
			}
		}
	}
}