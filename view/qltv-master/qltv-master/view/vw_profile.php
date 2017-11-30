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
          if (!isset($_SESSION['us']) || !isset($_SESSION['mk'])) { 
            header("Location: ");
          } else { ?>
            <li><a href="dangxuat.php"><span class="glyphicon glyphicon-log"></span> Đăng xuất</a></li>
         <?php } ?>
        </ul>
      </div>
    </nav><!-- Day la menu -->
    <!-- Day la noi dung -->
    <div id="noi-dung-trang-web" class="noi-dung-trang-web" style="padding: 10px;border: 3px dotted #a9a9a9a9;border-radius: 5px;">
      <h2 style="margin: 0;margin-bottom: 20px;border-bottom: 1px solid #d4d4d4;">Thông tin cá nhân</h2>
    <section class="content">
      <div class="noi-dung">
        <div class="khung-giua">
          <div class="col-md-6">
            <div class="bao-khung animated fadeInUp">
                <div class="form-group">
                  <label>Tên độc giả</label>
                   <input type="text" class="form-control" name="" id="ten-doc-gia" placeholder="tên độc giả" required autocomplete="on" value="<?php echo $tendg; ?>">
                </div>
                <div class="form-group">
                  <label>Tên đăng nhập</label>
                   <input type="text" class="form-control" name="" id="ten-dang-nhap" placeholder="tên đăng nhập" required autocomplete="on" value="<?php echo $tendangnhap; ?>">
                </div>
                <div class="form-group">
                  <label>Địa chỉ</label>
                   <input type="text" class="form-control" name="" id="dia-chi" placeholder="địa chỉ" required autocomplete="on" value="<?php echo $diachi; ?>">
                </div>
                <div class="form-group">
                  <label>Ngày sinh</label>
                   <input type="date" class="form-control" name="" id="ngay-sinh" required autocomplete="on" value="<?php echo $ngaysinh; ?>">
                </div>
                <div class="form-group">
                  <label>Địa chỉ mail</label>
                   <input type="text" class="form-control" name="" id="dia-chi-mail" placeholder="địa chỉ mail" required autocomplete="on" value="<?php echo $mail; ?>">
                </div>
                <input type="text" hidden="hidden" id="ma-doc-gia" name="" value="<?php echo $id; ?>">
                <div class="form-group trai">
                  <button type="button" class="btn btn-primary" id="nut-doi-thong-tin">Lưu sửa đổi</button>
                </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="bao-khung animated fadeInUp">
                <div class="form-group">
                <label>Mật khẩu cũ</label>
                 <input type="password" class="form-control" name="" id="mat-khau-cu" placeholder="mật khẩu cũ" required autocomplete="on">
                </div>
                <div class="form-group">
                  <label>Mật khẩu mới</label>
                   <input type="password" class="form-control" name="" id="mat-khau-moi" placeholder="mật khẩu mới" required autocomplete="on">
                </div>
                <div class="form-group">
                  <label>Xác nhận mật khẩu mới</label>
                   <input type="password" class="form-control" name="" id="xac-nhan-mat-khau" placeholder="xác nhận mật khẩu mới" required autocomplete="on">
                </div>
                <div class="form-group trai">
                  <button type="button" class="btn btn-primary" id="nut-doi-mat-khau">Đổi mật khẩu</button>
                </div>
              </div>
          </div>
          </div>
        </div>
    </section>
    </div><!-- Day la noi dung -->
    <div id="noi-dung-trang-web" class="noi-dung-trang-web" style="padding: 10px;border: 3px dotted #a9a9a9a9;border-radius: 5px;">
      <h2 style="margin: 0;margin-bottom: 20px;border-bottom: 1px solid #d4d4d4;">Sách bạn đã mượn</h2>
    <section class="content">
      <div class="col-md-12">
        <table class="table table-striped">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên sách</th>
                <th>Ngày mượn</th>
                <th>Số lượng</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $stt = 1;
            while ($row = mysqli_fetch_array($dl)){ ?>
              <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $row['TenS']; ?></td>
                <td><?php echo $row['NgayMuon']; ?></td>
                <td><?php echo $row['SLThucTe']; ?></td>
              </tr>      
            <?php $stt++; } ?>

            </tbody>
          </table>
      </div>
    </section>
    </div><!-- Day la noi dung -->
    <div id="noi-dung-trang-web" class="noi-dung-trang-web" style="padding: 10px;border: 3px dotted #a9a9a9a9;border-radius: 5px;">
      <h2 style="margin: 0;margin-bottom: 20px;border-bottom: 1px solid #d4d4d4;">Sách bạn đã trả</h2>
    <section class="content">
      <div class="col-md-12">
        <table class="table table-striped">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên sách</th>
                <th>Ngày mượn</th>
                <th>Số lượng</th>
              </tr>
            </thead>
            <tbody>
            <?php 
            $stt = 1;
            while ($row = mysqli_fetch_array($dl1)){ ?>
              <tr>
                <td><?php echo $stt; ?></td>
                <td><?php echo $row['TenS']; ?></td>
                <td><?php echo $row['NgayTra']; ?></td>
                <td><?php echo $row['SLTra']; ?></td>
              </tr>      
            <?php $stt++; } ?>

            </tbody>
          </table>
      </div>
    </section>
    </div><!-- Day la noi dung -->
  </div>



<script type="text/javascript">
    document.title = "VLUTE LIB | Thông tin cá nhân";
</script>
<script type="text/javascript">
  function luuthanhcong(chuoi) {
       $.notify(chuoi, {
          animate: {
            enter: 'animated bounceIn',
            exit: 'animated bounceOut'
          },
          type: 'success',
          delay: 2000
        });
  }
    function tailai() {
      setTimeout(function(){ location.reload(); }, 2000);
    }
  function luukhongthanhcong(chuoi) {
       $.notify(chuoi, {
          animate: {
            enter: 'animated bounceIn',
            exit: 'animated bounceOut'
          },
          type: 'danger',
          delay: 4000
        });
  }
  $(document).ready(function() {
    $("#quanlythongtin").addClass("active");
    $("#nut-doi-thong-tin").click(function(){
        $.ajax({
          url : "ajax/ajax_sua_profile.php",
          type : "post",
          dataType:"text",
          data : {
            ten: $("#ten-doc-gia").val(),
            diachi: $("#dia-chi").val(),
            tdn: $("#ten-dang-nhap").val(),
            ns: $("#ngay-sinh").val(),
            mail: $("#dia-chi-mail").val(),
            ma: <?php echo $id; ?>
          },
          success : function (data){
              $("body").append(data);
          }
        });
    });
    $("#nut-doi-mat-khau").click(function(){
        $.ajax({
          url : "ajax/ajax_sua_mat_khau.php",
          type : "post",
          dataType:"text",
          data : {
            cu: $("#mat-khau-cu").val(),
            moi: $("#mat-khau-moi").val(),
            xnmoi: $("#xac-nhan-mat-khau").val(),
            ma: <?php echo $id; ?>
          },
          success : function (data){
              $("body").append(data);
          }
        });
    });
  });
</script>
</script>
<script src="admin/nonti/bootstrap-notify.min.js"></script>