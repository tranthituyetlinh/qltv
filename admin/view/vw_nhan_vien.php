<script type="text/javascript">
  function thanhcong(chuoi) {
       $.notify(chuoi, {
          animate: {
            enter: 'animated bounceIn',
            exit: 'animated bounceOut'
          },
          type: 'success',
          delay: 2000
        });
       $("#qltv-modal-them-nhan-vien").modal("hide");
       $("#qltv-modal-sua-nhan-vien").modal("hide");
  }
    function tailai() {
      setTimeout(function(){ location.reload(); }, 3000);
    }
    function dongxoa(){
      $("#qltv-modal-xoa-nhan-vien").modal("hide");
    }
  function thanhcongtt(chuoi) {
       $.notify(chuoi, {
          animate: {
            enter: 'animated bounceIn',
            exit: 'animated bounceOut'
          },
          type: 'success',
          delay: 2000
        });
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
  function trangdangnhap(){
    location.href = "<?php echo $qltv['HOST']; ?>/control/ctrl_login_out.php";
  }
</script>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nhân viên
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <a id="themnhanvien" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Thêm nhân viên</a>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="row">
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table animated fadeIn">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #2980b9;color: #fff;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã nhân viên</th>
                    <th class="giua">Tên nhân viên</th>
                    <th class="giua">Tên đăng nhập</th>
                    <th class="giua">Mail</th>
                    <th class="giua">Loại nhân viên</th>
                    <th class="giua">Trạng thái</th>
                    <th class="giua">HS Phụ cấp</th>
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
                    <td id="id-ma-nv-<?php echo $row['Id']; ?>"><a><?php echo $row['MaNV']; ?></a></td>
                    <td id="id-ten-nv-<?php echo $row['Id']; ?>"><?php echo $row['TenNV']; ?></td>
                    <td id="id-ten-dang-nhap-nv-<?php echo $row['Id']; ?>"><?php echo $row['TenDangNhap']; ?></td>
                    <td id="id-mail-nv-<?php echo $row['Id']; ?>"><?php echo $row['Mail']; ?></td>
                    <td class="nut giua">
                      <?php if ($row['LoaiNV']=='1') {
                      ?>
                      <a class="btn btn-primary" data-l="1" data-qltv="<?php echo $row['Id']; ?>" title="Thủ thư">Thủ thư</a>
                      <?php
                      } else { ?>
                      <a class="btn btn-success" data-l="0" data-qltv="<?php echo $row['Id']; ?>" title="Admin">Admin</i></a>
                      <?php } ?>
                    </td>
                    <td class="nut giua trangthainhanvien" id="id-trang-thai-nhan-vien-<?php echo $row['Id']; ?>" data-qltv="<?php echo $row['Id']; ?>">
                      <?php if ($row['TrangThaiNV']=='0') {
                      ?>
                      <a class="btn btn-success" title="Bình thường"><i class="fa fa-check" aria-hidden="true"></i></a>
                      <?php
                      } else { ?>
                      <a class="btn btn-warning" title="Không được đăng nhập"><i class="fa fa-close" aria-hidden="true"></i></a>
                      <?php } ?>
                    </td>
                    <td class="giua" id="id-hspc-nv-<?php echo $row['Id']; ?>"><?php echo $row['HeSoPhuCap']; ?></td>
                    <td class="giua">
                      <div class="nut nam-giua">
                        <a class="btn btn-primary btn-sua-nhan-vien" data-l="<?php echo $row['LoaiNV']; ?>" data-qltv="<?php echo $row['Id']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xoa-nhan-vien" data-qltv="<?php echo $row['Id']; ?>" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      </div>
                    </td>
                    <input type="text" hidden="hidden" name="" id="id-dia-chi-nv-<?php echo $row['Id']; ?>" value="<?php echo $row['DiaChiNV']; ?>">
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>
    </section>

<!-- Modal: Thêm nhân viên -->
<div class="modal fade" id="qltv-modal-them-nhan-vien" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">`
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm nhân viên</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label>Mã nhân viên(*)</label>
                  <input type="text" class="form-control" name="" id="ma-nhan-vien-them" placeholder="mã nhân viên" required autocomplete="on">
                  <p class="help-block"> (<b>*</b>) Chấp nhận <b>MSCB</b>, <b>CMND</b> hoặc <b>Id</b> thẻ ATM.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label>Tên đăng nhập(**)</label>
                  <input type="text" class="form-control" name="" id="ten-dang-nhap-them" placeholder="số lượng" required autocomplete="on">
                  <p class="help-block"> (<b>**</b>) Mật khẩu mặc định là: <b style="color: red;">123456</b></p>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Họ & Tên</label>
              <input type="text" class="form-control" name="" id="ho-ten-nhan-vien-them" placeholder="họ tên độc giả" required autocomplete="on">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Địa chỉ mail(***)</label>
              <input type="text" class="form-control" name="" id="mail-nhan-vien-them" placeholder="địa chỉ mail" required autocomplete="on">
            </div>
          <p class="help-block"> (<b>***</b>) Nên dùng địa chỉ mail trường do cung cấp.</p>
          </div>  
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Loại nhân viên</label>
              <select id="loai-nhan-vien-them" class="form-control">
                  <option value="0">Admin</option>
                  <option value="1">Thủ thư</option>
              </select>
            </div>
          </div> 
          <div class="col-md-4">
            <div class="form-group">
              <label>Hệ số phụ cấp</label>
              <input type="text" id="he-so-phu-cap-them" name="" class="form-control" value="">
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
              <label>Địa chỉ</label>
              <textarea class="form-control" name="" id="dia-chi-nhan-vien-them" rows="5"></textarea>
            </div>
          </div> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-nhan-vien">Hoàn tất</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm nhân viên -->

<!-- Modal: Sửa nhân viên -->
<div class="modal fade" id="qltv-modal-sua-nhan-vien" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">`
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Sửa nhân viên</h4>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label>Mã nhân viên(*)</label>
                  <input type="text" class="form-control" name="" id="ma-nhan-vien-sua" placeholder="mã nhân viên" required autocomplete="on">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label>Tên đăng nhập(**)</label>
                  <input type="text" class="form-control" name="" id="ten-dang-nhap-sua" placeholder="số lượng" required autocomplete="on" disabled>
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Họ & Tên</label>
              <input type="text" class="form-control" name="" id="ho-ten-nhan-vien-sua" placeholder="họ tên độc giả" required autocomplete="on" disabled>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Địa chỉ mail(***)</label>
              <input type="text" class="form-control" name="" id="mail-nhan-vien-sua" placeholder="địa chỉ mail" required autocomplete="on">
            </div>
          </div>  
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Loại nhân viên</label>
              <select id="loai-nhan-vien-sua" class="form-control">
                  <option value="0">Admin</option>
                  <option value="1">Thủ thư</option>
              </select>
            </div>
          </div> 
          <div class="col-md-4">
            <div class="form-group">
              <label>Hệ số phụ cấp</label>
              <input type="text" id="he-so-phu-cap-sua" name="" class="form-control" value="">
            </div>
          </div>  
          <div class="col-md-4">
            <div class="form-group">
              <label>Địa chỉ</label>
              <textarea class="form-control" name="" id="dia-chi-nhan-vien-sua" rows="5" disabled></textarea>
            </div>
          </div> 
          <input type="text" hidden="hidden" name="" id="ma-old-nv" value="">
          <input type="text" hidden="hidden" name="" id="id-id-nv" value="">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-sua-nhan-vien">Hoàn tất</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Sửa nhân viên -->

<!-- Modal: Xóa nhân viên -->
<div class="modal fade in" id="qltv-modal-xoa-nhan-vien" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa nhân viên</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">Bạn có chắc muốn xóa nhân viên này?<br><b>*Mẹo:</b> Bạn có thể thay đổi trạng thái của nhân viên từ <a class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i></a> sang <a class="btn btn-warning"><i class="fa fa-close" aria-hidden="true"></i></a> mà không cần xóa nhân viên!</div>
      </div>
      <input type="text" hidden="hidden" name="" id="ma-nhan-vien-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-nhan-vien">Tôi chắc chắn</button>
      </div>
    </div> 
  </div>
</div><!-- Xóa nhân viên -->

<script type="text/javascript">
    document.title = "VLUTE LIB | Nhập sách";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#nhanvien").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">

      $(document).ready(function() {
        $(".trangthainhanvien").click(function(){
          var id = $(this).attr("data-qltv");
          $.ajax({
            url : "ajax/ajax_sua_trang_thai_nhan_vien.php",
            type : "post",
            dataType:"text",
            data : {
                ma: id
            },
            success : function (data){
                $("#id-trang-thai-nhan-vien-"+id).html(data);
            }
          });
        });
        $("#themnhanvien").click(function(){
          $("#qltv-modal-them-nhan-vien").modal("show");
        });
        $("#nut-them-nhan-vien").click(function(){
  	      $.ajax({
  	        url : "ajax/ajax_them_nhan_vien.php",
  	        type : "post",
  	        dataType:"text",
  	        data : {
                ma: $("#ma-nhan-vien-them").val().trim(),
    	          tdn: $("#ten-dang-nhap-them").val().trim(),
    	          ten: $("#ho-ten-nhan-vien-them").val().trim(),
    	          mail: $("#mail-nhan-vien-them").val().trim(),
                loai: $("#loai-nhan-vien-them").val().trim(),
                hspc: $("#he-so-phu-cap-them").val().trim(),
                diachi: $("#dia-chi-nhan-vien-them").val().trim()
  	        },
  	        success : function (data){
  	            $("body").append(data);
  	            //location.reload();
  	        }
  	      });
	     });
	    $(".btn-sua-nhan-vien").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#ma-nhan-vien-sua").val($("#id-ma-nv-"+id).text().trim());
	    	$("#ten-dang-nhap-sua").val($("#id-ten-dang-nhap-nv-"+id).text().trim());
        $("#ho-ten-nhan-vien-sua").val($("#id-ten-nv-"+id).text().trim());
        $("#mail-nhan-vien-sua").val($("#id-mail-nv-"+id).text().trim());
        $("#loai-nhan-vien-sua").val($(this).attr("data-l"));
        $("#he-so-phu-cap-sua").val($("#id-hspc-nv-"+id).text().trim());
        $("#dia-chi-nhan-vien-sua").val($("#id-dia-chi-nv-"+id).val().trim());
        $("#ma-old-nv").val($("#id-ma-nv-"+id).text().trim());
        $("#id-id-nv").val(id);
	    	$("#qltv-modal-sua-nhan-vien").modal("show");
	    });
        $("#nut-sua-nhan-vien").click(function(){
          $.ajax({
            url : "ajax/ajax_sua_nhan_vien.php",
            type : "post",
            dataType:"text",
            data : {
                ma: $("#ma-nhan-vien-sua").val().trim(),
                mail: $("#mail-nhan-vien-sua").val().trim(),
                loai: $("#loai-nhan-vien-sua").val().trim(),
                hspc: $("#he-so-phu-cap-sua").val().trim(),
                id: $("#id-id-nv").val(),
                maold: $("#ma-old-nv").val()
            },
            success : function (data){
                $("body").append(data);
                //location.reload();
            }
          });
       });
      $(".btn-xoa-nhan-vien").click(function(){
        var id = $(this).attr("data-qltv");
        $("#ma-nhan-vien-xoa").val(id);
        $("#qltv-modal-xoa-nhan-vien").modal("show");
      });
        $("#nut-xoa-nhan-vien").click(function(){
          $.ajax({
            url : "ajax/ajax_xoa_nhan_vien.php",
            type : "post",
            dataType:"text",
            data : {
                id: $("#ma-nhan-vien-xoa").val().trim()
            },
            success : function (data){
                $("body").append(data);
                //location.reload();
            }
          });
       });
        $('#qltv-loai-sach').DataTable();
      });
</script>
<style type="text/css">
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
  	padding: 4px 0px;
  	padding-left: 4px;
  }
</style>