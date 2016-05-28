<?php

class City_model extends CI_Model
{
	public function getAllcities()
	{
		$this->db->order_by('name');
		$query = $this->db->get('city');

		$allcities = array();
		foreach ($query->result() as $index => $row) {
			$singleCity = array();

			$singleCity['id'] = $row->id;
			$singleCity['name'] = $row->name;
			$singleCity['pincode'] = $row->pincode;
			$singleCity['state_id'] = $row->state_id;

			array_push($allcities, $singleCity);
		}
		return $allcities;
	}
	public function getCityByStateId($stateid)
	{
		$this->db->where('state_id',$stateid);
		$this->db->order_by('name');
		$query = $this->db->get('city');

		$allcities = array();
		foreach ($query->result() as $index => $row) {
			$singleCity = array();

			$singleCity['id'] = $row->id;
			$singleCity['name'] = $row->name;
			$singleCity['pincode'] = $row->pincode;
			$singleCity['state_id'] = $row->state_id;

			array_push($allcities, $singleCity);
		}
		return $allcities;
	}
	function save_city($cityname,$pincode,$stateid)
	{
		$data = array(
			'name' => $cityname,
			'pincode' => $pincode,
			'state_id' => $stateid
		);
		$this->db->insert('city',$data);
		return $this->db->insert_id();
	}
}