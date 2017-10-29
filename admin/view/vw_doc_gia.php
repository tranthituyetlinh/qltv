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
                    <td class="giua"><a>DG<?php echo $row['MaDG']; ?></a></td>
                    <td><a><?php echo $row['TenDG']; ?></a></td>
                    <td><?php echo $row['NgaySinh']; ?></td>
                    <td><?php echo $row['DiaChiDG']; ?></td>
                    <td><?php echo $row['NgayLapThe']; ?></td>
                    <td><a><?php echo $row['TaiKhoanDG']; ?></a></td>
                    <td><?php echo $row['TenL']; ?></td>
                    <td><?php echo $row['TenK']; ?></td>
                    <td class="giua"><div class="nam-giua"><a class="btn btn-primary btn-sua-dg" data-qltv="<?php echo $row['MaDG']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xoa-dg" title="Xóa"
                        data-qltv="<?php echo $row['MaDG']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                    </td>
                    <input type="text" hidden="hidden" name="" id="id-ma-lop-<?php echo $row['MaDG']; ?>" value="<?php echo $row['MaDG']; ?>">
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>
    </section>

<!-- Modal: Thêm lớp -->
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
              <label>Họ tên</label>
              <input type="text" class="form-control" name="" id="ho-ten-dg-them" placeholder="họ tên độc giả" required autocomplete="on">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Tên đăng nhập(*)</label>
              <input type="text" class="form-control" name="" id="ten-dang-nhap-dg-them" placeholder="tên đăng nhập" required autocomplete="on">
            </div>
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
          <label>Thuộc khoa</label>
          <select class="form-control" id="khoa-dg-them">
            <?php while ($row = mysqli_fetch_assoc($dulieu_lop)) {
            ?>
              <option value="<?php echo $row['MaL']; ?>"><?php echo $row['TenL']; ?></option>
            <?php } ?>
          </select>
        </div>
        <p class="help-block"> (<b>*</b>) Mật khẩu mặc định là: <b style="color: red;">123456</b></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-dg">Thêm độc giả</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm lớp -->

<!-- Modal: Xóa khoa -->
<div class="modal fade in" id="qltv-modal-xoa-lop" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa lớp</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">Bạn có chắc muốn xóa lớp này?</div>
      </div>
      <input type="text" hidden="hidden" name="" id="ma-lop-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-lop">Tôi chắc chắn</button>
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
           setTimeout(function(){ location.reload(); }, 3000);
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
  	          ten: $("#ho-ten-dg-them").val(),
              tdn: $("#ten-dang-nhap-dg-them").val(),
              sinh: $("#ngay-sinh-dg-them").val(),
              lap: $("#ngay-lap-the-dg-them").val(),
              diachi: $("#dia-chi-dg-them").val(),
              lop: $("#khoa-dg-them").val()
  	        },
  	        success : function (data){
  	            $("body").append(data);
  	            //location.reload();
  	        }
  	      });
	     });
	    $(".btn-sua-lop").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#ma-lop-sua").val($("#id-ma-lop-"+id).val().trim());
	    	$("#ten-lop-sua").val($("#id-ten-lop-"+id).val().trim());
        $("#khoa-lop-sua").val($("#id-ma-khoa-"+id).val().trim());
        $("#ma-lop-sua-old").val($("#id-ma-lop-"+id).val().trim());
	    	$("#qltv-modal-sua-lop").modal("show");
	    });
	    $("#nut-sua-lop").click(function(){
	      $.ajax({
	        url : "ajax/ajax_sua_lop.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          mal: $("#ma-lop-sua").val(),
            tenl: $("#ten-lop-sua").val(),
            mak: $("#khoa-lop-sua").val(),
            malold: $("#ma-lop-sua-old").val()
	        },
	        success : function (data){
	            alert(data);
	            location.reload();
	        }
	      });
	    });
	    $(".btn-xoa-lop").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#ma-lop-xoa").val($("#id-ma-lop-"+id).val().trim());
	    	$("#qltv-modal-xoa-lop").modal("show");
	    });
	    $("#nut-xoa-lop").click(function(){
	      $.ajax({
	        url : "ajax/ajax_xoa_lop.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          ma: $("#ma-lop-xoa").val()
	        },
	        success : function (data){
	            alert(data);
	            location.reload();
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