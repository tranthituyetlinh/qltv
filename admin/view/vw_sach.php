<script src="ckfinder/ckfinder.js"></script>
<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sách
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <a id="themloaisach" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Thêm sách</a>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table">
        <table id="qltv-loai-sach" class="table table-striped table-bordered">
            <thead>
                <tr role="row">
                  <tr style="background-color: #2980b9;color: #fff;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã sách</th>
                    <th class="giua">Tên sách</th>
                    <th class="giua">Loại sách</th>
                    <th class="giua">Tác giả</th>
                    <th class="giua">Nhà xuất bản</th>
                    <th class="giua">Năm xuất bản</th>
                    <th class="giua">Số trang</th>
                    <th class="giua">Số lượng</th>
                    <th class="giua">Giá</th>
                    <th class="giua">Ngày nhập</th>
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
                    <td class="giua"><a>S<?php echo $row['MaS']; ?></a></td>
                    <td><a><?php echo $row['TenS']; ?></a></td>
                    <td><?php echo $row['TenLS']; ?></td>
                    <td><?php echo $row['TenTG']; ?></td>
                    <td><?php echo $row['TenNXB']; ?></td>
                    <td class="giua"><?php echo $row['NamXB']; ?></td>
                    <td class="giua"><?php echo $row['SoTrang']; ?></td>
                    <td class="giua"><?php echo $row['SL']; ?></td>
                    <td><?php echo $row['Gia']; ?></td>
                    <td class="giua"><?php echo $row['NgayNhap']; ?></td>
                    <td class="giua"><div class="nam-giua"><a class="btn btn-primary btn-sua-sach" data-qltv="<?php echo $row['MaS']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a class="btn btn-danger btn-xoa-sach" title="Xóa"
                        data-qltv="<?php echo $row['MaS']; ?>" ><i class="fa fa-trash" aria-hidden="true"></i></a></div>
                    </td>
                    <input type="text" hidden="hidden" name="" id="id-ma-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['MaS']; ?>">
                    <input type="text" hidden="hidden" name="" id="id-ten-s-<?php echo $row['MaS']; ?>" value="<?php echo $row['TenLS']; ?>">
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
<div class="modal fade" id="qltv-modal-them-loai" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Thêm sách</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Tên sách</label>
          <input type="text" class="form-control" name="" id="ten-sach-them" placeholder="tên sách" required autocomplete="on">
        </div>
        <!--<div class="form-group">-->
        	<div class="row">
        		<div class="col-md-6">
        			<div class="form-group">
			          <label>Loại sách sách</label>
			          <select id="ma-loai-sach-them" class="form-control">
			          	<?php 
			          		while ($row = mysqli_fetch_assoc($dulieu_ls)) {
			          		?>
			          		<option value="<?php echo $row['MaLS'] ?>"><?php echo $row['TenLS'] ?></option>
			          		<?php
			          		}
			          	 ?>
			          </select>
			        </div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
			          <label>Tác giả</label>
			          <select id="ma-tac-gia-sach-them" class="form-control">
			          	<?php 
			          		while ($row = mysqli_fetch_assoc($dulieu_tg)) {
			          		?>
			          		<option value="<?php echo $row['MaTG'] ?>"><?php echo $row['TenTG'] ?></option>
			          		<?php
			          		}
			          	 ?>
			          </select>
			        </div>
        		</div>
        	</div>
        <!--</div>-->
        <!--<div class="form-group">-->
        	<div class="row">
        		<div class="col-md-6">
        			<div class="form-group">
			          <label>Năm xuất bản</label>
			          <input type="text" class="form-control" name="" id="nam-xuat-ban-sach-them" placeholder="năm xuất bản" required autocomplete="on">
			        </div>
        		</div>
        		<div class="col-md-6">
        			<div class="form-group">
			          <label>Nhà xuất bản</label>
			          <select id="nha-xuat-ban-sach-them" class="form-control">
			          	<?php 
			          		while ($row = mysqli_fetch_assoc($dulieu_nxb)) {
			          		?>
			          		<option value="<?php echo $row['MaNXB'] ?>"><?php echo $row['TenNXB'] ?></option>
			          		<?php
			          		}
			          	 ?>
			          </select>
			        </div>
        		</div>
        		</div>
        <!--</div>-->
        <div class="row">
        	<div class="col-md-6">
        		<div class="form-group">
			          <label>Số trang</label>
			          <input type="text" class="form-control" name="" id="so-trang-sach-them" placeholder="số trang" required autocomplete="on">
			        </div>
        		<div class="form-group">
			          <label>Số lượng</label>
			          <input type="text" class="form-control" name="" id="so-luong-sach-them" placeholder="số lượng" required autocomplete="on">
			        </div>
        		<div class="form-group">
		          <label>Giá</label>
		          <input type="text" class="form-control" name="" id="giá-sach-them" placeholder="giá sách" required autocomplete="on">
		        </div>
		        <div class="form-group">
		          <label>Ngày nhập sách</label>
		          <input type="date" class="form-control" name="" id="ngay-nhap-sach-them" placeholder="ngày nhập sách" required autocomplete="on">
		        </div>
        	</div>
        	<div class="col-md-6">
        		<div class="form-group">
        			<button class="btn" onclick="BrowseServer()">Chọn hình ảnh ... </button>				
        		</div>
        		<div class="form-group">
        			<img src="#" class="col-md-12" id="hinh-anh-sach-them" style="height: 235px;width: inherit; text-align: center;">
        		</div>
        		<input type="text" hidden="hidden" name="" value="" id="hinh-anh-sach-them-src">
        	</div>
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
<script type="text/javascript">
	var finder = new CKFinder();
    function BrowseServer() {
        finder.selectActionFunction = SetFileField;
        finder.popup();
    }
    function SetFileField(fileUrl) {
        document.getElementById('hinh-anh-sach-them').src = fileUrl;
        var host = "<?php echo $qltv['HOST']; ?>";
        host = host.substr(0,host.lastIndexOf("\/"));
        document.getElementById('hinh-anh-sach-them-src').value=fileUrl.substr(host.length+1,fileUrl.length-host.length);
    }
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#qltv-loai-sach').DataTable();
        $("#themloaisach").click(function(){
        	$("#qltv-modal-them-loai").modal("show");
        });
        $("#nut-them-loai-sach").click(function(){
	      $.ajax({
	        url : "ajax/ajax_them_loai_sach.php",
	        type : "post",
	        dataType:"text",
	        data : {
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