<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lionel Messi</title>

  <!-- Font Awesome Icons -->
  <link href="../application/index/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Bootstrap core CSS -->
  <link href="../application/shopdetail/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../application/shopdetail/css/small-business.css" rel="stylesheet">

  <style media="screen">
  .starR{
      background: url('http://miuu227.godohosting.com/images/icon/ico_review.png') no-repeat right 0;
      background-size: auto 100%;
      width: 30px;
      height: 30px;
      display: inline-block;
      text-indent: -9999px;
      cursor: pointer;
      }
      .starR.on{background-position:0 0;}
  </style>

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#A0522D" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="../Indexs?page_no=10" style="color:#FFFFFF;font-weight:bold" >Lionel Messi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="../about?page_no=1" style="color:#FFFFFF;font-weight:bold" >About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="../News?page_no=2" style="color:#FFFFFF;font-weight:bold" >News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="../Shop?page_no=3" style="color:#FFFFFF;font-weight:bold" >Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="../Mypage?page_no=4" style="color:#FFFFFF;font-weight:bold">Mypage</a>
          </li>
          <?php $admin_no = $this->session->userdata('admin_no');echo "<script>console.log( 'admin_no: " . $admin_no . "' );</script>";?>
          <?php if($admin_no=='1'):?>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="../Admin_login" style="color:#FFFFFF;font-weight:bold">Admin</a>
        </li>
        <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <hr color="black">
    <h1><strong>Order</strong></h1>
    <hr color="black">


    <!-- Heading Row -->
    <!-- <div class="row" id="all_delete">
      <div class="col-lg-12">
        <hr color="black">
        <a href="../Shop/delete_cookie" ><button type="button" name="button" class="btn" onclick="button_event();" style="color:#FF0000"><strong>전체삭제</strong></button></a>
        <hr color="black">
      </div>
    </div> -->
    <form id="cart_order" class="" action="../Shop/order_confirm" method="post">
    <div class="row">

    <?php if(isset($shop)): ?>
    <?php foreach ($shop as $value):?>
      <div class="col-lg-1" style="visibility:hidden">
sdfsdfsdf
      </div>
      <div class="col-lg-4">
    <?php $image = $value->img; echo "<script>console.log( 'news_image: " . $image . "' );</script>";?>
    <!-- 이미지가 있는 경우 -->
    <?php if(isset($image)): ?>
    <a href="#"><img class="card-img-top img-responsive img-thumbnail" src="../static/shop/<?php echo $image;?>" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
    <?php endif; ?>
    <!-- 이미지가 없는 경우 -->
    <?php if(!isset($image)): ?>
    <a href="#"><img class="card-img-top img-responsive img-thumbnail" src="../static/news/noimg.jpg" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
    <?php endif; ?>
  </div>
  <div class="col-lg-1" style="visibility:hidden">
sdfsdfsdf
  </div>
  <div class="col-lg-5">

    <input id="compare" type="hidden" name="compare" value="">
    <div class="card-head card-white text-black ml-3">
      <input type="hidden" id="<?php echo $value->shop_idx?>shop_idx" name="shop_idx[]" value="<?php echo $value->shop_idx?>">
      <span class="" id="title" style="font-size:25px;"><strong><?php echo $value->name?></strong></span>
      <!-- <a href="../Shop/delete_eachstuff?shop_idx=<?php echo $value->shop_idx?>" style="color:#000000" onclick="button_event();return false"><span class="fas fa-times fa-m text-black check" style="float:right"></span></a> -->
      <hr color="black">
    </div>
    <div class="body card-white text-black ml-3">

        <?php $price = $value->price; echo "<script>console.log( 'news_image: " . $price . "' );</script>";?>
        <?php if(isset($amount)): ?>
        <?php foreach ($amount as $v):?>
        <?php if($v->shop_idx==$value->shop_idx): ?>
        <?php $total = $price*$v->amount ?>
        <?php $totals[] = $price*$v->amount ?>
        <span style="font-size:20px;color:#FF4500">가격:&nbsp&nbsp <?php echo number_format($total);?>&nbsp원</span>
        <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
      <!-- 수량 및 사이즈(옷) 시작-->
      <?php if($value->top_idx==1||$value->bottom_idx==2): ?>
        <div class="">
          <span style="font-size:20px;">사이즈: &nbsp&nbsp<?php echo $value->size?></span>
          </div>
      <?php endif; ?>
      <!-- 수량 및 사이즈(옷) 끝-->
      <!-- 수량 및 사이즈(신발) 시작-->
      <?php if($value->shose_idx==3): ?>
        <div class="">
        <span style="font-size:20px;">사이즈: &nbsp&nbsp<?php echo $value->size?></span>
        </div>
      <?php endif; ?>
      <!-- 수량 및 사이즈(신발)끝-->
      <?php if(isset($amount)): ?>
      <?php foreach ($amount as $v):?>
      <?php if($v->shop_idx==$value->shop_idx): ?>
      <div class="">
        <span style="font-size:20px;">수량:&nbsp&nbsp<?php echo $v->amount?></span>
      </div>
      <?php endif; ?>
      <?php endforeach; ?>
      <?php endif; ?>
      <div class="">
        <span style="font-size:20px;">배송구분:&nbsp&nbsp 기본배송</span>
      </div>
      <div class="">
        <span style="font-size:20px;">배송비:&nbsp&nbsp 무료</span>
        <hr color="black">
      </div>
    </div>

  </div>
  <div class="col-lg-1" style="visibility:hidden">
