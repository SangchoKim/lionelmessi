<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin_model extends CI_model {

  public $email;
  public $name;
  public $password;


  function __construct(){
		parent::__construct();
        //위에서 설정한 /application/config/database.php 파일에서 $db['test'] 설정값을 불러오겠다는 뜻입니다.
      	$this->signin_insert = $this->load->database('test', TRUE);
        $this->emailCheck = $this->load->database('test', TRUE);
	}

  function signin_insert($data) {

        $result = array(
                'user_email' => $data['email'],
                'user_name' => $data['name'],
                'user_password' => $data['password']
        );

        return $this->signin_insert->insert("mypage",$result);
    }

    function emailCheck($emailCheck){
      $sql = "SELECT * FROM mypage WHERE user_email = ?";
      // echo "<script>console.log( 'emailCheck: " . $emailCheck . "' );</script>";
      $query  = $this->emailCheck->query($sql,$emailCheck);
      // 쿼리 결과열의 개수를 리턴하는 함수
      $result = $query->num_rows();
      // echo "<script>console.log( 'result: " . $result . "' );</script>";
      if($result==0||$result==''){
          // 이메일 사용 가능  -> 1
          return 1;
      }else {
        // 이메일 중복 -> 2
        return 2;
      }
    }
}
