<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('userinfo_model');
		$this->load->model('user_model');
	}
	function add_user()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$is_logged_in = $this->userinfo_model->is_logged_in();
			$userid = -1;
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$userid = $this->session->userdata('user_id');

				$name = $this->input->post('name');
				$lastname = $this->input->post('lastname');
				$email = $this->input->post('email');
				$contact = $this->input->post('contact');
				$usertype = $this->input->post('userrole');

				$dt = new DateTime($this->input->post('dob'));
				$dt->setTimeZone(new DateTimeZone("GMT"));
				$dob = $dt->format('Y-m-d');

				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				$address = $this->input->post('address');
				$areacodeid = $this->input->post('areacodeid');
				$clientid = $this->user_model->get_client_id($userid);

				$userinfoid = $this->userinfo_model->add_user_info($name,$dob,$username,$password,$email,$contact,$address,$areacodeid);
				$userdataid = $this->user_model->add_user($usertype,$userid,$userinfoid,$clientid,1);
				echo json_encode(array("status"=>'login',"data"=>array($userinfoid,$userdataid)));
			}
		}
	}

//ADDED BY HARSH FOR FETCHING USER PROFILE
function get_user_info()
	{
		

		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$is_logged_in = $this->userinfo_model->is_logged_in();
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$userid = $this->session->userdata('user_id');
				$user_info_array = $this->userinfo_model->get_user_info($userid );
				echo json_encode($user_info_array);
			}
		}
	}

function get_child_users()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$is_logged_in = $this->userinfo_model->is_logged_in();
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$userid = $this->session->userdata('user_id');
				//$userid = 2;
				$user_info_array = $this->userinfo_model->get_child_users($userid);
				echo json_encode($user_info_array);
			}
		}
	}

function delete_user()
	{
		if(!$this->input->is_ajax_request())
			redirect('404');
		else
		{
			$is_logged_in = $this->userinfo_model->is_logged_in();
			if(!$is_logged_in)
			{
				echo json_encode(array("status"=>'notlogin'));
			}
			else if($is_logged_in)
			{
				$userid =  $this->input->post('userid');
				//$userid = 3;
				$user_info_array = $this->userinfo_model->delete_user($userid );
				echo json_encode($user_info_array);
			}
		}
	}

    function loginAuth()
    {
        
        $finalArray = array();
       	$this->load->model('userinfo_model');
        $this->load->model('category_model');
        $this->load->model('client_model');
        $clientid = $this->input->post('clientid');
        $catversion = $this->input->post('catversion');
         
		$queryRow = $this->userinfo_model->verify_credentials($this->input->post('username'),md5($this->input->post('password')),$clientid);
       if($clientid)
    	{
          if($this->client_model->does_exists($clientid))
			{
               $server_catversion = $this->category_model->get_version($clientid);
               $folders = $this->client_model->get_folder_name_by_id($clientid);
            if($server_catversion != $catversion)
				{
					$finalArray['categories_need_update'] = 1;
					$finalArray['category_version'] = $server_catversion;
					$finalArray['categories'] = $this->category_model->get_all_categories($clientid,$folders);
				    
                }
				else
				{
					$finalArray['categories_need_update'] = 0;
				}
            
			}
            
    	}
		if($queryRow['isValidated'])
		{
			if($queryRow['clientisactive'] && $queryRow['userisactive'])
			{
				//means client and user both are active	
				$data = array(
					'user_id' => $queryRow['userid'],
					'client_id' => $queryRow['clientid'],
					'usertype' => $queryRow['usertype'],
					'name' => $queryRow['name'],
					'username' => $queryRow['username'],
					'is_logged_in' => true
				);
              // $catgory = get_all_categories($catversion);
				echo json_encode(array('status'=>'success','name'=>$queryRow['name'],'user_id'=>$queryRow['userid'],'usertype'=>$queryRow['usertype'],'catgory'=>$finalArray));
			}
			else if($queryRow['clientisactive'] == 0)
			{
				//username/password wrong!!!
				echo json_encode(array('status'=>'login_error',"msg"=>'Your newspaper is blocked !'));
				
			}
			else if($queryRow['userisactive'] == 0)
			{
				//user access is blocked!!!
				echo json_encode(array('status'=>'login_error','msg'=>'Your Access is Blocked !!!'));
								
			}
		}
		else
		{
			//username/password wrong!!!
			echo json_encode(array('status'=>"login_error","msg"=>'Username/Password do not Match!'));
		}
	}
}

/* End of file user.php */
/* Location: ./application/controllers/admin_requests/user.php */