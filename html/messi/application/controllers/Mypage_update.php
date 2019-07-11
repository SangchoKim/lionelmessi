<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mypage_update extends CI_Controller {

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
		if($this->input->post('checkpw')==1){
			// $pw = $this->input->post('checkpw');
			// echo "<script>console.log( 'checkpw_select: " .$pw. "' );</script>";
			// 비밀번호 변경 전, 비밀번호 확인
			$pw = $this->input->post('password');
			$this->load->model('Mypageupdate_model');
			// $result 안에 패스워드에 알맞은 이메일이 들어있음
			$result = $this->Mypageupdate_model->checkpw_select($pw);
			$email = $this->session->userdata('email');
			if($result==$email){
				// 비밀번호가 일치 했을때....
				echo 1;
			}else {
				// 비밀번호가 일치 하지 않았을때....
				echo 2;
			}
		}else {

			// 모델 연결 정보 뿌려주기
			$data['email'] = $this->session->userdata('email');
			$this->load->model('Mypageupdate_model');
			$results = $this->Mypageupdate_model->user_select($data);
			if($results==null){
				// 에러 발생
				"<script>alert(news select 에러.);</script>";
			}else {
				// 성공적으로 select

				// $data = array(
				// 		'items'=> $row
				// );
				$result['data'] = $results;
				foreach ($data as $items) {
				// 	echo "<script>console.log( 'result: " . $items . "' );</script>";
				// echo "<script>console.log( 'news_result: " . $items->news_idx.$items->news_title.$items->news_ex.$items->news_date.$items->news_image. "' );</script>";
				}
				// 인트로 Select 성공
			$this->load->view('mypage_update',$result);
		}
		}
	}
}
