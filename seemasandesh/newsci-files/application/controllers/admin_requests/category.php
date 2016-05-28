<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('category_model');
	}
	function upload_image()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');

			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->helper('path');
				$this->load->model('user_model');

				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);


				// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
				$this->load->model('client_model');
				$folders = $this->client_model->get_folder_name_by_id($clientid);

				$upload_path = realpath($folders['categoryimagespath']);
				if($upload_path)
				{
					echo $this->category_model->upload_image($upload_path);
				}
				else
				{
					echo json_encode(array('status'=>'login','error'=>'uploadpatherror'));
				}
			}
		}
	}
	function remove_image()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');

			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->model('user_model');
				$this->load->helper('path');
				$this->load->library('xerces_globals');

				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);


				// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
				$this->load->model('client_model');
				$folders = $this->client_model->get_folder_name_by_id($clientid);
				$foldername = $folders['categoryimagespath'];
				$filename = $this->xerces_globals->str_last_replace("_",".",$this->input->post('filename'));
				$filepath = realpath($foldername.$filename);
				$this->category_model->delete_image_by_name($filepath);
				echo json_encode(array("status"=>'login'));
			}
		}
	}
	function save_category()
	{

		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');

			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->model('user_model');
				$this->load->library('xerces_globals');


				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);

				$parentcatid = $this->input->post('parentcatid');
				$catname = $this->input->post('catname');
				
				$image = $this->xerces_globals->str_last_replace("_",".",$this->input->post('image'));
				$version = $this->category_model->get_version($clientid);
				$issubmenu = 0;

				$catid = $this->category_model->save_category($catname,$image,$parentcatid,$clientid,$issubmenu,1);
				if($catid > 0)
					$this->category_model->update_version($clientid,$version);
				echo json_encode(array("status"=>'login',"data"=>$catid));

                                


			}
		}
	}
	function update_category()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');

			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->model('user_model');
				$this->load->library('xerces_globals');


				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);

				$catname = $this->input->post('catname');
				$catid = $this->input->post('catid');
				$image = $this->xerces_globals->str_last_replace("_",".",$this->input->post('image'));
				$version = $this->category_model->get_version($clientid);
				
				// EXTRACT CLIENT ID,Folders WITH THE HELP OF DOMAIN NAME !!!
				$this->load->model('client_model');
				$folders = $this->client_model->get_folder_name_by_id($clientid);
				$foldername = $folders['categoryimagespath'];

///////////////*********************************       CORRECT THIS CODE FIRST HERE !!!!!! ***************/////////////
				$oldimage = $this->category_model->get_image_name($catid);
				if($oldimage != $image)
				{
					if($oldimage != "")
					{
						$filepath = realpath($foldername.$oldimage);
						$this->category_model->delete_image_by_name($filepath);
					}
				}

				$this->category_model->update_category($catname,$image,$catid);
				$this->category_model->update_version($clientid,$version);
				
				echo json_encode(array("status"=>'login',"data"=>$catid));
			}
		}
	}
	function get_all_categories()
	{

		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');
			$this->load->model('client_model');

			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$this->load->model('user_model');

				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);

				$folders = $this->client_model->get_folder_name_by_id($clientid);


				echo json_encode($this->category_model->get_all_categories_format_tree($clientid,$folders));
				//echo json_encode("hi");
			}
		}
	}
	function delete_category()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$this->load->model('userinfo_model');
			$this->load->model('user_model');
			$this->load->model('client_model');

			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);
				$version = $this->category_model->get_version($clientid);

				$folders = $this->client_model->get_folder_name_by_id($clientid);
				
				$catid = $this->input->post('catid');
				foreach ($this->category_model->get_sub_category($clientid,$folders,$catid) as $row)
				{
					$this->category_model->delete_category($row['id']);
				}
				$this->category_model->delete_category($catid);
				$this->category_model->update_version($clientid,$version);
			}
		}
	}
}

/* End of file category.php */
/* Location: ./application/controllers/admin_requests/category.php */