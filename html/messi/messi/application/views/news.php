<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lionel Messi</title>

  <!-- Bootstrap core CSS -->
  <link href="application/news/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Icons -->
  <link href="application/index/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template -->
  <link href="application/news/css/blog-home.css" rel="stylesheet">




</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" style="background-color: #800080;">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="Indexs?page_no=10" style="color:#FFFFFF;font-weight:bold">Lionel Messi</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto my-2 my-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="about?page_no=1"  style="color:#FFFFFF;font-weight:bold" >About
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="News?page_no=2" style="color:#FFFFFF;font-weight:bold" >News</a>
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

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Recent News
          <small>-Lionel Messi- </small>
        </h1>

        <!-- Blog Post -->
        <?php $admin_no = $this->session->userdata('admin_no');echo "<script>console.log( 'admin_no: " . $admin_no . "' );</script>";?>
        <?php if(isset($data)): ?>
        <?php foreach ($data as $value):?>
        <div class="card mb-4" id="<?php echo $value->news_idx;?>y">
          <div class="card-header card-white text-black p-2">
            <img class="card-img-top img-responsive img-circle" src="application/about/img/flag.png" alt="" style="width: auto; height: 30px;">
            <span class="title" style="margin-left:20px; font-weight:bold"><?php echo $value->news_title;?></span>

            <div class="pull-right">
              <?php if(isset($user)): ?>
              <?php foreach ($user as $some):?>
              <?php if($value->email_idx==$some->email_idx): ?>
              <?php $email = $some->user_email; $id = explode('@',$email); ?>
              <span class="data" style="float: right; font-weight:bold; font-size: 14px"> written by <?php echo $id[0];?></span>
              <?php endif; ?>
              <?php endforeach; ?>
              <?php endif; ?>
              <span class="data" style="float: right; font-style:italic"><?php echo date('M j Y g:i A', strtotime($value->news_date));?>&nbsp&nbsp</span>
            </div>
          </div>
          <?php $news_images = $value->news_image; echo "<script>console.log( 'news_image: " . $news_images . "' );</script>";?>
          <!-- 동영상인 경우 -->
          <?php if(isset($news_images)):?>
          <?php $id = explode('.',$news_images); ?>
          <?php if($id[1]=="mp4"||$id[1]=="wav"):?>
          <video class="img-responsive img-thumbnail" src="static/news/<?php echo $news_images;?>" controls muted poster="posterimage.jpg"></video>
          <?php endif; ?>
          <?php endif; ?>
          <!-- 이미지가 있는 경우 -->
          <?php if(isset($news_images)):?>
          <?php $id = explode('.',$news_images); ?>
          <?php if($id[1]=="jpg"||$id[1]=="png"||$id[1]=="gif"||$id[1]=="jpeg"):?>
          <img class="card-img-top img-responsive img-thumbnail" src="static/news/<?php echo $news_images;?>" alt="static/news/noimg.jpg">
          <?php endif; ?>
          <?php endif; ?>
          <!-- 이미지가 없는 경우 -->
          <?php if(!isset($news_images)):?>
          <?php $id = explode('.',$news_images); ?>
          <img class="card-img-top img-responsive img-thumbnail" src="static/news/noimg.jpg" alt="static/news/noimg.jpg">
          <?php endif; ?>
            <div class="card-icon">
              <!-- 좋이요 -->
              <?php $this->load->helper('cookie'); ?>
              <?php if(get_cookie($value->news_idx)!=null||get_cookie($value->news_idx)!=''): ?>
              <?php if(get_cookie($value->news_idx)==$value->news_idx): echo "<script>console.log( 'get_cookie: " .get_cookie($value->news_idx) . "' );</script>";?>
              <button type="button" id = "<?php echo $value->news_idx;?>" value="<?php echo $value->news_idx;?>" class="btn" name="button"><i class="fas fa-heart fa-lg text-danger" id="<?php echo $value->news_idx;?>b"></i></button>
              <?php endif; ?>
              <?php endif; ?>
              <?php if(get_cookie($value->news_idx)==null||get_cookie($value->news_idx)==''): ?>
              <button type="button" id = "<?php echo $value->news_idx;?>" value="<?php echo $value->news_idx;?>" class="btn" name="button"><i class="fas fa-heart fa-lg text-black" id="<?php echo $value->news_idx;?>b"></i></button>
              <?php endif; ?>
              <!-- 좋이요 끝 -->
              <!-- 댓글 모달창 -->
              <button type="button" id ="<?php echo $value->news_idx;?>com" value="<?php echo $value->news_idx;?>" data-toggle="modal" data-target="#comment<?php echo $value->news_idx;?>" class="btn" name="button"><i class="fas fa-comment fa-lg text-black p-2"></i></button>
              <!-- 댓글 모달창 끝 -->
              <!-- 공유 시작 -->
              <button type="button" id = "<?php echo $value->news_idx;?>" value="<?php echo $value->news_idx;?>" data-toggle="modal" data-target="#share<?php echo $value->news_idx;?>" class="btn" name="button"><i class="fas fa-share-alt fa-lg text-black p-2"></i></button>
              <!-- 공유 끝 -->
              <!-- tag save -->
              <?php if(get_cookie($value->news_idx.'1000')!=null||get_cookie($value->news_idx.'1000')!=''): ?>
              <?php if(get_cookie($value->news_idx.'1000')==$value->news_idx): echo "<script>console.log( 'get_cookie: " .get_cookie($value->news_idx) . "' );</script>";?>
              <button type="button" id = "<?php echo $value->news_idx;?>tag" value="<?php echo $value->news_idx;?>" class="btn " name="button"><i class="fas fa-tag fa-lg text-danger p-2 pull-right" id="<?php echo $value->news_idx;?>i"></i></button>
              <?php endif; ?>
              <?php endif; ?>
              <?php if(get_cookie($value->news_idx.'1000')==null||get_cookie($value->news_idx.'1000')==''): ?>
              <?php $email = $this->session->userdata('email'); $id = explode('@',$email); ?>
              <button type="button" id = "<?php echo $value->news_idx;?>tag" value="<?php echo $value->news_idx;?>" class="btn " name="button"><i class="fas fa-tag fa-lg text-black p-2 pull-right" id="<?php echo $value->news_idx;?>i"></i></button>
              <?php endif; ?>
              <!-- tag save 끝-->
              </div>
              <div class="card-good p-2" id="<?php echo $value->news_idx;?>a" >
                  <p class="card-text">좋아요<?php echo $value->new_like;?>개</p>
              </div>
            <hr color='black'>
            <div class="card-body p-1" id="<?php echo $value->news_idx;?>re1" style="display: -webkit-box; display: -ms-flexbox; display: box; margin-top:1px; max-height:29px; overflow:hidden; vertical-align:top; text-overflow: ellipsis; word-break:break-all; -webkit-box-orient:vertical; -webkit-line-clamp:3">
            <?php echo $value->news_ex;?>
            </div>
            <div class="card-body p-1" id="<?php echo $value->news_idx;?>re2" style="display:none">
            <?php echo $value->news_ex;?>
            </div>

            <div class="card-body p-1">
              <button type="button" id="<?php echo $value->news_idx;?>re" class="btn" name="button" style="">Read More &rarr;</button>
              <hr color='black'>
            </div>
            <div class="card-comment" id="<?php echo $value->news_idx;?>g">

            </div>
            <?php if(isset($comment)): ?>
            <?php if(isset($user)): ?>
            <?php foreach ($comment as $item):?>
            <?php foreach ($user as $some):?>
            <?php if($item->news_idx==$value->news_idx&&$item->email_idx==$some->email_idx): ?>
            <div class="card-comment" style="margin-left:20">
              <?php $email = $some->user_email; $id = explode('@',$email); ?>
              <span class="m-2"><strong><?php echo $id[0];?>:</strong>&nbsp&nbsp<?php echo $item->comment;?></span>&nbsp&nbsp&nbsp&nbsp<span style="font-size:10px; font-style:italic"><?php echo date('M j Y g:i A', strtotime($item->comment_date));?></span>
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
          <?php endforeach; ?>
            <?php endif; ?>
            <tfoot class="text-center" id="tfoots">
                <tr>
                    <th colspan="5" id="pagination"><?php echo $pagination;?></th>
                </tr>
            </tfoot>
            <?php endif; ?>
            <hr color='black'>


          <div class="card-footer text-muted">
            <input type="text" name="comment" id="<?php echo $value->news_idx;?>e" placeholder="댓글 달기..." size="65">
            <button id="<?php echo $value->news_idx;?>f" type="button" name="submit" class="btn btn-white" style="color:#800080; font-weight:bold">게시</button>
          </div>
        </div>
      <?php endforeach; ?>
      <?php endif; ?>
      </div>



  <!-- 관리자인 경우 new를 추가할 수 있는 버튼 추가 -->

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">
        <!-- Search Widget -->
        <?php $admin_no = $this->session->userdata('admin_no');echo "<script>console.log( 'admin_no: " . $admin_no . "' );</script>";?>
        <?php if($admin_no=='1'): ?>
        <div class="card my-4 f-2 text-center">
          <div class="wrapper fadeInDown">
        <!-- <div id="formContent">
          <div class="pull-right">
          <a href="#"><button type="button" class="btn" data-toggle="modal" data-target="#myModal">InsertNews</button></a>
          </div>
        </div> -->
      </div>
      <!-- insert modal -->
      <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <!-- modal head -->
            <div class="modal-header">
              <h4 class="modal-title" style="font-size: 20px; font-weight = bold"><mark>InsertNews</mark></h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
              <!-- modal body -->
            <div class="modal-body">
                  <form action="Insert_news" method="post" class="form" enctype="multipart/form-data">
                    <input type="hidden" name="check" value="20">
                    <div class="form-group">
                      <input type="text" id="news_title" name="news_title" class="form-control" placeholder="news_title">
                    </div>
                    <div id="id-check"></div>
                    <div class="form-group">
                      <textarea id="news_ex" name="news_ex" rows="8" cols="77" class="form-control" placeholder="news_ex"></textarea>
                      <!-- <input type="text" id="news_ex" name="news_ex" class="form-control" placeholder="news_ex"> -->
                    </div>
                    <div class="form-group">
                      <input type="file" id="news_image" name="news_image" class="form-control">
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn" id="checkbtn" >Insert_news</button>
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


        </div>
        <?php endif; ?>

        <!-- Ranking -->
        <div class="card my-4">
          <h5 class="card-header">Ranking</h5>
          <div class="card-body">
            <div class="row">
              <?php $num = 1;?>
              <table class="table table-striped">
                           <thead>
                               <tr>
                                   <th>No</th>
                                   <th>Title</th>
                                   <th>Like</th>
                                   <th>Author</th>
                               </tr>
                           </thead>
                           <?php if(isset($ranking)): ?>
                          <?php if(isset($user)): ?>
                           <?php foreach ($ranking as $value):?>
                            <?php foreach ($user as $some):?>
                              <?php if($value->email_idx==$some->email_idx): ?>
                              <?php $email = $some->user_email; $id = explode('@',$email); ?>
                           <tbody>
                               <tr>
                                   <td><?php echo $num;
                                                  $num +=1;?></td>
                                   <td><?php echo $value->news_title;?></td>
                                   <td><?php echo $value->new_like;?></td>
                                   <td><?php echo $id[0];?></td>
                               </tr>
                           </tbody>
                           <?php endif; ?>
                          <?php endforeach; ?>
                         <?php endforeach; ?>
                         <?php endif; ?>
                        <?php endif; ?>

                       </table>
            </div>
          </div>
        </div>
        </div>


        <?php if(isset($data)): ?>
        <?php foreach ($data as $value):?>
        <!-- 댓글 modal -->
        <div class="modal fade" id="comment<?php echo $value->news_idx;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <!-- modal head -->
              <div class="modal-header">
                <h4 class="modal-title" style="font-size: 20px; font-weight = bold"><mark>댓글들</mark></h4>
                  <button type="button" class="close" data-dismiss="modal"></button>
              </div>
                <!-- modal body -->
              <div class="modal-body">
                    <div class="container">
                      <div class="row">
                          <div class="col-md-6">
                            <!-- 이미지 -->
                            <?php $news_images = $value->news_image; echo "<script>console.log( 'news_image: " . $news_images . "' );</script>";?>
                            <!-- 동영상인 경우 -->
                            <?php if(isset($news_images)):?>
                            <?php $id = explode('.',$news_images); ?>
                            <?php if($id[1]=="mp4"||$id[1]=="wav"):?>
                            <video class="img-responsive img-thumbnail" src="static/news/<?php echo $news_images;?>" controls muted poster="posterimage.jpg"></video>
                            <?php endif; ?>
                            <?php endif; ?>
                            <!-- 이미지가 있는 경우 -->
                            <?php if(isset($news_images)):?>
                            <?php $id = explode('.',$news_images); ?>
                            <?php if($id[1]=="jpg"||$id[1]=="png"||$id[1]=="gif"||$id[1]=="jpeg"):?>
                            <img class="card-img-top img-responsive img-thumbnail" src="static/news/<?php echo $news_images;?>" alt="static/news/noimg.jpg">
                            <?php endif; ?>
                            <?php endif; ?>
                            <!-- 이미지가 없는 경우 -->
                            <?php if(!isset($news_images)):?>
                            <?php $id = explode('.',$news_images); ?>
                            <img class="card-img-top img-responsive img-thumbnail" src="static/news/noimg.jpg" alt="static/news/noimg.jpg">
                            <?php endif; ?>
                          </div>
                          <div class="col-md-6">
                            <!-- 댓글-->
                            <?php if(isset($comment)): ?>
                            <?php if(isset($user)): ?>
                            <?php foreach ($comment as $item):?>
                            <?php foreach ($user as $some):?>
                            <?php if($item->news_idx==$value->news_idx&&$item->email_idx==$some->email_idx): ?>
                            <div>
                              <?php $email = $some->user_email; $id = explode('@',$email); ?>
                              <?php if(isset($item->comment)): ?>
                              <span><strong><?php echo $id[0];?>:</strong>&nbsp&nbsp<?php echo $item->comment;?></span><span style="font-size:10px; font-style:italic; float:right"><?php echo date('M j Y g:i A', strtotime($item->comment_date));?></span>
                              <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <?php endforeach; ?>
                          <?php endforeach; ?>
                            <?php endif; ?>
                            <?php endif; ?>
                            <div class="form-group">
                            </div>
                          </div>
                      </div>
                    </div>
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

      <?php if(isset($data)): ?>
      <?php foreach ($data as $value):?>
      <!-- share modal -->
      <div class="modal fade" id="share<?php echo $value->news_idx;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <!-- modal head -->
            <div class="modal-header">
              <h4 class="modal-title" style="font-size: 20px; font-weight = bold"><mark>URL 공유</mark></h4>
                <button type="button" class="close" data-dismiss="modal"></button>
            </div>
              <!-- modal body -->
            <div class="modal-body">
                  <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                          <!-- 이미지 -->
                          <?php $news_images = $value->news_image; echo "<script>console.log( 'news_image: " . $news_images . "' );</script>";?>
                          <!-- 동영상인 경우 -->
                          <?php if(isset($news_images)):?>
                          <?php $id = explode('.',$news_images); ?>
                          <?php if($id[1]=="mp4"||$id[1]=="wav"):?>
                          <video class="img-responsive img-thumbnail" src="static/news/<?php echo $news_images;?>" controls muted autoplay poster="posterimage.jpg"></video>
                          <?php endif; ?>
                          <?php endif; ?>
                          <!-- 이미지가 있는 경우 -->
                          <?php if(isset($news_images)):?>
                          <?php $id = explode('.',$news_images); ?>
                          <?php if($id[1]=="jpg"||$id[1]=="png"||$id[1]=="gif"||$id[1]=="jpeg"):?>
                          <img class="card-img-top img-responsive img-thumbnail" src="static/news/<?php echo $news_images;?>" alt="static/news/noimg.jpg">
                          <?php endif; ?>
                          <?php endif; ?>
                          <!-- 이미지가 없는 경우 -->
                          <?php if(!isset($news_images)):?>
                          <?php $id = explode('.',$news_images); ?>
                          <img class="card-img-top img-responsive img-thumbnail" src="static/news/noimg.jpg" alt="static/news/noimg.jpg">
                          <?php endif; ?>
                        </div>
                        <div class="col-md-12">
                          <!-- URL 뿌려주기 -->
                          <h3 class="p-3">URL 주소</h3>
                          <div>
                            <input id="<?php echo $value->news_idx;?>myinput" type="text" name="url" size="37" value="http://localhost/messi/News?news_idx=<?php echo $value->news_idx;?>" readonly><button class="btn" id="<?php echo $value->news_idx;?>copy-url"><i class="fas fa-pencil-alt fa-lg text-black check p-2" id="copy-url"></i></button>                        </div>
                          <div class="form-group">
                          </div>
                        </div>
                    </div>
                  </div>
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




        <!-- Side Widget -->
        <!-- <div class="card my-4">
          <h5 class="card-header">Side Widget</h5>
          <div class="card-body">
            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
          </div>
        </div> -->

       <!-- </div> -->

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5" style="color:#800080">
    <div class="container">
      <div class="small text-center text-muted" style="font-weight:bold">Copyright &copy; 2019 - Lionel Messi</div>
    </div>
  </footer>
  <?php $this->load->helper('cookie'); ?>
  <?php if(get_cookie('shop_idx')){
    echo '<input type="hidden" name="" id="do_check" value="1">';
    // echo '<input type="button" name=" id="do_check" value="1">';
  } ?>

  <!-- Bootstrap core JavaScript -->
  <script src="application/news/vendor/jquery/jquery.min.js"></script>
  <script src="application/cookie/jquery.cookie.js"></script>
  <script src="application/news/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="static/lib/ckeditor/ckeditor.js"></script>
  <script type="text/javascript">
  "<?php $admin_no = $this->session->userdata('admin_no');?>";
  "<?php if($admin_no=='1'):?>";
  CKEDITOR.replace('news_ex');
  CKEDITOR.editorConfig = function( config ) {
    config.enterMode = CKEDITOR.ENTER_BR
};
  "<?php endif; ?>";

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

  "<?php if(isset($data)): ?>";
  "<?php foreach ($data as $value):?>";

  // html dom 이 다 로딩된 후 실행된다.
  $(document).ready(function(){
      // memu 클래스 바로 하위에 있는 a 태그를 클릭했을때
      $("<?php echo "#".$value->news_idx;?>re").click(function(){
          // 현재 클릭한 태그가 a 이기 때문에
          // a 옆의 태그중 ul 태그에 hide 클래스 태그를 넣던지 빼던지 한다.
          $("<?php echo "#".$value->news_idx;?>re1").hide();
          $("<?php echo "#".$value->news_idx;?>re2").slideToggle("fest");
      });
  });

  "<?php endforeach; ?>";
  "<?php endif; ?>";

  // 좋아요 기능
  "<?php if(isset($data)): ?>";
  "<?php foreach ($data as $value):?>";
    var isRun<?php echo $value->news_idx;?> = 1;
    $('<?php echo "#".$value->news_idx;?>').on('click',function(){
      var news_idx = $('<?php echo "#".$value->news_idx;?>').val();
      var num = $('<?php echo "#".$value->news_idx;?>a').val();
      var value = 1;
      // alert(news_idx);
      if(isRun<?php echo $value->news_idx;?>==1){
        $.ajax({
            type : "POST",
            url : "Good",
            data : {
            "comment" : value,
            "news_idx" : news_idx,
            "num" : num,
            "check" : 1
					},
          success : function(data) {
						console.log(data);
            var count = JSON.parse(data);
            var result = count.new_like;
            // console.log(count);
            console.log(result);
            // "var_dump(json_decode($data, true));"
						// var jo = jQuery.parseJSON(data);

						$('<?php echo "#".$value->news_idx;?>a').text("좋아요").append(result).append("개");
            $('<?php echo "#".$value->news_idx;?>b').css('color','red');
            isRun<?php echo $value->news_idx;?> = 2;
					}
        })
      }else if (isRun<?php echo $value->news_idx;?>==2) {
        $.ajax({
            type : "POST",
            url : "Good",
            data : {
            "comment" : value,
            "news_idx" : news_idx,
            "num" : num,
            "check" : 2
					},
          success : function(data) {
						console.log(data);
            var count = JSON.parse(data);
            var result = count.new_like;
            // console.log(count);
            console.log(result);
            // "var_dump(json_decode($data, true));"
						// var jo = jQuery.parseJSON(data);
						$('<?php echo "#".$value->news_idx;?>a').text("좋아요").append(result).append("개");
            $('<?php echo "#".$value->news_idx;?>b').css('color','black');
            isRun<?php echo $value->news_idx;?> = 1;
					}
        })
      }
    })
    "<?php endforeach; ?>";
    "<?php endif; ?>";
// 댓글기능
    "<?php if(isset($data)): ?>";
    "<?php foreach ($data as $value):?>";

    $('<?php echo "#".$value->news_idx;?>f').on('click',function(){
      var value = 2;
      var news_idx = $('<?php echo "#".$value->news_idx;?>').val();
      var state = $('<?php echo "#".$value->news_idx;?>e').val();
      // alert(state);
        $.ajax({
            type : "POST",
            url : "Good",
            data : {
						"comment" : value,
            "state" : state,
            "news_idx" : news_idx
					},
          success : function(data) {
						console.log(data);
						// var jo = jQuery.parseJSON(data);
						$('<?php echo "#".$value->news_idx;?>g').text(data);
            $('<?php echo "#".$value->news_idx;?>g').css('margin-left',20);
            $('<?php echo "#".$value->news_idx;?>e').val("");
					}
        })
    })
    "<?php endforeach; ?>";
    "<?php endif; ?>";

    // save 기능
    "<?php if(isset($data)): ?>";
    "<?php foreach ($data as $value):?>";
    <?php $this->load->helper('cookie'); $cookie = get_cookie($value->news_idx); echo $cookie; ?>
    <?php if(isset($cookie)): ?>;
      var isrun<?php echo $value->news_idx;?> = 2;
    <?php endif; ?>;
      var isrun<?php echo $value->news_idx;?> = 1;
    $('<?php echo "#".$value->news_idx;?>tag').on('click',function(){
      var value = 5;
      var news_idx = $('<?php echo "#".$value->news_idx;?>').val();
      // alert(news_idx);
      if(isrun<?php echo $value->news_idx;?>==1){
      $.ajax({
          type : "POST",
          url : "Good",
          data : {
          "comment" : value,
          "news_idx" : news_idx,
          "check" : 1
        },
        success : function(data) {
          // alert(data);
          console.log(data);
          var count = JSON.parse(data);
          if(count=='1'){
            alert("저장완료");
            $('<?php echo "#".$value->news_idx;?>i').css('color','red');
            isrun<?php echo $value->news_idx;?> = 2;
          }else {
            alert('이미 저장되어 있습니다.');
          }
        }
      })
    }else if (isrun<?php echo $value->news_idx;?>==2) {
      $.ajax({
          type : "POST",
          url : "Good",
          data : {
          "comment" : value,
          "news_idx" : news_idx,
          "check" : 2
        },
        success : function(data) {
          // alert(data);
          console.log(data);
          var count = JSON.parse(data);
          if(count=='1'){
            alert("저장이 취소되었습니다.");
            $('<?php echo "#".$value->news_idx;?>i').css('color','black');
            isrun<?php echo $value->news_idx;?> = 1;
          }else {
            alert('이미 저장되어 있습니다.');
          }
        }
      })

    }
    })
    "<?php endforeach; ?>";
    "<?php endif; ?>";


    "<?php if(isset($data)): ?>";
    "<?php foreach ($data as $value):?>";
    $('<?php echo "#".$value->news_idx;?>copy-url').on('click',function(){

      $('<?php echo "#".$value->news_idx;?>myinput').select();
      document.execCommand("Copy");
      alert('복사완료');
    });
    "<?php endforeach; ?>";
    "<?php endif; ?>";



    // 나중에 하기
    // "<?php if(isset($data)): ?>";
    // "<?php foreach ($data as $value):?>";
    // // 댓글 페이징
    // $('<?php echo "#".$value->news_idx;?>y').children('#page').on('click',function(){
    //
    //   var urls = $('<?php echo "#".$value->news_idx;?>y').children('#page').children('a').attr('href');
    //     // alert($('<?php echo "#".$value->news_idx;?>y').children('#page').children('a').attr('href'));
    //     var urlex = urls.split('/');
    //     var url = urlex[4];
    //     alert(url);
    //     $.ajax({
    //         type : "GET",
    //         url : url,
    //         data : {
    //         "url" : url,
    //         "check" : 10
    //       },
    //       success : function(data) {
    //         alert(data);
    //         console.log(data);
    //         var count = JSON.parse(data);
    //         if(count=='1'){
    //           alert("저장이 취소되었습니다.");
    //           $('<?php echo "#".$value->news_idx;?>i').css('color','black');
    //           isrun<?php echo $value->news_idx;?> = 1;
    //         }else {
    //           alert('이미 저장되어 있습니다.');
    //         }
    //       }
    //     })
    //
    // });
    //
    //
    // "<?php endforeach; ?>";
    // "<?php endif; ?>";



  </script>
</body>

</html>
