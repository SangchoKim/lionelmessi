<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lionel Messi</title>

  <!-- Font Awesome Icons -->
  <link href="application/index/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Bootstrap core CSS -->
  <link href="application/shop/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="application/shop/css/shop-homepage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#A0522D" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="Indexs?page_no=10" style="color:#FFFFFF;font-weight:bold" >Lionel Messi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="about?page_no=1" style="color:#FFFFFF;font-weight:bold" >About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="News?page_no=2" style="color:#FFFFFF;font-weight:bold" >News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Shop?page_no=3" style="color:#FFFFFF;font-weight:bold" >Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Mypage?page_no=4" style="color:#FFFFFF;font-weight:bold">Mypage</a>
          </li>
          <?php $admin_no = $this->session->userdata('admin_no');echo "<script>console.log( 'admin_no: " . $admin_no . "' );</script>";?>
          <?php if($admin_no=='1'):?>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="Admin_login" style="color:#FFFFFF;font-weight:bold">Admin</a>
        </li>
        <?php endif; ?>
        <li class="nav-item">
          <a class="nav-link js-scroll-trigger" href="Shop/cart?cart=20"><i id="cart_alert" class="fas fa-shopping-cart fa-lg" style="color:#FFFFFF;font-weight:bold"></i></a>
        </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4" style=""><strong>Shop</strong></h1>
        <div class="list-group">
          <a href="Shop?page_no=3&stuff_idx=1" class="list-group-item">Top</a>
          <a href="Shop?page_no=3&stuff_idx=2" class="list-group-item">Bottom</a>
          <a href="Shop?page_no=3&stuff_idx=3" class="list-group-item">Shoes</a>

        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel" >
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox" id="slider">
            <div class="carousel-item active" id="lie">
              <img class="d-block img-fluid img-responsive" src="application/shop/vendor/img/sho.jpg" alt="First slide" width="auto" height="180px">
            </div>
            <div class="carousel-item" id="lie" >
              <img class="d-block img-fluid img-responsive" src="application/shop/vendor/img/pic.jpg" alt="Second slide" width="auto" height="180px">
            </div>
            <div class="carousel-item" id="lie">
              <img class="d-block img-fluid img-responsive" src="application/shop/vendor/img/uni.jpg" alt="Third slide" width="auto" height="180px">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" width="auto" height="180px">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class="row">
          <?php if(isset($data)): ?>
          <?php foreach ($data as $value):?>
          <div class="col-lg-4 col-md-6 mb-4" >
            <div class="card h-100" >
              <?php $image = $value->img; echo "<script>console.log( 'news_image: " . $image . "' );</script>";?>
              <!-- 이미지가 있는 경우 -->
              <?php if(isset($image)): ?>
              <a href="#"><img class="card-img-top img-responsive img-thumbnail" src="static/shop/<?php echo $image;?>" alt="static/news/noimg.jpg"  width="auto" height="180px"></a>
              <?php endif; ?>
              <!-- 이미지가 없는 경우 -->
              <?php if(!isset($image)): ?>
              <a href="#"><img class="card-img-top img-responsive img-thumbnail" src="static/news/noimg.jpg" alt="static/news/noimg.jpg"  width="auto" height="180px"></a>
              <?php endif; ?>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="Shop/stuff_detail?shop_idx=<?php echo $value->shop_idx;?>&arr=<?php echo $value->arr;?>"><?php echo $value->name;?></a>
                </h4>
                <?php $price = $value->price; echo "<script>console.log( 'news_image: " . $price . "' );</script>";?>
                <h5><?php echo number_format($price);;?>&nbsp&nbsp원</h5>
                <p class="card-text" ><?php echo $value->ex;?></p>
              </div>
              <div class="card-footer">
                <!-- <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small> -->
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <?php endif; ?>


        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- insert modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
          <!-- modal head -->
        <div class="modal-header">
          <h4 class="modal-title" style="font-size: 20px; font-weight = bold"><mark>Insert-Stuff</mark></h4>
            <button type="button" class="close" data-dismiss="modal"></button>
        </div>
          <!-- modal body -->
        <div class="modal-body">
              <form action="Shop/shop_insert" method="post" class="form" enctype="multipart/form-data">
                <div class="form-group">
                  <span style="font-style:italic"><strong>Name</strong></span>
                  <input type="text" id="stuff_name" name="stuff_name" class="form-control" placeholder="stuff_name">
                </div>
                <p style="font-style:italic; margin-right:3px"><strong>Category</strong></p>
                <div class="form-group" id="group">
                <select name="stuff_idx" onchange="itemChange();" id="select1">
                  <option id="top" value="1" selected>top</option>
                  <option id="bottom" value="2">bottom</option>
                  <option id="shoes" value="3">shoes</option>
                </select>
                <span style="font-style:italic; margin-left: 20px" id="size"><strong>Size</strong></span>
                <select class="" name="size_idx" id="select2" >
                  <option id="small" value="90" selected>S</option>
                  <option id="midum" value="95">M</option>
                  <option id="large" value="100">L</option>
                  <option id="x-large" value="105">XL</option>
                  <option id="2x-large" value="110">2XL</option>
                </select>
                  <span style="font-style:italic; margin-left: 20px"><strong>Amount</strong></span>
                  <input type="number" id="stuff_amount" name="stuff_amount" placeholder="500이하" min="1" max="500">
                  <button id="add_btn" type="button" name="button" class="btn btn-success"  style="font-style:italic; margin-left: 20px"><strong>추가</strong></button>
                </div>
                <div class="form-group" id="add">  </div>
                <div class="form-group">
                <span style="font-style:italic"><strong>Price</strong></span>
                <input type="text" id="stuff_price" name="stuff_price" class="form-control" placeholder="stuff_price">
                </div>
                <div class="form-group">
                  <span style="font-style:italic"><strong>Detail</strong></span>
                  <textarea id="stuff_ex" name="stuff_ex" rows="8" cols="77" class="form-control" placeholder="stuff_ex"></textarea>
                </div>
                <div class="form-group">
                  <span style="font-style:italic"><strong>Title-image</strong></span>
                  <input type="file" id="stuff_image" multiple name="stuff_image[]" class="form-controlv" >
                </div>
                <div class="form-group">
                  <span style="font-style:italic"><strong>First-image</strong></span>
                  <input type="file" id="stuff_image" multiple name="stuff_image[]" class="form-controlv" >
                </div>
                <div class="form-group">
                  <span style="font-style:italic"><strong>Second-image</strong></span>
                  <input type="file" id="stuff_image" multiple name="stuff_image[]" class="form-controlv" >
                </div>
                <div class="form-group">
                  <span style="font-style:italic"><strong>Third-image</strong></span>
                  <input type="file" id="stuff_image" multiple name="stuff_image[]" class="form-controlv" >
                </div>
                <div class="text-center">
                  <button type="submit" class="btn" id="checkbtn" >Insert_Stuff</button>
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
  <?php $this->load->helper('cookie'); ?>
  <?php if(get_cookie('shop_idx')){
    echo '<input type="hidden" name="" id="do_check" value="1">';
    // echo '<input type="button" name=" id="do_check" value="1">';
  } ?>

  <!-- Bootstrap core JavaScript -->
  <script src="application/shop/vendor/jquery/jquery.min.js"></script>
  <script src="application/cookie/jquery.cookie.js"></script>
  <script src="application/shop/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <script src="static/lib/ckeditor/ckeditor.js"></script>
  <script type="text/javascript">
  "<?php $admin_no = $this->session->userdata('admin_no');?>";
  "<?php if($admin_no=='1'):?>";
  CKEDITOR.replace('stuff_ex');
  "<?php endif; ?>";

  // 팝업창 띄우기
  window.onload =function () {
   window.open('static/shop/event.jpg', '이벤트팝업', 'width=700, height=900, scrollbars= 0, toolbar=0, menubar=no');
 }


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


