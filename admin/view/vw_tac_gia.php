<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tác giả
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <a id="themtacgia" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Thêm tác giả</a>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table">
        <table id="qltv-loai-sach" class="table table-striped table-bordered">
            <thead>
                <tr role="row">
                  <tr style="background-color: #2980b9;color: #fff;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã tác giả</th>
                    <th class="giua">Tên tác giả</th>
                    <th class="giua">Địa chỉ tác giả</th>
                    <th class="giua">Mô tả về tác giả</th>
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
                    <td class="giua"><a><?php echo $row['MaTG']; ?></a></td>
                    <td><?php echo $row['TenTG']; ?></td>
                    <td><?php echo $row['DiaChiTG']; ?></td>
                    <td><?php echo $row['MoTa']; ?></td>
                    <td class="giua"><div class="nam-giua"><a class="btn btn-primary btn-sua-loai" data-qltv="<?php echo $row['MaTG']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xoa-loai" title="Xóa"
                        data-qltv="<?php echo $row['MaTG']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                    </td>
                    <input type="text" hidden="hidden" name="" id="id-ma-tg-<?php echo $row['MaTG']; ?>" value="<?php echo $row['MaTG']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ten-tg-<?php echo $row['MaTG']; ?>" value="<?php echo $row['MaTG']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-dia-chi-tg-<?php echo $row['MaTG']; ?>" value="<?php echo $row['MaTG']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-mo-ta-tg-<?php echo $row['MaTG']; ?>" value="<?php echo $row['MaTG']; ?>">
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
<div class="modal fade" id="qltv-modal-them-tg" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm tác giả</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Mã tác giả</label>
          <input type="text" class="form-control" name="" id="ma-loai-sach-them" placeholder="mã tác giả" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Tên tác giả</label>
          <input type="text" class="form-control" name="" id="ten-loai-sach-them" placeholder="tên tác giả" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Địa chỉ tác giả tác giả</label>
          <input type="text" class="form-control" name="" id="ten-loai-sach-them" placeholder="địa chỉ tác giả" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Mô tả tác giả</label>
          <input type="text" class="form-control" name="" id="ten-loai-sach-them" placeholder="mô tả tác giả" required autocomplete="on">
        </div>
      </div>
        <input type="text" hidden="hidden" name="" value="" id="id-id">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-loai-sach">Thêm loại sách</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm loại sách -->

<!-- Modal: Thêm loại sách -->
<div class="modal fade" id="qltv-modal-sua-loai" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Chỉnh sửa loại sách</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Mã loại sách</label>
          <input type="text" class="form-control" name="" id="ma-loai-sach-sua" placeholder="mã loại sách" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Tên loại sách</label>
          <input type="text" class="form-control" name="" id="ten-loai-sach-sua" placeholder="tên loại sách" required autocomplete="on">
        </div>
      </div>
        <input type="text" hidden="hidden" name="" value="" id="ma-loai-sach-sua-old">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-sua-loai-sach">Hoàn tất</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm loại sách -->

<!-- Modal: Xoa loại sách -->
<div class="modal fade in" id="qltv-modal-xoa-loai" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa giáo viên</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">Bạn có chắc muốn xóa giáo viên này?</div>
      </div>
      <input type="text" hidden="hidden" name="" id="ma-loai-sach-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-loai-sach">Tôi chắc chắn</button>
      </div>
    </div> 
  </div>
</div>

<script type="text/javascript">
    document.title = "VLUTE LIB | Loại sách";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#muc-sach").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#qltv-loai-sach').DataTable();
        $("#themtacgia").click(function(){
        	$("#qltv-modal-them-tg").modal("show");
        });
        $("#nut-them-loai-sach").click(function(){
	      $.ajax({
	        url : "ajax/ajax_them_loai_sach.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          loai: $("#ma-loai-sach-them").val(),
	          ten: $("#ten-loai-sach-them").val()
	        },
	        success : function (data){
	            alert(data);
	            location.reload();
	        }
	      });
	    });
	    $(".btn-sua-loai").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#ma-loai-sach-sua").val($("#id-ma-ls-"+id).val().trim());
	    	$("#ten-loai-sach-sua").val($("#id-ten-ls-"+id).val().trim());
	    	$("#ma-loai-sach-sua-old").val($("#id-ma-ls-"+id).val().trim());
	    	$("#qltv-modal-sua-loai").modal("show");
	    });
	    $("#nut-sua-loai-sach").click(function(){
	      $.ajax({
	        url : "ajax/ajax_sua_loai_sach.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          loaiold: $("#ma-loai-sach-sua-old").val(),
	          loai: $("#ma-loai-sach-sua").val(),
	          ten: $("#ten-loai-sach-sua").val()
	        },
	        success : function (data){
	            alert(data);
	            location.reload();
	        }
	      });
	    });
	    $(".btn-xoa-loai").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#ma-loai-sach-xoa").val($("#id-ma-ls-"+id).val().trim());
	    	$("#qltv-modal-xoa-loai").modal("show");
	    });
	    $("#nut-xoa-loai-sach").click(function(){
	      $.ajax({
	        url : "ajax/ajax_xoa_loai_sach.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          loai: $("#ma-loai-sach-xoa").val()
	        },
	        success : function (data){
	            alert(data);
	            location.reload();
	        }
	      });
	    });
      });
</script>