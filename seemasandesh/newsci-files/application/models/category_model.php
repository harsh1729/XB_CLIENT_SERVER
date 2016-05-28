<?php

class Category_model extends CI_Model
{
	function get_all_categories_format_tree($clientid,$folders)
	{
		$this->db->where('clientid',$clientid);
		$this->db->where('isactive',1);
		//$this->db->where('isroot',0);
		$this->db->where('parentid',0);
		$query = $this->db->get('category');
		$all_categories = array();
		foreach ($query->result() as $row) 
		{
			$single_parent_category = array();
			$single_parent_category['id'] = $row->id;
			$single_parent_category['name'] = $row->name;
			if($row->image !== "")
				$single_parent_category['image'] = base_url($folders['categoryimagespath'].$row->image);
			else
				$single_parent_category['image'] = $row->image;
            $single_parent_category['root'] = $row->isroot;     // add vikas
			$single_parent_category['subcat'] = $this->get_sub_category($clientid,$folders,$row->id);
			array_push($all_categories, $single_parent_category);
		}
		//return json_encode($all_categories);
		return $all_categories;
	}
	

	function get_all_categories($clientid,$folders , $onlyparent = false, $needrootcat = false)
	{
		$this->db->where('clientid',$clientid);
		$this->db->where('isactive',1);
		if($needrootcat)
			$this->db->where('isroot',0);
		if($onlyparent)
			$this->db->where('parentid',0);
		
		$query = $this->db->get('category');
		$all_categories = array();
		foreach ($query->result() as $row) 
		{
			$single_parent_category = array();
			$single_parent_category['id'] = $row->id;
			$single_parent_category['name'] = $row->name;
			
			if($row->image !== "")
				$single_parent_category['image'] = base_url($folders['categoryimagespath'].$row->image);
			else
				$single_parent_category['image'] = $row->image;
			
			$single_parent_category['parent_id'] = $row->parentid;
			array_push($all_categories, $single_parent_category);
		}
		//return json_encode($all_categories);
		return $all_categories;
	}

	function get_root_category($clientid,$alldata = false)
	{
		$this->db->where('clientid',$clientid);
		$this->db->where('isactive',1);
		$this->db->where('parentid',0);
		$this->db->where('isroot',1);
		$query = $this->db->get('category');
		
		if($query->result())
		{
			if($alldata  == false)
			{
				$returndata = $query->result()[0]->id;
			}
			else
			{
				$returndata = array();
				$returndata['id'] = $query->result()[0]->id;
				$returndata['name'] = $query->result()[0]->name;
			}
		}
		else
			$returndata = 0;
		return $returndata;
	}
	function get_category_name($catid)
	{
		$this->db->where('id',$catid);
		$this->db->where('isactive',1);
		$this->db->where('isroot',1);
		$this->db->select('name');
		$query = $this->db->get('category');
		if($query->result())
			return $query->result()[0]->name;
		else
			return false;
	}
	function get_version($clientid)
	{
		$this->db->where('client_id',$clientid);
		$this->db->select_max('category_version');
		$query = $this->db->get('client_settings');
		if($query->result())
			return $query->result()[0]->category_version;	
		else
			return 0;
	}
	function update_version($clientid,$version)
	{
		$this->db->where('client_id',$clientid);
		
		if($this->db->count_all('client_settings') > 0){
			
			$data = array(
			'category_version'=>$version+1
			);
			$this->db->where('client_id',$clientid);
			$this->db->update('client_settings',$data);
		}else{
			$data = array(
			'category_version'=>0,
			'client_id'=>$clientid
			);
			$this->db->insert('client_settings', $data); 
		}
	}
	function get_sub_category($clientid,$folders,$parent_cat_id)
	{
		$this->db->where('clientid',$clientid);
		$this->db->where('isactive',1);
		$this->db->where('parentid',$parent_cat_id);
		$query = $this->db->get('category');
		$all_sub_categories = array();
		foreach ($query->result() as $row) 
		{
			$single_child_category = array();
			$single_child_category['id'] = $row->id;
			$single_child_category['name'] = $row->name;
			
			if($row->image !== "")
				$single_parent_category['image'] = base_url($folders['categoryimagespath'].$row->image);
			else
				$single_parent_category['image'] = $row->image;
			

			array_push($all_sub_categories, $single_child_category);
		}
		return $all_sub_categories;
	}
	function get_client_id($catid)
	{
		$this->db->where('id',$catid);
		$this->db->select('clientid');
		$query = $this->db->get('category');
		if($query->result())
			return $query->result()[0]->clientid;
		else
			return 0;
	}
	function check_cat_client($clientid,$catid)
	{
		$this->db->where('id',$catid);
		$this->db->where('clientid',$clientid);
		$query = $this->db->get('category');
		if($query->num_rows() > 0)
			return true;
		else
			return false;
	}
	function upload_image($upload_path)
	{
		if (!empty($_FILES))
		{
			$tempFile = $_FILES['file']['tmp_name'];
			$replaceChars = array(" ",".");
			$timedImgName = time().str_replace($replaceChars,"_",$_FILES['file']['name']);
			
			//$targetFile =  $upload_path."/".$this->str_lreplace("_",".",$timedImgName);

			$CI =& get_instance();
			$CI->load->library('xerces_globals');
			$targetFile =  $upload_path.DIRECTORY_SEPARATOR.$this->xerces_globals->str_last_replace("_",".",$timedImgName);
			
			move_uploaded_file($tempFile,$targetFile);
			//return $this->str_lreplace("_",".",$timedImgName);
			return $timedImgName;
		}
	}
	function delete_image_by_name($filepath)
	{
		unlink($filepath);
	}
	function save_category($name,$image,$parentcatid,$clientid,$issubmenu,$isactive)
	{
		$data = array(
			'name'=>$name,
			'image'=>$image,
			'parentid'=>$parentcatid,
			'clientid'=>$clientid,
			'menu'=>$issubmenu,
			'isactive'=>$isactive
		);
		$this->db->insert('category',$data);
		return $this->db->insert_id();
	}
	function update_category($catname,$image,$catid)
	{
		$data = array(
			'name'=>$catname,
			'image'=>$image
		);
		$this->db->where('id',$catid);
		$this->db->update('category',$data);
	}
	function get_image_name($catid)
	{
		$this->db->where('id',$catid);
		$this->db->select('image');
		$query = $this->db->get('category');
		if($query->result())
			return $query->result()[0]->image;
		else
			return "";
	}
	function delete_category($catid)
	{
		$data = array(
			'isactive'=>0
		);
		$this->db->where('id',$catid);
		$this->db->update('category',$data);
	}
}