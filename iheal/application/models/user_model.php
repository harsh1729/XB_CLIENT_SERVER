<?php

class User_model extends CI_Model
{
	function verify_credentials($usr,$pwd)
	{
		$this->db->select('user.*,doctor.isactive,doctor.id as docid');
		$this->db->where('username',$usr);
		$this->db->where('password',$pwd);
		//$this->db->where('isadmin',1);
		$this->db->join('doctor','user.id = doctor.userid','left');
		$queryResult = $this->db->get('user');

		if($queryResult->num_rows == 1)
		{
			$result = $queryResult->result();
			$isactive = "";
			if(is_null($result[0]->isactive))
				$isactive = "null";
			else if($result[0]->isactive == 0)
				$isactive = "0";
			else if($result[0]->isactive == 1)
				$isactive = "1";
			return array(	"isValidated" => 1,
							"name" => $result[0]->name,
							"userid" => $result[0]->id,
							"docid"	=>	$result[0]->docid,
							"isactive" => $isactive,
							"username" => $result[0]->username,
						);
		}
		else
		{
			return array("isValidated"=>0);
		}
	}
	/*function get_user_name($userid)
	{
		$this->db->where('id',$userid);
		$this->db->select('name');
		$query = $this->db->get('userinfo');
		return $query->result()[0]->name;
	}*/
	function is_logged_in()
	{
		$is_logged_in = $this->session->userdata('is_logged_in');
		if(!isset($is_logged_in) || $is_logged_in != true)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	function add($name,$username,$password,$isadmin)
	{
		$data = array(
					'name'	=>	$name,
					'username'	=>	$username,
					'password'	=>	md5($password),
					'isadmin'	=>	$isadmin
				);
		$this->db->insert('user',$data);
		return $this->db->insert_id();
	}
	function getUserDetail($userid)
	{
		$this->db->where('id',$userid);
		$query = $this->db->get('user');

		$userdata = array();
		if($query->result())
		{
			$userdata['name'] = $query->result()[0]->name;
			$userdata['username'] = $query->result()[0]->username;
		}
		return $userdata;
	}
	/*function add_user_info($name,$dob,$username,$password,$email,$contact,$address,$areacode)
	{
		$data = array(
			'name'=>$name,
			'dob'=>$dob,
			'username'=>$username,
			'password'=>$password,
			'email'=>$email,
			'contact'=>$contact,
			'address'=>$address,
			'areacode'=>$areacode
		);
		$this->db->insert('userinfo',$data);
		return $this->db->insert_id();
	}*/
       // ADDED BY HARSH
     /*  function get_user_info($userid)
	{


		$this->db->where('user.id',$userid);
                //$this->db->select('userinfo.id','userinfo.name','userinfo.dob','userinfo.username','userinfo.email',
                //'userinfo.contact','userinfo.address','userinfo.areacode');
                $this->db->select('userinfo.*');
		$this->db->join('user','userinfo.id = user.userinfo');
		$query = $this->db->get('userinfo');
		$user_info_array = $query->result()[0];
		
		return  $user_info_array;
	}*/

// ADDED BY HARSH
    /*   function get_child_users($userid)
	{
		$this->db->select('user.id,userinfo.name,userinfo.contact,userinfo.email');
		$this->db->where('(user.parentid = '.$userid.' OR (select u2.parentid from user u2 where u2.id = user.parentid) = '.$userid.'  )');
		$this->db->where('user.isactive = 1');
		$this->db->join('user','userinfo.id = user.userinfo');
		$query = $this->db->get('userinfo');
		$user_info_array = $query->result();
		
		return  $user_info_array;
	}*/

	// ADDED BY HARSH
    /*   function delete_user($userid)
	{
		
	//	$this->db->where('userinfo.id = (Select userinfo from user where user.id =  '.$userid.'')
	//	$this->db->delete('userinfo'); 
	//	$this->db->delete('user', array('id' => $userid)); 
	
		$data = array(
               'isactive' => 0
            );

	$this->db->where('id', $userid);
	$this->db->update('user', $data); 
	}*/
}