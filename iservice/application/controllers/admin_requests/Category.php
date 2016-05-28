<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('version_model');
	}
	public function add()
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
				$imageid = $this->input->post('imageid');
				$categoryname = $this->input->post('categoryname');
				$parentid = $this->input->post('parentid');
				$sortorder = $this->category_model->getlastsortorder($parentid) + 1;
				$catid = $this->category_model->newcategory($imageid,$categoryname,$parentid,$sortorder,$userid);
				$this->version_model->set('category');
				echo json_encode(array(
										"status"=>"login",
										"datainserted"=>$catid,
										"data"=>$this->category_model->get(false,false,$catid)
									) );
			}
		}
	}
	public function get()
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
				$parentid = $this->input->post('parentid');
				$isenable = $this->input->post('isenable');
				echo json_encode(array("status"=>"login","data"=>$this->category_model->get($parentid,$isenable),"parentid"=>$parentid,"isenable"=>$isenable ) );
			}
		}
	}
   public function getbusinesscat()
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
				$isbusiness = $this->input->post('isbusiness');
				//$isenable = $this->input->post('isenable');
				if($isbusiness==1)
				echo json_encode(array("status"=>"login","data"=>$this->category_model->get(0,1)) );
			    elseif ($isbusiness==0) {
			    	echo json_encode(array("status"=>"login","data"=>$this->category_model->getbusinessextracat(0)) );
			    }else{
			    	echo json_encode(array("status"=>"login"));
			    }
			}
		}
	}



	public function sort()
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
				$sortorder_raw = $this->input->post('sortorder');
				$sortorder = array();
				foreach ($sortorder_raw as $index => $value)
				{
					$sortorder[$index+1] = intval(substr($value,9));
				}
				$rowsaffected = $this->category_model->sort($sortorder);
				$this->version_model->set('category');
				echo json_encode(array("status"=>"login","data"=>$sortorder,"rowsaffected"=>$rowsaffected ) );
			}
		}
	}
	public function setstatus()
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
				$catid = $this->input->post('catid');
				$value = $this->input->post('value');
				$rowsaffected = $this->category_model->setstatus($catid,$value);
				$this->version_model->set('category');
				echo json_encode(array("status"=>"login","rowsaffected"=>$rowsaffected ) );
			}
		}
	}
}