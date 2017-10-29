<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Nhà xuất bản
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <a id="themloaisach" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Thêm nhà xuất bản</a>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table animated fadeIn">
        <table id="qltv-loai-sach" class="table table-striped table-bordered">
            <thead>
                <tr role="row">
                  <tr style="background-color: #2980b9;color: #fff;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã nhà xuất bản</th>
                    <th class="giua">Tên nhà xuất bản</th>
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
                    <td class="giua"><a>NXB<?php echo $row['MaNXB']; ?></a></td>
                    <td><?php echo $row['TenNXB']; ?></td>
                    <td class="giua"><div class="nam-giua"><a class="btn btn-primary btn-sua-nxb" data-qltv="<?php echo $row['MaNXB']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xoa-nxb" title="Xóa"
                        data-qltv="<?php echo $row['MaNXB']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                    </td>
                    <input type="text" hidden="hidden" name="" id="id-ma-nxb-<?php echo $row['MaNXB']; ?>" value="<?php echo $row['MaNXB']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ten-nxb-<?php echo $row['MaNXB']; ?>" value="<?php echo $row['TenNXB']; ?>">
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
<div class="modal fade" id="qltv-modal-them-nxb" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm nhà xuất bản</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Tên nhà xuất bản</label>
          <input type="text" class="form-control" name="" id="ten-nxb-sach-them" placeholder="tên loại sách" required autocomplete="on">
        </div>
      </div>
        <input type="text" hidden="hidden" name="" value="" id="id-id">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-them-nxb-sach">Thêm nhà xuất bản</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm loại sách -->

<!-- Modal: Thêm loại sách -->
<div class="modal fade" id="qltv-modal-sua-nxb" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Chỉnh sửa nhà xuất bản</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Tên nhà xuất bản</label>
          <input type="text" class="form-control" name="" id="ten-nxb-sach-sua" placeholder="tên loại sách" required autocomplete="on">
        </div>
      </div>
        <input type="text" hidden="hidden" name="" value="" id="ma-nxb-sach-sua-old">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-sua-nxb-sach">Hoàn tất</button>
      </div>
    </div>
  </div>
</div><!-- Modal: Thêm loại sách -->

<!-- Modal: Xoa loại sách -->
<div class="modal fade in" id="qltv-modal-xoa-nxb" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
        <h4 class="modal-title" id="myModalLabel">Xóa giáo viên</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">Bạn có chắc muốn xóa giáo viên này?</div>
      </div>
      <input type="text" hidden="hidden" name="" id="ma-nxb-sach-xoa">
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tôi không chắc</button>
        <button type="button" class="btn btn-danger" id="nut-xoa-nxb-sach">Tôi chắc chắn</button>
      </div>
    </div> 
  </div>
</div>

<script type="text/javascript">
    document.title = "VLUTE LIB | Nhà xuất bản";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#muc-sach").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
  $('#qltv-loai-sach').DataTable();
      $(document).ready(function() {
        $('#qltv-nxb-sach').DataTable();
        $("#themloaisach").click(function(){
        	$("#qltv-modal-them-nxb").modal("show");
        });
        $("#nut-them-nxb-sach").click(function(){
	      $.ajax({
	        url : "ajax/ajax_them_nha_xuat_ban.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          ten: $("#ten-nxb-sach-them").val()
	        },
	        success : function (data){
	            alert(data);
	            location.reload();
	        }
	      });
	    });
	    $(".btn-sua-nxb").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#ten-nxb-sach-sua").val($("#id-ten-nxb-"+id).val().trim());
	    	$("#ma-nxb-sach-sua-old").val($("#id-ma-nxb-"+id).val().trim());
	    	$("#qltv-modal-sua-nxb").modal("show");
	    });
	    $("#nut-sua-nxb-sach").click(function(){
	      $.ajax({
	        url : "ajax/ajax_sua_nha_xuat_ban.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          ma: $("#ma-nxb-sach-sua-old").val(),
	          ten: $("#ten-nxb-sach-sua").val()
	        },
	        success : function (data){
	            alert(data);
	            location.reload();
	        }
	      });
	    });
	    $(".btn-xoa-nxb").click(function(){
	    	var id = $(this).attr("data-qltv");
	    	$("#ma-nxb-sach-xoa").val($("#id-ma-nxb-"+id).val().trim());
	    	$("#qltv-modal-xoa-nxb").modal("show");
	    });
	    $("#nut-xoa-nxb-sach").click(function(){
	      $.ajax({
	        url : "ajax/ajax_xoa_nha_xuat_ban.php",
	        type : "post",
	        dataType:"text",
	        data : {
	          ma: $("#ma-nxb-sach-xoa").val()
	        },
	        success : function (data){
	            alert(data);
	            location.reload();
	        }
	      });
	    });
      });
</script>