function itemChange(){

var top = ["S","M","L","XL","2XL"];
var shoes = ["230","235","240","245","250","255","260","265","270","275","280","285","290"];

var selectItem = $("#select1").val();
console.log(selectItem);
var changeItem;

if(selectItem == 1){
  changeItem = top;
}
else if(selectItem == 2){
  changeItem = top;
}
else if(selectItem == 3){
  changeItem =  shoes;
}
console.log(changeItem);
$('#select2').empty();

for(var count = 0; count < changeItem.length; count++){
                var option = $("<option>"+changeItem[count]+"</option>");
                $('#select2').append(option);
            }
}


// 슬라이더

    var x = 500; //슬라이드의 가로 크기 초기화
		var slider = document.getElementById("slider"); //슬라이더 객체 지정
		var slideArray = slider.getElementsByTagName("lie"); // slider에 포함된 li 객체를 배열로 저장
		var slideMax = slideArray.length - 1; //마지막 슬라이드 번호 구하기
		var curSlideNo = 0; //현재 슬라이드 번호 지정
		var changeSlide = function(){
			//for(){…} 반복문을 함수로 변경
			for (i = 0; i <= slideMax; i++) {
				if (i == curSlideNo) slideArray[i].style.left = 0;
				else slideArray[i].style.left = -x + "px";
			}
		}
		changeSlide();
		//ul#slider에 이벤트 리스너 추가하기
		slider.addEventListener('click', function () {
			//현재슬라이드 번호를 1 증가시킨다.
			curSlideNo = curSlideNo + 1;
			//만일 현재 슬라이드 번호가 마지막 슬라이드 번호보다 크면 0으로 재지정해준다.
			if ( curSlideNo > slideMax ) curSlideNo = 0;
			//슬라이드를 현재 슬라이드 번호로 변경해주는 함수 실행
			changeSlide();
		}, false);


    // insert - 추가
    $('#add_btn').on('click',function(){
      var group = $('#group').html();
      $('#add').append(group);
      $('#add_btn').css('visibility','collapse');
    })


  </script>

</body>

</html>
