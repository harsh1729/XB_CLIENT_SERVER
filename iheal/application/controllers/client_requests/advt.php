<?php

class Advt extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('advt_model');
	}

	function getAdvt()
	{
		echo json_encode($this->advt_model->getAdvt());
	}
}