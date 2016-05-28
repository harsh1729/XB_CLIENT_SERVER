<?php

class Appconfig_model extends CI_Model
{
	function get_version($clientid)
	{
		$this->db->where('clientid',$clientid);
		$this->db->select_max('version');
		$query = $this->db->get('appconfig');
		if($query->result())
			return $query->result()[0]->version;	
		else
			return 0;
	}
	function get_appconfig($clientid)
	{
		$appconfig = array();
		$this->db->where('appconfig.clientid',$clientid);
		$this->db->where('category.isroot',1);
		$this->db->join('client','client.id = appconfig.clientid');
		$this->db->join('category','client.id = category.clientid');
		$this->db->select('appconfig.id as appconfig_id,appconfig.name as appconfig_name,value,client.*,category.*');
		$query = $this->db->get('appconfig');
		$i=0;
		foreach ($query->result() as $row)
		{
		//	$appconfig[$row->appconfig_name] = $row->value;
			if($i++ == 0)
			{
				$appconfig['server_path'] = $row->domainname."/".$row->rootpath.$row->foldername;
				$appconfig['root_cat_id'] = $row->id;
			}
		}
		return $appconfig;
	}
}