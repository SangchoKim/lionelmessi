<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {

  public function __construct(){

    parent::__construct();
    $this->load->helper('form');
    $this->load->helper('url');

  }

	public function index()
	{
    // 중복 이메일 체크 하기
    if($this->input->get('checkid')==1){
      $emailCheck = $this->input->get('email');
      // echo "<script>console.log( 'emailCheck: " . $emailCheck . "' );</script>";
      // 모델로 값 보내기
      $this->load->model('Signin_model');
      $result = $this->Signin_model->emailCheck($emailCheck);
      // echo "<script>console.log( 'result: " . $result . "' );</script>";
      if($result==1){
        // 이메일 사용 가능
        // Ajax -> View 로 보냄
        echo "1" ;
      }else {
        // 이메일 중복
        // Ajax -> View 로 보냄
        echo "2" ;
      }
    }else {
      // 회원가입 하기
      $data['email'] = $this->input->post('email');
      $data['name'] = $this->input->post('name');
      $data['password'] = $this->input->post('password');
      // 모델로 값 보내기
      $this->load->model('Signin_model');
	    $result = $this->Signin_model->signin_insert($data);
      // 값 체크
      echo "<script>console.log( 'result: " . $result . "' );</script>";
      if($result==1){
         echo "<script>alert(\"회원가입 완료\");</script>";
      }else {
         echo "<script>alert(\"회원가입이 아직은...\");</script>";
      }
      foreach ($data as $key => $value) {
        echo "<script>console.log( 'PHP_Console: " . $value . "' );</script>";
      }
      if($result!=1){
        // 에러 페이지로 이동
        $this->load->view('Test',$data);
      }else {
        // 로그인 완료
        $this->load->view('Login',$data);
      }
    }
	}
}
