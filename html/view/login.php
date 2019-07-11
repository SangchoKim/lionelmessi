<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../common/css/login.css">
    <!-- 합쳐지고 최소화된 최신 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <!-- 부가적인 테마 -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
    <!-- 합쳐지고 최소화된 최신 자바스크립트 -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <title>Login-Service</title>
  </head>
  <body>
    <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first ">
      <img src="../common/image/logo.png" id="icon" alt="User Icon" class="img-rounded center-block img-embed-responsive" width="auto" height="180px"/>
    </div>

    <!-- Login Form -->
    <form>
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="login">
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
    <a href="#"><button type="button" class="btn" data-toggle="modal" data-target="#myModal">Sign up</button></a>
    </div>
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>
  </div>
</div>
<!-- signup modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <!-- modal head -->
      <div class="modal-header">
        <h4 class="modal-title" style="font-size: 20px; font-weight = bold"><mark>Sign Up</mark></h4>
          <button type="button" class="close" data-dismiss="modal"></button>
      </div>
        <!-- modal body -->
      <div class="modal-body">
            <form class="" action="../controler/signin/signin.php" method="POST">
              <div class="form-group">
                <input type="text" name="email" class="form-control"placeholder="email">
              </div>
              <div class="form-group">
                <input type="text" name="name" class="form-control"placeholder="name">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control"placeholder="password">
              </div>
              <div class="form-group">
                <input type="password" name="password" class="form-control"placeholder="re-password">
              </div>
              <div class="text-center">
                <button type="submit" class="btn" >Signup</button>
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
</html>
