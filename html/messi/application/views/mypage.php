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

      <div class="col-lg-3" style="visibility:hidden">
        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          <a href="#" class="list-group-item active">Category 1</a>
          <a href="#" class="list-group-item">Category 2</a>
          <a href="#" class="list-group-item">Category 3</a>
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-6 ">
        <?php $email = $this->session->userdata('email');
              $check = $this->session->userdata('check');
              $name = $this->session->userdata('name');
              // var_dump($this->session->all_userdata());
        ?>
        <div class="card mt-4">
          <?php if(isset($data)): ?>
          <?php foreach ($data as $value):?>
          <?php $user_image = $value->user_image; echo "<script>console.log( 'user_image: " . $user_image . "' );</script>";?>
            <!-- 이미지가 있는 경우 -->
          <?php if(isset($user_image)):?>
          <img class="card-img-top img-fluid img-responsive" src="static/user/<?php echo $user_image;?>" alt="static/user/basic.jpg">
          <?php endif; ?>
          <!-- 이미지가 없는 경우 -->
          <?php if(!isset($user_image)):?>
          <img class="card-img-top img-fluid img-responsive" src="static/user/basic.jpg" alt="static/user/basic.jpg">
          <?php endif; ?>

          <div class="card-body">

            <span class="card-title" style="font-size:30px"><?php echo $email;?></span>
               <a href="Mypage_update"><i class="fas fa-cog fa-2x text-black ml-4"></i></a>
              <p class="card-title" style="font-size:25px"><?php echo $name;?></p>
              <?php $user_intro = $value->user_intro; echo "<script>console.log( 'user_intro: " . $user_intro . "' );</script>";?>
              <?php if(isset($user_intro)):?>
              <hr color="black">
              <h4><strong>[ Intro ]</strong></h4>
              <p class="card-title" style="font-size:18px"><?php echo $user_intro;?></p>
              <?php endif; ?>
          </div>
        <?php endforeach; ?>
        <?php endif; ?>
        </div>
        <!-- /.card -->

        <div class="card card-outline-secondary my-4">
          <div class="card-header text-center">
            <a href="#" class="btn btn-danger mr-3" style="width:150px">News</a>
            <!-- <a href="#" class="btn btn-danger " style="width:150px">Shop</a> -->
          </div>

          <div class="card-body">
            <div class="container-fluid p-0">
              <div class="row no-gutters">

                <?php if(isset($news)): ?>
                <?php foreach ($news as $item):?>
                <?php $news_images = $item->news_image; echo "<script>console.log( 'news_image: " . $news_images . "' );</script>";?>
                <!-- 동영상인 경우 -->
                <?php if(isset($news_images)):?>
                <?php $id = explode('.',$news_images); ?>
                <?php if($id[1]=="mp4"||$id[1]=="wav"):?>
                <video class="img-responsive img-fluid" src="static/news/<?php echo $news_images;?>" controls muted poster="posterimage.jpg"></video>
                <?php endif; ?>
                <?php endif; ?>
                <!-- 이미지가 있는경우 -->
                <?php if(isset($news_images)):?>
                <?php $id = explode('.',$news_images); ?>
                <?php if($id[1]=="jpg"||$id[1]=="png"||$id[1]=="gif"||$id[1]=="jpeg"||$news_images==''||$news_images==null):?>
                <div class="col-lg-6">
                  <img class="img-fluid img-responsive" style="width:auto; height:auto"src="static/news/<?php if($news_images==null||$news_images==''){echo"noimg.jpg";}else{echo $news_images;}?>" alt="static/news/noimg.jpg">
                </div>
                <?php endif; ?>
                <?php endif; ?>
                <?php endforeach; ?>
                <?php endif; ?>
                </div>
              </div>
          </div>

        </div>
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

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
  </script>
</body>

</html>
