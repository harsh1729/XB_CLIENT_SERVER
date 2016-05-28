<?php

class Rivernrates_model extends CI_Model
{

	
	function save_rivernrates($clientid,$rivernrates_heading,$rivernrates_content,$datetime,$type)
	{
		$data = array(
			"client_id" => $clientid,
			"heading" => $rivernrates_heading,
			"content" => $rivernrates_content,
			"date" => $datetime,
			"type" => $type
		);
		$this->db->insert('rivernrates',$data);
		return $this->db->insert_id();
	}
	function get_rivernrates($clientid,$date,$type)
	{
		$this->db->where('client_id',$clientid);
		$this->db->where('type',$type);
		$this->db->where('date',$date);
		$query = $this->db->get('rivernrates');
		$alldata = array();
		foreach($query->result() as $index => $row)
		{
			$singledata = array();
			$singledata['heading'] = $row->heading;
			$singledata['content'] = nl2br($row->content);
			
			array_push($alldata,$singledata);
		}
		return $alldata;
	}
	
	
}