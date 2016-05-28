<?php

class User_model extends CI_Model
{
	function get_client_id($userid)
	{
		$this->db->where('user.id',$userid);
		$this->db->select('clientid');
		$query = $this->db->get('user');
		if($query->result())
			return $query->result()[0]->clientid;
		else
			return 0;
	}
	function get_user_type($userid)
	{
		$this->db->where('user.id',$userid);
		$this->db->join('usertype','user.usertype = usertype.id');
		$this->db->select('usertype.type');
		$query = $this->db->get('user');
		if($query->result())
			return $query->result()[0]->type;
		else
			return false;
	}
	function add_user($usertype,$parentid,$userinfoid,$clientid,$isactive)
	{
		$data = array(
			'usertype'=>$usertype,
			'parentid'=>$parentid,
			'userinfo'=>$userinfoid,
			'clientid'=>$clientid,
			'isactive'=>$isactive
		);
		$this->db->insert('user',$data);
		return $this->db->insert_id();
	}
}

/* End of file user_model.php */
/* Location: ./application/models/user_model.php */