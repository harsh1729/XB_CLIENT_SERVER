<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datetime_model extends CI_Model{

	public function getISTFromGMT($datestr,$format='H:i:s d-m-Y')
	{
		$datestr = trim($datestr);
		$dt = DateTime::createFromFormat('Y-m-d H:i:s',$datestr,new DateTimeZone("GMT"));
		$dt->setTimeZone(new DateTimeZone("Asia/Kolkata"));
		$output = $dt->format($format);
		return $output;
	}
}