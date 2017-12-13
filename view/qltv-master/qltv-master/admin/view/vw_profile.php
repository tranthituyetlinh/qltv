<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thông tin cá nhân
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="noi-dung">
        <div class="khung-giua">
          <div class="col-md-6">
            <div class="bao-khung animated fadeInUp">
                <div class="form-group">
                  <label>Tên nhân viên</label>
                   <input type="text" class="form-control" name="" id="ten-nhan-vien" placeholder="tên nhân viên" required autocomplete="on" value="<?php echo $tennv; ?>">
                </div>
                <div class="form-group">
                  <label>Tên đăng nhập</label>
                   <input type="text" class="form-control" name="" id="ten-dang-nhap" placeholder="tên đăng nhập" required autocomplete="on" value="<?php echo $tendn; ?>">
                </div>
                <div class="form-group">
                  <label>Địa chỉ</label>
                   <input type="text" class="form-control" name="" id="dia-chi" placeholder="địa chỉ" required autocomplete="on" value="<?php echo $diachi; ?>">
                </div>
                <div class="form-group">
                  <label>Địa chỉ mail</label>
                   <input type="text" class="form-control" name="" id="dia-chi-mail" placeholder="địa chỉ mail" required autocomplete="on" value="<?php echo $mail; ?>">
                </div>
                <div class="form-group">
                  <label>Hệ số phụ cấp</label>
                   <input type="text" class="form-control" name="" id="he-so-phu-cap" placeholder="hệ số phụ cấp" required autocomplete="on" value="<?php echo $hspc; ?>">
                </div>
                <input type="text" hidden="hidden" id="ma-nhan-vien" name="" value="<?php echo $id; ?>">
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
      </div>
      </div>
    </section>

<script type="text/javascript">
    document.title = "VLUTE LIB | Thông tin cá nhân";
    document.getElementById("he-so-phu-cap").readOnly = true;
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
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
            ten: $("#ten-nhan-vien").val(),
            diachi: $("#dia-chi").val(),
            tdn: $("#ten-dang-nhap").val(),
            mail: $("#dia-chi-mail").val(),
            ma: $("#ma-nhan-vien").val()
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
            ma: $("#ma-nhan-vien").val()
          },
          success : function (data){
              $("body").append(data);
          }
        });
    });
  });
</script>
</script>