<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Controls extends CI_Controller {

	private $CONTROL_EDITTEXT_ID = 1;
	private $CONTROL_IMAGEVIEW_ID = 2;
	private $CONTROL_GALLERY_ID = 3;
	private $CONTROL_SPINNER_ID = 4;

	function __construct()
	{
		parent::__construct();
		$this->load->model('controls_model');
	}
	function getCategoryControls()
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
				$screenid = $this->input->post('screenid');
				$catid = $this->input->post('catid');

				$data = $this->controls_model->getCategoryControls($catid,$screenid);
				echo json_encode(array(
										"status"=>"login",
										"data"=>$data
									) );
			}
		}
	}

	public function save()
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
				$screenid = $this->input->post('screenid');
				$catid = $this->input->post('catid');
				$sortorder = $this->input->post('sortorder');
				$sortorder = explode(',',$sortorder);

				$outp = array();
				//foreach ($sortorder as $key => $value) {
					
				//}
				$outp["sortorder"] = $sortorder;
				$controls = array();

				$NEW_CONTROL_PREPEND = "new_";
				$UPDATE_CONTROL_PREPEND = "upt_";

				$EDITTEXT_PREPEND = "edt_";
				$IMAGEVIEW_PREPEND = "img_";
				$GALLERY_PREPEND = "glr_";
				$SPINNER_PREPEND = "spr_";


				foreach ($sortorder as $index => $value) {
					array_push($controls,array("varname"=>$value, "varvalue"=>$this->input->post($value) ) );
					//First check here if control is new or needs updation.

					/// THESE ARE ALL NEWLY CREATED CONTROLS.
					if(substr($value,0,strlen($NEW_CONTROL_PREPEND)) == $NEW_CONTROL_PREPEND && substr($value,4,strlen($EDITTEXT_PREPEND)) == $EDITTEXT_PREPEND)
					{
						$label = $this->input->post("$value");
						$placeholder_key = $value . "_plh";
						$placeholder = $this->input->post("$placeholder_key");
						$isRequired_key = $value . "_req";
						$isRequired = 0;
						if($this->input->post("$isRequired_key") !== false && $this->input->post("$isRequired_key") !== NULL)
							$isRequired = $this->input->post("$isRequired_key");

						//MAP NEW EDITTEXT WITH SCREEN AND CATEGORY.
						$this->controls_model->map($catid,$screenid,$this->CONTROL_EDITTEXT_ID,$label,$index+1,$placeholder,$isRequired);
					}
					else if(substr($value,0,strlen($NEW_CONTROL_PREPEND)) == $NEW_CONTROL_PREPEND && substr($value,4,strlen($IMAGEVIEW_PREPEND)) == $IMAGEVIEW_PREPEND)
					{
						$isRequired_key = $value . "_req";
						$isRequired = 0;
						if($this->input->post("$isRequired_key") !== false && $this->input->post("$isRequired_key") !== NULL)
							$isRequired = $this->input->post("$isRequired_key");
						//MAP NEW IMAGEVIEW WITH SCREEN AND CATEGORY.
						$this->controls_model->map($catid,$screenid,$this->CONTROL_IMAGEVIEW_ID,$this->input->post($value),$index+1,"",$isRequired);
					}
					else if(substr($value,0,strlen($NEW_CONTROL_PREPEND)) == $NEW_CONTROL_PREPEND && substr($value,4,strlen($GALLERY_PREPEND)) == $GALLERY_PREPEND)
					{
						$isRequired_key = $value . "_req";
						$isRequired = 0;
						if($this->input->post("$isRequired_key") !== false && $this->input->post("$isRequired_key") !== NULL)
							$isRequired = $this->input->post("$isRequired_key");
						//MAP NEW GALLERY WITH SCREEN AND CATEGORY.
						$this->controls_model->map($catid,$screenid,$this->CONTROL_GALLERY_ID,$this->input->post($value),$index+1,"",$isRequired);
					}
					else if(substr($value,0,strlen($NEW_CONTROL_PREPEND)) == $NEW_CONTROL_PREPEND && substr($value,4,strlen($SPINNER_PREPEND)) == $SPINNER_PREPEND)
					{
						$isRequired_key = $value . "_req";
						$isRequired = 0;
						if($this->input->post("$isRequired_key") !== false && $this->input->post("$isRequired_key") !== NULL)
							$isRequired = $this->input->post("$isRequired_key");
						//MAP NEW SPINNER WITH SCREEN AND CATEGORY.
						$mapid = $this->controls_model->map($catid,$screenid,$this->CONTROL_SPINNER_ID,$this->input->post($value),$index+1,"",$isRequired);
						//array_push($data, array("key"=>"sort_".$value,"value"=>json_decode($this->input->post('sort_'.$value)) ) );
						$this->extractNsaveSpinnerItems($mapid,json_decode($this->input->post('sort_'.$value)) );
					}


					//FROM HERE ARE ALL CONTROL CAME FOR UPDATION
					else if(substr($value,0,strlen($UPDATE_CONTROL_PREPEND)) == $UPDATE_CONTROL_PREPEND && substr($value,4,strlen($EDITTEXT_PREPEND)) == $EDITTEXT_PREPEND)
					{
						//MAP update EDITTEXT WITH SCREEN AND CATEGORY.
						$mapid = substr($value, strlen($UPDATE_CONTROL_PREPEND.$EDITTEXT_PREPEND) ,strlen($value) );
						$label = $this->input->post("$value");
						$placeholder_key = $value . "_plh";
						$placeholder = $this->input->post("$placeholder_key");
						$isRequired_key = $value . "_req";
						$isRequired = 0;
						if($this->input->post("$isRequired_key") !== false && $this->input->post("$isRequired_key") !== NULL)
							$isRequired = $this->input->post("$isRequired_key");
						//$this->controls_model->mapupdate($mapid,$catid,$screenid,$this->CONTROL_EDITTEXT_ID,$this->input->post($value),$index+1);
						$this->controls_model->mapupdate($mapid,$label,$index+1,$placeholder,$isRequired);
					}
					else if(substr($value,0,strlen($UPDATE_CONTROL_PREPEND)) == $UPDATE_CONTROL_PREPEND && substr($value,4,strlen($IMAGEVIEW_PREPEND)) == $IMAGEVIEW_PREPEND)
					{

						//MAP update IMAGEVIEW WITH SCREEN AND CATEGORY.
						$mapid = substr($value, strlen($UPDATE_CONTROL_PREPEND.$IMAGEVIEW_PREPEND) ,strlen($value) );
						$isRequired_key = $value . "_req";
						$isRequired = 0;
						if($this->input->post("$isRequired_key") !== false && $this->input->post("$isRequired_key") !== NULL)
							$isRequired = $this->input->post("$isRequired_key");

						$this->controls_model->mapupdate($mapid,$this->input->post($value),$index+1,"",$isRequired);
					}
					else if(substr($value,0,strlen($UPDATE_CONTROL_PREPEND)) == $UPDATE_CONTROL_PREPEND && substr($value,4,strlen($GALLERY_PREPEND)) == $GALLERY_PREPEND)
					{
						//MAP update GALLERY WITH SCREEN AND CATEGORY.
						$mapid = substr($value, strlen($UPDATE_CONTROL_PREPEND.$GALLERY_PREPEND) ,strlen($value) );
						$isRequired_key = $value . "_req";
						$isRequired = 0;
						if($this->input->post("$isRequired_key") !== false && $this->input->post("$isRequired_key") !== NULL)
							$isRequired = $this->input->post("$isRequired_key");

						$this->controls_model->mapupdate($mapid,$this->input->post($value),$index+1,"",$isRequired);
					}
					else if(substr($value,0,strlen($UPDATE_CONTROL_PREPEND)) == $UPDATE_CONTROL_PREPEND && substr($value,4,strlen($SPINNER_PREPEND)) == $SPINNER_PREPEND)
					{
						//MAP update SPINNER WITH SCREEN AND CATEGORY.
						$mapid = substr($value, strlen($UPDATE_CONTROL_PREPEND.$SPINNER_PREPEND) ,strlen($value) );
						$isRequired_key = $value . "_req";
						$isRequired = 0;
						if($this->input->post("$isRequired_key") !== false && $this->input->post("$isRequired_key") !== NULL)
							$isRequired = $this->input->post("$isRequired_key");

						$this->controls_model->mapupdate($mapid,$this->input->post($value),$index+1,"",$isRequired);
						//array_push($data,$this->input->post('sort_'.$value) );
						$this->extractNsaveSpinnerItems($mapid,json_decode($this->input->post('sort_'.$value)) );
					}

				}


				//$data = $this->controls_model->getCategoryControls($catid,$screenid);
				echo json_encode(array(
										"status"=>"login",
										"data"=>$this->controls_model->getCategoryControls($catid,$screenid),
										//"cntls"=>$controls
									) );
			}
		}
	}

	private function extractNsaveSpinnerItems($mapid,$itemsarray)
	{
		$NEW_ITEM_PREPEND = "new_";
		$UPDATE_ITEM_PREPEND = "upt_";
		foreach ($itemsarray as $index => $value)
		{
			//check here if new then call insert else call update
			if(substr($value->key,0,strlen($NEW_ITEM_PREPEND)) == $NEW_ITEM_PREPEND)
			{
				//New item, so insert new field
				$this->controls_model->insertCatControlData($mapid,$value->value,$index+1);
			}
			else if(substr($value->key,0,strlen($UPDATE_ITEM_PREPEND)) == $UPDATE_ITEM_PREPEND)
			{
				//Item needs updation
				$controldataid = substr($value->key, strlen($UPDATE_ITEM_PREPEND."list_item_") ,strlen($value->key) );
				$this->controls_model->updateCatControlData($controldataid,$mapid,$value->value,$index+1);
			}
		}
	}
}