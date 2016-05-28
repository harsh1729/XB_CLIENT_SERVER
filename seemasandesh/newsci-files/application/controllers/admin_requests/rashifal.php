<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Rashifal extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('rashifal_model');
	}
	function save_rashifal()
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
				$this->load->model('rashifal_model');
				$this->load->model('user_model');

				$userid = $this->session->userdata('user_id');
				$clientid = $this->user_model->get_client_id($userid);
				
				$dt = new DateTime($this->input->post('datetime'),new DateTimeZone("Asia/Kolkata"));
				//$dt->setTimeZone(new DateTimeZone("GMT"));
				$date = $dt->format('Y-m-d');
				
				$aries = $this->input->post('aries');
				$taurus = $this->input->post('taurus');
				$gemini = $this->input->post('gemini');
				$cancer = $this->input->post('cancer');
				$leo = $this->input->post('leo');
				$virgo = $this->input->post('virgo');
				$libra = $this->input->post('libra');
				$scorpio = $this->input->post('scorpio');
				$sagittarius = $this->input->post('sagittarius');
				$capricorn = $this->input->post('capricorn');
				$aquarius = $this->input->post('aquarius');
				$pisces = $this->input->post('pisces');
				
				$this->rashifal_model->save_rashifal($clientid,'aries',$aries,$date);
				$this->rashifal_model->save_rashifal($clientid,'taurus',$taurus,$date);
				$this->rashifal_model->save_rashifal($clientid,'gemini',$gemini,$date);
				$this->rashifal_model->save_rashifal($clientid,'cancer',$cancer,$date);
				$this->rashifal_model->save_rashifal($clientid,'leo',$leo,$date);
				$this->rashifal_model->save_rashifal($clientid,'virgo',$virgo,$date);
				$this->rashifal_model->save_rashifal($clientid,'libra',$libra,$date);
				$this->rashifal_model->save_rashifal($clientid,'scorpio',$scorpio,$date);
				$this->rashifal_model->save_rashifal($clientid,'sagittarius',$sagittarius,$date);
				$this->rashifal_model->save_rashifal($clientid,'capricorn',$capricorn,$date);
				$this->rashifal_model->save_rashifal($clientid,'aquarius',$aquarius,$date);
				$this->rashifal_model->save_rashifal($clientid,'pisces',$pisces,$date);
				
				
				echo json_encode(array('status'=>'login',"clientid"=>$clientid,"date"=>$date,"data"=>$this->input->post()));
			}
		}
	}
}