<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_login extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('Indexs_model');
	}


	public function index()
	{

		$email = $this->session->userdata('email');
		if(!isset($email)){
			echo "<script>alert(\"잘못된경로의 접근입니다.\"); location.href='Login';</script>";
			exit;
		}
			$check = $this->input->post('check');
			$checks	= $this->input->get('admin_page');
			echo "<script>console.log( 'com: " .$checks. "' );</script>";
			// $home = $this->input->get('home');
		if($check==20){
			echo "<script>console.log( 'com: " .$check. "' );</script>";
			$data['email'] = $this->session->userdata('email');
			$data['password'] = $this->input->post('admin_password');
			// admin 체크하기
			$check = $this->Indexs_model->check_admin($data);
			if($check==null){
				// 관리자로 등록되어있지 않은 아이디
				echo "<script>alert(\"관리자로 등록해주세요.. \"); location.href='Admin_login';</script>";
				// $this->load->view('admin_login');
			}else {
				// 성공적으로 셀렉트
				if($check==1){
						// 관리자로 등록되어있는 아이디
						$result = $this->Indexs_model->select_all($data);
						if($result==null){
							// 에러 발생
								echo "<script>alert(\"에러발생 \"); location.href='Admin_login';</script>";
						}else {
								// 성공적으로 select
								$results['data'] = $result;
								$this->load->view('admin_list',$results);
						}
				}else {
						// 관리자로 등록되어있지 않은 아이디
							echo "<script>alert(\"에러발생 \"); location.href='Admin_login';</script>";
						// $this->load->view('admin_login');
				}
			}



		}else if($checks==1){
			// 어드민 홈
			// 관리자로 등록되어있는 아이디
			$this->load->model('Indexs_model');
			$result = $this->Indexs_model->select_all();
			if($result==null){
				// 에러 발생
					echo "<script>alert(\"에러발생 \"); location.href='Admin_login';</script>";
			}else {
					// 성공적으로 select
					$results['data'] = $result;
					$this->load->view('admin_list',$results);
			}
		}else{
			$this->load->view('admin_login');
		}
	}
}
