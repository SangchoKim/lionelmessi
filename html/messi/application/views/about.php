<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lionel Messi</title>

  <!-- Bootstrap core CSS -->
  <link href="application/about/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="application/about/css/scrolling-nav.css" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <link href="application/index/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>


</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color:#FF0000" id="mainNav">
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
          <a class="nav-link js-scroll-trigger" href="Shop/cart?cart=20" id="cart_alerts"><span id="cart_alert" class="fas fa-shopping-cart fa-lg" style="color:#FFFFFF;font-weight:bold"></span></a>
        </li>
        </ul>
      </div>
    </div>
  </nav>

  <header class="text-white">
    <div class="container text-center">
      <h1>Lionel Messi</h1>
      <!-- <p class="lead">Welcome to Lionel Messi fan Page</p> -->
    </div>
  </header>

  <section id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="head" style="color:#FFFFFF;font-weight:bold">
            <h1>- Country -</h1>
          </div>
          <div class="body" style="color:#FFFFFF">
          <p class="lead">동쪽의 대서양과 서쪽의 안데스 산맥 사이에 2,766,890 km²의 면적을 차지하고 있으며 남아메리카에서 브라질에 이어 두 번째로 넓으며, 세계에서 여덟 번째로 큰 나라이다. <br>또한 스페인어 사용국가 중 가장 큰 나라이며, 백인 인구가 국가 인구의 다수를 차지하는 나라로, 수도는 부에노스아이레스이다.</p>
            <div class="container">
              <div class="row">
                <div class="col-lg-4 text-center">
                  <section class="flag">
                      <img src="application/about/img/flag.png" alt="" style="width: auto; height: 130px; border:3px solid">
                      <div class="text-center p-4" style="font-size: 30px; vertical-align: middle; ">
                        <p id="flags">국기</p>
                      </div>
                  </section>
                </div>
                <div class="col-lg-4 text-center">
                  <section class="language">
                    <img src="application/about/img/lang.png" alt="" style="width: auto; height: 130px; border:3px solid">
                    <div class="text-center p-4" style="font-size: 30px; vertical-align: middle; ">
                      <p id="flags">언어</p>
                    </div>
                  </section>
                </div>
                <div class="col-lg-4 text-center">
                  <section class="capital">
                    <img src="application/about/img/conti.png" alt="" style="width: auto; height: 130px;">
                    <div class="text-center p-4" style="font-size: 30px; vertical-align: middle; ">
                      <p id="flags">영토</p>
                    </div>
                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="head" style="color:#FFFFFF;font-weight:bold">
          <h1>- Physical -</h1>
          </div>
          <div class="img mt-5">
            <img id="img" src="application/about/img/profile.jpg" alt=""  style="width: auto; height: 350px; border:3px solid; float:left;">
          </div>
          <div class="contents mt-5">
            <ul id="img" class="list-group" style="margin-left:40%; list-style:none; border:3px solid;">
              <li class="list-group-item list-group-item-info"><strong>이름:</strong>  리오넬 안드레스 메시 쿠치티니 </li>
              <li class="list-group-item list-group-item-info"><strong>생년월일:</strong> 1987년 6월 24일 (31세)</li>
              <li class="list-group-item list-group-item-info"><strong>국적:</strong> 아르헨티나, 스페인, 이탈리아</li>
              <li class="list-group-item list-group-item-info"><strong>프로팀:</strong> FC 바르셀로나</li>
              <li class="list-group-item list-group-item-info"><strong>신체조건:</strong> 170cm 72kg O형</li>
              <li class="list-group-item list-group-item-info"><strong>포지션:</strong> 공격수, 미드필더</li>
              <li class="list-group-item list-group-item-info"><strong>통산 득점:</strong> 678골</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <div class="head" style="color:#FFFFFF;font-weight:bold">
          <h1>- Career & Record -</h1>
          <div class="container">
            <div class="row">
              <div class="col-lg-6 text-center">
                <section class="record">
                    <h2><strong><아르헨티나(대표팀)></strong></h2>
                    <div class="recordes">
                      <ul id="record" class="list-group" style="list-style:none; border:3px solid">
                        <li class="list-group-item list-group-item-danger"><strong>통산 최다 득점:</strong> 65골 </li>
                        <li class="list-group-item list-group-item-danger"><strong>통산 최다 도움:</strong> 40어시스트</li>
                        <li class="list-group-item list-group-item-danger"><strong>통산 친선 경기 최다 득점:</strong> 27골</li>
                        <li class="list-group-item list-group-item-danger"><strong>통산 남미 국적 선수 득점:</strong> 2위</li>
                        <li class="list-group-item list-group-item-danger"><strong>통산 최다 출전:</strong> 3위</li>
                        <li class="list-group-item list-group-item-danger"><strong>통산 해트트릭:</strong> 6회</li>
                        <li class="list-group-item list-group-item-danger"><strong>한 해 최다 득점:</strong> 12골</li>
                        <li class="list-group-item list-group-item-danger"><strong>FIFA 월드컵 남미 예선 최다 득점:</strong> 21골</li>
                        <li class="list-group-item list-group-item-danger"><strong>FIFA 월드컵 최연소 출전 및 득점:</strong> 10골</li>
                      </ul>
                    </div>
                </section>
              </div>
              <div class="col-lg-6 text-center">
                <section class="record">
                    <h2><strong><바르셀로나 FC></strong></h2>
                    <div class="recordes">
                      <ul id="record" class="list-group" style="list-style:none; border:3px solid">
                        <li class="list-group-item list-group-item-danger"><strong>최다 우승:</strong> 34회</li>
                        <li class="list-group-item list-group-item-danger"><strong>최다 승:</strong> 485회</li>
                        <li class="list-group-item list-group-item-danger"><strong>최다 득점:</strong> 602골</li>
                        <li class="list-group-item list-group-item-danger"><strong>라 리가 최다 득점:</strong> 419골</li>
                        <li class="list-group-item list-group-item-danger"><strong>UEFA 챔피언스 리그 최다 득점:</strong> 112골</li>
                        <li class="list-group-item list-group-item-danger"><strong>코파 델 레이 최다 득점:</strong> 50골</li>
                        <li class="list-group-item list-group-item-danger"><strong>UEFA 슈퍼컵 최다 득점:</strong> 3골</li>
                        <li class="list-group-item list-group-item-danger"><strong>엘 클라시코 통산 최다 득점:</strong> 25골</li>
                        <li class="list-group-item list-group-item-danger"><strong>통산 해트트릭:</strong> 45회</li>
                      </ul>
                    </div>
                </section>
              </div>
              <div class="col-lg-12 text-center">
                <section class="record">
                    <h2><strong><스페인(라리가)></strong></h2>
                    <div class="recordes">
                      <ul id="record" class="list-group" style="list-style:none; border:3px solid">
                        <li class="list-group-item list-group-item-danger"><strong>통산 최다 득점:</strong> 419골</li>
                        <li class="list-group-item list-group-item-danger"><strong>통산 최다 도움:</strong> 162도움</li>
                        <li class="list-group-item list-group-item-danger"><strong>통산 최다 우승:</strong> 34회</li>
                        <li class="list-group-item list-group-item-danger"><strong>통산 최다 승:</strong> 340승</li>
                        <li class="list-group-item list-group-item-danger"><strong>한 시즌 최다 득점:</strong> 50골(2011-12)</li>
                        <li class="list-group-item list-group-item-danger"><strong>한 시즌 최다 공격 포인트:</strong> 65포인트(50골 15도움, 2011-12)</li>
                        <li class="list-group-item list-group-item-danger"><strong>한 시즌 최고 득점률:</strong> 경기당 1.44골(32경기 46골, 2012-13)</li>
                        <li class="list-group-item list-group-item-danger"><strong>한 시즌 최다 해트트릭:</strong> 8회(2011-12)</li>
                        <li class="list-group-item list-group-item-danger"><strong>한 시즌 최다 경기 득점:</strong> 27경기(2012-13)</li>
                      </ul>
                    </div>
                </section>
              </div>
            </div>
          </div>
      </div>
    </div>
  </section>
  <span id="e"></span>
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
  <script src="application/about/vendor/jquery/jquery.min.js"></script>
  <script src="application/cookie/jquery.cookie.js"></script>
  <script src="application/about/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="application/about/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom JavaScript for this theme -->
  <script src="application/about/js/scrolling-nav.js"></script>
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