sdfsdfsdf
  </div>
<?php endforeach; ?>
<?php endif; ?>
  <!-- /.col-md-4 -->
</div>
<div class="row">
  <div class="col-lg-1" style="visibility:hidden">
sdfsdfsdf
  </div>
  <div class="col-lg-10">
    <div class="card h-100">
      <div class="card-header">
        <span><strong>주문예정금액</strong></span>
      </div>
      <div class="card-body">
        <div class="p-1">
          <span>상품금액</span><span style="float:right">
          <?php if(isset($shop)): ?>
          <?php foreach ($shop as $value):?>
          <?php $email_idx = $value->email_idx; $email_idxs = $this->session->userdata('email_idx');?>
          <?php if($email_idx==$email_idxs): ?>
          <?php $price = $price + $value->price; ?>
          <?php if(count($shop)>1): ?>
          <?php
            $t = 0;
          for ($i=0; $i < count($totals); $i++) {
            $t= $t + $totals[$i];
            // var_dump($t);
          }
          echo number_format($t);
          ?>&nbsp원
          <?php break; endif; ?>
          <?php if(count($shop)<=1): ?>
            <?php
              $t = 0;
            for ($i=0; $i < count($totals); $i++) {
              $t= $t + $totals[$i];
              // var_dump($t);
            }
            echo number_format($t);
            ?>&nbsp원
            <?php break; endif; ?>
          <?php endif; ?>
          <?php endforeach; ?>
          <?php endif; ?>
          <?php if(!isset($shop)): ?>
          0 원
          <?php endif; ?>
        </span>
        </div>
        <div class="p-1">
          <span>예상배송비</span><span style="float:right">0 원</span>
        </div>
        <div class="p-1">
          <span>상품할인금액</span><span style="float:right">0 원</span>
        </div>
        <div class="p-1">
          <span style="font-size:20px;color:#FF4500"><strong>총 결제예정금액</strong></span><span style="float:right;font-size:20px;color:#FF4500"><strong>
            <?php if(isset($shop)): ?>
            <?php foreach ($shop as $value):?>
            <?php  $email_idx = $value->email_idx; $email_idxs = $this->session->userdata('email_idx');?>
            <?php if($email_idx==$email_idxs): ?>
            <?php if(count($shop)>1): ?>
            <?php $price = $price + $value->price; ?>
            <?php
              $t = 0;
            for ($i=0; $i < count($totals); $i++) {
              $t= $t + $totals[$i];
              // var_dump($t);
            }
            echo number_format($t);
            ?>&nbsp원
            <?php break; endif; ?>
            <?php if(count($shop)<=1):?>
              <?php
                $t = 0;
              for ($i=0; $i < count($totals); $i++) {
                $t= $t + $totals[$i];
                // var_dump($t);
              }
              echo number_format($t);
              ?>&nbsp원
            <?php break; endif; ?>
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endif; ?>
            <?php if(!isset($shop)): ?>
            0 원
            <?php endif; ?>
          </span>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- <hr color="black"> -->

