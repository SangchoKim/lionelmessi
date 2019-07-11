<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('cookie');

	}


	public function index()
	{

		if($this->input->get('logout')==1){
			$logout = $this->input->get('logout');
			echo "<script>console.log( 'PHP_Console: " . $logout . "' );</script>";
			"<script>alert('로그아웃 완료');</script>";
			$email = $this->session->userdata('email');
			if(isset($email)){
			unset(
        $_SESSION['user']
        // $_SESSION['password'],
				// $_SESSION['name'],
				// $_SESSION['method'],
				// $_SESSION['check']

			);
		}
		// unset cookies
		if (isset($_SERVER['HTTP_COOKIE'])) {
    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
    foreach($cookies as $cookie) {
        $parts = explode('=', $cookie);
        $name = trim($parts[0]);
        setcookie($name, '', time()-1000);
        setcookie($name, '', time()-1000, '/');
    	}
		}
		$this->load->view('Login');
		}else{


			$this->load->view('Login');
		}

	}
}
