<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop_model extends CI_model {

  public $email;
  public $name;
  public $password;


  function __construct(){
		parent::__construct();
        //위에서 설정한 /application/config/database.php 파일에서 $db['test'] 설정값을 불러오겠다는 뜻입니다.
        $this->shop_insert = $this->load->database('test', TRUE);
        $this->shop_detail = $this->load->database('test', TRUE);
        $this->get_list = $this->load->database('test', TRUE);
        $this->amount_update = $this->load->database('test', TRUE);
        $this->shop_delete = $this->load->database('test', TRUE);
        $this->subPic_update = $this->load->database('test', TRUE);
        $this->shop_update = $this->load->database('test', TRUE);
        $this->insert_review = $this->load->database('test', TRUE);
        $this->get_review = $this->load->database('test', TRUE);
        $this->get_review_total = $this->load->database('test', TRUE);
        $this->insert_cart = $this->load->database('test', TRUE);
        $this->select_cart = $this->load->database('test', TRUE);
        $this->select_shop_idx = $this->load->database('test', TRUE);
        $this->delete_allcart = $this->load->database('test', TRUE);
        $this->select_amount = $this->load->database('test', TRUE);
        $this->delete_eachcart = $this->load->database('test', TRUE);
        $this->check_cart = $this->load->database('test', TRUE);
        $this->get_allreview = $this->load->database('test', TRUE);
        $this->insert_ordering = $this->load->database('test', TRUE);
        $this->select_ordering = $this->load->database('test', TRUE);
        $this->select_ordering_user = $this->load->database('test', TRUE);
        $this->select_ordering_amount = $this->load->database('test', TRUE);
        $this->getadress = $this->load->database('test', TRUE);
        $this->update_memo = $this->load->database('test', TRUE);
        $this->check_address = $this->load->database('test', TRUE);
        $this->insert_address = $this->load->database('test', TRUE);
        $this->get_adress = $this->load->database('test', TRUE);
        $this->update_adress = $this->load->database('test', TRUE);
        $this->check_review = $this->load->database('test', TRUE);

	}

  function check_review($email_idx,$shop_idx){


      $sql = "SELECT status FROM ordering WHERE email_idx = ? AND shop_idx = ?";
      $query = $this->check_review->query($sql,array($email_idx,$shop_idx));
      $result = $query->num_rows();
      // var_dump($query->row()->status);
      if($query->num_rows()==0||$query->num_rows()==''){
          // 등록된 이름 없음 -> 2
          return null;
      }else {
        // 등록된 이름 있음 -> 1
        return $query->row()->status;
      }

  }



  function update_adress($email_idx,$adress,$second='',$third=''){

    if($second!=null){
      $datas = array('first_adress' => $second,'second_adress' => $adress);
      $where = "email_idx = '$email_idx'";
      $result  = $this->update_adress->update('adress',$datas,$where);
      if($result==1){
          // 수정 됨  -> 1
          return 1;
      }else {
        // 수정 안됨-> 2
        return 2;
      }
    }elseif ($third!=null) {
      $datas = array('first_adress' => $third,'third_adress' => $adress);
      $where = "email_idx = '$email_idx'";
      $result  = $this->update_adress->update('adress',$datas,$where);
      if($result==1){
          // 수정 됨  -> 1
          return 1;
      }else {
        // 수정 안됨-> 2
        return 2;
      }

    }


  }

  function get_adress($email_idx,$basic_adress){

    if($basic_adress==2){
      $sql = "SELECT second_adress FROM adress WHERE email_idx = ?";
      $query = $this->get_adress->query($sql,array($email_idx));
      $result = $query->num_rows();

      if($result==0||$result==''){
          // 등록된 이름 없음 -> 2
          return null;
      }else {
        // 등록된 이름 있음 -> 1
        return $query->row()->second_adress;
      }
    }else {
      $sql = "SELECT third_adress FROM adress WHERE email_idx = ?";
      $query = $this->get_adress->query($sql,array($email_idx));
      $result = $query->num_rows();

      if($result==0||$result==''){
          // 등록된 이름 없음 -> 2
          return null;
      }else {
        // 등록된 이름 있음 -> 1
        return $query->row()->third_adress;
      }
    }

  }





  function insert_address($email_idx,$adress,$type=''){

    if($type==1){
      $result = array(
                'first_adress' => $adress,
                'second_adress' => null,
                'third_adress ' => null,
                'check_adress ' => 1,
                'email_idx' => $email_idx
      );
      return $this->insert_address->insert("adress",$result);
    }else if($type==2){
      $datas = array('second_adress' => $adress,'check_adress' => 2);
      $where = "email_idx = '$email_idx'";
      $result  = $this->update_memo->update('adress',$datas,$where);
      if($result==1){
          // 수정 됨  -> 1
          return 1;
      }else {
        // 수정 안됨-> 2
        return 2;
      }
    }else if($type==3){
      $datas = array('third_adress' => $adress,'check_adress' => 3);
      $where = "email_idx = '$email_idx'";
      $result  = $this->update_memo->update('adress',$datas,$where);
      if($result==1){
          // 수정 됨  -> 1
          return 1;
      }else {
        // 수정 안됨-> 2
        return 2;
      }
    }


}

  function check_address($email_idx,$type=''){

    if($type==1){
      // first_adress 체크
      $sql = "SELECT first_adress FROM adress WHERE email_idx = ?";
      $query  = $this->check_address->query($sql,array($email_idx));
      $result = $query->num_rows();
      // echo "<script>console.log( 'com: " .$result. "' );</script>";
      if(!isset($query->row()->first_adress)){
          // 등록된 이름 없음 -> 2
          return 2;
      }else {
        // 등록된 이름 있음 -> 1
        return 1;
      }
    }else if($type==2){
      // second_adress 체크
      $sql = "SELECT second_adress FROM adress WHERE email_idx = ?";
      $query  = $this->check_address->query($sql,array($email_idx));
      $result = $query->num_rows();
      // echo "<script>console.log( 'com: " .$result. "' );</script>";
      if(!isset($query->row()->second_adress)){
          // 등록된 이름 없음 -> 2
          return 2;
      }else {
        // 등록된 이름 있음 -> 1
        return 1;
      }
    }else {
      // third_adress 체크
      $sql = "SELECT third_adress FROM adress WHERE email_idx = ?";
      $query  = $this->check_address->query($sql,array($email_idx));
      $result = $query->num_rows();
      // echo "<script>console.log( 'com: " .$result. "' );</script>";
      if(!isset($query->row()->third_adress)){
          // 등록된 이름 없음 -> 2
          return 2;
      }else {
        // 등록된 이름 있음 -> 1
        return 1;
      }
    }


  }

  function update_memo($email_idx,$ordering_memo){

    $datas = array('memo' => $ordering_memo,'status' => 1);
    $where = "email_idx = '$email_idx'";
    $result  = $this->update_memo->update('ordering',$datas,$where);
    if($result==1){
        // 수정 됨  -> 1
        return 1;
    }else {
      // 수정 안됨-> 2
      return 2;
    }
  }

  function getadress($data){

    $email_idx = $data['email_idx'];

    $sql = "SELECT * FROM adress WHERE email_idx = ?";
    $query = $this->getadress->query($sql,$email_idx);
    $result = $query->num_rows();

    if($result==0||$result==''){
        // 등록된 이름 없음 -> 2
        return null;
    }else {
      // 등록된 이름 있음 -> 1
      return $query->result();
    }
  }


  function select_ordering_amount($data){

    $email_idx = $data['email_idx'];

    $sql = "SELECT * FROM ordering WHERE email_idx = ? AND status = ?";
    $query = $this->select_ordering_amount->query($sql,array($email_idx,0));
    $result = $query->num_rows();

    if($result==0||$result==''){
        // 등록된 이름 없음 -> 2
        return null;
    }else {
      // 등록된 이름 있음 -> 1
      return $query->result();
    }
  }


  function select_ordering_user($data){

    $email_idx = $data['email_idx'];

    $sql = "SELECT * FROM mypage WHERE email_idx = ?";
    $query = $this->select_ordering_user->query($sql,$email_idx);
    $result = $query->num_rows();

    if($result==0||$result==''){
        // 등록된 이름 없음 -> 2
        return null;
    }else {
      // 등록된 이름 있음 -> 1
      return $query->result();
    }
  }

  function select_ordering($data){

    $email_idx = $data['email_idx'];

    $sql = "SELECT * FROM shop WHERE shop_idx IN (SELECT shop_idx FROM cart WHERE email_idx = ?)";
    $query = $this->select_ordering->query($sql,array($email_idx));
    $result = $query->num_rows();

    if($result==0||$result==''){
        // 등록된 이름 없음 -> 2
        return null;
    }else {
      // 등록된 이름 있음 -> 1
      return $query->result();
    }
  }

  function insert_ordering($data){

    $result = array(
              'amount' => $data['amount_idx'],
              'shop_idx' => $data['shop_idx'],
              'email_idx' => $data['email_idx']
    );

    return $this->insert_ordering->insert("ordering",$result);

  }

  function shop_insert($data){

    if($data['stuff_idx']==1){
      // 상의
      $first = $data['first'];
      echo "<script>console.log( 'first: " . $data['first'] . "' );</script>";
      $second = $data['second'];
      $third = $data['third'];
      $forth = $data['forth'];
      $result = array(
                'top_idx' => $data['stuff_idx'],
                'bottom_idx' => 0,
                'shose_idx' => 0,
                'name' => $data['stuff_name'],
                'price' => $data['stuff_price'],
                'img' => $first,
                'second_img' => $second,
                'third_img' => $third,
                'forth_img' => $forth,
                'size' => $data['size_idx'],
                'amount' => $data['stuff_amount'],
                'ex' => $data['stuff_ex'],
                'arr' => $data['arr'],
                'email_idx' => $data['email_idx']
      );

      return $this->shop_insert->insert("shop",$result);
    }elseif ($data['stuff_idx']==2) {
      // 하의
      $first = $data['first'];
      echo "<script>console.log( 'first: " . $data['first'] . "' );</script>";
      $second = $data['second'];
      $third = $data['third'];
      $forth = $data['forth'];
      $result = array(
              'top_idx' => 0,
              'bottom_idx' => $data['stuff_idx'],
              'shose_idx' => 0,
              'name' => $data['stuff_name'],
              'price' => $data['stuff_price'],
              'img' => $first,
              'second_img' => $second,
              'third_img' => $third,
              'forth_img' => $forth,
              'size' => $data['size_idx'],
              'amount' => $data['stuff_amount'],
              'ex' => $data['stuff_ex'],
              'arr' => $data['arr'],
              'email_idx' => $data['email_idx']
      );

      return $this->shop_insert->insert("shop",$result);
    }else {
      // 신발
      $first = $data['first'];
      echo "<script>console.log( 'first: " . $data['first'] . "' );</script>";
      $second = $data['second'];
      $third = $data['third'];
      $forth = $data['forth'];
      $result = array(
              'top_idx' => 0,
              'bottom_idx' => 0,
              'shose_idx' => $data['stuff_idx'],
              'name' => $data['stuff_name'],
              'price' => $data['stuff_price'],
              'img' => $first,
              'second_img' => $second,
              'third_img' => $third,
              'forth_img' => $forth,
              'size' => $data['size_idx'],
              'amount' => $data['stuff_amount'],
              'ex' => $data['stuff_ex'],
              'arr' => $data['arr'],
              'email_idx' => $data['email_idx']
      );

      return $this->shop_insert->insert("shop",$result);
    }


  }

  function get_list($table='shop',$type='',$offset='',$limit='',$idx='',$admin_page='') {

        if($idx==1){
          // Top
          $limit_query = '';

          if ($limit != '' || $offset != '') {
              // 페이징이 있을 경우 처리
              $limit_query = ' LIMIT ' .$offset. ' , ' .$limit;
          }
          echo "<script>console.log( 'limit_query: " .$limit_query. "' );</script>";
          if($admin_page==3){
            // 어드민
            $sql = "SELECT * FROM shop WHERE top_idx = ? ORDER BY shop_regi DESC" .$limit_query;
          }else {
            // 유저
            $sql = "SELECT * FROM shop WHERE top_idx = ? GROUP BY name ORDER BY shop_regi DESC" .$limit_query;
          }

          $query = $this->get_list->query($sql,array($idx));

          if ($type == 'count') {
              $result = $query->num_rows();
          } else {
              $result = $query->result();
          }

          return $result;
        }elseif ($idx==2) {
          // Bottom
          $limit_query = '';

          if ($limit != '' || $offset != '') {
              // 페이징이 있을 경우 처리
              $limit_query = ' LIMIT ' .$offset. ' , ' .$limit;
          }
          echo "<script>console.log( 'limit_query: " .$limit_query. "' );</script>";
          if($admin_page==3){
            // 어드민
            $sql = "SELECT * FROM shop WHERE bottom_idx = ? ORDER BY shop_regi DESC" .$limit_query;
          }else {
            $sql = "SELECT * FROM shop WHERE bottom_idx = ? GROUP BY name ORDER BY shop_regi DESC" .$limit_query;
          }
          $query = $this->get_list->query($sql,array($idx));

          if ($type == 'count') {
              $result = $query->num_rows();
          } else {
              $result = $query->result();
          }

          return $result;

        }else {
          // shose
          $limit_query = '';

          if ($limit != '' || $offset != '') {
              // 페이징이 있을 경우 처리
              $limit_query = ' LIMIT ' .$offset. ' , ' .$limit;
          }
          echo "<script>console.log( 'limit_query: " .$limit_query. "' );</script>";
          if($admin_page==3){
            // 어드민
            $sql = "SELECT * FROM shop WHERE shose_idx = ? ORDER BY shop_regi DESC" .$limit_query;
          }else {
            $sql = "SELECT * FROM shop WHERE shose_idx = ? GROUP BY name ORDER BY shop_regi DESC" .$limit_query;
          }
          $query = $this->get_list->query($sql,array($idx));

          if ($type == 'count') {
              $result = $query->num_rows();
          } else {
              $result = $query->result();
          }

          return $result;
        }

    }

  function shop_detail($shop_idx,$arr){

    if(isset($arr)){
      //arr 가 있는경우(유저)
      $sql = "SELECT * FROM shop WHERE arr = ?";
      $query = $this->shop_detail->query($sql,array($arr));
      // 쿼리 결과열의 개수를 리턴하는 함수
      $result = $query->num_rows();
      echo "<script>console.log( 'count: " .$result. "' );</script>";
      if($result==0||$result==''){
          // admin_select 에러 -> 2
          return null;
      }else {
        // admin_select 성공 -> 1
        return $query->result();
      }
    }else {
      // arr 가 없는경우(어드민)
      $sql = "SELECT * FROM shop WHERE shop_idx = ?";
      $query = $this->shop_detail->query($sql,array($shop_idx));
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



  }

  function amount_update($data){

    $compare = $data['compare'];
    $shop_idx = $data['shop_idx'];
    $size = $data['size'];
    if($compare==1){
      // update UP
      $this->amount_update->set('amount','amount-1',FALSE);
      $this->amount_update->where("shop_idx ='$shop_idx'");
      $result = $this->amount_update->update('shop');
      if($result==1){
          // 수정 됨  -> 1
          return 1;
      }else {
        // 수정 안됨-> 2
        return 2;
      }
    }else {
      // update DOWN
      $this->amount_update->set('amount','amount+1',FALSE);
      $this->amount_update->where("shop_idx ='$shop_idx'");
      $result = $this->amount_update->update('shop');
      if($result==1){
          // 수정 됨  -> 1
          return 1;
      }else {
        // 수정 안됨-> 2
        return 2;
      }

    }
  }

  function shop_delete($shop_idx) {

    $sql = "DELETE FROM shop WHERE shop_idx = ?";
    $result  = $this->shop_delete->query($sql,array($shop_idx));

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




  function subPic_update($datas){

    $filename = $datas['filename'];
    $c = $datas['check'];
    $shop_idx = $datas['shop_idx'];
    if($c==1){
      // first_image 수정
      $datas = array('second_img' => $filename);
      $where = "shop_idx = '$shop_idx'";
      $result  = $this->subPic_update->update('shop',$datas,$where);
      if($result==1){
          // 수정 됨  -> 1
          return 1;
      }else {
        // 수정 안됨-> 2
        return 2;
      }
    }elseif ($c==2) {
      // second_image 수정
      $datas = array('third_img' => $filename);
      $where = "shop_idx = '$shop_idx'";
      $result  = $this->subPic_update->update('shop',$datas,$where);
      if($result==1){
          // 수정 됨  -> 1
          return 1;
      }else {
        // 수정 안됨-> 2
        return 2;
      }
    }else {
      // third_image 수정
      $datas = array('forth_img' => $filename);
      $where = "shop_idx = '$shop_idx'";
      $result  = $this->subPic_update->update('shop',$datas,$where);
      if($result==1){
          // 수정 됨  -> 1
          return 1;
      }else {
        // 수정 안됨-> 2
        return 2;
      }
    }

  }

  function shop_update($datas){

    $size_idx = $datas['size_idx'];

    $stuff_amount = $datas['stuff_amount'];
    $stuff_ex = $datas['stuff_ex'];
    $stuff_price = $datas['stuff_price'];
    $shop_idx = $datas['shop_idx'];
    $stuff_name = $datas['stuff_name'];
    $email_idx = $datas['email_idx'];
    $filename = $datas['filename'];



      $datas = array('name' => $stuff_name,'price ' => $stuff_price,'img' => $filename,'size' => $size_idx,'amount' => $stuff_amount,
      'ex' => $stuff_ex);
      $where = "shop_idx = '$shop_idx'";
      $result  = $this->shop_update->update('shop',$datas,$where);
      if($result==1){
          // 수정 됨  -> 1
          return 1;
      }else {
        // 수정 안됨-> 2
        return 2;
      }
  }

  function insert_review($data){

      $result = array(
                'review' => $data['shop_review'],
                'star' => $data['star'],
                'email_idx' => $data['email_idx'],
                'shop_idx' => $data['shop_idx']
      );

      return $this->insert_review->insert("review",$result);

}
    function get_allreview(){

      $sql = "SELECT * FROM review";
      $query = $this->get_allreview->query($sql);
      $result = $query->num_rows();

      if($result==0||$result==''){
          // 등록된 이름 없음 -> 2
          return null;
      }else {
        // 등록된 이름 있음 -> 1
        return $query->result();
      }
    }


  function get_review($shop_idx){

    $sql = "SELECT * FROM review WHERE shop_idx = ?";
    $query = $this->get_review->query($sql,$shop_idx);
    $result = $query->num_rows();

    if($result==0||$result==''){
        // 등록된 이름 없음 -> 2
        return null;
    }else {
      // 등록된 이름 있음 -> 1
      return $query->result();
    }
  }

  function get_review_total($shop_idx){

    $sql = "SELECT AVG(star) FROM review WHERE shop_idx = ?";
    $query = $this->get_review_total->query($sql,$shop_idx);
    $result = $query->num_rows();
    // var_dump($query->num_rows());
    // var_dump($query->result());
    if($result==0||$result==''){
        // 등록된 이름 없음 -> 2
        return null;
    }else {
      // 등록된 이름 있음 -> 1

      return $query->row();
    }
  }

  function insert_cart($data){

      $result = array(
                'shop_idx' => $data['shop_idx'],
                'email_idx' => $data['email_idx'],
                'amount' => $data['amount']
      );

      return $this->insert_cart->insert("cart",$result);

}

function select_cart($data){

  // $shop_idx = $data['shop_idx'];
  $email_idx = $data['email_idx'];

  $sql = "SELECT * FROM shop WHERE shop_idx IN (SELECT shop_idx FROM cart WHERE email_idx = ?)";
  $query  = $this->select_cart->query($sql,array($email_idx));
  $result = $query->num_rows();
  if($result==0||$result==''){
      // 등록된 이메일 없음 -> 2
      return ;
  }else {
    // 등록된 이메일 있음 -> 1
    return $query->result();
  }

}

function select_shop_idx($data){

  $size_idx = $data['size_idx'];
  $arr = $data['arr'];

  $sql = "SELECT shop_idx FROM shop WHERE size = ? AND arr = ?";
  $query  = $this->select_shop_idx->query($sql,array($size_idx,$arr));
  $result = $query->num_rows();
  if($result==0||$result==''){
      // 등록된 이메일 없음 -> 2
      return ;
  }else {
    // 등록된 이메일 있음 -> 1
    return $query->row();
  }

}

function delete_allcart($email_idx) {

  $sql = "DELETE FROM cart WHERE email_idx = ?";
  $result  = $this->delete_allcart->query($sql,array($email_idx));

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

function delete_eachcart($email_idx,$shop_idx) {

  $sql = "DELETE FROM cart WHERE email_idx = ? AND shop_idx = ?";
  $result  = $this->delete_eachcart->query($sql,array($email_idx,$shop_idx));

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

    function select_amount($data){

      // $shop_idx = $data['shop_idx'];
      $email_idx = $data['email_idx'];

      $sql = "SELECT * FROM cart WHERE email_idx = ?";
      $query = $this->select_amount->query($sql,array($email_idx));
      $result = $query->num_rows();
      if($result==0||$result==''){
          // 등록된 이름 없음 -> 2
          return null;
      }else {
        // 등록된 이름 있음 -> 1
        // var_dump($query->row());
        return $query->result();
      }

    }

    function check_cart($data){

      $email_idx = $data['email_idx'];
      $shop_idx = $data['shop_idx'];

      $sql = "SELECT * FROM cart WHERE email_idx = ? AND shop_idx = ?";
      $query  = $this->check_cart->query($sql,array($email_idx,$shop_idx));
      $result = $query->num_rows();
      echo "<script>console.log( 'com: " .$result. "' );</script>";
      if(!isset($query->row()->cart_idx)){
          // 등록된 이름 없음 -> 2
          return 2;
      }else {
        // 등록된 이름 있음 -> 1
        return 1;
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




}
