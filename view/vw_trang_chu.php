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
          <?php 
          session_start();
          if (!isset($_SESSION['us']) || !isset($_SESSION['mk'])) { ?>
            <li><a href="login.php"><span class="glyphicon glyphicon-user"></span> Đăng nhập</a></li>
          <?php } else { ?>
            <li><a href="?p=profile"><span class="glyphicon glyphicon-user"></span> Thông tin cá nhân</a></li>
         <?php } ?>
        </ul>
      </div>
    </nav><!-- Day la menu -->
    <!-- Day la noi dung -->
    <div id="noi-dung-trang-web">
      <div class="cot-mot">
        <div class="bao-cot-mot">
          <div class="header-cot-mot the-loai-khac">
            <h3>Thể loại sách khác</h3>
          </div>
          <ul id="sach-theo-khoa">
          <?php while ($row = mysqli_fetch_assoc($loaisach)) {
          ?>
            <li>
              <a href="?p=loai&id=<?php echo $row['MaLS']; ?>&ten=<?php echo $row['TenLS']; ?>">+ <?php echo $row['TenLS']; ?></a>
            </li>
          <?php } ?>
          </ul>
        </div>

        <div class="bao-cot-mot">
          <div class="header-cot-mot tim-kiem">
            <h3>Tìm kiếm</h3>
          </div>
          <div class="tim">
              <select class="form-control" id="chon-loai-tim">
                <option value="1">Theo tên sách</option>
                <option value="2">Theo loại sách</option>
                <option value="3">Theo nhà xuất bản</option>
                <option value="4">Theo tác giả</option>
                <option value="5">Theo năm xuất bản</option>
              </select>
              <br>
              <input type="text" name="" required="true" placeholder="nhập từ khóa tìm kiếm ... " class="o-tim" id="thong-tin-tim">
              <input type="submit" name="" value="Tìm kiếm" class="nut-tim" id="nut-tim">
          </div>
        </div>
      </div>
      <div class="cot-hai" id="khung-noi-dung">
        <div class="header-cot-hai">
          <h3>Sách mới</h3>
        </div>
        <?php  while ($row = mysqli_fetch_assoc($sachmoi)) { ?>
          <div class="bao-sach">
            <a href="#">
              <div class="sach">
                <div class="anh-bia-sach" style="background-image: url('<?php echo $row['HinhAnhS'] ?>');"></div>
                <div class="ten-sach"><?php echo $row['TenS']; ?> <span>(<?php echo $row['SL']; ?>)</span></div>
              </div>
            </a>
          </div>
        <?php } ?>
      </div>
    </div><!-- Day la noi dung -->
  </div>  
  <script type="text/javascript">
    $(document).ready(function() {
        $("#nut-tim").click(function(){
          $.ajax({
            url : "ajax/ajax_tim_kiem.php",
            type : "post",
            dataType:"text",
            data : {
                loai: $("#chon-loai-tim").val(),
                tu: $("#thong-tin-tim").val()
            },
            success : function (data){
                $("#khung-noi-dung").html(data);
            }
          });
        });
    });
  </script>