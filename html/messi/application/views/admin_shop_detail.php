<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Lionel Messi</title>

  <!-- Font Awesome Icons -->
  <link href="../application/index/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Bootstrap core CSS -->
  <link href="../application/shopdetail/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../application/shopdetail/css/small-business.css" rel="stylesheet">

  <style media="screen">
  .starR{
      background: url('http://miuu227.godohosting.com/images/icon/ico_review.png') no-repeat right 0;
      background-size: auto 100%;
      width: 30px;
      height: 30px;
      display: inline-block;
      text-indent: -9999px;
      cursor: pointer;
      }
      .starR.on{background-position:0 0;}
  </style>

</head>

<body>

  <!-- Page Content -->
  <div class="container">

    <?php if(isset($data)): ?>
    <?php foreach ($data as $value):?>
    <form class="" action="../Shop/update_stuff" method="post" enctype="multipart/form-data">
    <!-- Heading Row -->
    <div class="row my-5">
      <div class="col-lg-7">
        <?php $image = $value->img; echo "<script>console.log( 'news_image: " . $image . "' );</script>";?>
        <!-- 이미지가 있는 경우 -->
        <?php if(isset($image)): ?>
        <a href="#"><img id="img" class="card-img-top img-responsive img-thumbnail" src="../static/shop/<?php echo $image;?>" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
        <div class="form-group">
        <input type="file" id="title_image" name="title_image">
        </div>
        <?php endif; ?>
        <!-- 이미지가 없는 경우 -->
        <?php if(!isset($image)): ?>
        <a href="#"><img id="img" class="card-img-top img-responsive img-thumbnail" src="../static/news/noimg.jpg" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
        <div class="form-group">
        <input type="file" id="title_image" name="title_image">
        </div>
        <?php endif; ?>
      </div>
      <!-- /.col-lg-8 -->
      <div class="col-lg-5">
        <div class="card-head card-white text-black text-center">
          <input type="hidden" id="shop_idx" name="shop_idx" value="<?php echo $value->shop_idx;?>">
          <input class="font-weight-light" type="title" name="stuff_name" value="<?php echo $value->name;?>" size="50px">
          <!-- <h1  id="title"></h1> -->
          <hr color="black">
        </div>
        <div class="card-body">
          <div class="card-price">
            <?php $price = $value->price; echo "<script>console.log( 'news_image: " . $price . "' );</script>";?>
            <input class="font-weight-light" type="price" name="stuff_price" value="<?php echo number_format($price);;?>&nbsp&nbsp원" size="30px">
          </div>
          <div class="card-empty">
            <span style="visibility:hidden">adfasdfasdfasf</span>
          </div>
          <!-- 수량 및 사이즈(옷) 시작-->
          <?php if($value->top_idx==1||$value->bottom_idx==2): ?>
          <div class="card-size" id="group">
            <span><strong>사이즈</strong></span>
            <?php $size= $value->size; echo "<script>console.log( 'arr: " .$size . "' );</script>";?>
            <?php $amount= $value->amount; echo "<script>console.log( 'arr: " . $amount . "' );</script>";?>
              <select name="size_idx" id="size" style="WIDTH: 120pt;margin-left: 23px;">
              <option id="<?php if($size=='S'){echo $amount;}?>" onclick="amounts(this);" value="S" selected><?php if($size=='S'){echo 'S';}else{echo '재고없음';}?></option>
              <option id="<?php if($size=='M'){echo $amount;}?>" onclick="amounts(this);" value="M" ><?php if($size=='M'){echo 'M';}else{echo '재고없음';}?></option>
              <option id="<?php if($size=='L'){echo $amount;}?>" onclick="amounts(this);" value="L" ><?php if($size=='L'){echo 'L';}else{echo '재고없음';}?></option>
              <option id="<?php if($size=='XL'){echo $amount;}?>" onclick="amounts(this);" value="XL" ><?php if($size=='XL'){echo 'XL';}else{echo '재고없음';}?></option>
              <option id="<?php if($size=='2XL'){echo $amount;}?>" onclick="amounts(this);" value="" ><?php if($size=='2XL'){echo '2XL';}else{echo '재고없음';}?></option>
            </select>
            <div class="card-empty">
              <span style="visibility:hidden">adfasdfasdfasf</span>
            </div>
            <div class="card-amount">
              <span><strong>수량</strong></span>
              <input type="text" name="stuff_amount" value="0"style="margin-left: 23px; font-size:20px" id="amount" readonly size="3px">
              <button type="button" id="plus" class="btn" name="button"><span class="fas fa-plus fa-lg text-black check" style="padding: 3px; margin-left:8px"></span>
              <button type="button" id="minus" class="btn" name="button"><span class="fas fa-minus fa-lg text-black check"  style="padding: 3px"></span></button>
              <!-- <button id="add_btn" type="button" name="button" class="btn btn-success" onclick="add_btns();" style="font-style:italic; margin-left: 20px"><strong>추가</strong></button> -->
            </div>
          </div>
          <div class="card-size" id="add"></div>
          <!-- 수량 및 사이즈(옷) 끝-->
          <?php endif; ?>
          <!-- 수량 및 사이즈(신발) 시작 -->
          <?php if($value->shose_idx==3): ?>
          <div class="card-size" id="group">
            <span><strong>사이즈</strong></span>
            <?php $size= $value->size; echo "<script>console.log( 'arr: " .$size . "' );</script>";?>
            <?php $amount= $value->amount; echo "<script>console.log( 'arr: " . $amount . "' );</script>";?>
              <select name="size_idx" id="size" style="WIDTH: 120pt;margin-left: 23px;">
              <option id="<?php if($size==230){echo $amount;}?>" onclick="amounts(this);" value="230" selected><?php if($size==230){echo '230';}else{echo '재고없음';}?></option>
              <option id="<?php if($size==235){echo $amount;}?>" onclick="amounts(this);" value="235" ><?php if($size==235){echo '235';}else{echo '재고없음';}?></option>
              <option id="<?php if($size==240){echo $amount;}?>" onclick="amounts(this);" value="240" ><?php if($size==240){echo '240';}else{echo '재고없음';}?></option>
              <option id="<?php if($size==245){echo $amount;}?>" onclick="amounts(this);" value="245" ><?php if($size==245){echo '245';}else{echo '재고없음';}?></option>
              <option id="<?php if($size==250){echo $amount;}?>" onclick="amounts(this);" value="250" ><?php if($size==250){echo '250';}else{echo '재고없음';}?></option>
              <option id="<?php if($size==255){echo $amount;}?>" onclick="amounts(this);" value="255" ><?php if($size==255){echo '255';}else{echo '재고없음';}?></option>
              <option id="<?php if($size==260){echo $amount;}?>" onclick="amounts(this);" value="260" ><?php if($size==260){echo '260';}else{echo '재고없음';}?></option>
              <option id="<?php if($size==265){echo $amount;}?>" onclick="amounts(this);" value="265" ><?php if($size==265){echo '265';}else{echo '재고없음';}?></option>
              <option id="<?php if($size==270){echo $amount;}?>" onclick="amounts(this);" value="270" ><?php if($size==270){echo '270';}else{echo '재고없음';}?></option>
              <option id="<?php if($size==275){echo $amount;}?>" onclick="amounts(this);" value="275" ><?php if($size==275){echo '275';}else{echo '재고없음';}?></option>
              <option id="<?php if($size==280){echo $amount;}?>" onclick="amounts(this);" value="280" ><?php if($size==280){echo '280';}else{echo '재고없음';}?></option>
              <option id="<?php if($size==285){echo $amount;}?>" onclick="amounts(this);" value="285" ><?php if($size==285){echo '285';}else{echo '재고없음';}?></option>
              <option id="<?php if($size==290){echo $amount;}?>" onclick="amounts(this);" value="290" ><?php if($size==290){echo '290';}else{echo '재고없음';}?></option>
            </select>
            <div class="card-empty">
              <span style="visibility:hidden">adfasdfasdfasf</span>
            </div>
            <div class="card-amount">
              <span><strong>수량</strong></span>
              <input type="text" name="stuff_amount" value="0"style="margin-left: 23px; font-size:20px" id="amount" readonly size="3px">
              <button type="button" id="plus" class="btn" name="button"><span class="fas fa-plus fa-lg text-black check" style="padding: 3px; margin-left:8px"></span>
              <button type="button" id="minus" class="btn" name="button"><span class="fas fa-minus fa-lg text-black check"  style="padding: 3px"></span></button>
              <!-- <button id="add_btn" type="button" name="button" class="btn btn-success" onclick="add_btns();" style="font-style:italic; margin-left: 20px"><strong>추가</strong></button> -->
            </div>
          </div>
          <div class="card-size" id="add"></div>
          <!-- 수량 및 사이즈(신발) 끝-->
          <?php endif; ?>
          <hr color="black">
          <div class="card-comment">
          <h5 class="text-blak m-2">제품 특징</h5>
          <textarea id="shop_ex" name="stuff_ex" rows="8" cols="56"><?php echo $value->ex;?></textarea>
          </div>
          <hr color="black">
          <div class="card-comment">
          <h5 class="text-blak m-0">리뷰</h5>
          <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
          <button type="button" id="review1" class="btn pull-right" name="button" style="margin-left:250px"><span class="fas fa-chevron-down fa-lg text-black check"style="float:right"></span></button>
          </div>
          <hr color="black">
          <div class="card-comment" id="review2" style="display: none" >
            <ul class="hide" style=" list-style:none;">
                <li><small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small></li>
                <li>이 상품의 첫 번째 리뷰를 작성해 주세요.</li>
            </ul>
            <button type="button" name="button" data-toggle="modal" class="btn" data-target="#myModal" ><a href="#">리뷰 수정하기</a></button>
          <hr color="black" id="line">
          </div>
          <div class="card-footer text-muted" style="text-align:center">
          <button id="update" type="submit" name="submit" class="btn btn-white pull-right" style="color:#800080; font-weight:bold; text-align:right">수정</button>
          </div>
        </div>
      </div>
      <!-- /.col-md-4 -->
    </div>

    </form>
  <?php endforeach; ?>
  <?php endif; ?>


    <!-- /.row -->

    <!-- Call to Action Well -->
    <!-- <div class="card text-white bg-secondary my-5 py-4 text-center">
      <div class="card-body">
        <p class="text-white m-0"></p>
      </div>
    </div> -->

    <!-- Content Row -->
    <div class="row">

    <?php if(isset($data)): ?>
    <?php foreach ($data as $value):?>

      <div class="col-md-4 mb-5">
        <form class="" action="../Shop/update_picture" method="post" enctype="multipart/form-data">
        <div class="card h-100">
          <div class="card-body">
            <input type="hidden" name="shop_idx" value="<?php echo $value->shop_idx;?>">
            <input type="hidden" name="check" value="1">
            <input type="hidden" name="arr" value="<?php echo $value->arr;?>">
            <?php $image = $value->second_img; echo "<script>console.log( 'news_image: " . $image . "' );</script>";?>
            <!-- 이미지가 있는 경우 -->
            <?php if(isset($image)): ?>
            <a href="#"><img id="f_img" class="card-img-top img-responsive img-thumbnail" src="../static/shop/<?php echo $image;?>" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
            <div class="form-group">
            <input type="file" id="first_image" name="first_image">
            </div>
            <?php endif; ?>
            <!-- 이미지가 없는 경우 -->
            <?php if(!isset($image)): ?>
            <a href="#"><img id="f_img" class="card-img-top img-responsive img-thumbnail" src="../static/news/noimg.jpg" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
            <div class="form-group">
            <input type="file" id="first_image" name="first_image">
            </div>
            <?php endif; ?>
          </div>
          <div class="card-footer" style="text-align:center">
            <a href="#" class="btn btn-primary btn-sm">More Info</a>
            <button id="update" type="submit" name="submit" class="btn btn-white pull-right" style="color:#800080; font-weight:bold;">수정</button>
          </div>

        </div>
        </form>
      </div>


    <?php endforeach; ?>
    <?php endif; ?>



    <?php if(isset($data)): ?>
    <?php foreach ($data as $value):?>

      <div class="col-md-4 mb-5">
        <form class="" action="../Shop/update_picture" method="post" enctype="multipart/form-data">
        <div class="card h-100">
          <div class="card-body">
            <input type="hidden" name="shop_idx" value="<?php echo $value->shop_idx;?>">
            <input type="hidden" name="check" value="2">
            <input type="hidden" name="arr" value="<?php echo $value->arr;?>">
            <?php $image = $value->third_img; echo "<script>console.log( 'news_image: " . $image . "' );</script>";?>
            <!-- 이미지가 있는 경우 -->
            <?php if(isset($image)): ?>
            <a href="#"><img id="s_img" class="card-img-top img-responsive img-thumbnail" src="../static/shop/<?php echo $image;?>" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
            <div class="form-group">
            <input type="file" id="second_image" name="second_image">
            </div>
            <?php endif; ?>
            <!-- 이미지가 없는 경우 -->
            <?php if(!isset($image)): ?>
            <a href="#"><img id="s_img" class="card-img-top img-responsive img-thumbnail" src="../static/news/noimg.jpg" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
            <div class="form-group">
            <input type="file" id="second_image" name="second_image">
            </div>
            <?php endif; ?>
          </div>
          <div class="card-footer" style="text-align:center">
            <a href="#" class="btn btn-primary btn-sm">More Info</a>
            <button id="update" type="submit" name="submit" class="btn btn-white pull-right" style="color:#800080; font-weight:bold">수정</button>
          </div>
        </div>
      </form>
      </div>


    <?php endforeach; ?>
    <?php endif; ?>




    <?php if(isset($data)): ?>
    <?php foreach ($data as $value):?>

      <div class="col-md-4 mb-5">
        <form class="" action="../Shop/update_picture" method="post" enctype="multipart/form-data">
        <div class="card h-100">
          <div class="card-body">
            <input type="hidden" name="shop_idx" value="<?php echo $value->shop_idx;?>">
            <input type="hidden" name="check" value="3">
            <input type="hidden" name="arr" value="<?php echo $value->arr;?>">
            <?php $image = $value->forth_img; echo "<script>console.log( 'news_image: " . $image . "' );</script>";?>
            <!-- 이미지가 있는 경우 -->
            <?php if(isset($image)): ?>
            <a href="#"><img id="t_img" class="card-img-top img-responsive img-thumbnail" src="../static/shop/<?php echo $image;?>" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
            <div class="form-group">
            <input type="file" id="third_image" name="third_image">
            </div>
            <?php endif; ?>
            <!-- 이미지가 없는 경우 -->
            <?php if(!isset($image)): ?>
            <a href="#"><img id="t_img" class="card-img-top img-responsive img-thumbnail" src="../static/news/noimg.jpg" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
            <div class="form-group">
            <input type="file" id="third_image" name="third_image">
            </div>
            <?php endif; ?>
          </div>
          <div class="card-footer" style="text-align:center">
            <a href="#" class="btn btn-primary btn-sm">More Info</a>
            <button id="update" type="submit" name="submit" class="btn btn-white pull-right" style="color:#800080; font-weight:bold">수정</button>
          </div>
        </div>
        </form>
      </div>
    <?php endforeach; ?>
    <?php endif; ?>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->




  <?php if(isset($data)): ?>
  <?php foreach ($data as $value):?>
  <!-- 리뷰 modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
          <!-- modal head -->
        <div class="modal-header">
          <h4 class="modal-title" style="font-size: 20px; font-weight = bold"><mark>Review</mark></h4>
            <button type="button" class="close" data-dismiss="modal"></button>
        </div>
          <!-- modal body -->
        <div class="modal-body">
              <div class="container">
                <div class="row">
                    <div class="col-md-6">
                      <!-- 이미지 -->
                      <?php $image = $value->img; echo "<script>console.log( 'news_image: " . $image . "' );</script>";?>
                      <!-- 이미지가 있는 경우 -->
                      <?php if(isset($image)): ?>
                      <a href="#"><img class="card-img-top img-responsive img-thumbnail" src="../static/shop/<?php echo $image;?>" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
                      <?php endif; ?>
                      <!-- 이미지가 없는 경우 -->
                      <?php if(!isset($image)): ?>
                      <a href="#"><img class="card-img-top img-responsive img-thumbnail" src="../static/news/noimg.jpg" alt="../static/news/noimg.jpg"  width="auto" height="180px"></a>
                      <?php endif; ?>
                    </div>
                    <div class="col-md-6 text-center">
                      <div class="card-head card-white text-black text-center">
                        <input type="hidden" id="shop_idx" name="shop_idx" value="<?php echo $value->shop_idx;?>">
                        <h1 class="font-weight-light" id="title"><?php echo $value->name;?></h1>
                        <hr color="black">
                      </div>
                      <div class="form-group text-center">
                        <?php $price = $value->price; echo "<script>console.log( 'news_image: " . $price . "' );</script>";?>
                        <h5><?php echo number_format($price);;?>&nbsp&nbsp원</h5>
                      </div>

                    </div>
                    <div class="col-md-12">
                      <div class="form-group text-center p-4">
                        <h5 class="text-blak m-4">제품 리뷰</h5>
                        <textarea id="shop_ex" name="shop_ex" rows="8" cols="77" class="form-control" placeholder="리뷰를 작성해주세요"></textarea>
                      </div>
                      <div class="starRev mb-3">
                      <span><h6 class="text-blak m-2"><strong>별점을 등록해주세요</strong></h6></span>
                        <span class="starR on">별1</span>
                        <span class="starR">별2</span>
                        <span class="starR">별3</span>
                        <span class="starR">별4</span>
                        <span class="starR">별5</span>
                      </div>
                    <div class="form-group text-center">
                      <button type="submit" class="btn btn-danger btn-lg" id="checkbtn" style="WIDTH: 120pt;">Submit</button>
                      <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal" id="close" style="WIDTH: 120pt;">Close</button>
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

  <!-- Footer -->
  <footer class="bg-light py-5">
    <div class="container">
      <div class="small text-center text-muted">Copyright &copy; 2019 - Lionel Messi</div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="../application/shopdetail/vendor/jquery/jquery.min.js"></script>
  <script src="../application/shopdetail/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../static/lib/ckeditor/ckeditor.js"></script>
  <script type="text/javascript">

  CKEDITOR.replace('shop_ex');
  // 별점
  $('.starRev span').click(function(){
      $(this).parent().children('span').removeClass('on');
      $(this).addClass('on').prevAll('span').addClass('on');
    return false;
  });
    // 수량 UP
    $('#plus').click(function(){

      var num = $("#amount").val();
      if(num==-1){
        $("#amount").val(0);
      }else {
        $("#amount").val(num*1+1);
          }
    		})

        // 수량 Down
        $('#minus').click(function(){
          var num = $("#amount").val();
          if(num==-1){
            $("#amount").val(0);
          }else {
            $("#amount").val(num*1-1);
          }
        })


    // html dom 이 다 로딩된 후 실행된다.
    $(document).ready(function(){
        // memu 클래스 바로 하위에 있는 a 태그를 클릭했을때
        $("#review1").click(function(){
            // 현재 클릭한 태그가 a 이기 때문에
            // a 옆의 태그중 ul 태그에 hide 클래스 태그를 넣던지 빼던지 한다.
            $("#review2").slideToggle("fest");

        });
    });

    // $(document).ready(function(){
      function amounts($this){
        // alert($this);
        var num = $($this).attr('id');
        // alert(num);
        if(num==0){
          $('#amount').val(0);
        }else {
          $('#amount').val(num);
        }

      }
    // })

    // insert - 추가
    function add_btns(){
        var zero = $('#add_btn').detach();
        var group = $('#group').html();
        $('#add').append(group).append(zero).append('</br>');
    }


// 스크롤링
  function scrolling(pos) {
      $('html, body').animate({'scrollTop' : '$(pos).offset().top+px'}, "slow");
    }

    var sel_file;
    // 이미지 미리보기 기능
    $(document).ready(function(){
      $('#title_image').on("change",handleImgFileSelect);
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
    });

    $(document).ready(function(){
      $('#first_image').on("change",handleImgFileSelect);
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
            $("#f_img").attr("src",e.target.result);
          }
          reader.readAsDataURL(f);
        });
      }
    });

    $(document).ready(function(){
      $('#second_image').on("change",handleImgFileSelect);
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
            $("#s_img").attr("src",e.target.result);
          }
          reader.readAsDataURL(f);
        });
      }
    });

    $(document).ready(function(){
      $('#third_image').on("change",handleImgFileSelect);
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
            $("#t_img").attr("src",e.target.result);
          }
          reader.readAsDataURL(f);
        });
      }
    });


  </script>

</body>

</html>
