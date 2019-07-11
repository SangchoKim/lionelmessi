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
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!------ Include the above in your HEAD tag ---------->
</head>
  <body>

    <div class="container">
      <h1>Admin 관리자 페이지</h1>
      <div class="row">
    <div class="col-md-3">
      <h1 class="my-2" style="visibility: hidden">Shop Name</h1>
      <div class="list-group">
        <button type="button" name="button" class="btn"><a href="Admin_login?home=1" class="list-group-item">Home</a></button>
        <button type="button" name="button" class="btn"><a href="#" class="list-group-item">News</a></button>
        <button type="button" name="button" class="btn"><a href="Shop?admin_page=3" class="list-group-item">Shop</a></button>
      </div>
    </div>
  <div class="col-md-9">
<form class="" action="Admin_autor" method="post" >
     <table class="table table-board">
                  <thead>
                      <tr>
                          <th>No</th>
                          <th>Email</th>
                          <th>Name</th>
                          <th>Authority</th>
                          <th>Regi_date</th>
                      </tr>
                  </thead>
                  <?php if(isset($data)): ?>
                  <?php foreach ($data as $value):?>
                  <tbody>
                      <tr>
                          <td><?php echo $value->email_idx;?></td>
                          <td><?php echo $value->user_email;?></td>
                          <input type="hidden" name="user_email" value="<?php echo $value->user_email;?>">
                          <td><?php echo $value->user_name;?></td>
                          <td><?php  if($value->auto_login==1):?><select name="author">
                            <option id="amin" value="1" selected>관리자</option>
                            <option id="user" value="0">유저</option><input id="<?php echo $value->email_idx;?>a" class="btn btn-danger pull-right" type="submit" name="submit" value="수정하기">
                          </select><?php endif; ?><?php  if($value->auto_login!=1):?><select name="author">
                            <option id="user" value="0" selected>유저</option>
                            <option id="amin" value="1">관리자</option><input id="<?php echo $value->email_idx;?>a" class="btn btn-danger pull-right" type="submit" name="submit" value="수정하기">
                          </select><?php endif; ?></td>
                          <td><?php echo date('M j Y g:i A', strtotime($value->regi_date));?></td>
                      </tr>
                  </tbody>
                <?php endforeach; ?>
                <?php endif; ?>
              </table>
              </form>

  </div>
</div>
</div>
<script type="text/javascript">
"<?php if(isset($data)): ?>";
"<?php foreach ($data as $value):?>";

$('<?php echo "#".$value->email_idx;?>a').on('click',function(){



})
"<?php endforeach; ?>";
"<?php endif; ?>";

</script>
  </body>

</html>
