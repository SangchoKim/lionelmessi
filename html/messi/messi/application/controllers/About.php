<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
	}


	public function index()
	{

		$email = $this->session->userdata('email');
		if(!isset($email)){
			echo "<script>alert(\"잘못된경로의 접근입니다.\"); location.href='Login';</script>";
			exit;
		}
		$this->load->view('about');
	}
}
