<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mypageupdate_model extends CI_model {

  public $email;
  public $intro;
  public $name;

  function __construct(){
		parent::__construct();
        //위에서 설정한 /application/config/database.php 파일에서 $db['test'] 설정값을 불러오겠다는 뜻입니다.
        $this->user_update = $this->load->database('test', TRUE);
        $this->intro_select = $this->load->database('test', TRUE);
        $this->checkpw_select = $this->load->database('test', TRUE);
        $this->user_select = $this->load->database('test', TRUE);
        $this->news_select = $this->load->database('test', TRUE);
	}

  // Saved-news 셀렉트
  function news_select($data){

    // $user_image = $data['filename'];
    $email_idx = $data['email_idx'];
    // $name = $data['name'];
    // $intro = $data['intro'];
    // $password = $data['password'];

    $sql = "SELECT news_image FROM news Join tag On tag.news_idx = news.news_idx WHERE tag.email_idx = ?";
    // echo "<script>console.log( 'emailCheck: " . $emailCheck . "' );</script>";
    $query  = $this->news_select->query($sql,$email_idx);
    // 쿼리 결과열의 개수를 리턴하는 함수
    $result = $query->num_rows();
    // 쿼리 결과물 array로 담기

    // echo "<script>console.log( 'result: " . $result . "' );</script>";
    if($result==0||$result==''){
        // news 쿼리 에러 -> null
        return null;
    }else {
      // news 쿼리 성공
      // foreach ($datas->result() as $row)
      // {
      // 	echo $row->news_idx;
      // 	echo $row->news_image;
      // 	echo $row->news_title;
      // 	echo $row->news_ex;
      // 	echo $row->news_date;
      // 	echo $row->new_like;
      // 	echo $row->email_idx;
      //
      // }
      return $query->result();

    }
  }

  // 마이페이지 셀렉트
  function user_select($data){

    // $user_image = $data['filename'];
    $email = $data['email'];
    // $email_idx = $data['email_idx'];
    // $name = $data['name'];
    // $intro = $data['intro'];
    // $password = $data['password'];

    $sql = "SELECT * FROM mypage WHERE user_email = ?";
    // echo "<script>console.log( 'emailCheck: " . $emailCheck . "' );</script>";
    $query  = $this->user_select->query($sql,$email);
    // 쿼리 결과열의 개수를 리턴하는 함수
    $result = $query->num_rows();
    // 쿼리 결과물 array로 담기

    // echo "<script>console.log( 'result: " . $result . "' );</script>";
    if($result==0||$result==''){
        // news 쿼리 에러 -> null
        return null;
    }else {
      // news 쿼리 성공
      // foreach ($datas->result() as $row)
      // {
      // 	echo $row->news_idx;
      // 	echo $row->news_image;
      // 	echo $row->news_title;
      // 	echo $row->news_ex;
      // 	echo $row->news_date;
      // 	echo $row->new_like;
      // 	echo $row->email_idx;
      //
      // }
      return $query->result();

    }
  }

    function user_update($data){

      $user_image = $data['filename'];
      $email = $data['email'];
      $name = $data['name'];
      $intro = $data['intro'];
      $password = $data['password'];


      echo "<script>console.log( 'MypageUpdate: " .$email.$intro.$name. "' );</script>";
      // mypage 이름, 자기소개 수정
      $datas = array('user_email' => $email,'user_name' => $name,'user_password' => $password, 'user_image' => $user_image, 'user_intro ' => $intro);
      $where = "user_email = '$email'";
      $result  = $this->user_update->update('mypage',$datas,$where);
      if($result==1){
          // 수정 됨  -> 1
          return 1;
      }else {
        // 수정 안됨-> 2
        return 2;
      }
    }

    function intro_select($email){

      echo "<script>console.log( 'intro_select: " .$email. "' );</script>";
      $sql = "SELECT user_intro FROM mypage WHERE user_email = ?";
      // echo "<script>console.log( 'emailCheck: " . $emailCheck . "' );</script>";
      $query  = $this->intro_select->query($sql,$email);
      // 쿼리 결과열의 개수를 리턴하는 함수
      $result = $query->num_rows();
      echo "<script>console.log( 'intro_select: " .$result. "' );</script>";
      if($result==0||$result==''){
          // 인트로 Select 실패 -> 2
          return null;
      }else {
        // 인트로 Select 성공  -> 1
        foreach ($query->result() as $row)
        {
          echo "<script>console.log( 'intro_select: " .$row->user_intro. "' );</script>";
        }
        return $row->user_intro;
      }
    }

    function checkpw_select($pw){

      // echo "<script>console.log( 'checkpw_select: " .$pw. "' );</script>";
      $sql = "SELECT user_email FROM mypage WHERE user_password = ?";
      // echo "<script>console.log( 'emailCheck: " . $emailCheck . "' );</script>";
      $query  = $this->checkpw_select->query($sql,$pw);
      // 쿼리 결과열의 개수를 리턴하는 함수
      $result = $query->num_rows();
      // echo "<script>console.log( 'intro_select: " .$result. "' );</script>";
      if($result==0||$result==''){
          // pw Select 실패 -> 2
          return null;
      }else {
        // pw Select 성공  -> 1
        foreach ($query->result() as $row)
        {
          // echo "<script>console.log( 'intro_select: " .$row->user_email. "' );</script>";
        }
        return $row->user_email;
      }
    }
}
