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
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="../Shop/cart?cart=20"><i id="cart_alert" class="fas fa-shopping-cart fa-lg" style="color:#FFFFFF;font-weight:bold"></i></a>
        </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">
    <?php if(isset($data)): ?>
    <?php foreach ($data as $value):?>
    <!-- Heading Row -->
    <form id="cart_submit" class="" action="../Shop/cart" method="post">
    <div class="row my-5">
      <div class="col-lg-7">
        <?php $image = $value->img; echo "<script>console.log( 'news_image: " . $image . "' );</script>";?>
        <!-- 이미지가 있는 경우 -->
        <?php if(isset($image)): ?>
        <input type="hidden" id="img" name="photo" value="<?php echo $image;?>">
        <a href="#"><img class="card-img-top img-responsive img-thumbnail" src="../static/shop/<?php echo $image;?>" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
        <?php endif; ?>
        <!-- 이미지가 없는 경우 -->
        <?php if(!isset($image)): ?>
        <a href="#"><img class="card-img-top img-responsive img-thumbnail" src="../static/news/noimg.jpg" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
    <?php endif; ?>


    <?php if(isset($data)): ?>
    <?php foreach ($data as $value):?>
      <!-- /.col-lg-8 -->
      <div class="col-lg-5">

        <input id="compare" type="hidden" name="compare" value="">
        <div class="card-head card-white text-black text-center">
          <input type="hidden" id="shop_idx" name="shop_idx" value="<?php echo $value->shop_idx;?>">
          <input type="hidden" id="arr" name="arr" value="<?php echo $value->arr;?>">
          <input type="hidden" id="title1" name="title" value="<?php echo $value->name;?>">
          <h1 class="font-weight-light" id="title"><?php echo $value->name;?></h1>
          <hr color="black">
        </div>
        <div class="card-body">
          <div class="card-price">
            <?php $price = $value->price; echo "<script>console.log( 'news_image: " . $price . "' );</script>";?>
            <input type="hidden" id="price" name="price" value="<?php echo $value->price;?>">
            <h5><?php echo number_format($price);;?>&nbsp&nbsp원</h5>
          </div>
        <?php endforeach; ?>
        <?php endif; ?>
          <div class="card-empty">
            <span style="visibility:hidden">adfasdfasdfasf</span>
          </div>

          <!-- 수량 및 사이즈(옷) 시작-->
            <div class="card-size">
              <?php if($value->top_idx==1||$value->bottom_idx==2): ?>
              <span><strong>사이즈</strong></span>
              <select name="size_idx" id="size" style="WIDTH: 120pt;margin-left: 23px;">
              <?php endif; ?>
                <?php if(isset($datas)): ?>
                <?php foreach ($datas as $value):?>
                <?php if($value->top_idx==1||$value->bottom_idx==2): ?>
                <?php $size= $value->size; echo "<script>console.log( 'arr: " .$size . "' );</script>"; $lenth = count($datas);?>
                <?php $amount= $value->amount; echo "<script>console.log( 'arr: " . $amount . "' );</script>";?>
                <?php $c=true;
                for($i=0;$lenth>$i;$i++){
                  if($size=='S'){
                    echo "<option selected>S[재고: $amount 개]</option>";
                    break;
                  }else if($size=='M'){
                    echo "<option selected>M[재고: $amount 개]</option>";
                    break;
                  }else if($size=='L'){
                    echo "<option selected>L[재고: $amount 개]</option>";
                    break;
                  }else if($size=='XL'){
                    echo "<option selected>XL[재고: $amount 개]</option>";
                    break;
                  }else if($size=='2XL'){
                    echo "<option selected>2XL[재고: $amount 개]</option>";
                    break;}
                  }
                 ?>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php endif; ?>
              </select>
            </div>
          <?php if(isset($datas)): ?>
          <?php foreach ($datas as $value):?>
          <?php endforeach; ?>
          <?php endif; ?>
          <!-- 수량 및 사이즈(옷) 끝-->
          <!-- 수량 및 사이즈(신발) 시작-->
          <div class="card-size">
            <?php if($value->shose_idx==3): ?>
            <span><strong>사이즈</strong></span>
            <select name="size_idx" style="WIDTH: 120pt;margin-left: 23px;">
            <?php endif; ?>
              <?php if(isset($datas)): ?>
              <?php foreach ($datas as $value):?>
              <?php if($value->shose_idx==3): ?>
              <?php $size= $value->size; echo "<script>console.log( 'arr: " .$size . "' );</script>"; $lenth = count($datas);?>
              <?php $amount= $value->amount; echo "<script>console.log( 'arr: " . $amount . "' );</script>";?>
              <?php $c=true;
                for($i=0;$lenth>$i;$i++){

                  if($size==230){
                    echo "<option selected>230[재고: $amount 개]</option>";
                    break;
                  }else if($size==235){
                    echo "<option selected>235[재고: $amount 개]</option>";
                    break;
                  }else if($size==240){
                    echo "<option selected>240[재고: $amount 개]</option>";
                    break;
                  }else if($size==245){
                    echo "<option selected>245[재고: $amount 개]</option>";
                    break;
                  }else if($size==250){
                    echo "<option selected>250[재고: $amount 개]</option>";
                    break;
                  }else if($size==255){
                    echo "<option selected>255[재고: $amount 개]</option>";
                    break;
                  }else if($size==260){
                    echo "<option selected>260[재고: $amount 개]</option>";
                    break;
                  }else if($size==265){
                    echo "<option selected>265[재고: $amount 개]</option>";
                    break;
                  }else if($size==270){
                    echo "<option selected>270[재고: $amount 개]</option>";
                    break;
                  }else if($size==275){
                    echo "<option selected>275[재고: $amount 개]</option>";
                    break;
                  }else if($size==280){
                    echo "<option selected>280[재고: $amount 개]</option>";
                    break;
                  }else if($size==285){
                    echo "<option selected>285[재고: $amount 개]</option>";
                    break;
                  }else if($size==290){
                    echo "<option selected>290[재고: $amount 개]</option>";
                    break;
                  }
                }
                ?>
              <?php endif; ?>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
          </div>

          <!-- 수량 및 사이즈(신발)끝-->

          <div class="card-empty">
            <span style="visibility:hidden">adfasdfasdfasf</span>
          </div>
          <div class="card-amount">
            <span><strong>수량</strong></span>
            <input type="text" name="amount_idx" value="1"style="margin-left: 23px; font-size:20px" id="amount" readonly size="3px">
            <button type="button" id="plus" class="btn" name="button"><span class="fas fa-plus fa-lg text-black check" style="padding: 3px; margin-left:8px"></span>
            <button type="button" id="minus" class="btn" name="button"><span class="fas fa-minus fa-lg text-black check"  style="padding: 3px"></span></button>
          </div>
          <hr color="black">
          <div class="card-comment text-center">
          <button id="carts" type="button" name="button" class="btn btn-danger btn-lg" style="WIDTH: 120pt;">Cart</button>
          <button id="buy" type="button" name="button" class="btn btn-danger btn-lg" style="WIDTH: 120pt;">Buy</button>
          </div>
          <hr color="black">
          <div class="card-comment">
          <h5 class="text-blak m-0">제품 특징</h5>
          <p><?php echo $value->ex;?></p>
          </div>
          <hr color="black">
          <div class="card-comment">

          <?php if(isset($review)): ?>
          <?php $tot =count($review); ?>
          <h5 class="text-blak m-0">리뷰&nbsp&nbsp(<?php echo $tot; ?>)</h5>
          <!-- 평균 별점   -->
          <!-- 평균 별점이 있을때 (시작)   -->
          <?php if(isset($total)): ?>
          <?php foreach ($total as $items):?>
          <?php if(isset($items)): ?>
          <?php $avg = intval(floor($items));?>
          <small class="text-muted"><?php if($avg==1){echo "&#9733; &#9734; &#9734; &#9734; &#9734;";}
                                              elseif ($avg==2) {
                                                echo "&#9733; &#9733; &#9734; &#9734; &#9734;";
                                              }elseif ($avg==3) {
                                                echo "&#9733; &#9733; &#9733; &#9734; &#9734;";
                                              }elseif ($avg==4) {
                                                echo "&#9733; &#9733; &#9733; &#9733; &#9734;";
                                              }else {
                                                echo "&#9733; &#9733; &#9733; &#9733; &#9733;";
                                              }?></small>
          <?php endif; ?>
          <?php endforeach; ?>
          <?php endif; ?>
          <?php endif; ?>
          <!-- 평균 별점이 있을때 (끝)   -->
          <!-- 평균 별점이 없을때 (시작)   -->
          <?php if(!isset($review)): ?>
          <h5 class="text-blak m-0">리뷰&nbsp&nbsp(0)</h5>
          <small class="text-muted">별점이 아직 등록되지 않은 상품입니다.</small>
          <?php endif; ?>


          <!-- 평균 별점이 없을때 (끝)   -->
          <button type="button" id="review12" class="btn pull-right" name="button" style="margin-left:250px"><span class="fas fa-chevron-down fa-lg text-black check"style="float:right"></span></button>
          </div>
          <hr color="black">

          <div class="card-comment" id="review22" style="display: none" >
            <!-- 리뷰가 없을 떄 (시작)  -->
            <?php if(!isset($review)): ?>
            <?php if(!isset($item->review)): ?>
            <ul class="hide" style=" list-style:none;">
                <!-- <li><small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small></li> -->
                <li>이 상품의 첫 번째 리뷰를 작성해 주세요.</li>
            </ul>
            <?php endif; ?>
            <?php endif; ?>
            <!-- 리뷰가 없을 떄 (끝)  -->
            <!-- 리뷰가 있을 떄 (시작)  -->
            <?php if(isset($review)): ?>
            <?php if(isset($user)): ?>
            <?php foreach ($review as $item):?>
            <?php foreach ($user as $some):?>
            <?php if(isset($item->review)): ?>
            <?php if($some->email_idx==$item->email_idx): ?>
            <?php $email = $some->user_email; $id = explode('@',$email); ?>
            <ul class="hide" style=" list-style:none;">
                <?php $total = $item->star;?>
                <!-- <li><small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small></li> -->
                <li><small class="text-muted"><?php if($total==1){echo "&#9733; &#9734; &#9734; &#9734; &#9734;";}
                                                    elseif ($total==2) {
                                                      echo "&#9733; &#9733; &#9734; &#9734; &#9734;";
                                                    }elseif ($total==3) {
                                                      echo "&#9733; &#9733; &#9733; &#9734; &#9734;";
                                                    }elseif ($total==4) {
                                                      echo "&#9733; &#9733; &#9733; &#9733; &#9734;";
                                                    }else {
                                                      echo "&#9733; &#9733; &#9733; &#9733; &#9733;";
                                                    }?></small></li>
                <li><strong><?php echo $id[0];?></strong>&nbsp&nbsp<?php echo $item->review;?></li>
            </ul>
            <?php endif; ?>
            <?php endif; ?>
            <!-- 리뷰가 있을 떄 (끝)  -->
          <?php endforeach; ?>
          <?php endforeach; ?>
          <?php endif; ?>
          <?php endif; ?>

            <button id="re" type="button" name="button" data-toggle="modal" class="btn" data-target="" onclick="check_review();" ><a href="#">리뷰 작성하기</a></button>
          <hr color="black" id="line">

          </div>



        </div>

      </div>

      <!-- /.col-md-4 -->
    </div>
    </form>

    <!-- /.row -->

    <!-- Call to Action Well -->
    <!-- <div class="card text-white bg-secondary my-5 py-4 text-center">
      <div class="card-body">
        <p class="text-white m-0"></p>
      </div>
    </div> -->

    <!-- Content Row -->
    <div class="row">
    <?php if(isset($data)): ?>
    <?php foreach ($data as $value):?>
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <?php $image = $value->second_img; echo "<script>console.log( 'news_image: " . $image . "' );</script>";?>
            <!-- 이미지가 있는 경우 -->
            <?php if(isset($image)): ?>
            <a href="#"><img class="card-img-top img-responsive img-thumbnail" src="../static/shop/<?php echo $image;?>" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
            <?php endif; ?>
            <!-- 이미지가 없는 경우 -->
            <?php if(!isset($image)): ?>
            <a href="#"><img class="card-img-top img-responsive img-thumbnail" src="../static/news/noimg.jpg" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
            <?php endif; ?>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-sm">More Info</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <?php endif; ?>

    <?php if(isset($data)): ?>
    <?php foreach ($data as $value):?>
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <?php $image = $value->third_img; echo "<script>console.log( 'news_image: " . $image . "' );</script>";?>
            <!-- 이미지가 있는 경우 -->
            <?php if(isset($image)): ?>
            <a href="#"><img class="card-img-top img-responsive img-thumbnail" src="../static/shop/<?php echo $image;?>" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
            <?php endif; ?>
            <!-- 이미지가 없는 경우 -->
            <?php if(!isset($image)): ?>
            <a href="#"><img class="card-img-top img-responsive img-thumbnail" src="../static/news/noimg.jpg" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
            <?php endif; ?>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-sm">More Info</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <?php endif; ?>

    <?php if(isset($data)): ?>
    <?php foreach ($data as $value):?>
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <div class="card-body">
            <?php $image = $value->forth_img; echo "<script>console.log( 'news_image: " . $image . "' );</script>";?>
            <!-- 이미지가 있는 경우 -->
            <?php if(isset($image)): ?>
            <a href="#"><img class="card-img-top img-responsive img-thumbnail" src="../static/shop/<?php echo $image;?>" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
            <?php endif; ?>
            <!-- 이미지가 없는 경우 -->
            <?php if(!isset($image)): ?>
            <a href="#"><img class="card-img-top img-responsive img-thumbnail" src="../static/news/noimg.jpg" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
            <?php endif; ?>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary btn-sm">More Info</a>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
    <?php endif; ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->



  <?php if(isset($data)): ?>
  <?php foreach ($data as $value):?>
  <!-- 리뷰 modal -->

  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
          <!-- modal head -->
        <div class="modal-header">
          <h4 class="modal-title" style="font-size: 20px; font-weight = bold"><mark>Review</mark></h4>
            <button type="button" class="close" data-dismiss="modal"></button>
        </div>
          <!-- modal body -->

        <div class="modal-body">
            <form class="" action="../Shop/insert_review" method="post">
              <div class="container">
                <div class="row">
                    <div class="col-md-6">
                      <!-- 이미지 -->
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
                    <div class="col-md-6 text-center">
                      <div class="card-head card-white text-black text-center">
                        <input type="hidden" id="shop_idx" name="shop_idx" value="<?php echo $value->shop_idx;?>">
                        <h1 class="font-weight-light" id="title"><?php echo $value->name;?></h1>
                        <hr color="black">
                      </div>
                      <div class="form-group text-center">
                        <?php $price = $value->price; echo "<script>console.log( 'news_image: " . $price . "' );</script>";?>
                        <h5><?php echo number_format($price);;?>&nbsp&nbsp원</h5>
                      </div>

                    </div>
                    <div class="col-md-12">
                      <div class="form-group text-center p-4">
                        <h5 class="text-blak m-4">제품 리뷰</h5>
                        <textarea id="shop_review" name="shop_review" rows="8" cols="77" class="form-control" placeholder="리뷰를 작성해주세요"></textarea>
                      </div>
                      <div class="starRev mb-3">
                      <span><h6 class="text-blak m-2"><strong>별점을 등록해주세요</strong></h6></span>
                        <span class="starR on" id="1"></span>
                        <span class="starR" id="2"></span>
                        <span class="starR" id="3"></span>
                        <span class="starR" id="4"></span>
                        <span class="starR" id="5"></span>
                        <input type="hidden" name="star" value="" id="star">
                      </div>
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-danger btn-lg" id="checkbtn" style="WIDTH: 120pt;">Submit</button>
                      <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" id="close" style="WIDTH: 120pt;">Close</button>
                    </div>
                    </div>
                </div>
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

