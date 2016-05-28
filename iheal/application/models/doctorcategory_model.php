<?php

class DoctorCategory_model extends CI_Model
{
	function getAllCategories()
	{
		$query = $this->db->get('doctor_category');

		$allcategories = array();
		foreach ($query->result() as $index => $row) {
			$singleCat = array();

			$singleCat['id'] = $row->id;
			$singleCat['name'] = $row->name;

			array_push($allcategories, $singleCat);
		}
		return $allcategories;
	}
}