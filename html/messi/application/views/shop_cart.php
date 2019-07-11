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
    <h1><strong>Cart</strong></h1>
    <hr color="black">


    <!-- Heading Row -->
    <div class="row" id="all_delete">
      <div class="col-lg-12">
        <hr color="black">
        <a href="../Shop/delete_cookie" ><button type="button" name="button" class="btn" onclick="button_event();" style="color:#FF0000"><strong>전체삭제</strong></button></a>
        <hr color="black">
      </div>
    </div>
    <div class="row">
    <?php if(!isset($data)): ?>
      <div class="col-lg-12">
        <div class="card-head card-white text-black ml-3">
          <input type="hidden" name="" id="che" value="123">
          <div class="text-center"><br>
            <h1>상품이 없습니다.</h1><br>
            <h3>장바구니를 추가해주세요.</h3><br><br>
            <h5>Shop으로 이동하시려면 아래 버튼을 클릭해주세요.</h5><br>
            <a href="../Shop?page_no=3"><button type="button" name="button" class="btn btn-success">Shop으로 이동</button></a>
          </div>
        </div>
      </div>
    <?php endif; ?>


    <?php if(isset($data)): ?>
    <?php foreach ($data as $value):?>
    <?php  $email_idx = $value->email_idx; $email_idxs = $this->session->userdata('email_idx');?>
    <?php if($email_idx==$email_idxs): ?>
      <div class="col-lg-5">
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
  <!-- /.col-lg-8 -->

  <div class="col-lg-7">
    <form id="cart_order" class="" action="../Shop/order_form" method="post">
    <input id="compare" type="hidden" name="compare" value="">
    <div class="card-head card-white text-black ml-3">
      <input type="hidden" id="<?php echo $value->shop_idx?>shop_idx" name="shop_idx[]" value="<?php echo $value->shop_idx?>">
      <span class="" id="title" style="font-size:25px;"><strong><?php echo $value->name?></strong></span>
      <a href="../Shop/delete_eachstuff?shop_idx=<?php echo $value->shop_idx?>" style="color:#000000" onclick="button_event();return false"><span class="fas fa-times fa-m text-black check" style="float:right"></span></a>
      <hr color="black">
    </div>

    <div class="body card-white text-black ml-3">

        <?php $price = $value->price; echo "<script>console.log( 'news_image: " . $price . "' );</script>";?>
        <?php if(isset($amounts)): ?>
        <?php foreach ($amounts as $val):?>
        <?php if($val->shop_idx==$value->shop_idx): ?>
        <?php $total = $price*$val->amount ?>
        <?php $totals[] = $price*$val->amount ?>
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
      <div class="">
        <span style="font-size:20px;">수량:&nbsp&nbsp <input id="amount" type="text" name="amount_idx[]" size="1px" value="<?php echo $amount?>"></span>
        <button type="button" id="plus" class="btn" name="button"><span class="fas fa-plus fa-sm text-black check" style="margin-left:8px"></span>
        <button type="button" id="minus" class="btn" name="button"><span class="fas fa-minus fa-sm text-black check"  style=""></span></button>
        <!-- <hr color="black"> -->
      </div>
      <?php endif; ?>
        <?php if(isset($amounts)): ?>
        <?php foreach ($amounts as $val):?>
        <?php if($val->shop_idx==$value->shop_idx): ?>

        <div class="">
          <span style="font-size:20px;">수량:&nbsp&nbsp <input id="<?php echo $value->shop_idx?>amount" type="text" name="amount_idx[]" size="1px" value="<?php echo $val->amount?>"></span>
          <button type="button" id="<?php echo $value->shop_idx?>plus" class="btn" name="button"><span class="fas fa-plus fa-sm text-black check" style="margin-left:8px"></span>
          <button type="button" id="<?php echo $value->shop_idx?>minus" class="btn" name="button"><span class="fas fa-minus fa-sm text-black check"  style=""></span></button>
          <!-- <hr color="black"> -->
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
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>


  <!-- /.col-md-4 -->