<?php endforeach; ?>
<?php endif; ?>

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Lionel Messi</div>
    </div>
  </footer>
  <?php $this->load->helper('cookie'); ?>
  <?php if(get_cookie('shop_idx')){
    echo '<input type="hidden" name="" id="do_check" value="1">';
    // echo '<input type="button" name=" id="do_check" value="1">';
  } ?>

  <!-- Bootstrap core JavaScript -->
  <script src="../application/shopdetail/vendor/jquery/jquery.min.js"></script>
  <script src="../application/cookie/jquery.cookie.js"></script>
  <script src="../application/shopdetail/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../static/lib/ckeditor/ckeditor.js"></script>
  <script type="text/javascript">

  CKEDITOR.replace('shop_review');

  if($('#do_check').val()==1){
    var shop_idx = $.cookie('shop_idx');
    var cookie_sp = shop_idx.split(',');
    if(cookie_sp.length>1){
      // 랭스가 1이상일때
      var s = '&nbsp<span id="e" style="color:#FFFF00;">'+cookie_sp.length+'</span>';
        // alert('w');
      $('#cart_alert').css('color','#00FF7F');
      $('#cart_alert').append(s);
    }else {
      var s = '&nbsp<span id="e" style="color:#FFFF00;">'+cookie_sp.length+'</span>';
        // alert('w');
      $('#cart_alert').css('color','#00FF7F');
      $('#cart_alert').append(s);
    }
  }

  // 장바구니
  $('#carts').on('click',function(){
    if(confirm("장바구니에 담으시겠습니까?") == true){
      // if(confirm("장바구니로 이동되었습니다.") == true){
        var compare = $('#compare').val(1);
        $('#cart_submit').submit();
      // }else {
      //   return;
      // }
    }else {
      return;
    }
  });

  // 리뷰 체크
  function check_review(){
    $.ajax({
      type : "POST",
      url : "../Shop/check_review",
      data : {
        "shop_idx" : $('#shop_idx').val()
      },

      success : function(data) {
        console.log(data);
        var count = JSON.parse(data);
        if(count == "1") {
          $('#myModal').modal();
        }else if(count == "0") {
          alert('상품을 구매를 하신 분에 한해서 리뷰를 작성할 수 있습니다.');
        }else {
          alert('상품을 구매를 하신 분에 한해서 리뷰를 작성할 수 있습니다.');
        }
      },
    });
  }



  // 별점
  $('.starRev span').click(function(){
      $(this).parent().children('span').removeClass('on');
      $(this).addClass('on').prevAll('span').addClass('on');
      var num = $(this).attr('id');
      $('#star').val(num);
      // alert(id);
      return false;
  });
    // 수량 UP
    $('#plus').click(function(){
    			$.ajax({
    				type : "POST",
    				url : "../Shop/amount",
    				data : {
              "compare" : 1,
              "shop_idx" : $('#shop_idx').val(),
              "size" : $('#size').val()
    				},

    				success : function(data) {
              console.log(data);
              var count = JSON.parse(data);
    					if(count == "1") {
                var num = $("#amount").val();
                if(num==-1){
                  $("#amount").val(0);
                }else {
                  $("#amount").val(num*1+1);
                }


    					} else {
                alert('오류가 발생하였습니다.');
    					}
    				},
    			});
    		})

        // 수량 Down
        $('#minus').click(function(){
        			$.ajax({
        				type : "POST",
        				url : "../Shop/amount",
        				data : {
                  "compare" : 2,
                  "shop_idx" : $('#shop_idx').val(),
                  "size" : $('#size').val()
        				},

        				success : function(data) {
                  console.log(data);
                  var count = JSON.parse(data);
        					if(count == "1") {
                    var num = $("#amount").val();
                    if(num==-1){
                      $("#amount").val(0);
                    }else {
                      $("#amount").val(num*1-1);
                    }

        					} else {
                    alert('오류가 발생하였습니다.');
        					}
        				},
        			});
        		})


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
