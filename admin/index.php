<?php include_once("control/ctrl_login_check.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Hệ thống quản lý thư viện</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <base href="<?php echo $qltv['HOST']; ?>/" />
  <link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.min.css">
  <link href="../css/vendor/font-awesome.min.css" type="text/css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link href="css/style.css" type="text/css" rel="stylesheet">
  <script src="../js/jquery-3.2.1.min.js"></script>
  
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">VLUTE LIB</a>
    </div>
    <ul class="nav navbar-nav">
      <li id="muc-trang-chu"><a href="">Trang chủ</a></li>
      <li class="dropdown" id="muc-sach">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sách <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="?p=sach">Sách</a></li>
          <li><a href="?p=loaisach">Loại sách</a></li>
          <li><a href="?p=tacgia">Tác giả</a></li>
          <li><a href="?p=nhaxuatban">Nhà xuất bản</a></li>
          <li><a href="#">Tìm kiếm</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Mượn - Trả <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Mượn sách</a></li>
          <li><a href="#">Trả sách</a></li>
          <li><a href="#">Sách mượn quá hạn</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Độc giả <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Độc giả</a></li>
          <li><a href="#">Tìm kiếm</a></li>
        </ul>
      </li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Thống kê <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Sách chưa mượn</a></li>
          <li><a href="#">Sách đã mượn</a></li>
          <li><a href="#">Sách đang mượn</a></li>
          <li><a href="#">Số lượng sách theo năm</a></li>
          <li><a href="#">Top 10 sách mượn nhiều nhất năm</a></li>
          <li><a href="#">Sách theo nhà xuất bản</a></li>
        </ul>
      </li>
      <li><a href="#">Thủ thư</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="glyphicon glyphicon-user"></i> Thông tin<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Sửa thông tin</a></li>
            <li><a href="#">Đăng xuất</a></li>
          </ul>
        </li>
    </ul>
  </div>
</nav>
  
<div id="khung-trang-admin" class="container" style="width: 99%;">
  <?php 
    include_once("public_control.php");
   ?>
</div>
</body>
</html>
