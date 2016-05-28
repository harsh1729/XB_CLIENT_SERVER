<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('offers_model');
	}
	function add()
	{
		$userid = $this->input->get_post('userid');
		$heading = $this->input->get_post('heading');
		$content = $this->input->get_post('content');

		$dt = new DateTime("now",new DateTimeZone("GMT"));
		$datetime = $dt->format('Y-m-d H:i:s');
		$dt->add(new DateInterval('P10D'));
		$expdatetime = $dt->format('Y-m-d H:i:s');

		$imageids = json_decode($this->input->get_post('images'));

		$offerid = $this->offers_model->add($userid,$heading,$content,$datetime,$expdatetime);

		foreach($imageids as $index=>$imageid)
		{
			$this->offers_model->mapimage($offerid,$imageid,(int)$index+1);
		}

		echo json_encode( array("success"=>1) );

	}
	function getrandom()
	{
		$dt = new DateTime("now",new DateTimeZone("GMT"));
		$expdatetime = $dt->format('Y-m-d H:i:s');

		$data= $this->offers_model->getrandom($expdatetime);
		echo json_encode( array(
									"success"=>1,
									"offers"=>$data
								) );
	}
	function get()
	{
		$dt = new DateTime("now",new DateTimeZone("GMT"));
		$expdatetime = $dt->format('Y-m-d H:i:s');

		$data= $this->offers_model->get($expdatetime);
		echo json_encode( array(
									"success"=>1,
									"offers"=>$data
								) );
	}
	function getbyid()
	{
		$offerid = $this->input->get_post('offerid');

		$dt = new DateTime("now",new DateTimeZone("GMT"));
		$expdatetime = $dt->format('Y-m-d H:i:s');

		$data= $this->offers_model->get($expdatetime,$offerid);
		echo json_encode( array(
									"success"=>1,
									"offers"=>$data
								) );
	}
}