<div class="row">
  <div class="col-lg-12">
    <hr color="black">
    <div class="card-header card-white text-black mt-5 text-center">
      <h1><strong>주문결제</strong></h1>
    </div>
  </div>
</div>
<div class="row mt-3">
  <div class="col-lg-1" style="visibility:hidden">
sdfsdfsdf
  </div>
  <div class="col-lg-9 ">
    <div class="card-body card-white text-black ">
      <h4><strong>주문고객</strong></h4>
    </div>
  </div>
  <div class="col-lg-2" style="">
    <button type="button" id="review12" class="btn" name="button"><span class="fas fa-minus fa-lg text-black check"  style="padding: 3px"></span></button>
  </div>
  <div class="col-lg-1" style="visibility:hidden">
    sdfsdfsdf
  </div>
  <div class="col-lg-9" id="review22" style="display:none">
    <?php if(isset($mypage)): ?>
    <?php foreach ($mypage as $user):?>
    <div class="card-user mt-2">
      <p style="font-size:17px"><?php echo $user->user_name?></p>
      <p style="font-size:17px">010-9655-6387</p>
      <p style="font-size:17px"><?php echo $user->user_email?></p>
    </div>
  <?php endforeach; ?>
  <?php endif; ?>
  </div>
</div>
<hr color="black">
<div class="row">
<div class="col-lg-1" style="visibility:hidden">
sdfsdfsdf
</div>
<div class="col-lg-9 ">
  <div class="card-body card-white text-black ">
    <h4><strong>배송지 정보</strong></h4>
  </div>
</div>
<div class="col-lg-2" style="">
  <button type="button" id="review13" class="btn" name="button"><span class="fas fa-minus fa-lg text-black check"  style="padding: 3px"></span></button>
</div>
<div class="col-lg-1" style="visibility:hidden">
  sdfsdfsdf
</div>
<div class="col-lg-9" id="review23" >
  <div class="form-group">
    <!-- 기본배송지가 등록되어 있는 경우(시작) -->
    <?php if(isset($adress)): ?>
    <h5><strong>기본 배송지</strong></h5>
    <div class="" id="review26">
    <button type="button" name="button" class="btn btn-success" onclick="address_regi();">배송지 변경</button>
    </div>
  <?php endif; ?>
  <!-- 기본배송지가 등록되어 있는 경우(끝) -->
  <!-- 기본배송지가 등록되어 있지 않은 경우(시작) -->
  <?php if(!isset($adress)): ?>
    <div class="" id="review25">
    <h5><strong>배송지가 등록 되어있지 않습니다. 주소를 등록해 주세요.</strong></h5>
    <button type="button" name="button" class="btn btn-danger" onclick="address_regi();">배송지 등록</button>
    </div>
    <div class="" id="review26" style="display:none">
    <button type="button" name="button" class="btn btn-danger" onclick="address_regi();">배송지 변경</button>
    </div>
  <?php endif; ?>
  <!-- 기본배송지가 등록되어 있지 않은 경우(끝) -->
  </div>
  <!-- 기본배송지가 등록되어 있는 경우(시작) -->
  <?php if(isset($adress)): ?>
  <?php foreach ($adress as $ad):?>
  <?php $a = $ad->first_adress; $a_result =explode('&',$a);?>
  <div class="" id="review24">
  <div class="form-group">
    <input type="text" id="sample6_postcode" name="adress_postcard" class="form-control" size="3px" value="<?php echo $a_result[0] ?>" readonly>
  </div>
  <div class="form-group text-center">
    <input type="text" id="sample6_address" name="adress" class="form-control" value="<?php echo $a_result[1] ?>" readonly  >
  </div>
  <div class="form-group text-center">
    <input type="text" id="sample6_extraAddress" name="adress_add" class="form-control" value="<?php echo $a_result[2] ?>">
  </div>
  <div class="custom-control custom-checkbox">
    <input type="checkbox" id="jb-checkbox" class="custom-control-input" name="firstAdress" value="1">
		<label class="custom-control-label" for="jb-checkbox">배송지 목록에 추가</label>
  </div>
  <div class="form-group mt-3">
    <button type="button" name="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">배송지 목록 보기</button>
  </div>
  </div>
  <?php endforeach; ?>
  <?php endif; ?>
  <!-- 기본배송지가 등록되어 있는 경우(끝) -->
  <!-- 기본배송지가 등록되어 있지 않은 경우(시작) -->
  <?php if(!isset($adress)): ?>
  <div class="" id="review24" style="display:none">
  <div class="form-group">
    <input type="text" id="sample6_postcode" name="adress_postcard" class="form-control" size="3px" value="" readonly>
  </div>
  <div class="form-group text-center">
    <input type="text" id="sample6_address" name="adress" class="form-control" value="" readonly  >
  </div>
  <div class="form-group text-center">
    <input type="text" id="sample6_extraAddress" name="adress_add" class="form-control" placeholder="상세주소를 입력해주세요">
  </div>
  <div class="custom-control custom-checkbox">
    <input type="checkbox" id="jb-checkbox" class="custom-control-input" name="firstAdress" value="1">
		<label class="custom-control-label" for="jb-checkbox">배송지 목록에 추가</label>
  </div>
  </div>
  <?php endif; ?>
  <!-- 기본배송지가 등록되어 있지 않은 경우(끝) -->