<div class="col-lg-7" style="visibility:hidden">
adfasdfasfdasfd
</div>

  <div class="col-lg-5">
    <div class="card h-100">
      <div class="card-header">
        <span><strong>주문예정금액</strong></span>
      </div>
      <div class="card-body">
        <div class="p-1">
          <span>상품금액</span><span style="float:right">
          <?php if(isset($data)): ?>
          <?php foreach ($data as $value):?>
          <?php $email_idx = $value->email_idx; $email_idxs = $this->session->userdata('email_idx');?>
          <?php if($email_idx==$email_idxs): ?>
          <?php $price = $price + $value->price; ?>
          <?php if(count($data)>1): ?>
          <?php
            $t = 0;
          for ($i=0; $i < count($totals); $i++) {
            $t= $t + $totals[$i];
            // var_dump($t);
          }
          echo number_format($t);
          ?>&nbsp원
          <?php break; endif; ?>
          <?php if(count($data)<=1): ?>
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
          <?php if(!isset($data)): ?>
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
            <?php if(isset($data)): ?>
            <?php foreach ($data as $value):?>
            <?php  $email_idx = $value->email_idx; $email_idxs = $this->session->userdata('email_idx');?>
            <?php if($email_idx==$email_idxs): ?>
            <?php if(count($data)>1): ?>
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
            <?php if(count($data)<=1):?>
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
            <?php if(!isset($data)): ?>
            0 원
            <?php endif; ?>
          </span>
        </div>
      </div>
      <div class="card-footer text-center">
        <button id="order" type="button" name="order" class="btn btn-danger btn-lg" style="width: 230pt;">Order</button>
      </div>
    </div>
  </div>
  </form>


</div>
<hr color="black">
    <!-- /.row -->

    <!-- Call to Action Well -->
    <!-- <div class="card text-white bg-secondary my-5 py-4 text-center">
      <div class="card-body">
        <p class="text-white m-0"></p>
      </div>
    </div> -->



  </div>
  <!-- /.container -->

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
  <script type="text/javascript">

  // CKEDITOR.replace('shop_review');


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

  // 오더하기전 확인
    $('#order').click(function(){
      if(confirm("정말 이대로 주문하시겠습니까??") == true){
          $('#cart_order').submit();
      }else{   //취소
          return false;
      }

    })






  // 별점
  $('.starRev span').click(function(){
      $(this).parent().children('span').removeClass('on');
      $(this).addClass('on').prevAll('span').addClass('on');
      var num = $(this).attr('id');
      $('#star').val(num);
      // alert(id);
      return false;
  });

  "<?php if(isset($data)): ?>";
  "<?php foreach ($data as $value):?>";
    // 수량 UP
    $('<?php echo "#".$value->shop_idx;?>plus').click(function(){
    			$.ajax({
    				type : "POST",
    				url : "../Shop/amount",
    				data : {
              "compare" : 1,
              "shop_idx" : $('<?php echo "#".$value->shop_idx;?>shop_idx').val(),
              "size" : $('#size').val()
    				},

    				success : function(data) {
              console.log(data);
              var count = JSON.parse(data);
    					if(count == "1") {
                var num = $("<?php echo "#".$value->shop_idx;?>amount").val();
                if(num==-1){
                  $("<?php echo "#".$value->shop_idx;?>amount").val(0);
                }else {
                  $("<?php echo "#".$value->shop_idx;?>amount").val(num*1+1);
                }


    					} else {
                alert('오류가 발생하였습니다.');
    					}
    				},
    			});
    		})
        "<?php endforeach; ?>";
        "<?php endif; ?>";

        "<?php if(isset($data)): ?>";
        "<?php foreach ($data as $value):?>";
        // 수량 Down
        $('<?php echo "#".$value->shop_idx;?>minus').click(function(){
        			$.ajax({
        				type : "POST",
        				url : "../Shop/amount",
        				data : {
                  "compare" : 2,
                  "shop_idx" : $('<?php echo "#".$value->shop_idx;?>shop_idx').val(),
                  "size" : $('#size').val()
        				},

        				success : function(data) {
                  console.log(data);
                  var count = JSON.parse(data);
        					if(count == "1") {
                    var num = $("<?php echo "#".$value->shop_idx;?>amount").val();
                    if(num==-1){
                      $("<?php echo "#".$value->shop_idx;?>amount").val(0);
                    }else {
                      $("<?php echo "#".$value->shop_idx;?>amount").val(num*1-1);
                    }

        					} else {
                    alert('오류가 발생하였습니다.');
        					}
        				},
        			});
        		})
            "<?php endforeach; ?>";
            "<?php endif; ?>";


    // html dom 이 다 로딩된 후 실행된다.
    $(document).ready(function(){
        // memu 클래스 바로 하위에 있는 a 태그를 클릭했을때
        $("#review12").click(function(){
            // 현재 클릭한 태그가 a 이기 때문에
            // a 옆의 태그중 ul 태그에 hide 클래스 태그를 넣던지 빼던지 한다.
            $("#review22").slideToggle("fest");

        });
    });


// 스크롤링
  function scrolling(pos) {
      $('html, body').animate({'scrollTop' : '$(pos).offset().top+px'}, "slow");
    }
  </script>

</body>

</html>
