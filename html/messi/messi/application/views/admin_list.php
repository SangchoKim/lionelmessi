<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin_Page</title>

  <!-- Font Awesome Icons -->
  <link href="application/index/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
  <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>

  <!-- Plugin CSS -->
  <link href="application/index/vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

  <!-- Theme CSS - Includes Bootstrap -->
  <link href="application/index/css/creative.min.css" rel="stylesheet">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
  <!------ Include the above in your HEAD tag ---------->
</head>
  <body>

    <div class="container">
      <h1>Admin 관리자 페이지</h1>
      <div class="row">
    <div class="col-md-3">
      <h1 class="my-2" style="visibility: hidden">Shop Name</h1>
      <div class="list-group">
        <button type="button" name="button" class="btn"><a href="Admin_login?admin_page=1" class="list-group-item">Home</a></button>
        <button type="button" name="button" class="btn"><a href="News?admin_page=2" class="list-group-item">News</a></button>
        <button type="button" name="button" class="btn"><a href="Shop?admin_page=3" class="list-group-item">Shop</a></button>
        <button type="button" name="button" class="btn "><a href="Indexs?page_no=10" class="list-group-item"><strong><mark>Exit</mark></strong></a></button>
      </div>
    </div>
  <div class="col-md-9">

     <table class="table table-board">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Email</th>
                          <th>Name</th>
                          <th>Authority</th>
                          <th>Suspend</th>
                          <th>Regi_date</th>
                      </tr>
                  </thead>

                  <?php $email_idxs = $this->session->userdata('email_idx');echo "<script>console.log( 'email_idx: " . $email_idxs . "' );</script>";?>
                  <?php if(isset($data)): ?>
                  <?php foreach ($data as $value):?>
                  <form class="" action="Admin_autor" method="post" >
                  <tbody>
                      <tr>
                          <td><?php echo $value->email_idx;?></td>
                          <td><?php  if($value->email_idx==$email_idxs):?>
                            <mark><strong><?php echo $value->user_email;?></strong></mark>
                          <?php endif; ?>
                          <?php  if($value->email_idx!=$email_idxs):?>
                            <?php echo $value->user_email;?>
                          <?php endif; ?>
                        </td>
                          <input type="hidden" name="user_email" value="<?php echo $value->user_email;?>">
                          <td><?php echo $value->user_name;?></td>
                          <td><?php  if($value->auto_login==1&&$value->email_idx!=$email_idxs):?><select name="author">
                            <option id="amin" value="1" selected>관리자</option>
                            <option id="user" value="0">유저</option><input id="<?php echo $value->email_idx;?>a" class="btn btn-danger pull-right" type="submit" name="submit" value="수정하기">
                          </select><?php endif; ?><?php  if($value->auto_login!=1&&$value->email_idx!=$email_idxs):?><select name="author">
                            <option id="user" value="0" selected>유저</option>
                            <option id="amin" value="1">관리자</option><input id="<?php echo $value->email_idx;?>a" class="btn btn-danger pull-right" type="submit" name="submit" value="수정하기">
                          </select><?php endif; ?></td>
                          <td><?php  if($value->user_suspend==1&&$value->auto_login!=1):?><select name="suspend" id="<?php echo $value->email_idx;?>suspend">
                            <option id="suspend" value="1" selected>Suspend</option>
                            <option id="unsuspend_user" value="0">Working</option><input id="<?php echo $value->email_idx;?>b" class="btn btn-danger pull-right" type="submit" name="submit" value="수정하기">
                          </select><?php endif; ?><?php  if($value->user_suspend!=1&&$value->auto_login!=1):?><select name="suspend" id="<?php echo $value->email_idx;?>suspend">
                            <option id="unsuspend_user" value="0" selected>Working</option>
                            <option id="suspend" value="1">Suspend</option><input id="<?php echo $value->email_idx;?>b" class="btn btn-danger pull-right" type="submit" name="submit" value="수정하기">
                          </select><?php endif; ?></td>
                          <td><?php echo date('M j Y g:i A', strtotime($value->regi_date));?></td>
                      </tr>
                  </tbody>
                  </form>
                <?php endforeach; ?>
                <?php endif; ?>
              </table>


  </div>
</div>
</div>
<!-- 모달창 정지 사유 -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- Bootstrap core JavaScript -->
<script src="application/news/vendor/jquery/jquery.min.js"></script>
<script src="application/news/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="static/lib/ckeditor/ckeditor.js"></script>
<script type="text/javascript">
"<?php if(isset($data)): ?>";
"<?php foreach ($data as $value):?>";

$('<?php echo "#".$value->email_idx;?>b').on('click',function(){
  if($('<?php echo "#".$value->email_idx;?>suspend').val()=="1"){
    // suspend 선택시
    if(confirm('정말 회원정지를 하시겠습니까?')==true){
      // 나중에 하기
    }else {
      return false;
    }
  }else {
    // Working 선택시
    if(confirm('정말 회원정지를 해제 하시겠습니까?')==true){

    }else {
      return false;
    }
  }
})
"<?php endforeach; ?>";
"<?php endif; ?>";

</script>
  </body>

</html>
