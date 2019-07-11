<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgetpw extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->library('session');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->helper('cookie');
		$this->load->model('Indexs_model');

	}

	public function index()
	{
		// 비밀번호 찾기

		$data['email'] = $this->input->post('email');
		$data['name'] = $this->input->post('names');
		// $data['password'] = $this->input->post('password');
		// 이메일, 패스워드에 맞는 등록된 이름 DB 에서 가지고 오기
		// echo "<script>console.log( 'Indexs_result: " . $data['email'] . "' );</script>";

		// $data['name'] = $this->Indexs_model->select_name($data);
		// if($data['name']==null||$data['name']==''){
		// 	echo json_encode(2);
		// }else {
			// 로그인 하기전, 데이터 체크
			$result = $this->Indexs_model->emailCheck_pw($data);
			if($result==1){
				// 등록된 이메일 확인
				// 인증 성공
				// echo "<script>console.log( 'Indexs_result: " . $data['email'] . "' );</script>";
				echo json_encode($result);
			}else {
				// 등록된 이메일 없음
				// 인증 실패
				echo json_encode(2);
			}
		// }
	}

	public function auth_pw(){
		$data['email'] = $this->input->post('email');
		$email = $this->input->post('email');
		$data['password'] = $this->input->post('password');
		$data['check'] = $this->input->post('check');
		// echo "<script>console.log( 'Indexs_result: " . $data['email'] . "' );</script>";
		if($data['check']==30){
			// 제대로 접속
		$data['password'] = $this->_GenerateString();
		$password = $data['password'];
		// 암호화된 비밀번호 데이터베이스 모델에서 업데이트
		$this->load->model('Indexs_model');
		$result = $this->Indexs_model->update_pw($data);

		if($result==1){
			// 암호 수정 성공
			// 비밀번호 셀렉트
			$this->load->library('email');
				$config['useragent'] = 'santos';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.naver.com';
        $config['smtp_user'] = 'rlatkdch@naver.com';
        $config['smtp_pass'] = 'Wjdrms6387';
        $config['smtp_port'] = 465;
        $config['smtp_timeout'] = 5;
        $config['wordwrap'] = TRUE;
        $config['wrapchars'] = 76;
        $config['mailtype'] = 'html';
        $config['charset'] = 'utf-8';
        $config['validate'] = FALSE;
        $config['priority'] = 3;
        $config['crlf'] = "\r\n";
        $config['newline'] = "\r\n";
        $config['bcc_batch_mode'] = FALSE;
        $config['bcc_batch_size'] = 200;
				$this->email->initialize($config);
				$this->email->from('rlatkdch@naver.com', 'Lionelmessi');
				$this->email->to($email);
				$this->email->subject('비밀번호 변경');
				$html="<h3>변경된 비밀번호 : ".$password."<h3>
				<div><a href='http://localhost/messi/Login'>로그인 하기</a></div>
				";
				$this->email->message($html);

				// var_dump($config);
				// var_dump($password);
				// var_dump($this->email->print_debugger());
				if(!$this->email->send()){
        // echo "<script>alert(\"이메일 발송에 실패\");</script>";
				echo json_encode(2);
      }else{
				echo json_encode(1);
      }
		}else {
			// 암호 수정 실패
		}

		}else {
			// 오류
		}
	}

	public function temp_pw(){
		$data['email'] = $this->input->post('email');
		$data['password'] = $this->input->post('password');
		$data['check'] = $this->input->post('check');
		if($data['check']==50){
			// 제대로 접속
			// 이름 불러오기
			$this->load->model('Indexs_model');
			$data['name'] = $this->Indexs_model->select_name($data);
			if($data['name']==null||$data['name']==''){
				// 이름 존재하지 않음
				echo json_encode(2);
			}else {
			// 이름 존재
			// 비밀번호 체크
			$this->load->model('Indexs_model');
			$result = $this->Indexs_model->emailCheck($data);
			if($result==1){
				// 등록된 이메일 확인
				// 인증 성공
				// 비밀번호 가져오기
				// echo "<script>console.log( 'Indexs_result: " . $data['email'] . "' );</script>";
				echo json_encode($result);
			}else {
				// 등록된 이메일 없음
				// 인증 실패
				echo json_encode(2);
			}
		}
	}else {
		// 비밀번호 업데이트

		$this->load->model('Indexs_model');
		$result = $this->Indexs_model->update_pw($data);
		if($result==1){
			// 등록된 이메일 확인
			// echo "<script>console.log( 'Indexs_result: " . $data['email'] . "' );</script>";
			echo json_encode($result);
		}else {
			// 등록된 이메일 없음
			// 인증 실패
			echo json_encode(2);
		}
	}
	}

	public function _GenerateString($length=20) {
		$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$char .= 'abcdefghijklmnopqrstuvwxyz';
		$char .= '0123456789';
		$char .= '!@#%^&*-_+=';
		$result = '';
		for($i = 0; $i <= $length; $i++) {
				$result .= $char[mt_rand(0, $length)];
		}
		return($result);
}
}
