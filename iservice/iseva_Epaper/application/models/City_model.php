<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City_model extends CI_Model{

	public function add($cityname,$pincode)
	{
		$data = array(
				"name" => $cityname,
				"pincode" => $pincode
			);
			
			$this->db->insert("city",$data);
			$insertid = $this->db->insert_id();
		return $insertid;
	}
	public function get($cityid=false,$gcmid=false)
	{
		$this->db->select('c.id,c.name,c.pincode');
		if($cityid !== false && $cityid !== NULL)
			$this->db->where('id',$cityid);
		if($gcmid !== false && $gcmid !== NULL)
		{
			$this->db->select('gn.gcmid');
			$this->db->join("(select * from gcmusercitymapping g where g.gcmid = $gcmid ) gn",'c.id = gn.cityid','left');
			//$this->db->join()
			//$this->db->where('gn.gcmid',$gcmid);
		}
		$query = $this->db->get('city c');
		$cities = array();
		foreach ($query->result() as $row)
		{
			$city = array();
			$city['id'] = $row->id;
			$city['name'] = $row->name;
			$city['pincode'] = $row->pincode;
			if($gcmid !== false && $gcmid !== NULL)
			{
				$temp = 0;
				if($row->gcmid)
					$temp = 1;
				else
					$temp = 0;
				$city['is_select'] = $temp;
			}

			array_push($cities, $city);
		}
		return $cities;
		//return $this->db->last_query();
	}
	public function getcityids($gcmid)
	{
		$this->db->select('c.id,c.name,c.pincode');
		if($gcmid !== false && $gcmid !== NULL)
		{
			$this->db->select('gn.gcmid');
			$this->db->join("(select * from gcmusercitymapping g where g.gcmid = $gcmid ) gn",'c.id = gn.cityid');
		}
		$query = $this->db->get('city c');
		$cities = array();
		foreach ($query->result() as $row)
		{

			array_push($cities, $row->id);
		}
		return $cities;
		//return $this->db->last_query();
	}

	public function getcityidsby_imei($imei)
	{
		$this->db->select('c.id,c.name,c.pincode');
		if($imei !== false && $imei !== NULL)
		{

			$this->db->select('gn.gcmid');
			$this->db->join('gcmusercitymapping gn','c.id = gn.cityid');
			$this->db->join('gcmuser g','g.id = gn.gcmid');
			$this->db->where('g.imei',$imei);
		}
		$query = $this->db->get('city c');
		$cities = array();
		foreach ($query->result() as $row)
		{

			array_push($cities, $row->id);
		}
		return $cities;
		//return $this->db->last_query();
	}

	public function mapgcmuser($gcmid,$cities)
	{
		$data = array();
		foreach ($cities as $index => $value) {
			$temp = array(
							"gcmid"=>$gcmid,
							"cityid"=>$value
						);
			array_push($data, $temp);
		}
		$this->db->insert_batch('gcmusercitymapping',$data);
	}
}