<?php

class Addons_model extends CI_Model
{
	function get_addons($clientid,$isactive=false)
	{
		$this->db->select('addons.id as id,addons.name as name,addons.detail as detail,addons.admincontrollername as admincontroller,addons.clientcontrollername as clientcontroller,clientaddonsmapping.addonname as addonname');
		$this->db->where('clientaddonsmapping.clientid',$clientid);
		if($isactive !== false)
			$this->db->where('isactive',$isactive);
		$this->db->join('addons','addons.id = clientaddonsmapping.addonid');
		$query = $this->db->get('clientaddonsmapping');
		$alladdons = array();
		foreach($query->result() as $index => $row)
		{
			$singleaddon = array();
			$singleaddon['id'] = $row->id;
			$singleaddon['name'] = $row->name;
			$singleaddon['detail'] = $row->detail;
			$singleaddon['admincontroller'] = $row->admincontroller;
			$singleaddon['clientcontroller'] = $row->clientcontroller;
			$singleaddon['clientaddonname'] = $row->addonname;
			
			array_push($alladdons,$singleaddon);
		}
		return $alladdons;
	}
	function client_have_addon($clientid,$admincontrollername,$isactive=false)
	{
		$this->db->where('clientid',$clientid);
		$this->db->where('admincontrollername',$admincontrollername);
		if($isactive !== false)
			$this->db->where('clientaddonsmapping.isactive',$isactive);
		$this->db->join('addons','addons.id = clientaddonsmapping.addonid');
		if($this->db->count_all_results("clientaddonsmapping") == 1)
			return true;
		else
			return false;
	}
}