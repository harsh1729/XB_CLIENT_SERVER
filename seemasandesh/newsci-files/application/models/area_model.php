<?php

class Area_model extends CI_Model
{
	function get_areas($clientid,$stateid = false)
	{
		$this->db->select('area.id, area.areacode, area.name, area.state');
		$this->db->join('clientareamapping','clientareamapping.areacodeid = area.id');
		$this->db->where('clientareamapping.clientid',$clientid);
		if($stateid)
			$this->db->where('area.state',$stateid);
		$query = $this->db->get('area');
		$allareas = array();
		foreach ($query->result() as $key => $value)
		{
			$singlearea = array();
			$singlearea['id'] = $value->id;
			$singlearea['name'] = $value->name;
			$singlearea['areacode'] = $value->areacode;
			$singlearea['stateid'] = $value->state;

			array_push($allareas,$singlearea);
		}
		return $allareas;
		//return $this->db->last_query();
	}
	function get_areawise_epaper($folders,$clientid,$stateid=false,$currentDatesql=false)
	{
		$this->db->select('area.id,area.name,area.areacode,e1.id as epaperid,e1.filename,e1.totalpages,e1.publishdate');
		$this->db->join('clientareamapping','clientareamapping.areacodeid = area.id');
		$this->db->join('epaper as e1','e1.areacodeid = area.id');
		$this->db->where('clientareamapping.clientid',$clientid);
		$this->db->where('e1.clientid',$clientid);
		if($currentDatesql)
		{
			$this->db->where('e1.publishdate',$currentDatesql);
		}
		else
		{
			$this->db->where("e1.publishdate = (select max( e2.publishdate ) from epaper as e2)",NULL,false);
		}
		
		if($stateid)
			$this->db->where('area.state',$stateid);
		$query = $this->db->get('area');
		$allareas = array();
		foreach ($query->result() as $key => $value)
		{
			$singlearea = array();
			$singlearea['id'] = $value->id;
			$singlearea['name'] = $value->name;
			$singlearea['areacode'] = $value->areacode;

			$singlearea['epaperid'] = $value->epaperid;
			$singlearea['totalpages'] = $value->totalpages;
			if(!$currentDatesql)
				$singlearea['publishdate'] = $value->publishdate;
			if($value->filename != "")
			{
				$singlearea['filename'] = base_url($folders['epaperfilespath'].$value->filename);
				$path_parts = pathinfo($singlearea['filename']);
				$singlearea['previewimage'] = $path_parts['dirname'].DIRECTORY_SEPARATOR.$path_parts['filename']."_thumb_1.jpg";
			}
			else
			{
				$singlearea['filename'] = "";
				$singlearea['previewimage'] = "";
			}

			array_push($allareas,$singlearea);
		}
		return $allareas;
		//return $this->db->last_query();
	}
	function get_states($clientid,$stateid = false)
	{
		$this->db->distinct();
		$this->db->select('states.id,states.name');
		$this->db->join('area','clientareamapping.areacodeid = area.id');
		$this->db->join('states','area.state = states.id');
		$this->db->where('clientid',$clientid);
		if($stateid)
			$this->db->where('states.id',$stateid);
		$query = $this->db->get('clientareamapping');
		$allstates = array();
		foreach ($query->result() as $key => $value)
		{
			$singlestate = array();
			$singlestate['id'] = $value->id;
			$singlestate['name'] = $value->name;

			array_push($allstates,$singlestate);
		}
		return $allstates;
	}
	function get_area_code_id($areacode)
	{
		$this->db->where('areacode',$areacode);
		$this->db->select('id');
		$query = $this->db->get('area');
		if($query->result())
			return $query->result()[0]->id;
		else
			return 0;
	}
}