<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_model');
	}
	function upload_image()
	{
		$this->load->helper('path');

		$userid = -1;//$this->input->get_post('userid');
		$keys = $this->input->get_post('keys');

		//get datetime of now and then check if year and month directory exists.
		$dt = new DateTime("now",new DateTimeZone("GMT"));
		$YEAR = $dt->format("Y");
		$MONTH = $dt->format('m');
		$datetime = $dt->format('Y-m-d H:i:s');

		//check if year directory exists
			//if exists then check if month directory exists
				//month directory exists, save in that directory
			//else if month directory doesn't exists then create one and save in that
		//else if year direcotry doesn't exists then create year/month and save in month directory.
		$publicuploadsRelDir = "publicuploads";
		$publicuploadsDir = FCPATH.$publicuploadsRelDir;

		if(file_exists($publicuploadsDir) && is_dir($publicuploadsDir))
		{
			//mkdir($publicuploadsDir.DIRECTORY_SEPARATOR."TESTUPLOAD",0777,TRUE);
		}
		else
		{
			mkdir($publicuploadsDir,0777,TRUE);
		}

		if(file_exists($publicuploadsDir.DIRECTORY_SEPARATOR.$YEAR) && is_dir($publicuploadsDir.DIRECTORY_SEPARATOR.$YEAR) )
		{
			//year DIR exists
			if( file_exists($publicuploadsDir.DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH) && is_dir($publicuploadsDir.DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH) )
			{
				//MONTH DIR EXISTS
			}
			else
			{
				//month dir doesn't exists
				mkdir( $publicuploadsDir.DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH,0777,TRUE );
			}
		}
		else
		{
			//year DIR doesn't exists
			mkdir( $publicuploadsDir.DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH,0777,TRUE );
		}



		$upload_path = realpath($publicuploadsDir.DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH);
		$relpath = $publicuploadsRelDir.DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH;
		if($upload_path)
		{
			echo json_encode(
								array(
									"status"=>"login",
									//"imagedata" => $this->gallery_model->upload_image($upload_path,$datetime,$relpath,$userid)
									"imagedata" => $this->gallery_model->upload_image_mob($upload_path,$datetime,$relpath,$userid,$keys)
								)
							);
		}
		else
		{
			echo json_encode(array('status'=>'login','error'=>'uploadpatherror'));
		}
	}
}