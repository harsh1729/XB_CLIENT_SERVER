<?php

class City extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('city_model');
	}
	function getAllCities()
	{
		echo json_encode($this->city_model->getAllcities());
	}
}