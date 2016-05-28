<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addons extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('addons_model');
	}
	function get_addons_n_advt()
	{
			$this->load->model('client_model');
			$this->load->model('manthan_model');
			$this->load->model('joke_model');
			$this->load->model('public_message_model');
			$this->load->model('rivernrates_model');
			$this->load->model('rashifal_model');
			$this->load->model('auto_sandesh_model');

			$domainname = $this->input->post('domainname');

			$clientid = $this->client_model->get_client_id($domainname);
			$folders = $this->client_model->get_folder_name($domainname);

			$addonslist = $this->addons_model->get_addons($clientid,1);
			$output = array();

			$dtObj = new DateTime("now",new DateTimeZone('Asia/Kolkata'));
			$sqlenddate = $dtObj->format("Y-m-d");

			foreach($addonslist as $index => $value)
			{
				switch($value['admincontroller'])
				{
					case "manthan":
								$data = $this->manthan_model->get_top_editorial_short($clientid);
								$temp = array("name"=>"editorial","addonname"=>$value['clientaddonname'],"data"=>$data);
								array_push($output,$temp);
							break;
					case "joke":
								$data = $this->joke_model->get_joke($folders,$clientid);
								$temp = array("name"=>"joke","addonname"=>$value['clientaddonname'],"data"=>$data);
								array_push($output,$temp);
							break;
					case "publicmessage":
								$allpublicmsg = $this->public_message_model->get_public_message($clientid,$folders,$sqlenddate);
								$allmsgs = array();
								
								$type1 = array();
								$type2 = array();
								foreach($allpublicmsg as $ind => $row)
								{
									if($row['type'] == 1)
										array_push($type1,$row);
									else if($row['type'] == 2 )
										array_push($type2,$row);
								}
																array_push($allmsgs,array("typename"=>"शौक सन्देश","data"=>$type1) );
								array_push($allmsgs,array("typename"=>"बधाई सन्देश","data"=>$type2) );
	
								
								$temp = array("name"=>"publicmessage","addonname"=>$value['clientaddonname'],"data"=>$allmsgs);
								array_push($output,$temp);
							break;
					case "rivernrates":
								$data = array($this->rivernrates_model->get_rivernrates($clientid,$sqlenddate,1),$this->rivernrates_model->get_rivernrates($clientid,$sqlenddate,2));
								$temp = array("name"=>"rivernrates","addonname"=>$value['clientaddonname'],"data"=>$data);
								array_push($output,$temp);
							break;
					case "rashifal":
								$data = $this->rashifal_model->get_rashifal($clientid,$sqlenddate);
								$temp = array("name"=>"horoscope","addonname"=>$value['clientaddonname'],"data"=>$data);
								array_push($output,$temp);
							break;
					case "auto_sandesh":
								$data = $this->auto_sandesh_model->get_auto_sandesh($clientid,$folders,5);
								$temp = array("name"=>"automobile_launches","addonname"=>$value['clientaddonname'],"data"=>$data);
								array_push($output,$temp);
							break;
				}
			}
			echo json_encode($output);
	}
}