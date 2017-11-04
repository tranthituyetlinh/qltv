<?php include_once("model/md_index.php"); 
      $loaisach = tv_get_loai_sach();
      $khoa = tv_get_khoa();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Quản lý thư viện</title>
  <meta charset="utf-8">
  <base href="http://localhost/qltv/" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="bootstrap/dist/css/bootstrap.min.css">
  <link href="css/vendor/font-awesome.min.css" type="text/css" rel="stylesheet">
  <script src="js/jquery-3.2.1.min.js"></script>
  <script src="bootstrap/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div id="khung-trang-web">
    <!-- Đây là header -->
    <div id="header-body">
      <img src="images/header.png">
    </div>
    <!-- Day la menu -->
    <nav id="nav" class="navbar navbar-inverse">
      <div class="container-fluid">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Trang chủ</a></li>
          <!--<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Page 1-1</a></li>
              <li><a href="#">Page 1-2</a></li>
              <li><a href="#">Page 1-3</a></li>
            </ul>
          </li>-->
          <li><a href="#">Giới thiệu</a></li>
          <li><a href="#">Hướng dẫn sử dụng</a></li>
          <li><a href="#">Liên hệ</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#"><span class="glyphicon glyphicon-user"></span> Đăng nhập</a></li>
          <!--<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>-->
        </ul>
      </div>
    </nav><!-- Day la menu -->
    <!-- Day la noi dung -->
    <div id="noi-dung-trang-web">
      <div class="cot-mot">
        <div class="bao-cot-mot">
          <div class="header-cot-mot">
            <h3>Thể loại sách theo khoa</h3>
          </div>
          <ul id="sach-theo-khoa">
          <?php while ($row = mysqli_fetch_assoc($khoa)) {
          ?>
            <li>
              <a href="#">+ <?php echo $row['TenK']; ?></a>
            </li>
          <?php } ?>
          </ul>
        </div>

        <div class="bao-cot-mot">
          <div class="header-cot-mot the-loai-khac">
            <h3>Thể loại sách khác</h3>
          </div>
          <ul id="sach-theo-khoa">
          <?php while ($row = mysqli_fetch_assoc($loaisach)) {
          ?>
            <li>
              <a href="#">+ <?php echo $row['TenLS']; ?></a>
            </li>
          <?php } ?>
          </ul>
        </div>

        <div class="bao-cot-mot">
          <div class="header-cot-mot tim-kiem">
            <h3>Tìm kiếm</h3>
          </div>
          <div class="tim">
            <form action="" method="post">
              <input type="text" name="" required="true" placeholder="nhập từ khóa tìm kiếm ... " class="o-tim">
              <input type="submit" name="" value="Tìm kiếm" class="nut-tim">
            </form>
          </div>
        </div>
      </div>
      <div class="cot-hai">
        <div class="header-cot-hai">
          <h3>Sách mới</h3>
        </div>
        <div class="bao-sach">
          <a href="#">
            <div class="sach">
              <div class="anh-bia-sach" style="background-image: url('images/sach.jpg');"></div>
              <div class="ten-sach">Sách English A2 <span>(10)</span></div>
            </div>
          </a>
        </div>

        <div class="bao-sach">
          <a href="#">
            <div class="sach">
              <div class="anh-bia-sach" style="background-image: url('images/ngaynang.jpg');"></div>
              <div class="ten-sach">Ngày Nắng <span>(10)</span></div>
            </div>
          </a>
        </div>

        <div class="bao-sach">
          <a href="#">
            <div class="sach">
              <div class="anh-bia-sach" style="background-image: url('images/kinhnghiem.jpg');"></div>
              <div class="ten-sach">7 Thói Quen Của Bạn Trẻ <span>(10)</span></div>
            </div>
          </a>
        </div>

        <div class="bao-sach">
          <a href="#">
            <div class="sach">
              <div class="anh-bia-sach" style="background-image: url('images/nhatban.jpg');"></div>
              <div class="ten-sach">Nhật Bản Trong Tôi <span>(10)</span></div>
            </div>
          </a>
        </div>

        <div class="bao-sach">
          <a href="#">
            <div class="sach">
              <div class="anh-bia-sach" style="background-image: url('images/khoingiep.jpg');"></div>
              <div class="ten-sach">Quốc Gia Khởi Nghiệp <span>(10)</span></div>
            </div>
          </a>
        </div>

        <div class="bao-sach">
          <a href="#">
            <div class="sach">
              <div class="anh-bia-sach" style="background-image: url('images/thanhxuan.jpg');"></div>
              <div class="ten-sach">Thanh Xuân  <span>(10)</span></div>
            </div>
          </a>
        </div>

        <div class="bao-sach">
          <a href="#">
            <div class="sach">
              <div class="anh-bia-sach" style="background-image: url('images/khac.jpg');"></div>
              <div class="ten-sach">Ai Rồi Cũng Khác <span>(10)</span></div>
            </div>
          </a>
        </div>

        <div class="bao-sach">
          <a href="#">
            <div class="sach">
              <div class="anh-bia-sach" style="background-image: url('images/thanhpho.jpg');"></div>
              <div class="ten-sach">Thành Phố Tôi Yêu <span>(10)</span></div>
            </div>
          </a>
        </div>

        <div class="bao-sach">
          <a href="#">
            <div class="sach">
              <div class="anh-bia-sach" style="background-image: url('images/hoahong.jpg');"></div>
              <div class="ten-sach">Hoa Hồng Sớm Mai <span>(10)</span></div>
            </div>
          </a>
        </div>

        <div class="bao-sach">
          <a href="#">
            <div class="sach">
              <div class="anh-bia-sach" style="background-image: url('images/tinhphutu.jpg');"></div>
              <div class="ten-sach">Tình Phụ Tử <span>(10)</span></div>
            </div>
          </a>
        </div>
      </div>
    </div><!-- Day la noi dung -->
  </div>  
</body>
</html>