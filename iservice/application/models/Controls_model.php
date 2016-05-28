<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controls_model extends CI_Model
{
	function get()
	{
		$query = $this->db->get('master_control');
		$controls = array();
		foreach ($query->result() as $row)
		{
			$control = array();
			$control['id'] = $row->id;
			$control['name'] = $row->name;
			$control['description'] = $row->description;
			$control['and_name'] = $row->and_name;

			array_push($controls, $control);
		}
		return $controls;
	}

	function map($catid,$screenid,$mastercontrolid,$label,$sortorder,$placeholder,$isrequired)
	{
		$data_controls = array(
					"isrequired"=>$isrequired,
					"mastercontrolid"=>$mastercontrolid,
					"placeholder"=>$placeholder,
					"sortorder"=>$sortorder,
					"label"=>$label
				);

		$this->db->insert("controls",$data_controls);
		$controlsid = $this->db->insert_id();

		$data_controls_cat_map = array(
					"catid"=>$catid,
					"screenid"=>$screenid,
					"controlsid"=>$controlsid
				);

		$this->db->insert("catcontrolmapping",$data_controls_cat_map);
		$insertid = $this->db->insert_id();
		return $controlsid;
	}

	function mapupdate($mapid,$label,$sortorder,$placeholder,$isrequired) //$catid,$screenid,$mastercontrolid
	{

		

		$this->db->select('controlsid');
		$this->db->where('id',$mapid);
		$query = $this->db->get('catcontrolmapping');

		$controlsid = false;
		foreach ($query->result() as $row)
		{
    		$controlsid =  $row->controlsid;
    		break;
		}

		if($controlsid !== false ){
			$data = array(
					"label"=>$label,
					"placeholder"=>$placeholder,
					"sortorder"=>$sortorder,
					"isrequired"=>$isrequired
				);

			$this->db->where('id',$controlsid);
			$this->db->update('controls',$data);
		}
		



	/*
		//$this->db->set('a.catid', $catid);
		//$this->db->set('a.screenid', $screenid);
		$this->db->set('b.label', $label);
		$this->db->set('b.sortorder', $sortorder);
		$this->db->set('b.placeholder', $placeholder);
		$this->db->set('b.isrequired', $isrequired);

		$this->db->where('a.id', $mapid);
		$this->db->where('a.controlsid = b.id');
		$this->db->update('catcontrolmapping as a , controls as b');
	*/

	}

	function insertCatControlData($controlid,$name,$sortorder)
	{
		$data = array(
					"name"=>$name,
					"controlsid"=>$controlid,
					"sortorder"=>$sortorder
				);

		$this->db->insert("controlsmetadata",$data);
		$insertid = $this->db->insert_id();
		return $insertid;
	}

	function updateCatControlData($controlDataid,$controlid,$name,$sortorder)
	{
		$data = array(
					"name"=>$name,
					"controlsid"=>$controlid,
					"sortorder"=>$sortorder
				);

		$this->db->where('id',$controlDataid);
		$this->db->update('controlsmetadata',$data);
	}

	public function getCatScreens($catid,$userid = false)
	{
		$this->db->select("s.id,s.name,s.catid,s.sortorder,s.description");
		//$this->db->select("group_concat( DISTINCT concat( c.id,',',c.catid,',',c.controlsid,',',c.label,',',c.sortorder ) ORDER BY c.sortorder SEPARATOR '|' ) as controls");
		$this->db->select("group_concat( DISTINCT concat( cm.id,',',cm.catid,',',cm.controlsid,',',ct.label,',',ct.sortorder,',',ct.mastercontrolid,',',ct.isrequired,',',ct.placeholder) ORDER BY ct.sortorder SEPARATOR '|' ) as controls");
		$this->db->join('screen s','cm.screenid = s.id');
		$this->db->join('controls ct','cm.controlsid = ct.id');

		$this->db->where('s.catid',$catid);
		$this->db->order_by('s.sortorder','ASC');
		$this->db->group_by('s.id');
		$query = $this->db->get('catcontrolmapping cm');

		$screens = array();
		$lastqueries = array();
		array_push($lastqueries, $this->db->last_query());
		foreach ($query->result() as $row)
		{
			//$screen = array();
			//$screen['id'] = $row->id;
			//$screen['name'] = $row->name;
			//$screen['catid'] = $row->catid;
			//$screen['sortorder'] = $row->sortorder;
			//$screen['description'] = $row->description;

			$controls = array();
			foreach (explode("|",$row->controls) as $index => $value)
			{
				$controlsArray = explode(",", $value);
				$control = array(
									"id"=>$controlsArray[0],
									"catid"=>(int)trim($controlsArray[1]),
									"controlsid"=>(int)trim($controlsArray[2]),
									"label"=>trim($controlsArray[3]),
									"sortorder"=>(int)trim($controlsArray[4]),
									"mastercontrolid"=>(int)trim($controlsArray[5]),
									"isrequired"=>(int)trim($controlsArray[6]),
									"placeholder"=>trim($controlsArray[7]),
									"controldata"=>$this->getCategoryControlUserData((int)$controlsArray[2],$userid)
								);
				array_push($lastqueries, $this->db->last_query());

				array_push($controls, $control);
			}
			//$screen['controls'] = $controls;

			//array_push($screens,$screen);
			array_push($screens,$controls);
		}
		//return $lastqueries;
		return $screens;
	}


	public function getCategoryControls($catid,$screenid)
	{
		$this->db->select("cm.id,cm.catid,ct.sortorder,cm.screenid,cm.controlsid,ct.mastercontrolid,ct.label,ct.isrequired,ct.placeholder");
		$this->db->where('cm.catid',$catid);
		$this->db->where('cm.screenid',$screenid);
		$this->db->join('controls ct','cm.controlsid = ct.id');
		$this->db->order_by('ct.sortorder','ASC');
		$query = $this->db->get('catcontrolmapping cm');

		$catcontrols = array();
		foreach ($query->result() as $row)
		{
			$catcontrol = array();
			$catcontrol['id'] = $row->id;
			$catcontrol['catid'] = $row->catid;
			$catcontrol['mastercontrolid'] = $row->mastercontrolid;
			$catcontrol['label'] = $row->label;
			$catcontrol['sortorder'] = $row->sortorder;
			$catcontrol['screenid'] = $row->screenid;
			$catcontrol['controlsid'] = $row->controlsid;
			$catcontrol['isrequired'] = $row->isrequired;
			$catcontrol['placeholder'] = $row->placeholder;
			$catcontrol['controldata'] = $this->getCategoryControlData($row->controlsid);

			array_push($catcontrols,$catcontrol);
		}
		//return $this->db->last_query();
		return $catcontrols;
	}
	private function getCategoryControlData($mapid)
	{
		$this->db->select('d.id,d.name,d.controlsid,d.sortorder');
		//$this->db->select(' IFNULL(cuv.id,0) cuvid ');

		//$this->db->join('catcontroluservalue cuv','cuv.catcontrolmappingid = d.catcontrolmappingid and cuv.value = d.id','left');
		

		$this->db->where('d.controlsid',$mapid);
		$this->db->order_by('d.sortorder','ASC');
        //$this->db->join('catcontroluservalue uv','uv.catcontrolmapid=$mapid')
		$query = $this->db->get('controlsmetadata d');

		$alldata = array();
		foreach ($query->result() as $row)
		{
			$data = array();
			$data['id'] = $row->id;
			$data['name'] = $row->name;
			$data['controlsid'] = $row->controlsid;
			$data['sortorder'] = $row->sortorder;
			
			//$is_selected = 0;
			//if($row->cuvid > 0)
			//	$is_selected = 1;
			//$data['is_selected'] = $is_selected;

			array_push($alldata,$data);
		}
		return $alldata;
		//return $this->db->last_query();
	}

   private function getCategoryControlUserData($mapid,$userid)
	{
		$alldata = array();
		if($userid!=false && $userid!=NULL){
		$this->db->select('d.id,d.userid,d.value,d.catcontrolmapid');
		//$this->db->select(' IFNULL(cuv.id,0) cuvid ');

		//$this->db->join('catcontroluservalue cuv','cuv.catcontrolmappingid = d.catcontrolmappingid and cuv.value = d.id','left');
		
        $this->db->where('d.userid',$userid);
		$this->db->where('d.catcontrolmapid',$mapid);
		//$this->db->order_by('d.sortorder','ASC');
        //$this->db->join('catcontroluservalue uv','uv.catcontrolmapid=$mapid')
		$query = $this->db->get('catcontroluservalue d');

		
		foreach ($query->result() as $row)
		{
			$data = array();
			$data['id'] = $row->id;
			$data['value'] = $row->value;
			$data['catcontrolmapid'] = $row->catcontrolmapid;
			//$data['sortorder'] = $row->sortorder;
			
			//$is_selected = 0;
			//if($row->cuvid > 0)
			//	$is_selected = 1;
			//$data['is_selected'] = $is_selected;

			array_push($alldata,$data);
		}
	   }
		return $alldata;
		//return $this->db->last_query();
	}

}