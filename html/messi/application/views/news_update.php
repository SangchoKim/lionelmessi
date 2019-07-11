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

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Update News
          <small>-Lionel Messi- </small>
        </h1>

        <!-- Blog Post -->
        <?php $admin_no = $this->session->userdata('admin_no');echo "<script>console.log( 'admin_no: " . $admin_no . "' );</script>";?>
        <?php if(isset($data)): ?>
        <?php foreach ($data as $value):?>
        <form class="" action="Admin_news" method="post" enctype="multipart/form-data">
        <input type="hidden" name="check" value="3">
        <input type="hidden" name="news_idx" value="<?php echo $value->news_idx;?>">
        <div class="card mb-4">
          <div class="card-header card-white text-black p-2">
            <img class="card-img-top img-responsive img-circle" src="application/about/img/flag.png" alt="" style="width: auto; height: 30px;">
            <input class="title" type="text" name="news_title" size="60" value="<?php echo $value->news_title;?>" style="margin-left:20px; font-weight:bold">
            <!-- <?php if($admin_no=='1'):?>
              <a href="Admin_news?check=2&news_idx=<?php echo $value->news_idx;?>"><span class="fas fa-trash fa-lg text-black check" id="delete" style="float: right; padding: 5px"></span></a>
              <a href="Admin_news?check=1&news_idx=<?php echo $value->news_idx;?>"><span class="fas fa-pencil-alt fa-lg text-black check" id="modify" style="float: right;padding: 5px"></span></a>
            <?php endif; ?> -->
            <div class="pull-right">
              <?php $email = $this->session->userdata('email'); $id = explode('@',$email); ?>
              <span class="data" style="float: right; font-weight:bold; font-size: 14px"> written by <?php echo $id[0];?></span>
              <span class="data" style="float: right; font-style:italic"><?php echo date('M j Y g:i A', strtotime($value->news_date));?>&nbsp&nbsp</span>
            </div>
          </div>
          <?php $news_images = $value->news_image; echo "<script>console.log( 'news_image: " . $news_images . "' );</script>";?>
          <!-- 동영상인 경우 -->
          <?php if(isset($news_images)):?>
          <?php $id = explode('.',$news_images); ?>
          <?php if($id[1]=="mp4"||$id[1]=="wav"):?>
          <video id="img" class="img-responsive img-thumbnail" src="static/news/<?php echo $news_images;?>" controls muted poster="posterimage.jpg"></video>
          <div class="form-group">
          <input type="file" id="news_image" name="news_image">
          </div>
          <?php endif; ?>
          <?php endif; ?>
          <!-- 이미지가 있는 경우 -->
          <?php if(isset($news_images)):?>
          <?php $id = explode('.',$news_images); ?>
          <?php if($id[1]=="jpg"||$id[1]=="png"||$id[1]=="gif"||$id[1]=="jpeg"):?>
          <img id="img" class="card-img-top img-responsive img-thumbnail" src="static/news/<?php echo $news_images;?>" alt="static/news/noimg.jpg">
          <div class="form-group">
          <input type="file" id="news_image" name="news_image">
          </div>
          <?php endif; ?>
          <?php endif; ?>
          <!-- 이미지가 없는 경우 -->
          <?php if(!isset($news_images)):?>
          <?php $id = explode('.',$news_images); ?>
          <img id="img" class="card-img-top img-responsive img-thumbnail" src="static/news/noimg.jpg" alt="static/news/noimg.jpg">
          <div class="form-group">
            <input type="file" id="news_image" name="news_image" class="form-control">
          </div>
          <?php endif; ?>
            <div class="card-icon">
              </div>
              <div class="card-good p-2" id="countlike">
              <!-- <p class="card-text">좋아요 30개</p> -->
              </div>
            <div class="card-body p-1">
            <textarea name="news_ex" rows="8" cols="77"><?php echo $value->news_ex;?></textarea>
            </div>
            <div class="card-footer text-muted">
            <button id="update" type="submit" name="submit" class="btn btn-white pull-right" style="color:#800080; font-weight:bold">수정</button>
            </div>
        </div>
        </form>
      <?php endforeach; ?>
      <?php endif; ?>
      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Bootstrap core JavaScript -->
  <script src="application/news/vendor/jquery/jquery.min.js"></script>
  <script src="application/cookie/jquery.cookie.js"></script>
  <script src="application/news/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="static/lib/ckeditor/ckeditor.js"></script>
  <script type="text/javascript">

  CKEDITOR.replace('news_ex');
  // 좋아요 기능
    $('#btnup').on('click',function(){
      var value = 1;
      if('up' == this.value){
        $.ajax({
            type : "GET",
            url : "Good?idx=0",
            data : {
						"btnup" : value
					},
          success : function(data) {
						console.log(data);
						// var jo = jQuery.parseJSON(data);
						$('#countlike').text(data);
            $('#liked').css('color','red');
					}
        })
      }
    })
// 댓글기능
    $('#comment').on('click',function(){
      var value = 2;
      var state = $('#state').val();
        $.ajax({
            type : "POST",
            url : "Good",
            data : {
						"comment" : value,
            "state" : state
					},
          success : function(data) {
						console.log(data);
						// var jo = jQuery.parseJSON(data);
						$('#commentlike').text(data);
            $('#commentlike').css('margin-left',20);
            $('#state').val("");
					}
        })
    })

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
