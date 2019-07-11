<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indexs_model extends CI_model {

  public $email;
  public $name;
  public $password;


  function __construct(){
		parent::__construct();
        //위에서 설정한 /application/config/database.php 파일에서 $db['test'] 설정값을 불러오겠다는 뜻입니다.
        $this->emailCheck = $this->load->database('test', TRUE);
        $this->select_name = $this->load->database('test', TRUE);
        $this->select_all = $this->load->database('test', TRUE);
        $this->select_adminNo = $this->load->database('test', TRUE);
        $this->select_userno = $this->load->database('test', TRUE);
        $this->select_user = $this->load->database('test', TRUE);
        $this->check_admin = $this->load->database('test', TRUE);
        $this->update_auth = $this->load->database('test', TRUE);
        $this->select_ranking = $this->load->database('test', TRUE);
        $this->update_pw = $this->load->database('test', TRUE);
        $this->emailCheck_pw = $this->load->database('test', TRUE);

	}

  function select_ranking(){

    $sql = "SELECT * FROM news ORDER BY new_like DESC LIMIT 0,10";
    $query = $this->select_ranking->query($sql);
    $result = $query->num_rows();

    if($result==0||$result==''){
        // 등록된 이름 없음 -> 2
        return null;
    }else {
      // 등록된 이름 있음 -> 1
      return $query->result();
    }

  }

  function update_auth($data){

    $user_email = $data['user_email'];
    $author = $data['author'];
    $suspend = $data['suspend'];


      // 관리자 <-> 유저 변경
      $datas = array('auto_login' => $author, 'user_suspend' => $suspend);
      $where = "user_email = '$user_email'";
      $result  = $this->update_auth->update('mypage',$datas,$where);
      if($result==1){
          // 수정 됨  -> 1
          return 1;
      }else {
        // 수정 안됨-> 2
        return 2;
      }

    }

  

  function update_pw($data){

    $email = $data['email'];
    $password = $data['password'];

    // echo "<script>console.log( 'MypageUpdate: " .$email.$password."' );</script>";
    // 암호화된 비밀번호 DB에서 업데이트
    $datas = array('user_password' => $password);
    $where = "user_email = '$email'";
    $result  = $this->update_pw->update('mypage',$datas,$where);
    if($result==1){
        // 수정 됨  -> 1
        return 1;
    }else {
      // 수정 안됨-> 2
      return 2;
    }
  }




  function select_user(){

    $sql = "SELECT * FROM mypage";
    $query = $this->select_user->query($sql);
    $result = $query->num_rows();

    if($result==0||$result==''){
        // 등록된 이름 없음 -> 2
        return null;
    }else {
      // 등록된 이름 있음 -> 1
      return $query->result();
    }

  }

  function emailCheck_pw($data){

    $email = $data['email'];
    // $password = $data['password'];
    $name = $data['name'];


    $sql = "SELECT * FROM mypage WHERE user_email = ? AND user_name = ?";
    // echo "<script>console.log( 'emailCheck: " . $emailCheck . "' );</script>";
    $query  = $this->emailCheck_pw->query($sql,array($email,$name));
    // 쿼리 결과열의 개수를 리턴하는 함수
    $result = $query->num_rows();
    // echo "<script>console.log( 'result: " . $result . "' );</script>";
    if($result==0||$result==''){
        // 등록된 이메일 없음 -> 2
        return 2;
    }else {
      // 등록된 이메일 있음 -> 1
      return 1;
    }
  }

    function emailCheck($data){

      $email = $data['email'];
      $password = $data['password'];
      $name = $data['name'];


      $sql = "SELECT * FROM mypage WHERE user_email = ? AND user_password = ?";
      // echo "<script>console.log( 'emailCheck: " . $emailCheck . "' );</script>";
      $query  = $this->emailCheck->query($sql,array($email,$password));
      // 쿼리 결과열의 개수를 리턴하는 함수
      $result = $query->num_rows();
      // echo "<script>console.log( 'result: " . $result . "' );</script>";
      if($result==0||$result==''){
          // 등록된 이메일 없음 -> 2
          return 2;
      }else {
        // 등록된 이메일 있음 -> 1
        return 1;
      }
    }

    function select_userno($data){

      $email = $data['email'];
      $password = $data['password'];

      $sql = "SELECT email_idx FROM mypage WHERE user_email = ? AND user_password = ?";
      $email_idx = $this->select_userno->query($sql,array($email,$password));

      if(!isset($email_idx->row()->email_idx)){
          // 등록된 이름 없음 -> 2
          return null;
      }else {
        // 등록된 이름 있음 -> 1
        return $email_idx->row()->email_idx;
      }

    }


    function select_name($data){

      $email = $data['email'];
      $password = $data['password'];

      $sql = "SELECT user_name FROM mypage WHERE user_email = ? AND user_password = ?";
      $user_name = $this->select_name->query($sql,array($email,$password));

      if(!isset($user_name->row()->user_name)){
          // 등록된 이름 없음 -> 2
          return null;
      }else {
        // 등록된 이름 있음 -> 1
        return $user_name->row()->user_name;
      }

    }

    function select_adminNo($data){

      $email = $data['email'];
      $password = $data['password'];

      $sql = "SELECT auto_login FROM mypage WHERE user_email = ? AND user_password = ?";
      $auto_login  = $this->select_name->query($sql,array($email,$password));
      $com = $auto_login->row()->auto_login;
      if($com=='0'||$com==''){
          // 등록된 이름 없음 -> 2
          return 2;
      }else {
        // 등록된 이름 있음 -> 1
        return 1;
      }

    }

    function select_all(){

      // $email = $data['email'];
      // $password = $data['password'];

      $sql = "SELECT * FROM mypage";
      $query = $this->select_name->query($sql);
      // 쿼리 결과열의 개수를 리턴하는 함수
      $result = $query->num_rows();
      if($result==0||$result==''){
          // admin_select 에러 -> 2
          return null;
      }else {
        // admin_select 성공 -> 1
        return $query->result();
      }

    }

    function check_admin($data){

      $email = $data['email'];
      $password = $data['password'];

      $sql = "SELECT auto_login FROM mypage WHERE user_email = ? AND user_password = ?";
      $auto_login  = $this->check_admin->query($sql,array($email,$password));
      $com = $auto_login->row()->auto_login;
      // echo "<script>console.log( 'com: " .$com. "' );</script>";
      if(!isset($auto_login->row()->auto_login)){
          // 등록된 이름 없음 -> 2
          return null;
      }else {
        // 등록된 이름 있음 -> 1
        return $com;
      }

    }
}
