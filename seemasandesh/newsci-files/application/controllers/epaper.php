<?php
class Epaper extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('epaper_model');
	}
	function index()
	{
		$this->load->model('client_model');
		$this->load->model('category_model');

		$domainname = rtrim(domain_name(),'/');
		$clientid = $this->client_model->get_client_id($domainname);

		if($clientid > 0)
		{
			$datafoldername = $this->client_model->get_data_folder($clientid);
			$folders = $this->client_model->get_folder_name_by_id($clientid);

			$dtObj = new DateTime("now",new DateTimeZone("Asia/Kolkata"));
			//$dtObj->setTimeZone(new DateTimeZone("GMT"));
			$enddate = $dtObj->format("d-m-Y");

			$data['datafoldername'] = $datafoldername;

			$dtObj = new DateTime("now",new DateTimeZone("Asia/Kolkata"));
			//$dtObj->setTimeZone(new DateTimeZone("GMT"));
			$currentDatesql = $dtObj->format("Y-m-d");

			$lastdate = $this->epaper_model->get_last_epaper_date($clientid);
		$lstdt = new DateTime($lastdate);
		$data['datetoday'] = $lstdt->format("d-m-Y");
			
			$data['states_n_areas'] = $this->_get_states_n_areas($folders,$clientid,$lastdate);
		$data['categories'] = $this->category_model->get_all_categories_format_tree($clientid,$folders);

		$this->load->view($datafoldername."template_epaper",$data);
		}
		else
		{
			redirect('404');
		}
	}
	function read($areacode = false,$dt = false)
	{
		$this->load->model('client_model');

		$domainname = rtrim(domain_name(),'/');
		$clientid = $this->client_model->get_client_id($domainname);

		if($clientid > 0)
		{
			if($dt != false && $areacode != false)
			{
				$this->load->model('epaper_model');
				$this->load->model('area_model');

				$datafoldername = $this->client_model->get_data_folder($clientid);
				$folders = $this->client_model->get_folder_name_by_id($clientid);

				$data['datafoldername'] = $datafoldername;

				$dtObj = new DateTime($dt,new DateTimeZone("Asia/Kolkata"));
				$datetoday = $dtObj->format("d-m-Y");
				//$dtObj->setTimeZone(new DateTimeZone("GMT"));
				$currentDatesql = $dtObj->format("Y-m-d");

				$data['datetoday'] = $datetoday;

				$areacodeid = $this->area_model->get_area_code_id($areacode);

				$epaper = $this->epaper_model->get_epaper_short($folders,$clientid,$currentDatesql,$areacodeid);
				if(count($epaper) > 0)
					$data['epaper'] = $epaper[0];
				else
					$data['epaper'] = false;
				$this->load->view($datafoldername."template_epaper_read",$data);
			}
			else
				redirect('404');
		}
		else
		{
			redirect('404');
		}
	}
	function _get_states_n_areas($folders,$clientid,$lastdate)
	{
		$this->load->model('area_model');
		$states = $this->area_model->get_states($clientid);
		$finalarray = array();
		foreach ($states as $key => $value){
			$singlestate = array();
			$singlestate['id'] = $value['id'];
			$singlestate['name'] = $value['name'];
			$singlestate['areas'] = $this->area_model->get_areawise_epaper($folders,$clientid,$value['id'],$lastdate);
		
		array_push($finalarray,$singlestate);
		}
		return $finalarray;
	}
}