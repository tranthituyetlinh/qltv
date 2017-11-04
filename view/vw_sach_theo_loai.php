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
              <a href="?p=khoa&id=<?php echo $row['MaK']; ?>">+ <?php echo $row['TenK']; ?></a>
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
              <a href="?p=loai&id=<?php echo $row['MaLS']; ?>">+ <?php echo $row['TenLS']; ?></a>
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
          <h3>Xem sách theo loại</h3>
        </div>
      <?php  while ($row = mysqli_fetch_assoc($sach)) { ?>
        <div class="bao-sach">
          <a href="#">
            <div class="sach">
              <div class="anh-bia-sach" style="background-image: url('<?php echo $row['HinhAnhS'] ?>');"></div>
              <div class="ten-sach"><?php echo $row['TenS']; ?> <span>(10)</span></div>
            </div>
          </a>
        </div>
      <?php } ?>
      </div>
    </div><!-- Day la noi dung -->
  </div>  