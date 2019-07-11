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

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-md-3">
        <h1 class="my-2" style="visibility: hidden">Shop Name</h1>
        <div class="list-group">
          <button type="button" name="button" class="btn"><a href="Admin_login?admin_page=1" class="list-group-item">Home</a></button>
          <button type="button" name="button" class="btn"><a href="News?admin_page=2" class="list-group-item">News</a></button>
          <button type="button" name="button" class="btn"><a href="Shop?admin_page=3" class="list-group-item">Shop</a></button>
          <button type="button" name="button" class="btn "><a href="Indexs?page_no=10" class="list-group-item"><strong><mark>Exit</mark></strong></a></button>
          <!-- Search Widget -->
          <?php $admin_no = $this->session->userdata('admin_no');echo "<script>console.log( 'admin_no: " . $admin_no . "' );</script>";?>
          <?php if($admin_no=='1'): ?>
          <button type="button" name="button" class="btn" data-toggle="modal" data-target="#myModal"><a href="#" class="list-group-item">InsertNews</a></button>

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
          <?php endif; ?>
        </div>

      </div>

      <!-- Blog Entries Column -->
      <div class="col-md-9">

        <h1 class="my-4">Admin News

        </h1>

        <!-- Blog Post -->
        <?php $admin_no = $this->session->userdata('admin_no');echo "<script>console.log( 'admin_no: " . $admin_no . "' );</script>";?>
        <?php if(isset($data)): ?>
        <?php foreach ($data as $value):?>
        <div class="card mb-4" id="<?php echo $value->news_idx;?>y">
          <div class="card-header card-white text-black p-2">
            <img class="card-img-top img-responsive img-circle" src="application/about/img/flag.png" alt="" style="width: auto; height: 30px;">
            <span class="title" style="margin-left:20px; font-weight:bold"><?php echo $value->news_title;?></span>
            <?php if($admin_no=='1'):?>
              <a href="Admin_news?check=2&news_idx=<?php echo $value->news_idx;?>"><span class="fas fa-trash fa-lg text-black check" id="delete" style="float: right; padding: 5px"></span></a>
              <a href="Admin_news?check=1&news_idx=<?php echo $value->news_idx;?>"><span class="fas fa-pencil-alt fa-lg text-black check" id="modify" style="float: right;padding: 5px"></span></a>
            <?php endif; ?>
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
              <div class="card-good p-2" id="<?php echo $value->news_idx;?>a" >
                  <p class="card-text">좋아요<?php echo $value->new_like;?>개</p>
              </div>
            <div class="card-body p-1">
            <?php echo $value->news_ex;?>
            <a href="#" class="p-2">Read More &rarr;</a>
            </div>

        </div>
      <?php endforeach; ?>
      <?php endif; ?>
      </div>

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

  <!-- Bootstrap core JavaScript -->
  <script src="application/news/vendor/jquery/jquery.min.js"></script>
  <script src="application/news/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="static/lib/ckeditor/ckeditor.js"></script>
  <script type="text/javascript">
  "<?php $admin_no = $this->session->userdata('admin_no');?>";
  "<?php if($admin_no=='1'):?>";
  CKEDITOR.replace('news_ex');
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



    $('#copy-url').on('click',function(){

      $('#myInput').select();
      document.execCommand("Copy");
      alert('복사완료');
      // var obShareUrl = document.getElementById("myInput");
      // // alert(obShareUrl);
      // obShareUrl.select();
      // document.execCommand("Copy");
      // // obShareUrl.blur();
      // alert('복사완료');

    });



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
