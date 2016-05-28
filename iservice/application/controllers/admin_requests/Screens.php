<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screens extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('screens_model');
	}
	function add()
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
				$name = $this->input->post('name');
				$description = $this->input->post('description');
				$catid = $this->input->post('catid');
				$sortorder = $this->screens_model->getlastsortorder($catid);
				$sortorder = $sortorder + 1;

				$screenid = $this->screens_model->add($name,$description,$catid,$sortorder);
				echo json_encode(array(
										"status"=>"login",
										"datainserted"=>$screenid,
										"screen"=>$this->screens_model->get($catid,$screenid),
										"sortquery"=>$sortorder
									) );
			}
		}
	}
}