<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->is_LoggedIn();		
	}
	public function index()
	{
		echo "User";
	}
	public function add()
	{
		echo "Add New users!";
	}
}