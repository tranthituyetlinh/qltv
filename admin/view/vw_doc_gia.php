<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lớp
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <a id="themdocgia" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Thêm độc giả</a>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table animated fadeIn">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #2980b9;color: #fff;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã độc giả</th>
                    <th class="giua">Họ & Tên</th>
                    <th class="giua">Ngày sinh</th>
                    <th class="giua">Địa chi</th>
                    <th class="giua">Ngày lập thẻ</th>
                    <th class="giua">Tên đăng nhập</th>
                    <th class="giua">Mail</th>
                    <th class="giua">Học lớp</th>
                    <th class="giua">Thuộc khoa</th>
                    <th class="giua">Thao tác</th>
                  </tr>
                </tr>
            </thead>
            <tbody>
            <?php 
              $stt = 1;
              while ($row = mysqli_fetch_assoc($dulieu)) {
                ?>
                  <tr>
                    <th class="giua"><?php echo $stt; ?></th>
                    <td class="giua" id="id-ma-dg-<?php echo $row['Id']; ?>"><a><?php echo $row['MaDG']; ?></a></td>
                    <td id="id-ten-dg-<?php echo $row['Id']; ?>"><a><?php echo $row['TenDG']; ?></a></td>
                    <td id="id-ngay-sinh-dg-<?php echo $row['Id']; ?>"><?php echo $row['NgaySinh']; ?></td>
                    <td id="id-dia-chi-dg-<?php echo $row['Id']; ?>"><?php echo $row['DiaChiDG']; ?></td>
                    <td id="id-ngay-lap-the-dg-<?php echo $row['Id']; ?>"><?php echo $row['NgayLapThe']; ?></td>
                    <td id="id-ten-dang-nhap-dg-<?php echo $row['Id']; ?>"><a><?php echo $row['TaiKhoanDG']; ?></a></td>
                    <td id="id-mail-dg-<?php echo $row['Id']; ?>"><a><?php echo $row['Mail']; ?></a></td>
                    <td id="id-ten-lop-dg-<?php echo $row['Id']; ?>"><?php echo $row['TenL']; ?></td>
                    <td><?php echo $row['TenK']; ?></td>
                    <td class="giua"><div class="nam-giua"><a class="btn btn-primary btn-sua-dg" data-qltv="<?php echo $row['Id']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                        <a class="btn btn-danger btn-xoa-dg" title="Xóa"
                        data-qltv="<?php echo $row['Id']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                    </td>
                    <input type="text" hidden="hidden" name="" id="id-id-dg-<?php echo $row['Id']; ?>" value="<?php echo $row['Id']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ma-khoa-dg-<?php echo $row['Id']; ?>" value="<?php echo $row['MaL']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-trang-thai-dg-<?php echo $row['Id']; ?>" value="<?php echo $row['TrangThai']; ?>">
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>
    </section>

<!-- Modal: Thêm độc giả -->
<div class="modal fade" id="qltv-modal-them-dg" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm độc giả</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Mã độc giả(*)</label>
              <input type="text" class="form-control" name="" id="ma-dg-them" placeholder="mã độc giả" required autocomplete="on">
            </div>
            <p class="help-block"> (<b>*</b>) Chấp nhận <b>MSSV</b>, <b>CMND</b> hoặc <b>Id</b> thẻ ATM.</p>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên đăng nhập(**)</label>
              <input type="text" class="form-control" name="" id="ten-dang-nhap-dg-them" placeholder="tên đăng nhập" required autocomplete="on">
            </div>
          <p class="help-block"> (<b>**</b>) Mật khẩu mặc định là: <b style="color: red;">123456</b></p>
          </div>  
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Họ & Tên</label>
              <input type="text" class="form-control" name="" id="ho-ten-dg-them" placeholder="họ tên độc giả" required autocomplete="on">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Địa chỉ mail(***)</label>
              <input type="text" class="form-control" name="" id="mail-dg-them" placeholder="địa chỉ mail" required autocomplete="on">
            </div>
          <p class="help-block"> (<b>***</b>) Nên dùng địa chỉ mail trường do cung cấp.</p>
          </div>  
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Ngày sinh</label>
              <input type="date" class="form-control" name="" id="ngay-sinh-dg-them" placeholder="họ tên độc giả" required autocomplete="on">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Ngày lập thẻ</label>
              <input type="date" class="form-control" name="" id="ngay-lap-the-dg-them" required autocomplete="on">
            </div>
          </div>  
        </div>
        <div class="form-group">
          <label>Địa chỉ</label>
          <textarea class="form-control" id="dia-chi-dg-them" rows="5"></textarea>
        </div>
        <div class="form-group">
          <label>Thuộc lớp</label>
          <select class="form-control" id="khoa-dg-them">
            <?php while ($row = mysqli_fetch_assoc($dulieu_lop)) {
            ?>
              <option value="<?php echo $row['MaL']; ?>"><?php echo $row['TenL']; ?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-dg">Thêm độc giả</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm độc giả -->

<!-- Modal: Thêm độc giả -->
<div class="modal fade" id="qltv-modal-sua-dg" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Chỉnh sửa độc giả</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Mã độc giả(*)</label>
              <input type="text" class="form-control" name="" id="ma-dg-sua" placeholder="mã độc giả" required autocomplete="on">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên đăng nhập(**)</label>
              <input type="text" class="form-control" name="" id="ten-dang-nhap-dg-sua" placeholder="tên đăng nhập" required autocomplete="on" disabled="disabled">
            </div>
          </div>  
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Họ tên</label>
              <input type="text" class="form-control" name="" id="ho-ten-dg-sua" placeholder="họ tên độc giả" required autocomplete="on" disabled="disabled">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Mail</label>
              <input type="text" class="form-control" name="" id="mail-dg-sua" placeholder="tên đăng nhập" required autocomplete="on">
            </div>
          </div>  
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Ngày sinh</label>
              <input type="date" class="form-control" name="" id="ngay-sinh-dg-sua" placeholder="họ tên độc giả" required autocomplete="on" disabled="disabled">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Ngày lập thẻ</label>
              <input type="date" class="form-control" name="" id="ngay-lap-the-dg-sua" required autocomplete="on" disabled="disabled">
            </div>
          </div>  
        </div>
        <div class="form-group">
          <label>Địa chỉ</label>
          <textarea class="form-control" id="dia-chi-dg-sua" rows="5" disabled="disabled"></textarea>
        </div>
        <div class="form-group">
          <label>Thuộc khoa</label>
          <select class="form-control" id="khoa-dg-sua" disabled="disabled">
            <?php while ($row = mysqli_fetch_assoc($dulieu_lop_s)) {
            ?>
              <option value="<?php echo $row['MaL']; ?>"><?php echo $row['TenL']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Trạng thái</label>
          <select class="form-control" id="trang-thai-dg-sua">
              <option value="1">Bình thường</option>
              <option value="2">Tạm khóa (không cho đăng nhập)</option>
          </select>
        </div>
        <p class="help-block"> (<b>*</b>) Mật khẩu mặc định khi reset là: <b style="color: red;">123456</b></p>
        <input type="text" hidden="hidden" name="" value="" id="id-id-dg-sua">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-warning" id="nut-reset-mk-dg">Reset mật khẩu</button>
        <button type="button" class="btn btn-primary" id="nut-sua-dg">Hoàn tất</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm độc giả -->

<!-- Modal: Xóa khoa -->
<div class="modal fade in" id="qltv-modal-xoa-dg" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa độc giả</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">Bạn có chắc muốn xóa độc giả này?</div>
      </div>
      <input type="text" hidden="hidden" name="" id="id-id-dg-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-dg">Tôi chắc chắn</button>
      </div>
    </div> 
  </div>
</div><!-- Xóa khoa -->

<script type="text/javascript">
    document.title = "VLUTE LIB | Lớp";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#doc-gia").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
      function thanhcong(chuoi) {
           $.notify(chuoi, {
              animate: {
                enter: 'animated bounceIn',
                exit: 'animated bounceOut'
              },
              type: 'success',
              delay: 2000
            });
           $("#qltv-modal-them-dg").modal("hide");
      }
      function tailai() {
        setTimeout(function(){ location.reload(); }, 3000);
      }
      function dongsua() {
        $("#qltv-modal-sua-dg").modal("hide");
      }
      function dongxoa(){
        $("#qltv-modal-xoa-dg").modal("hide");
      }
      function khongthanhcong(chuoi) {
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
        document.getElementById('ngay-lap-the-dg-them').valueAsDate = new Date();
        document.getElementById('ngay-sinh-dg-them').valueAsDate = new Date();
        document.getElementById("ngay-lap-the-dg-them").readOnly = true;
        $("#themdocgia").click(function(){
        	$("#qltv-modal-them-dg").modal("show");
        });
        $("#nut-them-dg").click(function(){
  	      $.ajax({
  	        url : "ajax/ajax_them_doc_gia.php",
  	        type : "post",
  	        dataType:"text",
  	        data : {
              ma: $("#ma-dg-them").val(),
  	          ten: $("#ho-ten-dg-them").val(),
              tdn: $("#ten-dang-nhap-dg-them").val(),
              sinh: $("#ngay-sinh-dg-them").val(),
              lap: $("#ngay-lap-the-dg-them").val(),
              diachi: $("#dia-chi-dg-them").val(),
              mail: $("#mail-dg-them").val(),
              lop: $("#khoa-dg-them").val()
  	        },
  	        success : function (data){
  	            $("body").append(data);
  	            //location.reload();
  	        }
  	      });
	     });
	    $(".btn-sua-dg").click(function(){
	    	var id = $(this).attr("data-qltv");
        $("#ma-dg-sua").val($("#id-ma-dg-"+id).text().trim());
	    	$("#ho-ten-dg-sua").val($("#id-ten-dg-"+id).text().trim());
	    	$("#ten-dang-nhap-dg-sua").val($("#id-ten-dang-nhap-dg-"+id).text().trim());
        $("#ngay-sinh-dg-sua").val($("#id-ngay-sinh-dg-"+id).text().trim());
        $("#dia-chi-dg-sua").val($("#id-dia-chi-dg-"+id).text().trim());
        $("#ngay-lap-the-dg-sua").val($("#id-ngay-lap-the-dg-"+id).text().trim());
        $("#mail-dg-sua").val($("#id-mail-dg-"+id).text().trim());
        $("#khoa-dg-sua").val($("#id-ma-khoa-dg-"+id).val().trim());
        $("#trang-thai-dg-sua").val($("#id-trang-thai-dg-"+id).val().trim());
        $("#id-id-dg-sua").val($("#id-id-dg-"+id).val().trim());
	    	$("#qltv-modal-sua-dg").modal("show");
	    });
	    $("#nut-sua-dg").click(function(){
	      $.ajax({
	        url : "ajax/ajax_sua_doc_gia.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          mail: $("#mail-dg-sua").val(),
            tt: $("#trang-thai-dg-sua").val(),
            ma: $("#ma-dg-sua").val(),
            id: $("#id-id-dg-sua").val()
	        },
	        success : function (data){
	            $("body").append(data);
	            //location.reload();
	        }
	      });
	    });
      $("#nut-reset-mk-dg").click(function(){
        $.ajax({
          url : "ajax/ajax_reset_mk_doc_gia.php",
          type : "post",
          dataType:"text",
          data : {
            ma: $("#id-id-dg-sua").val()
          },
          success : function (data){
              $("body").append(data);
              //location.reload();
          }
        });
      });
	    $(".btn-xoa-dg").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#id-id-dg-xoa").val(id);
	    	$("#qltv-modal-xoa-dg").modal("show");
	    });
	    $("#nut-xoa-dg").click(function(){
	      $.ajax({
	        url : "ajax/ajax_xoa_doc_gia.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          ma: $("#id-id-dg-xoa").val()
	        },
	        success : function (data){
	            $("body").append(data);
	        }
	      });
	    });
    });
</script>
<script type="text/javascript">
  $('#qltv-loai-sach').DataTable();
</script>
<style type="text/css">
  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px 1px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
</style>