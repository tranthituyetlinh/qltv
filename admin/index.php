<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../bootstrap/dist/css/bootstrap.min.css">
  <link href="../css/vendor/font-awesome.min.css" type="text/css" rel="stylesheet">
  <script src="../js/jquery-3.2.1.min.js"></script>
  <script src="../bootstrap/dist/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">VLUTE LIB</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Trang chủ</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sách <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Sách</a></li>
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
      <li><a href="#">Page 2</a></li>
      <li><a href="#">Page 3</a></li>
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
  
<div class="container">
  <h3>Basic Navbar Example</h3>
  <p>A navigation bar is a navigation header that is placed at the top of the page.</p>
</div>

</body>
</html>
