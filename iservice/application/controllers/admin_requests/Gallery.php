<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('gallery_model');
	}
	/*function getGalleryData()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				echo json_encode(array("status"=>"login","data"=>$this->gallery_model->getGalleryData()));
			}
		}
	}*/
	function get_images()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('user_model');
			
			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$lastimageid = $this->input->post('lastimageid');
				echo json_encode(array("status"=>"login","data"=>$this->gallery_model->getGalleryData($lastimageid)));
			}
		}
	}
	function delete_image()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('user_model');

			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->model('user_model');
				$this->load->helper('path');

				$userid = $this->session->userdata('user_id');
				$imageid = $this->input->post('imageid');

				$imagedata = $this->gallery_model->getimagedata($imageid);
				$filename = $imagedata['imagename'];
				$thumb_filename = "thumb_".$imagedata['imagename'];
				$YEAR = $imagedata['yeardir'];
				$MONTH = $imagedata['monthdir'];

				$this->gallery_model->removeimage($imageid);

				$publicuploadsRelDir = "publicuploads";
				$publicuploadsDir = FCPATH.$publicuploadsRelDir;
				$filename = realpath($publicuploadsDir.DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR.$filename);
				$thumb_filename = realpath($publicuploadsDir.DIRECTORY_SEPARATOR.$YEAR.DIRECTORY_SEPARATOR.$MONTH.DIRECTORY_SEPARATOR.$thumb_filename);

				$this->gallery_model->delete_image_by_name($filename);
				$this->gallery_model->delete_image_by_name($thumb_filename);
				echo json_encode(array("status"=>'login'/*,"filename"=>$filename,"thumbname"=>$thumb_filename*/));
			}
		}
	}
	function upload_image()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('user_model');

			$is_logged_in = $this->user_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->helper('path');

				$userid = $this->session->userdata('user_id');

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
											"imagedata" => $this->gallery_model->upload_image($upload_path,$datetime,$relpath,$userid)
										)
									);
				}
				else
				{
					echo json_encode(array('status'=>'login','error'=>'uploadpatherror'));
				}
			}
		}
	}



}