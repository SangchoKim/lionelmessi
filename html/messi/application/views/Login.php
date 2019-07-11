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
    <title>Login-Service</title>

  </head>
  <body id="bo">
    <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first ">
      <img src="/common/image/logo.png" id="icon" alt="User Icon" class="img-rounded center-block img-responsive" width="auto" height="180px"/>
    </div>

    <!-- Login Form -->
    <form action="Indexs" class="form_1" method="post" >
      <input type="text" id="l" class="fadeIn second" name="email" placeholder="Email">
      <input type="password" id="pass" class="fadeIn third" name="password" placeholder="Password">
      <div class="" id="admin"></div>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
    <a href="#" class="underlineHover"><button type="button" class="btn" data-toggle="modal" data-target="#myModal">Sign up</button></a>
    </div>
    <div id="formFooter">
      <button type="button" name="button" class="btn" data-toggle="modal" data-target="#pw_modal"><a class="underlineHover" href="#">Forgot Password?</a></button>
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
            <form action="Signin" method="post" class="form">
              <div class="form-group">
                <input type="text" id="email" name="email" class="form-control" placeholder="email">
              </div>
              <div id="id-check"></div>
              <div class="form-group">
                <input type="text" id="name" name="name" class="form-control" placeholder="name">
              </div>
              <div class="form-group">
                <input type="password" id="pw1" name="password" class="form-control" placeholder="password">
              </div>
              <div class="form-group">
                <input type="password" id="pw2" name="password" class="form-control" placeholder="re-password">
                <div id="confirm"></div>
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
<!-- Forgetpw modal -->
<div class="modal fade" id="pw_modal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
        <!-- modal head -->
      <div class="modal-header">
        <h4 class="modal-title" style="font-size: 20px; font-weight = bold"><mark>Find PW</mark></h4>
          <button type="button" class="close" data-dismiss="modal"></button>
      </div>
        <!-- modal body -->
      <div class="modal-body">
            <form action="#" method="post" class="form" id="form_pw" >
              <div class="form-group">
                <input type="text" id="emails" name="email" class="form-control" placeholder="email을 입력해주세요">
              </div>
              <div id="id-check"></div>
              <div class="form-group">
                <input type="text" id="names" name="names" class="form-control" placeholder="이름을 입력하세요">
              </div>
              <!-- <div class="form-group">
                <input type="password" id="pw2s" name="password" class="form-control" placeholder="password를 한번 더 입력하세요">
                <div id="confirms"></div>
              </div> -->
              <div class="form-group" id="email_auth">

              </div>
              <div class="form-group" id="pw_auth">

              </div>
              <div class="form-group" id="pw_auth1"></div>
              <div class="form-group" id="pw_auth2"></div>
              <div class="form-group" id="pw_auth_con"></div>


              <div class="text-center">
                <button type="submit" class="btn" id="check_pw" >Submit</button>
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
<script type="text/javascript">
var isDuplicated = true;
var isMatched = false;

$('#email').change(function (event) {
			$.ajax({
				type : "GET",
				url : "Signin?checkid=1",
				data : {
					"email" : $('#email').val(),
				},

				success : function(data) {
          console.log(data);
					if (data == "1") {
						$('#id-check').text('사용가능한 아이디입니다');
						$('#id-check').css('color', 'green');
						isDuplicated = false;
					} else {
						$('#id-check').text('중복되는 아이디입니다');
						$('#id-check').css('color', 'red');
						isDuplicated = true;
					}
				},
			});
		})

    $('#check_pw').click(function(){
      // $('#form_pw').submit();
    			$.ajax({
    				type : "POST",
    				url : "Forgetpw",
    				data : {
    					"email" : $('#emails').val(),
              "names" : $('#names').val()
    				},

    				success : function(data) {
              console.log(data);
              var check = JSON.parse(data);
              console.log(check);
              if(check==1){
                // 이메일 인증 할 수 있는 칸 활성화
                $('#email_auth').html('<button type="submit" id="auths" name="auths" class="btn btn-danger">이메일 인증하기</button>');
                $('#auths').click(function(){
                    // 이메일 인증칸 생기면서 알람창 생성
                    // alert('된겨');
                    // $('#auths').submit();
                    $.ajax({
              				type : "POST",
              				url : "Forgetpw/auth_pw",
              				data : {
              					"email" : $('#emails').val(),
                        "password" : $('#pw1s').val(),
                        "check" : 30
              				},
              				success : function(data) {
                        console.log(data);
                        var check = JSON.parse(data);
                        console.log(check);
                        if(check==1){
                        alert("전송완료. 이메일을 확인해주세요.", "/");
                        // 밑에 인증할 수 있는 칸 생성
                        $('#pw_auth').html('<input type="password" id="temp_pw" name="password" class="form-control" placeholder="임시비밀번호를 입력해주세요"><button type="submit" id="temp_bt" name="auths" class="btn btn-danger">임시비밀번호 확인</button>');
                        $('#temp_bt').click(function(){
                            // 임시비밀번호 확인
                            // alert('된겨');
                            var temp_pw = $('#temp_pw').val();
                            $.ajax({
                              type : "POST",
                              url : "Forgetpw/temp_pw",
                              data : {
                                "email" : $('#emails').val(),
                                "password" : temp_pw,
                                "check" : 50
                              },
                              success : function(data) {
                                console.log(data);
                                var check = JSON.parse(data);
                                console.log(check);
                                if(check==1){
                                  alert("새롭게 변경할 비밀번호를 입력해주세요", "/");
                                  $('#pw_auth1').html('<input type="password" id="temp_pw1" name="password" class="form-control" placeholder="새로운 비밀번호를 입력해주세요">');
                                  $('#pw_auth2').html('<input type="password" id="temp_pw2" name="password" class="form-control" placeholder="다시 한번 더 입력해주세요">');
                                  checked();
                                  showpw();

                                }else {
                                alert("비밀번호를 다시한번 확인해주세요.", "/");
                              }
                              },
                            });
                        })
                        }else {
                        alert("이메일로 전송을 실패 했습니다.", "/");
                      }
              				},
              			});
                })
              }else {
                // 오류
                alert('이메일과 비밀번호를 다시한번 확인해 주세요');
              }
    				},
    			});
    		})

        function showpw(){

          $('#check_pw').click(function(){
              // 임시비밀번호 업데이트
              // alert('된겨');
              var temp_pw1 = $('#temp_pw1').val();
              $.ajax({
                type : "POST",
                url : "Forgetpw/temp_pw",
                data : {
                  "email" : $('#emails').val(),
                  "password" : temp_pw1,
                  "check" : 70
                },
                success : function(data) {
                  console.log(data);
                  var check = JSON.parse(data);
                  console.log(check);
                  if(check==1){
                    alert('성공적으로 비밀번호를 변경하였습니다.');
                    location.href='http://localhost/messi/Login';
                    return;
                  }else {
                    alert('이메일과 비밀번호를 다시한번 확인해 주세요');
                    return;
                }
                },
              });
          })


        }





