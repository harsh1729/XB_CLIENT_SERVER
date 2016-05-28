<?php

class Advt extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('advt_model');
	}
	function get_advt()
	{
		$this->load->model('client_model');

		$domainname = $this->input->post('domainname');
		$advt4page = $this->input->post('page');

		$clientid = $this->client_model->get_client_id($domainname);
		$folders = $this->client_model->get_folder_name($domainname);

		/*if($advt4page == "home")
			$advttypeid = 1;
		else if($advt4page == "detail")
			$advttypeid = 2;
		else
			$advttypeid = 1;
		*/
		$advttypeid = $this->advt_model->get_advttype_id($clientid,$advt4page);

		$intervalvalue = $this->advt_model->get_intervalvalue($advttypeid);
		$intervalfield = $this->advt_model->get_intervalfield($advttypeid);
		if($intervalfield == "SECOND")
		{
			$timedelay = 1000*$intervalvalue;
		}
		else if($intervalfield == "MINUTE")
		{
			$timedelay = 1000*60*$intervalvalue;
		}
		else if($intervalfield == "HOUR")
		{
			$timedelay = 1000*60*60*$intervalvalue;
		}
		else
		{
			$timedelay = 5000;	
		}
		echo json_encode(array("timedelay"=>$timedelay,"data"=>$this->advt_model->get_advt($folders['advtimagespath'],$advttypeid,1),"field"=>$intervalfield,"value"=>$intervalvalue));		
	}
}