<?php

class Client_model extends CI_Model
{
	function get_client_details()
	{
		$query = $this->db->get('client');
		return $query->result();
	}
	function get_client_id($domainname)
	{
		$domainname = preg_replace('/https?:\/\//','',$domainname);
		$this->db->like('domainname',$domainname);
		$query = $this->db->get('client');
		if($query->result())
			return $query->result()[0]->id;
		else
			return 0;
			
	}
	function get_data_folder($clientid)
	{
		$this->db->where('id',$clientid);
		$this->db->select('foldername');
		$query = $this->db->get('client');
		if($query->result())
			return $query->result()[0]->foldername;
		else
			return "";
	}
	function get_root_path($clientid)
	{
		$this->db->where('id',$clientid);
		$this->db->select('rootpath');
		$query = $this->db->get('client');
		if($query->result())
			return $query->result()[0]->rootpath;
		else
			return false;
	}
	function get_folder_name_by_id($clientid)
	{
		$this->db->where('client.id',$clientid);
		$this->db->select('client.foldername,appconfig.name,appconfig.value');
		$this->db->join('appconfig','client.id = appconfig.clientid');
		$query = $this->db->get('client');
		$folders = array();
		foreach ($query->result() as $row)
		{
			if($row->name === "newsimagespath")
				$folders[$row->name] = $row->foldername.$row->value;
			if($row->name === "categoryimagespath")
				$folders[$row->name] = $row->foldername.$row->value;
			if($row->name === "advtimagespath")
				$folders[$row->name] = $row->foldername.$row->value;
			if($row->name === "epaperfilespath")
				$folders[$row->name] = $row->foldername.$row->value;
			if($row->name === "featuresuploadedfiles")
				$folders[$row->name] = $row->foldername.$row->value;
		}
		return $folders;
	}
	function get_folder_name($domainname)
	{
		$domainname = preg_replace('/https?:\/\//','',$domainname);
		$this->db->select('client.foldername,appconfig.name,appconfig.value');
		$this->db->like('domainname',$domainname);
		$this->db->join('appconfig','client.id = appconfig.clientid');
		$query = $this->db->get('client');
		$folders = array();
		foreach ($query->result() as $row)
		{
			if($row->name === "newsimagespath")
				$folders[$row->name] = $row->foldername.$row->value;
			if($row->name === "categoryimagespath")
				$folders[$row->name] = $row->foldername.$row->value;
			if($row->name === "advtimagespath")
				$folders[$row->name] = $row->foldername.$row->value;
			if($row->name === "epaperfilespath")
				$folders[$row->name] = $row->foldername.$row->value;
			if($row->name === "featuresuploadedfiles")
				$folders[$row->name] = $row->foldername.$row->value;
		}
		return $folders;
	}
	function does_exists($clientid)
	{
		$this->db->where('id',$clientid);
		$this->db->from('client');
		if($this->db->count_all_results() > 0)
			return true;
		else
			return false;
	}
	function get_user_type()
	{
		$this->db->where('type !=','superAdmin');
		$query = $this->db->get('usertype');
		$usertypes = array();
		foreach ($query->result() as $row)
		{
			$singleusertype = array();
			$singleusertype['id'] = $row->id;
			$singleusertype['type'] = $row->type;
			$singleusertype['description'] = $row->description;
			array_push($usertypes, $singleusertype);
		}
		return $usertypes;
	}
	function get_areas($clientid)
	{
		$this->db->where('clientareamapping.clientid',$clientid);
		$this->db->join('area','clientareamapping.areacodeid = area.id');
		$this->db->join('states','area.state = states.id');
		$this->db->select('states.name as statename,area.id as areaid,areacode,area.name as areaname');
		$query = $this->db->get('clientareamapping');
		$areas = array();
		foreach ($query->result() as $row)
		{
			$singlearea = array();
			$singlearea['areaid'] = $row->areaid;
			$singlearea['areacode'] = $row->areacode;
			$singlearea['areaname'] = $row->areaname;
			$singlearea['statename'] = $row->statename;

			array_push($areas, $singlearea);
		}
		return $areas;
	}
	function get_domainname($clientid)
	{
		$this->db->select('domainname');
		$this->db->where('id',$clientid);
		$query = $this->db->get('client');
		if($query->result())
			return $query->result()[0]->domainname;
		else
			return false;
	}
}