<?php

class Manthan_model extends CI_Model{
	function save_editorial($clientid,$date,$heading,$content)
	{
		$data= array(
			"date" => $date,
			"heading" => $heading,
			"content" => $content,
			"clientid" => $clientid
		);
		$this->db->insert('editorial',$data);
		return $this->db->insert_id();
	}
	function get_top_editorial_short($clientid)
	{
		$this->db->where('clientid',$clientid);
		$this->db->order_by('id','desc');
		$this->db->limit(1);
		$query = $this->db->get('editorial');
		$alleditorials = array();
		foreach($query->result() as $row)
		{
			$singleeditorial = array();
			$singleeditorial['id'] = $row->id;
			$singleeditorial['heading'] = $row->heading;
			$singleeditorial['content'] = mb_substr($row->content,0,180,"utf-8");
			
			array_push($alleditorials,$singleeditorial);
		}
		return $alleditorials;
	}
	function check_client($editorialid)
	{
		$this->db->where('id',$editorialid);
		$query = $this->db->get('editorial');
		if($query->result())
			return $query->result()[0]->clientid;
		else
			return 0;
	}
	function get_detailed_top_editorial($clientid,$limit,$omit_editorial_ids = false,$editorialid = false )
	{
		$this->db->where('clientid',$clientid);
		if($editorialid != false)
		{
			$this->db->where('id',$editorialid);
		}
		$this->db->order_by('id','desc');
		$this->db->limit($limit);
		
		if(!$omit_editorial_ids)
		{}
		else
		{
			if( is_array($omit_editorial_ids) )
			{
				//print_r( implode( ',', $test ) );
				$omit_ids = implode(',',$omit_editorial_ids);
			}
			else
			{
				$omit_ids = $omit_editorial_ids;
			}
			$this->db->where('id NOT IN ('.$omit_ids.')',NULL,FALSE);
		}
		
		$query = $this->db->get('editorial');
		$alldata = array();
		foreach($query->result() as $row)
		{
			$singleeditorial = array();
			$singleeditorial['id'] = $row->id;
			$singleeditorial['heading'] = $row->heading;
			$singleeditorial['content'] = $row->content;
			
			array_push($alldata,$singleeditorial);
		}
		return $alldata;
	}
}