$('#pw1').change(function (event) {
			if ($('#pw1').val() != $('#pw2').val()) {
				$('#confirm').text('비밀번호가 일치하지 않습니다');
				$('#confirm').css('color', 'red');
				isMatched = false;
			}

			if ($('#pw1').val() == $('#pw2').val()) {
				$('#confirm').text('비밀번호가 일치합니다');
				$('#confirm').css('color', 'green');
				isMatched = false;
			}
		})

		$('#pw2').change(function (event) {
			if ($('#pw1').val() != $('#pw2').val()) {
				$('#confirm').text('비밀번호가 일치하지 않습니다');
				$('#confirm').css('color', 'red');
				isMatched = false;
			}

		if ($('#pw1').val() == $('#pw2').val()) {
				$('#confirm').text('비밀번호가 일치합니다');
				$('#confirm').css('color', 'green');
				isMatched = false;
			}
		})


    $('#pw1s').change(function (event) {
    			if ($('#pw1s').val() != $('#pw2s').val()) {
    				$('#confirms').text('비밀번호가 일치하지 않습니다');
    				$('#confirms').css('color', 'red');
    				isMatched = false;
    			}

    			if ($('#pw1s').val() == $('#pw2s').val()) {
    				$('#confirms').text('비밀번호가 일치합니다');
    				$('#confirms').css('color', 'green');
    				isMatched = false;
    			}
    		})

    		$('#pw2s').change(function (event) {
    			if ($('#pw1s').val() != $('#pw2s').val()) {
    				$('#confirms').text('비밀번호가 일치하지 않습니다');
    				$('#confirms').css('color', 'red');
    				isMatched = false;
    			}

    		if ($('#pw1s').val() == $('#pw2s').val()) {
    				$('#confirms').text('비밀번호가 일치합니다');
    				$('#confirms').css('color', 'green');
    				isMatched = false;
    			}
    		})

function checked(){
    $('#temp_pw1').change(function (event) {
    			if ($('#temp_pw1').val() != $('#temp_pw2').val()) {
    				$('#pw_auth_con').text('비밀번호가 일치하지 않습니다');
    				$('#pw_auth_con').css('color', 'red');
    				isMatched = false;
    			}

    			if ($('#temp_pw1').val() == $('#temp_pw2').val()) {
    				$('#pw_auth_con').text('비밀번호가 일치합니다');
    				$('#pw_auth_con').css('color', 'green');
    				isMatched = false;
    			}
    		})

        $('#temp_pw2').change(function (event) {
    			if ($('#temp_pw1').val() != $('#temp_pw2').val()) {
    				$('#pw_auth_con').text('비밀번호가 일치하지 않습니다');
    				$('#pw_auth_con').css('color', 'red');
    				isMatched = false;
    			}

    		if ($('#temp_pw1').val() == $('#temp_pw2').val()) {
    				$('#pw_auth_con').text('비밀번호가 일치합니다');
    				$('#pw_auth_con').css('color', 'green');
    				isMatched = false;
    			}
    		})
      }


if($('#email').val() == ''){
    // 입력하지 않은 사람들 잡아내기
    $('.form_1').submit(function (event) {
      if ($('#l').val() == '') {
        alert('이메일을 입력해주세요');
        event.preventDefault();
      } else if ($('#pass').val() == '') {
        alert('비밀번호를 입력해주세요');
        event.preventDefault();
      }
    })
  }

    if($('#email').val() == ''){
    // 입력하지 않은 사람들 잡아내기
    $('.form').submit(function (event) {
			if ($('#email').val() == '') {
				// alert('이메일을 입력해주세요');
				event.preventDefault();
			} else if ($('#pw1').val() == '') {
				alert('비밀번호를 입력해주세요');
				event.preventDefault();
			} else if ($('#pw2').val() == '') {
				alert('비밀번호 확인을 입력해주세요');
				event.preventDefault();
			} else if ($('#name').val() == '') {
				alert('이름을 입력해주세요');
				event.preventDefault();
			}
		})
  }

// $('#icon').click(function(){
//   $('#admin').append(
//     '<a href="Admin_login"><button type="button" class="btn btn-danger" id="move">Admin_Login</button></a>'
//   );
// })



</script>
  </body>

</html>
