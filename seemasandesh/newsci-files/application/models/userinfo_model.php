<?php

class Userinfo_model extends CI_Model
{
	function verify_credentials($usr,$pwd,$clientid)
	{
		/**
		*
		*	select userinfo.id as user_id,userinfo.name,userinfo.dob,userinfo.username,userinfo.areacode,
		*	user.isactive as user_isactive,client.isactive as client_isactive,usertype.type as usertype 
		*	from userinfo inner join user on userinfo.id = user.userinfo 
		*	inner join client on user.clientid = client.id 
		*	inner join usertype on user.usertype = usertype.id 
		*	where userinfo.username = 'jaspal.singh' and userinfo.password='5f4dcc3b5aa765d61d8327deb882cf99'
		*
		**/

		//$queryResult = $this->db->query("select userinfo.id as user_id,userinfo.name,userinfo.dob,userinfo.username,userinfo.areacode,user.isactive as user_isactive,client.isactive as client_isactive,usertype.type as usertype,client.id as clientid from userinfo inner join user on userinfo.id = user.userinfo inner join client on user.clientid = client.id inner join usertype on user.usertype = usertype.id where userinfo.username = '$usr' and userinfo.password='$pwd'");

$this->db->select("userinfo.id as user_id,userinfo.name,userinfo.dob,userinfo.username,userinfo.areacode,user.isactive as user_isactive,client.isactive as client_isactive,usertype.type as usertype,client.id as clientid");
		$this->db->join('user',"userinfo.id = user.userinfo");
		$this->db->join('client',"user.clientid = client.id");
		$this->db->join('usertype',"user.usertype = usertype.id");
		$this->db->where('client.id',$clientid);
		$this->db->where('userinfo.username',$usr);
		$this->db->where('userinfo.password',$pwd);

		$queryResult = $this->db->get('userinfo');
		
		if($queryResult->num_rows == 1)
		{
			$result = $queryResult->result();
			return array(	"isValidated" => 1,
							"userid" => $result[0]->user_id,
							"name" => $result[0]->name,
							"dob" => $result[0]->dob,
							"username" => $result[0]->username,
							"areacode" => $result[0]->areacode,
							"clientid" => $result[0]->clientid,
							"clientisactive" => $result[0]->client_isactive,
							"userisactive" => $result[0]->user_isactive,
							"usertype" => $result[0]->usertype
						);
		}
		else
		{
			return array("isValidated"=>0);
		}
	}
	function get_user_name($userid)
	{
		$this->db->where('id',$userid);
		$this->db->select('name');
		$query = $this->db->get('userinfo');
		return $query->result()[0]->name;
	}
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
	function add_user_info($name,$dob,$username,$password,$email,$contact,$address,$areacode)
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
	}
       // ADDED BY HARSH
       function get_user_info($userid)
	{


		$this->db->where('user.id',$userid);
                //$this->db->select('userinfo.id','userinfo.name','userinfo.dob','userinfo.username','userinfo.email',
                //'userinfo.contact','userinfo.address','userinfo.areacode');
                $this->db->select('userinfo.*');
		$this->db->join('user','userinfo.id = user.userinfo');
		$query = $this->db->get('userinfo');
		$user_info_array = $query->result()[0];
		
		return  $user_info_array;
	}

// ADDED BY HARSH
       function get_child_users($userid)
	{
		$this->db->select('user.id,userinfo.name,userinfo.contact,userinfo.email');
		$this->db->where('(user.parentid = '.$userid.' OR (select u2.parentid from user u2 where u2.id = user.parentid) = '.$userid.'  )');
		$this->db->where('user.isactive = 1');
		$this->db->join('user','userinfo.id = user.userinfo');
		$query = $this->db->get('userinfo');
		$user_info_array = $query->result();
		
		return  $user_info_array;
	}

	// ADDED BY HARSH
       function delete_user($userid)
	{
		/*
		$this->db->where('userinfo.id = (Select userinfo from user where user.id =  '.$userid.'')
		$this->db->delete('userinfo'); 
		$this->db->delete('user', array('id' => $userid)); 
	*/
		$data = array(
               'isactive' => 0
            );

	$this->db->where('id', $userid);
	$this->db->update('user', $data); 
	}
}