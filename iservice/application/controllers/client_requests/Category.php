<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('version_model');
	}
	function getcitiesncategories()
	{
		$appconfig = array();
		$categoryversion = $this->input->post('categoryversion');
		$serversions = $this->version_model->get();
		if($serversions['category']['version'] > $categoryversion)
		{
			$appconfig['categories'] = $this->category_model->get(false,true);
		}
		else
			$appconfig['categories'] = array();

		$this->load->model('city_model');
		$appconfig['cities'] = $this->city_model->get();
		echo json_encode($appconfig);
	}
	/*function get()
	{
		$parentid = $this->input->get_post('parentid');
		$catdata = $this->category_model->get($parentid,1);
		echo json_encode(array("success"=>1,"data"=>$catdata));
	}*/

 function get()
 {
  $parentid = $this->input->get_post('parentid');
  $isbusiness = $this->input->get_post('isbusiness');
  $catdata=array();
  $merchants=array();
  if($isbusiness==1){
      $catdata = $this->category_model->get($parentid,1);
      if (count($catdata)==0) {
      $this->load->model('city_model');
      //$this->load->model('gcmuser_model');
            $this->load->model('user_model');
  
      $imei = $this->input->get_post('deviceid');
      //$gcmid = $this->gcmuser_model->getgcmuserid($imei);
      $cities = $this->city_model->getcityidsby_imei($imei);
      //$merchants = $this->user_model->get($parentid,$cities);
      $merchants = $this->user_model->getdata($parentid,$cities,'active',$imei);
      }

  }else{
   $this->load->model('businessextra_model');
    $this->load->model('city_model');
   $dt = new DateTime("now",new DateTimeZone("GMT"));
      $expdatetime = $dt->format('Y-m-d H:i:s');
        //$bmasterid = $this->input->get_post('bmasterid');
        $imei = $this->input->get_post('deviceid');
		//$gcmid = $this->gcmuser_model->getgcmuserid($imei);
		$cities = $this->city_model->getcityidsby_imei($imei);
      $merchants = $this->businessextra_model->getbusinessextra($expdatetime,$parentid,false,false,$cities);
  }
  echo json_encode(array("success"=>1,"categories"=>$catdata,"data"=>$merchants));
 }

  function getsub()
 {
  $parentid = $this->input->get_post('parentid');
  $isbusiness = $this->input->get_post('isbusiness');
  //$catdata=array();
  //$merchants=array();
  
      $catdata = $this->category_model->getsub($parentid,1);
      
  echo json_encode(array("success"=>1,"categories"=>$catdata));
 }


	function mapuser()
	{
		$this->load->model('user_model');
		$this->load->model('controls_model');

		$userid = $this->input->get_post('userid');
		$catid = $this->input->get_post('catid');
		$firmname = $this->input->get_post('name');
		$firmcontact = $this->input->get_post('contact');
		$imageid = $this->input->get_post('profile_image');
		$address = $this->input->get_post('address');
		$cityid = $this->input->get_post('cityid');
		$ismerchant = $this->input->get_post('ismerchant');
		$services = $this->input->get_post('services');
		$email = $this->input->get_post('email');
		
		$affectrow = $this->user_model->mapcategory($userid,$catid,$firmname,$firmcontact,$imageid,$address,$cityid,$ismerchant,$services,$email);
		$imageids = json_decode($this->input->get_post('images'));
		//if($imageids!=NULL){
			$this->user_model->deleteimage($userid);
		//}
		foreach($imageids as $index=>$imageid)
		{
			$this->user_model->mapimage($userid,$imageid,(int)$index+1);
		}
		$controlsdata = $this->controls_model->getCatScreens($catid,$userid);
		//echo "<pre>";
		//print_r($controlsdata);
		echo json_encode(array("controls"=>$controlsdata));
	}
	
}