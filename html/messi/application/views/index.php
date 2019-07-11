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

  <!-- Plugin CSS -->
  <link href="application/index/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="application/index/css/creative.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="Indexs?page_no=10">Lionel Messi</a>
      <!-- // class 지정 -> data-toggle 타입 지정 ->  data-target id 지정 -->
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0 text-center">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="about?page_no=1">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="News?page_no=2">News</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Shop?page_no=3">Shop</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Mypage?page_no=4">Mypage</a>
          </li>
            <?php $admin_no = $this->session->userdata('admin_no');echo "<script>console.log( 'admin_no: " . $admin_no . "' );</script>";?>
            <?php if($admin_no=='1'):?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Admin_login">Admin</a>
          </li>
          <?php endif; ?>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="Shop/cart?cart=20"><i id="cart_alert" class="fas fa-shopping-cart fa-lg" style="font-weight:bold"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Masthead -->

  <header class="masthead">
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <h1 class="text-uppercase text-white font-weight-bold">Lionel Messi</h1>
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
          <p class="text-white-75 font-weight-light mb-5">Welcome to Lionel Messi fan Page</p>
        </div>
      </div>
    </div>
  </header>



  <!-- Services Section -->
  <section class="page-section" id="services">
    <div class="container">
      <h2 class="text-center mt-0">About</h2>
      <hr class="divider my-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-globe-americas fa-4x text-danger mb-4"></i>
            <h3 class="h4 mb-2">Country</h3>
            <p class="text-muted mb-0"></p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-child fa-4x text-danger mb-4"></i>
            <h3 class="h4 mb-2">physical</h3>
            <p class="text-muted mb-0"></p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-award fa-4x text-danger mb-4"></i>
            <h3 class="h4 mb-2">Career</h3>
            <p class="text-muted mb-0"></p>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 text-center">
          <div class="mt-5">
            <i class="fas fa-clipboard fa-4x text-danger mb-4"></i>
            <h3 class="h4 mb-2">Record</h3>
            <p class="text-muted mb-0"></p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 text-center p-3">
      <a class="btn btn-danger btn-xl js-scroll-trigger" href="about?page_no=1">Find Out More</a>
      </div>
    </div>
  </section>

  <!-- About Section -->
  <section class="page-section bg-danger" id="about">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="text-white mt-0">Recent News</h2>
          <hr class="divider light my-4">
          <p class="text-white-50 mb-4"></p>
          <a class="btn btn-light btn-xl js-scroll-trigger" href="News?page_no=2">More news</a>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Section -->
  <section id="portfolio">
    <div class="container-fluid p-0">
      <div class="row no-gutters">
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="application/index/img/portfolio/fullsize/1.jpg">
            <img class="img-fluid" src="application/index/img/portfolio/thumbnails/1.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                <!-- Lionel-messi -->
              </div>
              <div class="project-name">
                <!-- Project Name -->
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="application/index/img/portfolio/fullsize/2.jpg">
            <img class="img-fluid" src="application/index/img/portfolio/thumbnails/2.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                <!-- Category -->
              </div>
              <div class="project-name">
                <!-- Project Name -->
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="application/index/img/portfolio/fullsize/3.jpg">
            <img class="img-fluid" src="application/index/img/portfolio/thumbnails/3.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                <!-- Category -->
              </div>
              <div class="project-name">
                <!-- Project Name -->
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="application/index/img/portfolio/fullsize/4.jpg">
            <img class="img-fluid" src="application/index/img/portfolio/thumbnails/4.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                <!-- Category -->
              </div>
              <div class="project-name">
                <!-- Project Name -->
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="application/index/img/portfolio/fullsize/5.jpg">
            <img class="img-fluid" src="application/index/img/portfolio/thumbnails/5.jpg" alt="">
            <div class="portfolio-box-caption">
              <div class="project-category text-white-50">
                <!-- Category -->
              </div>
              <div class="project-name">
                <!-- Project Name -->
              </div>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-sm-6">
          <a class="portfolio-box" href="application/index/img/portfolio/fullsize/6.jpg">
            <img class="img-fluid" src="application/index/img/portfolio/thumbnails/6.jpg" alt="">
            <div class="portfolio-box-caption p-3">
              <div class="project-category text-white-50">
                <!-- Category -->
              </div>
              <div class="project-name">
                <!-- Project Name -->
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
  </section>



  <!-- Call to Action Section -->
  <!-- <section class="page-section bg-dark text-white"> -->
    <!-- <div class="container text-center"> -->
      <!-- <h2 class="mb-4">Free Download at Start Bootstrap!</h2> -->
      <!-- <a class="btn btn-light btn-xl" href="https://startbootstrap.com/themes/creative/">Download Now!</a> -->
    <!-- </div> -->
  <!-- </section> -->

  <!-- Contact Section -->
  <!-- <section class="page-section" id="contact">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center">
          <h2 class="mt-0">Let's Get In Touch!</h2>
          <hr class="divider my-4">
          <p class="text-muted mb-5">Ready to start your next project with us? Give us a call or send us an email and we will get back to you as soon as possible!</p>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 ml-auto text-center mb-5 mb-lg-0">
          <i class="fas fa-phone fa-3x mb-3 text-muted"></i>
          <div>+1 (202) 555-0149</div>
        </div>
        <div class="col-lg-4 mr-auto text-center">
          <i class="fas fa-envelope fa-3x mb-3 text-muted"></i> -->
          <!-- Make sure to change the email address in anchor text AND the link below! -->
          <!-- <a class="d-block" href="mailto:contact@yourwebsite.com">contact@yourwebsite.com</a>
        </div>
      </div>
    </div>
  </section> -->

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
  <script src="application/index/vendor/jquery/jquery.min.js"></script>
  <script src="application/cookie/jquery.cookie.js"></script>
  <script src="application/index/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="application/index/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="application/index/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="application/index/js/creative.min.js"></script>
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
