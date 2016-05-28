<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Businessextra extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('businessextra_model');
	}

   function add()
    {

         $this->load->model('user_model');
         
        $b_extra_master_id = $this->input->get_post('bextraid');
		$userid = $this->input->get_post('userid');
		$catid = $this->input->get_post('catid');
		//$catid = $this->user_model->getcatid($userid);
		$heading = $this->input->get_post('heading');
		$content = $this->input->get_post('content');
		$advtcityselectid = $this->input->get_post('advtcityselectid');
		$isbusiness = $this->input->get_post('isbusiness');

		if($heading==null){
			$heading = "";
		}
		if($content==null){
			$content = "";
		}

		$dt = new DateTime("now",new DateTimeZone("GMT"));
		$datetime = $dt->format('Y-m-d H:i:s');
		$dt->add(new DateInterval('P10D'));
		$expdatetime = $dt->format('Y-m-d H:i:s');

		

		  $busextraid = $this->businessextra_model->add($userid,$heading,$content,$datetime,$expdatetime,$catid,$b_extra_master_id,$advtcityselectid,$isbusiness);

		
			$imageid = $this->input->get_post('image');
            $this->businessextra_model->mapimage($busextraid,$imageid,1);
		
       
		echo json_encode( array("success"=>1) );

	}

	public function get()
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
				$userid = $this->input->get_post('userid');
				$catid = $this->input->get_post('catid');
				$cityid = $this->input->get_post('cityid');
				$isbusiness = $this->input->post('isbusiness');
				echo json_encode(array("status"=>"login","data"=>$this->businessextra_model->getaddver($userid,$catid,$cityid,$isbusiness),"userid"=>$userid) );
			}
		}
	}
   
   function setactive()
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
				$id = $this->input->get_post('id');
				$isenable = $this->input->get_post('isenable');
				echo json_encode(array("status"=>"login","data"=>$this->businessextra_model->setactive($id,$isenable) ) );
			}
		}
	}

}

?>