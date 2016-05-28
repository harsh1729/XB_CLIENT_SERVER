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

      public function addusernumber($deviceid,$number,$name)
	 {
		$data = array(
						"deviceid"=>$deviceid,
						"number"=>$number,
						"name"=>$name
					);
		$this->db->insert("user_registered_number",$data);
		$insertid = $this->db->insert_id();

		return $insertid;
	 }
	 
	 
	 public function getAllUser($code)
          {   
		if($code==''){
		$this->db->select('*');
		//$this->db->like('g.imei', $code);
		$this->db->join('user_registered_number ur','ur.deviceid=g.imei','left');
		$query = $this->db->get('gcmuser g');

		//$row = $query->row();
                $userdata = array();
		foreach ($query->result() as $row)
		{
			$user = array();
			$user['id'] = $row->id;
			$user['deviceid'] = $row->imei;
			$user['gcmid'] = $row->gcmtextid;
			$user['datetime'] = $row->datetime;
			$user['name'] = $row->name;
			$user['number'] = $row->number;
			
			array_push($userdata,$user);
			
           	}
		return $userdata;
		}else{
		$this->db->select('*');
		//$this->db->like('g.imei', $code);
		$this->db->join('user_registered_number ur','ur.deviceid=g.imei','left');
		$query = $this->db->get('gcmuser g');

		//$row = $query->row();
                $userdata = array();
		foreach ($query->result() as $row)
		{
		   $promo = '';
		   for($i=0;$i<strlen($row->imei);$i++){
		        if ($i% 2 == 0) {
		          $c = $row->imei[$i];
		          $promo = $promo.$c; 
		        }
		     }
		     if($promo==$code){
			$user = array();
			$user['id'] = $row->id;
			$user['deviceid'] = $row->imei;
			$user['gcmid'] = $row->gcmtextid;
			$user['datetime'] = $row->datetime;
			$user['name'] = $row->name;
			$user['number'] = $row->number;
			
			array_push($userdata,$user);
		     }
		  }	
           	}
		return $userdata;
		
	}

	public function checkcallnumber($num){
	 	 $this->db->where('number',$num);
		$query = $this->db->get('call_number');
		$response = false;
		if($query->num_rows() > 0 )
			$response = true;
		return $response;
	 }

	 public function addcallnumber($deviceid,$num,$datetime){
	 	$data = array(
						"imei"=>$deviceid,
						"number"=>$number,
						"datetime"=>$datetime
					);
		$this->db->insert("call_number",$data);
		$insertid = $this->db->insert_id();

		return $insertid;
	 }
	 
}