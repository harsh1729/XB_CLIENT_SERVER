<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model{
	private $TABLE_NAME_CATEGORY = "category";
	private $KEY_ID = "id";
	private $KEY_NAME = "name";
	private $KEY_PARENTID = "parentid";
	private $KEY_SORTORDER = "sortorder";
	private $KEY_IMAGEID = "imageid";
	private $KEY_ISENABLE = "isenable";

	public function newcategory($imageid,$categoryname,$parentid,$sortorder,$userid)
	{
		$data = array(
				$this->KEY_NAME => $categoryname,
				$this->KEY_PARENTID => $parentid,
				$this->KEY_SORTORDER => $sortorder,
				$this->KEY_IMAGEID => $imageid,
				$this->KEY_ISENABLE => 1
			);
			
			$this->db->insert($this->TABLE_NAME_CATEGORY,$data);
			$insertid = $this->db->insert_id();
		return $insertid;
	}
	public function getlastsortorder($parentid)
	{
		$this->db->select_max($this->KEY_SORTORDER);
		$this->db->where($this->KEY_PARENTID,$parentid);
		$query= $this->db->get($this->TABLE_NAME_CATEGORY);

		$row = $query->row();
		$lastsortorder = 0;
		if (isset($row))
			$lastsortorder = $row->sortorder;
		return $lastsortorder;
	}
	public function get($parentid=false,$isenable=false,$catid=false)
	{
		$this->db->select("c.id catid,c.name,c.parentid,c.sortorder,c.imageid,c.isenable,
			g.name imgname,g.datetime imgdatetime,g.size imgsize,g.width imgwidth,
			g.height imgheight,g.userid imguserid");
		$this->db->order_by('c.sortorder','asc');
		if($parentid !== false && $parentid !== NULL)
			$this->db->where('c.parentid',$parentid);
		if($isenable !== false && $isenable !== NULL)
			$this->db->where('c.isenable',$isenable);
		if($catid !== false && $catid !== NULL)
			$this->db->where('c.id',$catid);

		$this->db->join('gallery g','c.imageid = g.id','inner');
		$query = $this->db->get('category c');

		$categories = array();
		foreach ($query->result() as $row)
		{
			$category = array();

			$category['catid'] = $row->catid;
			$category['name'] = $row->name;
			$category['parentid'] = $row->parentid;
			$category['sortorder'] = $row->sortorder;
			//$category['imageid'] = $row->imageid;
			$category['isenable'] = $row->isenable;
			$category['isbusiness'] = 1;

            $this->db->where('parentid',$row->catid);
            $subquery = $this->db->get('category');
            $num = $subquery->num_rows();
            if($num>0)
            {
              $category['issubcate'] = 1;
            }else
            {
              $category['issubcate'] = 0;
            }
			//*************imagedata ******************
			$imgurl = "";
			$imgthumburl = "";

			$dt = DateTime::createFromFormat('Y-m-d H:i:s',$row->imgdatetime,new DateTimeZone("GMT"));
			$YEAR = $dt->format('Y');
			$MONTH = $dt->format('m');
			$dt->setTimeZone(new DateTimeZone("Asia/Kolkata"));
			$imgdatetime = $dt->format('H:i:s d-m-Y');

			if($row->imgname !== "")
			{
				$imgurl = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR.$row->imgname);
				$imgthumburl = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR."thumb_".$row->imgname);
			}
			$category['image'] = array(
										"id" => $row->imageid,
										"name" => $row->imgname,
										"url" => $imgurl,
										"thumburl" => $imgthumburl,
										"datetime" => $imgdatetime,
										"size" => $row->imgsize,
										"width" => $row->imgwidth,
										"height" => $row->imgheight,
										"userid" => $row->imguserid
									);
			///*************imagedata ******************

			array_push($categories,$category);
		}
				   
		//Call for business extra related to category

		$this->db->select("bx.* ,
			g.name imgname,g.datetime imgdatetime,g.size imgsize,g.width imgwidth,
			g.height imgheight,g.userid imguserid");
				   $this->db->where('catid',$parentid);
				   $this->db->where('catid != ',0);
				   $this->db->join('gallery g','bx.imageid = g.id','inner');
				   $query = $this->db->get('business_extra_master bx');
		foreach ($query->result() as $row)
				  {
				   $category = array();

				   $category['catid'] = $row->id;
				   $category['name'] = $row->name;
				   $category['isbusiness'] = 0;

	//*************imagedata ******************
			$imgurl = "";
			$imgthumburl = "";

			$dt = DateTime::createFromFormat('Y-m-d H:i:s',$row->imgdatetime,new DateTimeZone("GMT"));
			$YEAR = $dt->format('Y');
			$MONTH = $dt->format('m');
			$dt->setTimeZone(new DateTimeZone("Asia/Kolkata"));
			$imgdatetime = $dt->format('H:i:s d-m-Y');

			if($row->imgname !== "")
			{
				$imgurl = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR.$row->imgname);
				$imgthumburl = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR."thumb_".$row->imgname);
			}
			$category['image'] = array(
										"id" => $row->imageid,
										"name" => $row->imgname,
										"url" => $imgurl,
										"thumburl" => $imgthumburl,
										"datetime" => $imgdatetime,
										"size" => $row->imgsize,
										"width" => $row->imgwidth,
										"height" => $row->imgheight,
										"userid" => $row->imguserid
									);
			///*************imagedata ******************
				   array_push($categories,$category);
				  }


		return $categories;
		//return $this->db->last_query();
	}
      public function getbusinessextracat($parentid){

      	$this->db->select("bx.* ,
			g.name imgname,g.datetime imgdatetime,g.size imgsize,g.width imgwidth,
			g.height imgheight,g.userid imguserid");
				   $this->db->where('bx.catid','0');
				   $this->db->where('bx.id not in(1)');
				   $this->db->join('gallery g','bx.imageid = g.id','left');
				   $query = $this->db->get('business_extra_master bx');
				   $categories = array();
		foreach ($query->result() as $row)
				  {
				   $category = array();

				   $category['catid'] = $row->id;
				   $category['name'] = $row->name;
				   $category['isbusiness'] = 0;

	//*************imagedata ******************
		if($row->imgdatetime!=NULL && $row->imgdatetime=""){
			$imgurl = "";
			$imgthumburl = "";

			$dt = DateTime::createFromFormat('Y-m-d H:i:s',$row->imgdatetime,new DateTimeZone("GMT"));
			$YEAR = $dt->format('Y');
			$MONTH = $dt->format('m');
			$dt->setTimeZone(new DateTimeZone("Asia/Kolkata"));
			$imgdatetime = $dt->format('H:i:s d-m-Y');

			if($row->imgname !== "")
			{
				$imgurl = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR.$row->imgname);
				$imgthumburl = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR."thumb_".$row->imgname);
			}
			$category['image'] = array(
										"id" => $row->imageid,
										"name" => $row->imgname,
										"url" => $imgurl,
										"thumburl" => $imgthumburl,
										"datetime" => $imgdatetime,
										"size" => $row->imgsize,
										"width" => $row->imgwidth,
										"height" => $row->imgheight,
										"userid" => $row->imguserid
									);
			///*************imagedata ******************
		}
				   array_push($categories,$category);
				  }


		return $categories;
      }



   public function getsub($parentid=false,$isenable=false,$catid=false)
	{
		$this->db->select("c.id catid,c.name,c.parentid,c.sortorder,c.imageid,c.isenable,
			g.name imgname,g.datetime imgdatetime,g.size imgsize,g.width imgwidth,
			g.height imgheight,g.userid imguserid");
		$this->db->order_by('c.sortorder','asc');
		if($parentid !== false && $parentid !== NULL)
			$this->db->where('c.parentid',$parentid);
		if($isenable !== false && $isenable !== NULL)
			$this->db->where('c.isenable',$isenable);
		if($catid !== false && $catid !== NULL)
			$this->db->where('c.id',$catid);

		$this->db->join('gallery g','c.imageid = g.id','inner');
		$query = $this->db->get('category c');

		$categories = array();
		foreach ($query->result() as $row)
		{
			$category = array();

			$category['catid'] = $row->catid;
			$category['name'] = $row->name;
			$category['parentid'] = $row->parentid;
			$category['sortorder'] = $row->sortorder;
			//$category['imageid'] = $row->imageid;
			$category['isenable'] = $row->isenable;
			$category['isbusiness'] = 1;

            $this->db->where('parentid',$row->catid);
            $subquery = $this->db->get('category');
            $num = $subquery->num_rows();
            if($num>0)
            {
              $category['issubcate'] = 1;
            }else
            {
              $category['issubcate'] = 0;
            }
			//*************imagedata ******************
			$imgurl = "";
			$imgthumburl = "";

			$dt = DateTime::createFromFormat('Y-m-d H:i:s',$row->imgdatetime,new DateTimeZone("GMT"));
			$YEAR = $dt->format('Y');
			$MONTH = $dt->format('m');
			$dt->setTimeZone(new DateTimeZone("Asia/Kolkata"));
			$imgdatetime = $dt->format('H:i:s d-m-Y');

			if($row->imgname !== "")
			{
				$imgurl = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR.$row->imgname);
				$imgthumburl = base_url("publicuploads".DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR."thumb_".$row->imgname);
			}
			$category['image'] = array(
										"id" => $row->imageid,
										"name" => $row->imgname,
										"url" => $imgurl,
										"thumburl" => $imgthumburl,
										"datetime" => $imgdatetime,
										"size" => $row->imgsize,
										"width" => $row->imgwidth,
										"height" => $row->imgheight,
										"userid" => $row->imguserid
									);
			///*************imagedata ******************

			array_push($categories,$category);
		}
		return $categories;
	}



	public function sort($sortorder)
	{
		$data = array();
		foreach ($sortorder as $index => $value) {
			$temp = array('id'=>$value,'sortorder'=>$index);
			array_push($data, $temp);
		}

		$this->db->update_batch('category',$data,'id');
		return $this->db->affected_rows();
	}
	public function setstatus($catid,$value)
	{
		$data = array(
						"isenable" => $value
					);
		$this->db->where('id',$catid);
		$this->db->or_where('parentid',$catid);
		$this->db->update('category',$data);
		return $this->db->affected_rows();	
	}
	public function is_exists($catid)
	{
		$this->db->where($this->KEY_ID,$catid);
		$queryResult = $this->db->get($this->TABLE_NAME_CATEGORY);
		if($queryResult->num_rows() > 0)
			return true;
		else
			return false;
	}
}