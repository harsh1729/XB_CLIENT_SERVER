<?php

class Advt extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('advt_model');
	}

	public function upload_image()
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
				$this->load->helper('path');

				$userid = $this->session->userdata('user_id');

				$upload_path = realpath(APPPATH.'../uploaded_images');
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
			$this->load->model('user_model');

			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->helper('path');
				//$this->load->library('xerces_globals');

				//$filename = $this->xerces_globals->str_last_replace("_",".",$this->input->post('filename'));
				//$filepath = realpath($foldername.$filename);
				$filepath = realpath(APPPATH.'../uploaded_images/'.$this->input->post('filename'));
				$this->advt_model->delete_image_by_name($filepath);
				echo json_encode(array("status"=>'login'));
			}
		}
	}
	function save_advt()
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
				$userid = $this->session->userdata('user_id');

				$advttxt = $this->input->post('advttxt');
				$advtimg = $this->input->post('advtImage');
				$weburl = $this->input->post('weburl');

				$this->advt_model->save_advt($advttxt,$advtimg,$weburl);
				
				echo json_encode(array("status"=>'login',"advt"=>$this->advt_model->getAdvtall()));
			}
		}
	}
	function get_all_advt()
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
				
				echo json_encode(array("status"=>'login',"advt"=>$this->advt_model->getAdvtall()));
			}
		}
	}
	function remove_advt()
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
				$advtid = $this->input->post('advtid');
				$advtImg = $this->advt_model->getAdvtImgById($advtid);
				if($advtImg != "")
				{
					$this->load->helper('path');
					//$this->load->library('xerces_globals');
	
					//$filename = $this->xerces_globals->str_last_replace("_",".",$this->input->post('filename'));
					//$filepath = realpath($foldername.$filename);
					$filepath = realpath(APPPATH.'../uploaded_images/'.$advtImg);
					$this->advt_model->delete_image_by_name($filepath);
				}
				$this->advt_model->removeAdvt($advtid);
					
				echo json_encode(array("status"=>'login',"advt"=>$this->advt_model->getAdvtall()));
			}
		}
	}

}