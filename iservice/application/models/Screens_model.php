<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Screens_model extends CI_Model
{
	public function get($catid=false,$screenid=false)
	{
		if($catid !== false && $catid !== NULL)
			$this->db->where('catid',$catid);
		if($screenid !== false && $screenid !== NULL)
			$this->db->where('id',$screenid);

		$this->db->order_by('sortorder','ASC');
		$query = $this->db->get('screen');

		$screens = array();
		foreach ($query->result() as $row)
		{
			$screen = array();
			$screen['id'] = $row->id;
			$screen['name'] = $row->name;
			$screen['catid'] = $row->catid;
			$screen['sortorder'] = $row->sortorder;
			$screen['description'] = $row->description;

			array_push($screens, $screen);
		}
		return $screens;
		//return $this->db->last_query();
	}
	public function getlastsortorder($catid)
	{
		$this->db->select_max('sortorder');
		$this->db->where('catid',$catid);
		$query= $this->db->get('screen');

		$row = $query->row();
		$lastsortorder = 0;
		if (isset($row))
			$lastsortorder = $row->sortorder;
		return $lastsortorder;
		//return $this->db->last_query();
	}
	public function add($name,$description,$catid,$sortorder)
	{
		$data = array(
					"name"=>$name,
					"catid"=>$catid,
					"sortorder"=>$sortorder,
					"description"=>$description
				);
		$this->db->insert('screen',$data);
		$insertid = $this->db->insert_id();
		return $insertid;
	}
}