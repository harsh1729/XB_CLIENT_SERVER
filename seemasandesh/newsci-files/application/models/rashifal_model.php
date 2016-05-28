<?php
class Rashifal_model extends CI_Model
{
	function save_rashifal($clientid,$typename,$content,$date)
	{
		$data = array(
			"typename" => $typename,
			"content" => $content,
			"date" => $date,
			"clientid" => $clientid
		);
		$this->db->insert('rashifal',$data);
		return $this->db->insert_id();
	}
	function get_rashifal($clientid,$date)
	{
		/*$this->db->where('clientid',$clientid);
		$this->db->where('date',$date);
		//$this->db->group_by('typename');
		$this->db->order_by('id','desc');
		$query = $this->db->get('rashifal');*/
		
		$this->db->select('r1.*');
		$this->db->where('r1.clientid',$clientid);
		$this->db->where('r1.date = (select max(r2.date) from rashifal as r2 where r2.clientid = '.$clientid.')',NULL,FALSE);
		$query = $this->db->get('rashifal as r1');
		$allrashifal = array();
		foreach($query->result() as $index => $row)
		{
			if( !isset($allrashifal[$row->typename]) )
			{
				$allrashifal[$row->typename] = $row->content;
			}
		}
		return $allrashifal;
	}
}