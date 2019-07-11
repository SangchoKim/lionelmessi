<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="application/views/common/css/login.css">
    <!-- 합쳐지고 최소화된 최신 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- 부가적인 테마 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <!-- <link rel="text/javascript" href="application/js/login.js"> -->
    <title>Insert-News</title>

  </head>
  <body>
    <div class="wrapper fadeInDown">
  <div id="formContent">
    <div id="formFooter">
    <a href="#"><button type="button" class="btn" data-toggle="modal" data-target="#myModal">InsertNews</button></a>
    </div>
  </div>
</div>
<!-- signup modal -->
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
                <input type="text" id="news_ex" name="news_ex" class="form-control" placeholder="news_ex">
              </div>
              <div class="form-group">
                <input type="file" id="news_image" name="news_image" class="form-control">
              </div>
              <div class="text-center">
                <button type="submit" class="btn" id="checkbtn" >Signup</button>
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
  </body>
  <script src="static/lib/ckeditor/ckeditor.js"></script>
  <script type="text/javascript">

  </script>

</html>
