<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Version_model extends CI_Model{

	public function get()
	{
		$query = $this->db->get('version');
		$versions = array();
		foreach ($query->result() as $row)
		{
			$version = array();
			$version['id'] = $row->id;
			$version['name'] = $row->name;
			$version['version'] = $row->version;

			$versions[$row->name] = $version;
		}
		return $versions;
	}
	public function set($name)
	{
		$this->db->set('version','version+1',false);
		$this->db->where('name',$name);
		$this->db->update('version');
		//return $this->db->last_query();
	}
}