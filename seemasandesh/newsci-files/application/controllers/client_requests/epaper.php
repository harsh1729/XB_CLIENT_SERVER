<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Epaper extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('epaper_model');
	}
	function get_epaper()
	{
		$this->load->model('client_model');

		$domainname = $this->input->post('domainname');

		$clientid = $this->client_model->get_client_id($domainname);
		$folders = $this->client_model->get_folder_name($domainname);


		if($this->input->post('date'))
		{
			$dtObj = new DateTime($this->input->post('date').' 10:10:10');
			$dtObj->setTimeZone(new DateTimeZone("GMT"));
			$date = $dtObj->format("Y-m-d");
		}
		else
		{
			$lastdate = $this->epaper_model->get_last_epaper_date($clientid);
			$date = new DateTime($lastdate);
		}

		$epapers = $this->_get_states_n_areas($folders,$clientid,$date);
		echo json_encode($epapers);
	}
	
	function mob_get_epaper()
	{
		$this->load->model('client_model');

		$clientid = $this->input->get_post('clientid');

		if($this->client_model->does_exists($clientid))
		{

			$folders = $this->client_model->get_folder_name_by_id($clientid);

			if($this->input->get_post('date'))
			{
				$dtObj = new DateTime($this->input->get_post('date').' 10:10:10');
				$dtObj->setTimeZone(new DateTimeZone("GMT"));
				$date = $dtObj->format("Y-m-d");
			}
			else
			{
				$lastdate = $this->epaper_model->get_last_epaper_date($clientid);
				$lstdt = new DateTime($lastdate);
				$date = $lstdt->format('Y-m-d');
			}
			$stateid = $this->input->get_post('stateid');
			$epapers = $this->_get_states_n_areas($folders,$clientid,$date,$stateid);
			echo json_encode($epapers);
		}
		else
			echo json_encode(array());
	}
	function _get_states_n_areas($folders,$clientid,$lastdate,$stateid=false)
	{
		$this->load->model('area_model');
		$states = $this->area_model->get_states($clientid,$stateid);
		$finalarray = array();
		foreach ($states as $key => $value){
			$singlestate = array();
			$singlestate['id'] = $value['id'];
			$singlestate['name'] = $value['name'];
			$dt = new DateTime($lastdate);
			$singlestate['publishdate'] = $dt->format('d-m-Y');
			$singlestate['areas'] = $this->area_model->get_areawise_epaper($folders,$clientid,$value['id'],$lastdate);

			array_push($finalarray,$singlestate);
		}
		return $finalarray;
	}
}