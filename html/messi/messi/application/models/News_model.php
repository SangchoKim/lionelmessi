<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News_model extends CI_model {

  public $email;
  public $name;
  public $password;


  function __construct(){
		parent::__construct();
        //위에서 설정한 /application/config/database.php 파일에서 $db['test'] 설정값을 불러오겠다는 뜻입니다.
      	$this->news_insert = $this->load->database('test', TRUE);
        $this->news_select = $this->load->database('test', TRUE);
        $this->news_select_share = $this->load->database('test', TRUE);
        $this->news_update = $this->load->database('test', TRUE);
        $this->news_select_admin = $this->load->database('test', TRUE);
        $this->news_delete = $this->load->database('test', TRUE);
        $this->like_update = $this->load->database('test', TRUE);
        $this->like_slect = $this->load->database('test', TRUE);
        $this->comment_insert = $this->load->database('test', TRUE);
        $this->comment_select = $this->load->database('test', TRUE);
        $this->save_insert = $this->load->database('test', TRUE);
        $this->save_check = $this->load->database('test', TRUE);
        $this->like_minus = $this->load->database('test', TRUE);
        $this->save_delete = $this->load->database('test', TRUE);
        $this->get_list = $this->load->database('test', TRUE);
        $this->get_list_comment = $this->load->database('test', TRUE);
	}
  // 페이징 처리(랭킹 좋아요 순)
  function get_list_comment($table='comment',$type='',$offset='',$limit='') {
        $limit_query = '';

        if ($limit != '' || $offset != '') {
            // 페이징이 있을 경우 처리
            $limit_query = ' LIMIT ' .$offset. ' , ' .$limit;
        }
        echo "<script>console.log( 'limit_query: " .$limit_query. "' );</script>";

        $sql = "SELECT * FROM comment ORDER BY comment_date DESC" .$limit_query;
        $query = $this->get_list_comment->query($sql);

        if ($type == 'count') {
            $result = $query->num_rows();
        } else {
            $result = $query->result();
        }

        return $result;
    }

  // 페이징 처리(랭킹 좋아요 순)
  function get_list($table='comment',$type='',$offset='',$limit='') {
        $limit_query = '';

        if ($limit != '' || $offset != '') {
            // 페이징이 있을 경우 처리
            $limit_query = ' LIMIT ' .$offset. ' , ' .$limit;
        }
        echo "<script>console.log( 'limit_query: " .$limit_query. "' );</script>";

        $sql = "SELECT * FROM comment ORDER BY comment_date DESC" .$limit_query;
        $query = $this->get_list->query($sql);

        if ($type == 'count') {
            $result = $query->num_rows();
        } else {
            $result = $query->result();
        }

        return $result;
    }

  //save_check 하기
  function save_check($data){

    $news_idx = $data['news_idx'];
    $email_idx = $data['email_idx'];

    $sql = "SELECT * FROM tag WHERE news_idx = ? AND email_idx = ?";
    // echo "<script>console.log( 'emailCheck: " . $emailCheck . "' );</script>";
    $query  = $this->save_check->query($sql,array($news_idx,$email_idx));
    // 쿼리 결과열의 개수를 리턴하는 함수
    $result = $query->num_rows();
    // echo "<script>console.log( 'result: " . $result . "' );</script>";
    if($result==0||$result==''){
        // 등록된 save 없음 -> 2
        return 2;
    }else {
      // 등록된 save 있음 -> 1
      return 1;
    }
  }

  // save 저장(insert)
  function save_insert($data) {

        $result = array(
                'news_idx' => $data['news_idx'],
                'email_idx' => $data['email_idx']
        );

        return $this->save_insert->insert("tag",$result);
    }

    // save 삭제(delete)
    function save_delete($data) {

      $news_idx = $data['news_idx'];
      $email_idx = $data['email_idx'];

      $sql = "DELETE FROM tag WHERE news_idx = ? AND email_idx = ?";
      $result  = $this->save_delete->query($sql,array($news_idx,$email_idx));

    if($result==1){
        // 삭제 됨  -> 1
          // echo "<script>console.log( 'news_idx: " .$result. "' );</script>";
        return 1;
    }else {
      // 삭제 안됨-> 2
      // echo "<script>console.log( 'news_idx: " .$result. "' );</script>";
      return 2;
    }
  }



  // comment 업데이트
  function comment_insert($data){

    $state = $data['state'];
    $news_idx = $data['news_idx'];
    $email_idx = $data['email_idx'];
    $result = array(
            'comment' => $data['state'],
            'news_idx' => $data['news_idx'],
            'email_idx' => $data['email_idx']
    );

    return $this->comment_insert->insert("comment",$result);
  }

  // comment 셀렉트
  function comment_select(){

    // $state = $data['state'];
    // $news_idx = $data['news_idx'];
    // $email_idx = $data['email_idx'];

    $sql = "SELECT * FROM comment ORDER BY comment_date DESC";
    // echo "<script>console.log( 'emailCheck: " . $emailCheck . "' );</script>";
    $query  = $this->comment_select->query($sql);
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

  // like 셀렉트
  function like_slect($news_idx){
    $sql = "SELECT new_like FROM news WHERE news_idx = ?";
    // echo "<script>console.log( 'emailCheck: " . $emailCheck . "' );</script>";
    $query  = $this->like_slect->query($sql,array($news_idx));
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

  // like 업데이트
  function like_update($data){

    $count = $data['count'];
    $news_idx = $data['news_idx'];
    $email_idx = $data['email_idx'];
    $num = $data['num'];
    $counts = $count + $num;
    // echo "<script>alert( 'count: " .$count. "' );</script>";
    // echo "<script>console.log( 'count: " .$count. "' );</script>";
    // echo "<script>console.log( 'news_idx: " .$news_idx. "' );</script>";
    // echo "<script>console.log( 'email: " .$email_idx. "' );</script>";

    $this->like_update->set('new_like','new_like+1',FALSE);
    $this->like_update->where("news_idx ='$news_idx'");
    $result  = $this->like_update->update('news');

    // $datas = array('new_like' => '(new_like + 1)');
    // $where = "news_idx = '$news_idx' AND email_idx = '$email_idx'";
    // $result  = $this->like_update->update('news',$datas,$where);
    if($result==1){
        // 수정 됨  -> 1
        return 1;
    }else {
      // 수정 안됨-> 2
      return 2;
    }
  }

  // like 업데이트
  function like_minus($data){

    $count = $data['count'];
    $news_idx = $data['news_idx'];
    $email_idx = $data['email_idx'];
    $num = $data['num'];
    // echo "<script>alert( 'count: " .$count. "' );</script>";
    // echo "<script>console.log( 'count: " .$count. "' );</script>";
    // echo "<script>console.log( 'news_idx: " .$news_idx. "' );</script>";
    // echo "<script>console.log( 'email: " .$email_idx. "' );</script>";

    $this->like_minus->set('new_like','new_like-1',FALSE);
    $this->like_minus->where("news_idx ='$news_idx'");
    $result = $this->like_minus->update('news');

    // $datas = array('new_like' => '(new_like + 1)');
    // $where = "news_idx = '$news_idx' AND email_idx = '$email_idx'";
    // $result  = $this->like_update->update('news',$datas,$where);
    if($result==1){
        // 수정 됨  -> 1
        return 1;
    }else {
      // 수정 안됨-> 2
      return 2;
    }
  }

  // 뉴스 수정(admin 기능)
  function news_update($datas){

    $news_ex = $datas['news_ex'];
    $news_idx = $datas['news_idx'];
    $news_image = $datas['filename'];
    $news_title = $datas['news_title'];
    echo "<script>console.log( 'news_image: " .$news_image. "' );</script>";
    echo "<script>console.log( 'news_idx: " .$news_idx. "' );</script>";
    echo "<script>console.log( 'news_ex: " .$news_ex. "' );</script>";

    $datas = array('news_title' => $news_title, 'news_ex' => $news_ex, 'news_image' => $news_image);
    $where = "news_idx = '$news_idx'";
    $result  = $this->news_update->update('news',$datas,$where);
    if($result==1){
        // 수정 됨  -> 1
        return 1;
    }else {
      // 수정 안됨-> 2
      return 2;
    }
  }

  // 뉴스 삭제(admin 기능)
  function news_delete($news_idx){

    echo "<script>console.log( 'news_idx: " .$news_idx. "' );</script>";
    $result  = $this->news_delete->delete('news',array('news_idx' => $news_idx));
    if($result==1){
        // 삭제 됨  -> 1
          echo "<script>console.log( 'news_idx: " .$result. "' );</script>";
        return 1;
    }else {
      // 삭제 안됨-> 2
      echo "<script>console.log( 'news_idx: " .$result. "' );</script>";
      return 2;
    }
  }


  // 뉴스 삼입(admin 기능)
  function news_insert($data) {

        $result = array(
                'news_image' => $data['filename'],
                'news_title' => $data['news_title'],
                'news_ex' => $data['news_ex'],
                'new_like' => 1,
                'email_idx' => $data['email_idx']
        );

        return $this->news_insert->insert("news",$result);
    }

    // 뉴스 전체 셀렉트
    function news_select(){
      $sql = "SELECT * FROM news ORDER BY news_date DESC";
      // echo "<script>console.log( 'emailCheck: " . $emailCheck . "' );</script>";
      $query  = $this->news_select->query($sql);
      // 쿼리 결과열의 개수를 리턴하는 함수
      $result = $query->num_rows();
      // 쿼리 결과물 array로 담기

      // echo "<script>console.log( 'result: " . $result . "' );</script>";
      if($result==0||$result==''){
          // news 쿼리 에러 -> null
          return null;
      }else {


        return $query->result();

      }
    }

    // 뉴스 공유 셀렉트
    function news_select_share($news_idx){

      $sql = "SELECT * FROM news WHERE news_idx=?";
      // echo "<script>console.log( 'emailCheck: " . $emailCheck . "' );</script>";
      $query  = $this->news_select_share->query($sql,$news_idx);
      // 쿼리 결과열의 개수를 리턴하는 함수
      $result = $query->num_rows();
      // 쿼리 결과물 array로 담기

      // echo "<script>console.log( 'result: " . $result . "' );</script>";
      if($result==0||$result==''){
          // news 쿼리 에러 -> null
          return null;
      }else {


        return $query->result();

      }
    }

    // 뉴스 수정하기 전 셀렉트(관리자)
    function news_select_admin($news_idx){
      $sql = "SELECT * FROM news WHERE news_idx = ?";
      // echo "<script>console.log( 'emailCheck: " . $emailCheck . "' );</script>";
      $query  = $this->news_select_admin->query($sql,$news_idx);
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
}
