<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('city_model');
	}
	function get()
	{
		$this->load->model('gcmuser_model');
		$imei = $this->input->get_post('imei');
		$gcmid = $this->gcmuser_model->getgcmuserid($imei);
		echo json_encode( array("cities"=>$this->city_model->get(false,$gcmid),"gcmid"=>$gcmid) );
	}
	function addcity2gcmuser()
	{
		$this->load->model('gcmuser_model');
		$imei = $this->input->get_post('imei');
		$cities = json_decode($this->input->get_post('cities'));
		$gcmid = $this->gcmuser_model->getgcmuserid($imei);
		$this->gcmuser_model->removeselectedcity($imei);
		$this->city_model->mapgcmuser($gcmid,$cities);
		echo json_encode(array("success"=>1));
	}
}