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
    <title>Admin_Login</title>

  </head>

  <body id="body">

  <div class="wrapper fadeInDown">
      <div class="fadeIn first ">
        <img src="/common/image/logo.png" id="icon" alt="User Icon" class="img-rounded center-block img-responsive" width="auto" height="400px"/>
      </div>
  <div id="formContent">
    <div id="formFooter">
      <h3><strong>Admin-page</strong></h3>
    </div>
    <div id="formFooter">
      <p>이곳은 관리자 권한이 있는 사람들로 한해,<br> 접근이 가능한 페이지입니다.</p>
    </div>
    <div id="formFooter">
    <a href="#"><button type="button" class="btn" data-toggle="modal" data-target="#myModal">Admin_Login</button></a>
    </div>
  </div>
</div>
<!-- signup modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <!-- modal head -->
      <div class="modal-header">
        <h4 class="modal-title" style="font-size: 20px; font-weight = bold"><mark><strong>보안을 위해 비밀번호를 입력해주시기 바랍니다</strong></mark></h4>
          <button type="button" class="close" data-dismiss="modal"></button>
      </div>
        <!-- modal body -->
      <div class="modal-body">
            <form action="Admin_login" method="post" class="form">
              <input type="hidden" name="check" value="20">
              <div class="form-group">
                <input type="password" id="Password1" name="admin_password" class="form-control" placeholder="Password를 입력해주세요">
              </div>
              <div class="form-group">
                <input type="password" id="Password2" name="admin_password" class="form-control" placeholder="Password를 한번 더 입력해주세요">
              </div>
              <div id="confirm">

              </div>
              <div class="text-center">
                <button type="submit" class="btn" id="checkbtn" >Submit</button>
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
  <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script type="text/javascript">

  var isDuplicated = true;
  var isMatched = false;

  $('#Password1').change(function (event) {
        if ($('#Password1').val() != $('#Password2').val()) {
          $('#confirm').text('비밀번호가 일치하지 않습니다');
          $('#confirm').css('color', 'red');
          isMatched = false;
        }

        if ($('#Password1').val() == $('#Password2').val()) {
          $('#confirm').text('비밀번호가 일치합니다');
          $('#confirm').css('color', 'green');
          isMatched = false;
        }
      })

      $('#Password2').change(function (event) {
        if ($('#Password1').val() != $('#Password2').val()) {
          $('#confirm').text('비밀번호가 일치하지 않습니다');
          $('#confirm').css('color', 'red');
          isMatched = false;
        }

      if ($('#Password1').val() == $('#Password2').val()) {
          $('#confirm').text('비밀번호가 일치합니다');
          $('#confirm').css('color', 'green');
          isMatched = false;
        }
      })
  </script>

</html>
