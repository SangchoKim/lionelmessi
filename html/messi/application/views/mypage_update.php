<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lionel Messi</title>

  <!-- Bootstrap core CSS -->
  <link href="application/mypage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome Icons -->
  <link href="application/index/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="application/mypage/css/shop-item.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" style="background-color: #4169E1;">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="Indexs?page_no=10" style="color:#FFFFFF;font-weight:bold">Lionel Messi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="about?page_no=1" style="color:#FFFFFF;font-weight:bold">About
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="News?page_no=2" style="color:#FFFFFF;font-weight:bold">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Shop?page_no=3" style="color:#FFFFFF;font-weight:bold">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Mypage?page_no=4" style="color:#FFFFFF;font-weight:bold">Mypage</a>
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

      <div class="col-lg-3 text-center">
        <h1 class="my-4">Mypage</h1>
        <div class="list-group">
          <button id="up_profile" type="button" name="button" class="btn btn-primiry"><a href="#" class="list-group-item">프로필 편집</a></button>
          <button id="up_password" type="button" name="button" class="btn btn-primiry" data-toggle="modal" data-target="#myModal"><a href="#" class="list-group-item">비밀번호 변경</a></button>
          <button id="logout" type="button" name="button" class="btn btn-primiry"><a id="check" href="" class="list-group-item">로그아웃</a></button>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <!-- 프로필 편집 -->
      <div class="col-lg-6" id="show1" >

        <div class="card mt-4">
          <?php $email = $this->session->userdata('email');
                $check = $this->session->userdata('check');
                $name = $this->session->userdata('name');
          ?>
          <?php if(isset($data)): ?>
          <?php foreach ($data as $value):?>
          <form class="form" action="Mypage" method="post" enctype="multipart/form-data">
          <?php $user_image = $value->user_image; echo "<script>console.log( 'user_image: " . $user_image . "' );</script>";?>
          <!-- 이미지가 있는 경우 -->
          <?php if(isset($user_image)):?>
          <img id="img" class="card-img-top img-fluid img-responsive img-thumbnail" src="static/user/<?php echo $user_image;?>" alt="static/user/basic.jpg">
          <input type="file" id="news_image" name="news_image">
          <?php endif; ?>
          <!-- 이미지가 없는 경우 -->
          <?php if(!isset($user_image)):?>
          <img id="img" class="card-img-top img-fluid img-responsive img-thumbnail" src="static/user/basic.jpg" alt="static/user/basic.jpg">
          <input type="file" id="news_image" name="news_image">
          <?php endif; ?>
          <div class="card-body">
            <input type="hidden" name="mypage_update" value="1">
            <div class="card-title">
              <span class="card-title" style="font-size:25px">Email :</span>
              <span style="margin-left:13px"><?php echo $email;?></span>
              <input type="hidden" name="email" value="<?php echo $email;?>">
            </div>
            <div class="card-title">
              <span class="card-title" style="font-size:25px">Name :</span>
              <input class="p-1" id="name" type="text" name="name" value="<?php echo $name;?>" style="width:400px">
            </div>
            <div class="card-title">
              <span class="card-title mb-2" style="font-size:25px">Intro </span>

              <textarea name="intro" rows="4" cols="50" placeholder="자기소개글을 남겨주세요..."><?php echo $value->user_intro;?></textarea>
            </div>
            <div class="card-submit text-center">
              <button type="submit" name="submit" class="btn btn-danger" >수정 하기</button>
            <?php endforeach; ?>
            <?php endif; ?>
            </div>
            </form>
          </div>
        </div>
      </div>

      <!-- 비빌번호 변경-->
      <div class="col-lg-6" id="show2" style="visibility:hidden" >

        <div class="card mt-4">
          <!-- <img class="card-img-top img-fluid" src="http://placehold.it/640x360" alt=""> -->
          <div class="card-body">
            <form class="form" action="mypage_update" method="post">
            <div class="card-title">
              <span class="card-title" style="font-size:20px">Current password </span>
              <input class="p-1" id="currntpw" type="password" name="currntpw" style="width:400px">
            </div>
            <div class="card-title">
              <span class="card-title" style="font-size:20px">Change password </span>
              <input class="p-1" id="updatepw1" type="password" name="updatepw" style="width:400px">
            </div>
            <div class="card-title">
              <span class="card-title mb-2" style="font-size:20px">Type again </span>
              <input class="p-1" id="updatepw2" type="password" name="updatepw" style="width:400px">
            </div>
            <div class="card-submit text-center">
              <button type="submit" name="submit" class="btn btn-danger">변경 하기</button>
            </div>
            </form>
          </div>
        </div>
      </div>


    </div>

  </div>
  <!-- /.container -->

  <!-- password modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <!-- modal head -->
        <div class="modal-header">
          <h4 class="modal-title" style="font-size: 20px; font-weight = bold"><mark>Check</mark></h4>
            <button type="button" class="close" data-dismiss="modal"></button>
        </div>
          <!-- modal body -->
        <div class="modal-body">
              <form id="checkbtn">
                <input type="hidden" name="checkpw" value="1">
                <div class="form-group">
                  <input type="password" id="pw" name="password" class="form-control" placeholder="password를 입력해주세요">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-danger">Submit</button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal" id="close">Close</button>
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
  <script src="application/mypage/vendor/jquery/jquery.min.js"></script>
  <script src="application/cookie/jquery.cookie.js"></script>
  <script src="application/mypage/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
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


    count = 1;


    $('#checkbtn').submit(function(){
    			$.ajax({
    				type : "POST",
    				url : "Mypage_update",
    				data : {
    					"password" : $('#pw').val(),
              "checkpw" : 1
    				},

    				success : function(data) {
              console.log(data);
    					if (data == 1) {
    						alert('비밀번호가 일치합니다.');
                $('#close').click();


    					} else {
    						alert('비밀번호가 일치하지않습니다.');
    					}
    				},
    			});
    		})



      // 프로필 편집 변경
      $('#up_profile').click(function(){
          count = 1;
          $('#show1').show();
          $('#show2').hide();
          $('#up_password').css('background-color', 'white');
          $('#logout').css('background-color', 'white');
          $('#up_profile').css('background-color', 'blue');

      })

      // 비밀번호 변경
      $('#up_password').click(function(){
              count = 2;
              $('#show1').hide();
              $('#show2').css('visibility','visible');
              $('#show2').show();
              $('#up_profile').css('background-color', 'white');
              $('#logout').css('background-color', 'white');
              $('#up_password').css('background-color', 'blue');


          })

          // 로그아웃
          $('#logout').click(function(){
                  count = 3;
                  $('#logout').css('background-color', 'blue');
                  $('#up_profile').css('background-color', 'white');
                  $('#up_password').css('background-color', 'white');
                  if(confirm("정말로 로그아웃 하시겠습니까?")==true){
                  $('#check').attr('href', 'Login?logout=1');
                  }else {
                    return;
                  }
              });

          // 프로필 편집 변경 체크
          if(count === 1){
            console.log(count);
          $('.form').submit(function (event) {
            if ($('#name').val() == '') {
              alert('이름을 입력해주세요');
              event.preventDefault();
            }

            // alert('수정완료');
          })
        }

          // 비밀번호 변경 체크
          if(count === 2){
            console.log(count);
          $('.form').submit(function (event) {
            if ($('#currntpw').val() == '') {
              alert('비밀번호를 입력해주세요');
              event.preventDefault();
            }else if ($('#updatepw1').val() == '') {
              alert('비밀번호를 입력해주세요');
              event.preventDefault();
            }else if ($('#updatepw2').val() == '') {
              alert('비밀번호를 입력해주세요');
              event.preventDefault();
            }
          })
        }

        var sel_file;
        // 이미지 미리보기 기능
        $(document).ready(function(){
          $(news_image).on("change",handleImgFileSelect);
        });

        function handleImgFileSelect(e){
          var files = e.target.files;
          var filesArr = Array.prototype.slice.call(files);

          filesArr.forEach(function(f){
            if(!f.type.match("image.*")){
              alert("확장자는 이미지 확장자만 가능합니다.");
              return;
            }

            sel_file = f;

            var reader = new FileReader();
            reader.onload = function(e){
              $("#img").attr("src",e.target.result);
            }
            reader.readAsDataURL(f);
          });
        }
  </script>
</body>

</html>
