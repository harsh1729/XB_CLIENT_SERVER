<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gcmuser_model extends CI_Model{
	public function updateuserid($imei,$userid)
	{
		$this->db->where('imei',$imei);
		$data = array(
						"userid"=>$userid
					);
		$this->db->update('gcmuser',$data);
	}
	public function doesgcmexists($imei,$gcmtextid)
	{
		$this->db->where('imei',$imei);
		//$this->db->where('gcmtextid',$gcmtextid);
		$query = $this->db->get('gcmuser');
		$response = false;
		if($query->num_rows() > 0 )
			$response = true;
		return $response;
	}
	public function addgcmuser($imei,$gcmtextid,$datetime)
	{
		$data = array(
						"gcmtextid"=>$gcmtextid,
						"imei"=>$imei,
						"datetime"=>$datetime
					);
		$this->db->insert("gcmuser",$data);
		$insertid = $this->db->insert_id();

		return $insertid;
	}

     public function updategcmuser($gcmid,$gcmtextid,$datetime)
	{
		$data = array(
						"gcmtextid"=>$gcmtextid,
						"datetime"=>$datetime
					);
		$this->db->where('id', $gcmid);
		$this->db->update("gcmuser",$data);
		//$insertid = $this->db->insert_id();

		return true;
	}

	public function getgcmuserid($imei)
	{	

		$this->db->where('imei',$imei);
		$query = $this->db->get('gcmuser');
		/*$row = $query->row();*/
		$userid = 0;
		/*if(isset($row))
		{
			$userid = $row->id;
		}
		return $userid;*/
		if($query->result())
		{
			$userid=$query->result()[0]->id;
		}
		return $userid;
	}
	public function removegcmuser($imei)
	{
		$this->db->where('imei',$imei);
		$this->db->delete('gcmuser');
	}

	public function removeselectedcity($imei)
      {
		  $this->db->where('imei',$imei);
		$query = $this->db->get('gcmuser');
		$row = $query->row();
		$userid = 0;
		if(isset($row))
		{
			$userid = $row->id;
		}
		  $this->db->where('gcmid',$userid);
		  $this->db->delete('gcmusercitymapping');
      }

      public function addusernumber($deviceid,$number)
	 {
		$data = array(
						"deviceid"=>$deviceid,
						"number"=>$number
					);
		$this->db->insert("user_registered_number",$data);
		$insertid = $this->db->insert_id();

		return $insertid;
	 }
}