<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indexs extends CI_Controller {


	public function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');

	}

	public function index()
	{


		$value = $this->input->get('page_no');
		if( $value == 10){
			// 홈 아이콘 눌렀을 시 홈으로 페이지 전환
			echo "<script>console.log( 'Indexs_result: 홈화면 클릭시' );</script>";
			$this->load->view('index');
		}else {
			// 사용자가 입력한 데이터 view에서 가져옴
			$data['email'] = $this->input->post('email');
			$data['password'] = $this->input->post('password');
			$data['check'] = 'true';
			// 이메일, 패스워드에 맞는 등록된 email_no DB 에서 가지고 오기
			$this->load->model('Indexs_model');
			$data['email_idx'] = $this->Indexs_model->select_userno($data);
			// 이메일, 패스워드에 맞는 등록된 이름 DB 에서 가지고 오기
			if($data['email_idx']==null){
				echo "<script>alert(\"회원가입이 아직은...\"); location.href='Login';</script>";
				exit;
			}
			$this->load->model('Indexs_model');
			$data['name'] = $this->Indexs_model->select_name($data);
			if(!isset($data['name'])){
				echo "<script>alert(\"회원가입이 아직은...\"); location.href='Login';</script>";
				exit;
			}
			// 관리자인지 체크
			$this->load->model('Indexs_model');
			$data['admin_no'] = $this->Indexs_model->select_adminNo($data);
			if(!isset($data['admin_no'])){
				echo "<script>alert(\"회원가입이 아직은...\"); location.href='Login';</script>";
				exit;
			}
			// 값 체크
			foreach ($data as $key => $value) {
				echo "<script>console.log( 'Indexs_result: " . $value . "' );</script>";
			}
			// 로그인 하기전, 데이터 체크
			$this->load->model('Indexs_model');
			$result = $this->Indexs_model->emailCheck($data);
			if($result==1){
				// 등록된 이메일 확인
				// 인증 성공
				// 세션 저장
				echo "<script>console.log( 'Indexs_result: " . $result . "' );</script>";
				$this->session->set_userdata($data);
				echo "<script>alert(\"로그인 완료\");</script>";
				$this->load->view('index');
			}else {
				// 등록된 이메일 없음
				// 인증 실패
				echo "<script>alert(\"회원가입이 아직은...\"); location.href='Login';</script>";
				// $this->load->view('Login');
				// 에러 페이지
				// $this->load->view('Test',$data);
			}
		}
	}
}