</div>
</div>
<!-- <div class="col-lg-1" style="visibility:hidden">
  sdfsdfsdf
</div> -->
<hr color="black">
<div class="row">
  <div class="col-lg-1" style="visibility:hidden">
    sdfsdfsdf
  </div>
<div class="col-lg-9 ">
  <div class="card-body card-white text-black ">
    <h4><strong>메모</strong></h4>
  </div>
</div>
<div class="col-lg-2" style="">
  <button type="button" id="review14" class="btn" name="button"><span class="fas fa-minus fa-lg text-black check"  style="padding: 3px"></span></button>
</div>
<div class="col-lg-1" style="visibility:hidden">
  sdfsdfsdf
</div>
<div class="col-lg-9" id="review30" >
  <div class="form-group">
    <select class="" name="ordering_memo" style="width:800px">
      <option id="1" value="배송메모를선택해주세요." onclick="writel(1);" selected>배송 메모를 선택해주세요.</option>
      <option id="1" value="배송시연락부탁드립니다" onclick="writel(1);">배송 시 연락 부탁드립니다.</option>
      <option id="1" value="빠른배송부탁드립니다" onclick="writel(1);">빠른 배송 부탁드립니다.</option>
      <option id="2" value="" onclick="writel(2);">직접 입력</option>
    </select>
    <div class="form-group mt-3">
    <input id="write_direct" type="text" name="writen" value="" placeholder="배송메모를 입력하여 주십시오." size="75px" style="display:none">
    </div>
    <p>[결제 후 3일 이내 발송처리 되며, 발송완료 등록 및 발송완료 후 고객님께 배달완료 되기까지 1~2일정도 더 소요됩니다.<br>
(토요일, 공휴일 제외)</p>
  </div>
</div>
</div>
<hr color="black">
<div class="row">
  <div class="col-lg-1" style="visibility:hidden">
    sdfsdfsdf
  </div>
  <div class="col-lg-9 ">
    <div class="card-body card-white text-black ">
      <h4><strong>결제수단 선택</strong></h4>
    </div>
  </div>
  <div class="col-lg-2" style="">
    <button type="button" id="review15" class="btn" name="button"><span class="fas fa-minus fa-lg text-black check"  style="padding: 3px"></span></button>
  </div>
  <div class="col-lg-1" style="visibility:hidden">
    sdfsdfsdf
  </div>
  <div class="col-lg-9" id="review31">
    <div class="custom-control custom-radio">
          <input type="radio" name="jb-radio" id="jb-radio-1" class="custom-control-input" size="15px">
          <label class="custom-control-label" for="jb-radio-1">카카오 페이</label>
        </div>
        <div class="custom-control custom-radio">
          <input type="radio" name="jb-radio" id="jb-radio-2" class="custom-control-input" size="15px">
          <label class="custom-control-label" for="jb-radio-2">무통장 입금</label>
        </div>
  </div>
  <div class="col-lg-2" style="visibility:hidden">
    sdfsdfsdf
  </div>
  <div class="col-lg-12" >
    <div class="form-group text-center mt-5">
      <button type="submit" name="button" class="btn btn-danger btn-lg" style="width:800px"><strong>결제 하기</strong></button>
    </div>
  </div>
</div>
</form>

    <!-- /.row -->
</div>
  <!-- /.container -->
  <!-- address modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
          <!-- modal head -->
        <div class="modal-header">
          <h4 class="modal-title" style="font-size: 20px; font-weight = bold"><mark>배송지 목록</mark></h4>
            <button type="button" class="close" data-dismiss="modal"></button>
        </div>
          <!-- modal body -->
        <div class="modal-body">
              <h6><strong>기본배송지</strong></h6>
              <hr color="black">
                <form class="" action="../Shop/change_basic" method="post">
                <?php if(isset($adress)): ?>
                <?php foreach ($adress as $ad):?>
                <?php $a = $ad->first_adress; $a_result =explode('&',$a);?>
                <div class="card h-100" style="border: 5px solid red;">
                <div class="form-group">
                  <input type="text" id="" name="adress_postcard_1" class="form-control" size="3px" value="<?php echo $a_result[0] ?>" readonly>
                </div>
                <div class="form-group text-center">
                  <input type="text" id="" name="adress_1" class="form-control" value="<?php echo $a_result[1] ?>" readonly  >
                </div>
                <div class="form-group text-center">
                  <input type="text" id="" name="adress_add_1" class="form-control" value="<?php echo $a_result[2] ?>">
                </div>
                </div>
                <hr color="black">

                <?php if(isset($ad->second_adress)): ?>
                <?php $abc = $ad->second_adress; $ab_result =explode('&',$abc);?>

                <div class="form-group">
                  <input type="text" id="" name="adress_postcard" class="form-control" size="3px" value="<?php echo $ab_result[0] ?>" readonly>
                </div>
                <div class="form-group text-center">
                  <input type="text" id="" name="adress" class="form-control" value="<?php echo $ab_result[1] ?>" readonly  >
                </div>
                <div class="form-group text-center">
                  <input type="text" id="" name="adress_add" class="form-control" value="<?php echo $ab_result[2] ?>">
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" id="second_checkbox" class="custom-control-input" name="basic_adress" value="2">
              		<label class="custom-control-label" for="second_checkbox">기본 배송지 설정</label>
                </div>
                <hr color="black">
                <?php endif; ?>
                <?php if(isset($ad->third_adress)): ?>
                <?php $abcd = $ad->third_adress; $abcd_result =explode('&',$abcd);?>
                <div class="form-group">
                  <input type="text" id="" name="adress_postcard" class="form-control" size="3px" value="<?php echo $abcd_result[0] ?>" readonly>
                </div>
                <div class="form-group text-center">
                  <input type="text" id="" name="adress" class="form-control" value="<?php echo $abcd_result[1] ?>" readonly  >
                </div>
                <div class="form-group text-center">
                  <input type="text" id="" name="adress_add" class="form-control" value="<?php echo $abcd_result[2] ?>">
                </div>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" id="third_checkbox" class="custom-control-input" name="basic_adress" value="3">
              		<label class="custom-control-label" for="third_checkbox">기본 배송지 설정</label>
                </div>
                <hr color="black">
                <?php endif; ?>
              <?php endforeach; ?>
              <?php endif; ?>

                <div class="text-center">
                  <button type="submit" class="btn">기본 배송지 변경</button>
                  <button type="button" class="btn" data-dismiss="modal" id="close">Close</button>
                </div>
              </form>

       </div>
       <!-- Modal footer -->
        <div class="modal-footer">
          <div class="text-center">

          </div>
        </div>
      </div>
    </div>
  </div>


  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Lionel Messi</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../application/shopdetail/vendor/jquery/jquery.min.js"></script>
  <script src="../application/shopdetail/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../static/lib/ckeditor/ckeditor.js"></script>
  <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
  <script type="text/javascript">

  // CKEDITOR.replace('shop_review');
  // 메모
  function writel(event){
  var id = $(this).attr('id');
    // alert(event);
    if(event==1){
      // 추가 메모창 x
      $('#write_direct').hide();
    }else {
      // 추가 메모창 o
        $('#write_direct').show();
    }
  }


  // 다음 주소 api
  function address_regi(){
  new daum.Postcode({
         oncomplete: function(data) {
             // 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분입니다.
             // 예제를 참고하여 다양한 활용법을 확인해 보세요.
             // 각 주소의 노출 규칙에 따라 주소를 조합한다.
                // 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
                var addr = ''; // 주소 변수
                var extraAddr = ''; // 참고항목 변수

                //사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
                if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
                    addr = data.roadAddress;
                } else { // 사용자가 지번 주소를 선택했을 경우(J)
                    addr = data.jibunAddress;
                }

                // 사용자가 선택한 주소가 도로명 타입일때 참고항목을 조합한다.
                if(data.userSelectedType === 'R'){
                    // 법정동명이 있을 경우 추가한다. (법정리는 제외)
                    // 법정동의 경우 마지막 문자가 "동/로/가"로 끝난다.
                    if(data.bname !== '' && /[동|로|가]$/g.test(data.bname)){
                        extraAddr += data.bname;
                    }
                    // 건물명이 있고, 공동주택일 경우 추가한다.
                    if(data.buildingName !== '' && data.apartment === 'Y'){
                        extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
                    }
                    // 표시할 참고항목이 있을 경우, 괄호까지 추가한 최종 문자열을 만든다.
                    if(extraAddr !== ''){
                        extraAddr = ' (' + extraAddr + ')';
                    }
                    // 조합된 참고항목을 해당 필드에 넣는다.
                    document.getElementById("sample6_extraAddress").value = extraAddr;

                } else {
                    document.getElementById("sample6_extraAddress").value = '';
                }

                // 우편번호와 주소 정보를 해당 필드에 넣는다.
                document.getElementById('sample6_postcode').value = data.zonecode;
                document.getElementById("sample6_address").value = addr;
                // 커서를 상세주소 필드로 이동한다.
                document.getElementById("sample6_extraAddress").focus();

                $('#review24').show();
                $('#review25').hide();
                $('#review26').show();

         }
     }).open();
   }

  // 장바구니 없을 때 전체삭제 가리기


  if($('#che').val()!=null||$('#ch').val()!=''){
    $('#all_delete').hide();
  }

  if($('#che').val()==null||$('#ch').val()==''){
    $('#all_delete').show();
  }


  // 전체삭제
  function button_event(){
      if(confirm("정말 삭제하시겠습니까??") == true){    //확인
        $(location).attr('href', url);
      }else{   //취소

          return false;
      }
    }

    $(document).ready(function(){
        // memu 클래스 바로 하위에 있는 a 태그를 클릭했을때
        $("#review12").click(function(){
            // 현재 클릭한 태그가 a 이기 때문에
            // a 옆의 태그중 ul 태그에 hide 클래스 태그를 넣던지 빼던지 한다.
            $("#review22").slideToggle("fest");

        });
    });

    $(document).ready(function(){
        // memu 클래스 바로 하위에 있는 a 태그를 클릭했을때
        $("#review13").click(function(){
            // 현재 클릭한 태그가 a 이기 때문에
            // a 옆의 태그중 ul 태그에 hide 클래스 태그를 넣던지 빼던지 한다.
            $("#review23").slideToggle("fest");

        });
    });

    $(document).ready(function(){
        // memu 클래스 바로 하위에 있는 a 태그를 클릭했을때
        $("#review14").click(function(){
            // 현재 클릭한 태그가 a 이기 때문에
            // a 옆의 태그중 ul 태그에 hide 클래스 태그를 넣던지 빼던지 한다.
            $("#review30").slideToggle("fest");

        });
    });

    $(document).ready(function(){
        // memu 클래스 바로 하위에 있는 a 태그를 클릭했을때
        $("#review15").click(function(){
            // 현재 클릭한 태그가 a 이기 때문에
            // a 옆의 태그중 ul 태그에 hide 클래스 태그를 넣던지 빼던지 한다.
            $("#review31").slideToggle("fest");

        });
    });

  </script>

</body>

</html>
