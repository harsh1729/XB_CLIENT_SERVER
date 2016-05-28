<?php

class State_model extends CI_Model
{
	public function getAllStates()
	{
		$this->db->order_by('name');
		$query = $this->db->get('state');

		$allStates = array();
		foreach ($query->result() as $index => $row) {
			$singleState = array();

			$singleState['id'] = $row->id;
			$singleState['name'] = $row->name;

			array_push($allStates, $singleState);
		}
		return $allStates;
	}
}