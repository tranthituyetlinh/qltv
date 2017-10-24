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
                    <td class="giua"><a>TG<?php echo $row['MaTG']; ?></a></td>
                    <td><?php echo $row['TenTG']; ?></td>
                    <td><?php echo $row['DiaChiTG']; ?></td>
                    <td><?php echo $row['MoTa']; ?></td>
                    <td class="giua"><div class="nam-giua"><a class="btn btn-primary btn-sua-tg" data-qltv="<?php echo $row['MaTG']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xoa-tg" title="Xóa"
                        data-qltv="<?php echo $row['MaTG']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                    </td>
                    <input type="text" hidden="hidden" name="" id="id-ma-tg-<?php echo $row['MaTG']; ?>" value="<?php echo $row['MaTG']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ten-tg-<?php echo $row['MaTG']; ?>" value="<?php echo $row['TenTG']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-dia-chi-tg-<?php echo $row['MaTG']; ?>" value="<?php echo $row['DiaChiTG']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-mo-ta-tg-<?php echo $row['MaTG']; ?>" value="<?php echo $row['MoTa']; ?>">
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
          <label>Tên tác giả</label>
          <input type="text" class="form-control" name="" id="ten-tac-gia-them" placeholder="tên tác giả" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Địa chỉ tác giả tác giả</label>
          <input type="text" class="form-control" name="" id="dia-chi-tac-gia-them" placeholder="địa chỉ tác giả" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Mô tả tác giả</label>
          <input type="text" class="form-control" name="" id="mo-ta-tac-gia-them" placeholder="mô tả tác giả" required autocomplete="on">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-tac-gia">Thêm tác giả</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm loại sách -->

<!-- Modal: Sửa loại sách -->
<div class="modal fade" id="qltv-modal-sua-tg" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Chỉnh sửa tác giả</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Tên tác giả</label>
          <input type="text" class="form-control" name="" id="ten-tac-gia-sua" placeholder="tên tác giả" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Địa chỉ tác giả tác giả</label>
          <input type="text" class="form-control" name="" id="dia-chi-tac-gia-sua" placeholder="địa chỉ tác giả" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Mô tả tác giả</label>
          <input type="text" class="form-control" name="" id="mo-ta-tac-gia-sua" placeholder="mô tả tác giả" required autocomplete="on">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-sua-tac-gia">Hoàn tất</button>
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
        $("#nut-them-tac-gia").click(function(){
	      $.ajax({
	        url : "ajax/ajax_them_tac_gia.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          ten: $("#ten-tac-gia-them").val(),
	          diachi: $("#dia-chi-tac-gia-them").val(),
            mota: $("#mo-ta-tac-gia-them").val()
	        },
	        success : function (data){
	            alert(data);
	            location.reload();
	        }
	      });
	    });
	    $(".btn-sua-tg").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#ten-tac-gia-them").val($("#id-ten-tg-"+id).val().trim());
	    	$("#dia-chi-tac-gia-them").val($("#id-dia-chi-tg-"+id).val().trim());
	    	$("#mo-ta-tac-gia-them").val($("#id-mo-ta-tg-"+id).val().trim());
	    	$("#qltv-modal-sua-tg").modal("show");
	    });
	    $("#nut-sua-tac-gia").click(function(){
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
	    $(".btn-xoa-tg").click(function(){
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