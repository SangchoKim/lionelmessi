<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_autor extends CI_Controller {

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
		$data['user_email'] = $this->input->post('user_email');
		$data['author'] = $this->input->post('author');
		$data['suspend'] = $this->input->post('suspend');
		echo "<script>console.log( 'result: " .$data['user_email'].$data['author'].$data['suspend']. "' );</script>";
		$check = $this->Indexs_model->update_auth($data);
		if($check==1){
			// 수정완료
			// 수정된걸 다시 셀렉으로 뽑아주기
			$result = $this->Indexs_model->select_all($data);
			echo "<script>alert(\"적용완료 \");</script>";
			if($result==null){
				// 에러 발생
					echo "<script>alert(\"에러발생 \");</script>";
			}else {
					// 성공적으로 select
					$results['data'] = $result;
					$this->load->view('admin_list',$results);
			}
		}else {
			// 수정실패....
			echo "<script>alert(\"수정할때 에러가 있습니다.. \");</script>";
		}
		// $this->load->view('admin_list');
	}
}
