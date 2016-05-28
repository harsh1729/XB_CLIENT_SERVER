<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Offers_model extends CI_Model
{
	public function add($userid,$heading,$content,$publishdatetime,$expirydatetime)
	{
		$data = array(
						"userid"=>$userid,
						"heading"=>$heading,
						"content"=>$content,
						"publishdatetime"=>$publishdatetime,
						"expirydatetime"=>$expirydatetime
					);
		$this->db->insert('offer',$data);
		$insertid = $this->db->insert_id();
		return $insertid;
	}
	public function mapimage($offerid,$imageid,$sortorder)
	{
		$data = array(
						"offerid"=>$offerid,
						"imageid"=>$imageid,
						"sortorder"=>$sortorder
					);
		$this->db->insert('offerimage',$data);
		$insertid = $this->db->insert_id();
		return $insertid;
	}
	public function getrandom($expdatetime)
	{
		$this->load->model('gallery_model');
		$this->db->select('o.id, o.heading, o.expirydatetime, o.userid, o.content');
		$this->db->select("GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images");

		$this->db->where('o.expirydatetime>=',$expdatetime);
		$this->db->join('offerimage oi','oi.offerid = o.id');
		$this->db->group_by('o.id');
		$this->db->order_by('o.id','RANDOM');
		$this->db->limit(5);
		$query = $this->db->get('offer o');
		$offers = array();
		foreach ($query->result() as $row)
		{
			$offer = array();
			$offer['id'] = $row->id;
			$offer['heading'] = $row->heading;
			$offer['content'] = $row->content;
			$offer['userid'] = $row->userid;
			$imgArray = explode("|",$row->images);
			$images = array();
			foreach ($imgArray as $index => $value)
			{
				$image = $this->gallery_model->getimagedata($value);
				array_push($images,$image);
			}
			$offer['images'] = $images;

			array_push($offers, $offer);
		}
		return $offers;
		//return $this->db->last_query();
	}
	public function get($expdatetime,$offerid=false)
	{
		$this->load->model('gallery_model');
		$this->db->select('o.id, o.heading, o.expirydatetime, o.userid, o.content');
		$this->db->select("GROUP_CONCAT( oi.imageid SEPARATOR  '|' ) images");

		$this->db->where('o.expirydatetime>=',$expdatetime);
		if($offerid !== false && $offerid !== NULL)
			$this->db->where('o.id',$offerid);
		$this->db->join('offerimage oi','oi.offerid = o.id');
		$this->db->group_by('o.id');
		$this->db->order_by('o.id','RANDOM');
		//$this->db->limit(5);
		$query = $this->db->get('offer o');
		$offers = array();
		foreach ($query->result() as $row)
		{
			$offer = array();
			$offer['id'] = $row->id;
			$offer['heading'] = $row->heading;
			$offer['content'] = $row->content;
			$offer['userid'] = $row->userid;
			$imgArray = explode("|",$row->images);
			$images = array();
			foreach ($imgArray as $index => $value)
			{
				$image = $this->gallery_model->getimagedata($value);
				array_push($images,$image);
			}
			$offer['images'] = $images;

			array_push($offers, $offer);
		}
		return $offers;
		//return $this->db->last_query();
	}
}