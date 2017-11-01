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
          <a id="themtacgia" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Thêm nhân viên</a>
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
                    <td class="giua"><a>SNV<?php echo $row['MaNV']; ?></a></td>
                    <td><?php echo $row['TenNV']; ?></td>
                    <td class="giua"><?php echo $row['TenDangNhap']; ?></td>
                    <td class="giua"><?php echo $row['Mail']; ?></td>
                    <td class="giua">
                      <?php if ($row['LoaiNV']=='1') {
                      ?>
                      <a class="btn btn-primary btn-loai-nhan-vien" data-l="1" data-qltv="<?php echo $row['MaNV']; ?>" title="Thủ thư">Thủ thư</a>
                      <?php
                      } else { ?>
                      <a class="btn btn-success btn-loai-nhan-vien" data-l="0" data-qltv="<?php echo $row['MaNV']; ?>" title="Admin">Admin</i></a>
                      <?php } ?>
                    </td>
                    <td class="giua">
                      <?php if ($row['TrangThaiNV']=='1') {
                      ?>
                      <a class="btn btn-success btn-trang-thai-nhan-vien" data-tt="1" data-qltv="<?php echo $row['MaNV']; ?>" title="Sửa"><i class="fa fa-check" aria-hidden="true"></i></a>
                      <?php
                      } else { ?>
                      <a class="btn btn-warning btn-trang-thai-nhan-vien" data-tt="0" data-qltv="<?php echo $row['MaNV']; ?>" title="Sửa"><i class="fa fa-close" aria-hidden="true"></i></a>
                      <?php } ?>
                    </td>
                    <td class="giua"><?php echo $row['HeSoPhuCap']; ?></td>
                    <td class="giua">
                      <div class="nam-giua">
                        <a class="btn btn-primary btn-sua-nhan-vien" data-qltv="<?php echo $row['MaNV']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xoa-nhan-vien" data-qltv="<?php echo $row['MaNV']; ?>" title="Xóa"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      </div>
                    </td>
                    <input type="text" hidden="hidden" name="" id="id-ma-s-<?php echo $row['MaNV']; ?>" value="<?php echo $row['MaNV']; ?>">
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>
    </section>

<!-- Modal: Thêm loại sách -->
<div class="modal fade" id="qltv-modal-nhap-sach" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">`
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nhập sách</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label class="control-label">Tên sách:</label>
          <span class="form-control-static" id="ten-sach-nhap"></span>
        </div>
        <div class="form-group">
          <label class="control-label">Loại sách:</label>
          <span class="form-control-static" id="loai-sach-nhap"></span>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label>Số trang</label>
                  <input type="text" class="form-control" name="" id="so-trang-sach-nhap" placeholder="số trang" required autocomplete="on">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label>Số lượng</label>
                  <input type="text" class="form-control" name="" id="so-luong-sach-nhap" placeholder="số lượng" required autocomplete="on">
                </div>
            </div>
        </div>
        <div class="form-group">
          <label>Ngày nhập sách</label>
          <input type="date" class="form-control" name="" id="ngay-nhap-sach" placeholder="ngày nhập sách" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Ghi chú</label>
          <textarea id="ghi-chu-nhap" class="form-control" rows="5" placeholder=""></textarea>
        </div>
        <input type="text" id="ma-sach-nhap" hidden="hidden" name="" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-nhap-sach">Hoàn tất</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm loại sách -->


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
      function thanhcong(chuoi) {
           $.notify(chuoi, {
              animate: {
                enter: 'animated bounceIn',
                exit: 'animated bounceOut'
              },
              type: 'success',
              delay: 2000
            });
           $("#qltv-modal-nhap-sach").modal("hide");
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
        document.getElementById('ngay-nhap-sach').valueAsDate = new Date();
        document.getElementById("ngay-nhap-sach").readOnly = true;
        document.getElementById("ten-sach-nhap").readOnly = true;
        document.getElementById("loai-sach-nhap").readOnly = true;
        document.getElementById("so-trang-sach-nhap").readOnly = true;
        $('[rel=thongbaonho]').bind('mouseover', function(){
         if ($(this).hasClass('ajax')) {
            var ajax = $(this).attr('ajax');    
          $.get(ajax,
          function(noidungtooltip){
            $('<div class="thongbaonho">'  + noidungtooltip + '</div>').appendTo('body').fadeIn('fast');});
         }
         else{
                var noidungtooltip = $(this).attr('content');
                $('<div class="thongbaonho">' + noidungtooltip + '</div>').appendTo('body').fadeIn('fast');
                }
                
                $(this).bind('mousemove', function(e){
                    $('div.thongbaonho').css({
                        'top': e.pageY - ($('div.thongbaonho').height() / 2) - 5,
                        'left': e.pageX + 15
                    });
                });
            }).bind('mouseout', function(){
                $('div.thongbaonho').fadeOut('fast', function(){
                    $(this).remove();
                });
            });
        $("#nut-nhap-sach").click(function(){
	      $.ajax({
	        url : "ajax/ajax_nhap_sach.php",
	        type : "post",
	        dataType:"text",
	        data : {
              ngay: $("#ngay-nhap-sach").val(),
	          ma: $("#ma-sach-nhap").val(),
	          sl: $("#so-luong-sach-nhap").val(),
	          ghichu: $("#ghi-chu-nhap").val()
	        },
	        success : function (data){
	            $("body").append(data);
	            //location.reload();
	        }
	      });
	    });
	    $(".btn-nhap-sach").click(function(){
	    	var id = $(this).attr("data-qltv");
            document.getElementById('ten-sach-nhap').innerHTML = $("#id-ten-s-"+id).val().trim();
             document.getElementById('loai-sach-nhap').innerHTML = $("#id-ten-ls-s-"+id).val().trim();
	    	$("#so-trang-sach-nhap").val($("#id-so-trang-s-"+id).val().trim());
	    	$("#ma-sach-nhap").val($("#id-ma-s-"+id).val().trim());
	    	$("#qltv-modal-nhap-sach").modal("show");
	    });
        $('#qltv-loai-sach').DataTable();
        $('#qltv-loai-sach-t').DataTable();
      });
</script>
<style type="text/css">
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{
	padding: 4px 0px;
	padding-left: 4px;
}
</style>