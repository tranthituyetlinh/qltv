<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mượn sách
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <a id="muonsach" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Cho mượn sách</a>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table animated fadeIn">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Tên NV</th>
                    <th class="giua">Mã ĐG</th>
                    <th class="giua">Tên ĐG</th>
                    <th class="giua">Tên sách</th>
                    <th class="giua">Ngày mượn</th>
                    <th class="giua">Ngày trả</th>
                    <th class="giua">Trạng thái</th>
                    <th class="giua">SL chưa trả</th>
                    <th class="giua">Gia hạn</th>
                    <th class="giua">Trả sách</th>
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
                    <input type="text" hidden="hidden" id="id-ma-nv-mt-<?php echo $row['Id']; ?>" value="<?php echo $row['MaNV'] ?>" >
                    <td id="id-ten-nv-mt-<?php echo $row['Id']; ?>"><a><?php echo $row['TenNV']; ?></a></td>
                    <input type="text" hidden="hidden" id="id-ma-dg-mt-<?php echo $row['Id']; ?>" value="<?php echo $row['MaDG'] ?>" >
                    <td id="id-ma-dg-2-mt-<?php echo $row['Id']; ?>"><a><?php echo $row['MaDG']; ?></a></td>
                    <td id="id-ten-dg-mt-<?php echo $row['Id']; ?>"><a><?php echo $row['TenDG']; ?></a></td>
                    <input type="text" hidden="hidden" class="giua" id="id-ma-s-mt-<?php echo $row['Id']; ?>" value="<?php echo $row['MaS'] ?>" >
                    <td id="id-ten-s-mt-<?php echo $row['Id']; ?>"><a><?php echo $row['TenS']; ?></a></td>
                    <td class="giua" id="id-ngay-muon-mt-<?php echo $row['Id']; ?>"><?php echo $row['NgayMuon']; ?></td>
                    <td class="giua" id="id-ngay-tra-mt-<?php echo $row['Id']; ?>"><?php echo $row['NgayTra']; ?></td>
                    <td class="giua" id="id-trang-thai-mt-<?php echo $row['Id']; ?>">
                    <?php 
                      if ($row['TrangThai']==0) { ?>
                        <span class="chuatra" >Chưa trả</span>
                    <?php } else { ?>
                        <span class="datra" >Đã trả</span>
                    <?php } ?>
                    </td>
                    <td class="giua" id="id-trang-thai-mt-<?php echo $row['Id']; ?>">
                        <span class="slmuon" ><?php echo $row['SLMuon']; ?></span>
                    </td>
                    <td class="giua" id="id-so-lan-gia-han-mt-<?php echo $row['Id']; ?>">
                    <?php 
                      if ($row['GiaHan']==0 && $row['TrangThai']== 0) { ?>
                      <div class="nut nam-giua"><a class="btn btn-warning btn-gia-han" data-qltv="<?php echo $row['Id']; ?>" title="Gia hạn"><i class="fa fa-gavel" aria-hidden="true"></i></a></div>
                    <?php } else if($row['TrangThai']==1){ ?>
                        <span class="datra" >Đã trả</span>
                    <?php } else { ?>
                        <span class="chuatra" >Đã gia hạn</span>
                    <?php } ?>
                    </td>
                    <td class="giua">
                    <?php 
                      if ($row['TrangThai']==0) { ?>
                      <div class="nut nam-giua"><a class="btn btn-primary btn-tra-sach" data-sl="<?php echo $row['SLMuon']; ?>" data-qltv="<?php echo $row['Id']; ?>" title="Sửa"><i class="fa fa-paper-plane" aria-hidden="true"></i></a></div>
                    <?php } ?>

                    </td>
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>

    <section class="content-header">
      <h1>
        Trả sách
        <div class="line"></div>
      </h1>
    </section>
      <div class="windows-table animated fadeIn">
        <table id="qltv-tra-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #f1f1f1;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Tên NV</th>
                    <th class="giua">Mã ĐG</th>
                    <th class="giua">Tên ĐG</th>
                    <th class="giua">Tên sách</th>
                    <th class="giua">Ngày trả</th>
                    <th class="giua">SL đã trả</th>
                  </tr>
                </tr>
            </thead>
            <tbody>
            <?php 
              $stt = 1;
              while ($row = mysqli_fetch_assoc($tra)) {
                ?>
                  <tr>
                    <th class="giua"><?php echo $stt; ?></th>
                    <input type="text" hidden="hidden" id="id-ma-nv-t-<?php echo $row['Id']; ?>" value="<?php echo $row['MaNV'] ?>" >
                    <td id="id-ten-nv-t-<?php echo $row['Id']; ?>"><a><?php echo $row['TenNV']; ?></a></td>
                    <input type="text" hidden="hidden" id="id-ma-dg-t-<?php echo $row['Id']; ?>" value="<?php echo $row['MaDG'] ?>" >
                    <td id="id-ma-dg-2-t-<?php echo $row['Id']; ?>"><a><?php echo $row['MaDG']; ?></a></td>
                    <td id="id-ten-dg-t-<?php echo $row['Id']; ?>"><a><?php echo $row['TenDG']; ?></a></td>
                    <input type="text" hidden="hidden" class="giua" id="id-ma-s-t-<?php echo $row['Id']; ?>" value="<?php echo $row['MaS'] ?>" >
                    <td id="id-ten-s-t-<?php echo $row['Id']; ?>"><a><?php echo $row['TenS']; ?></a></td>
                    <td class="giua" id="id-ngay-tra-t-<?php echo $row['Id']; ?>"><?php echo $row['NgayTra']; ?></td>

                    <td class="giua" id="id-trang-thai-t-<?php echo $row['Id']; ?>">
                        <span class="slmuon" ><?php echo $row['SLTra']; ?></span>
                    </td>
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
<div class="modal fade" id="qltv-modal-muon-sach" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Mượn sách</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Mã sách - Tên sách</label>
          <select id="ma-ten-sach-muon" class="form-control selectpicker" data-live-search="true" title="chọn mã sách hoặc tên sách">
            <?php while ($row = mysqli_fetch_assoc($dulieu_sach_muon)) {
            ?>
              <option data-tokens="<?php echo "S".$row['MaS']." ".$row['TenS']; ?>" value="<?php echo $row['MaS']; ?>"><?php echo "S".$row['MaS']." - ".$row['TenS']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Mã độc giả - Tên độc giả</label>
          <select id="ma-ten-doc-gia-muon" class="form-control selectpicker" data-live-search="true" title="chọn mã độc giả hoặc tên độc giả">
            <?php while ($row = mysqli_fetch_assoc($dulieu_doc_gia_muon)) {
            ?>
              <option data-tokens="<?php echo $row['MaDG']." ".$row['TenDG']; ?>" value="<?php echo $row['MaDG']; ?>"><?php echo $row['MaDG']." - ".$row['TenDG']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="form-group">
          <label>Ngày mượn</label>
          <input type="date" class="form-control" name="" id="ngay-muon" required autocomplete="on">
        </div>
        <div class="form-group">
          <label>Số lượng</label>
          <input type="text" class="form-control" name="" id="so-luong-muon" placeholder="số lượng" required autocomplete="on">
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary" id="nut-cho-muon">Cho mượn</button>
      </div>
    </div>
  </div>
  </div>
</div> <!-- Modal: Thêm lớp -->

<!-- Modal: Thêm lớp -->
<!-- Modal: Thêm lớp -->
<div class="modal fade bd-example-modal-sm" id="qltv-modal-tra-sach" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Trả sách</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label>Chọn số lượng</label>
          <select id="so-luong-tra" class="form-control"></select>
        </div>
        <input type="text" hidden="hidden" name="" id="id-id-muon-tra" value="">

      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-success" id="nut-tra-sach">Xác nhận trả</button>
      </div>
    </div>
  </div>
  </div>
</div>

<script type="text/javascript">
    document.title = "VLUTE LIB | Mượn - Trả";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#muon-tra").addClass("active");
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
           $("#qltv-modal-muon-sach").modal("hide");
           $("#qltv-modal-tra-sach").modal("hide");
      }
      function tailai() {
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
      $(document).ready(function(){
        document.getElementById('ngay-muon').valueAsDate = new Date();
        document.getElementById("ngay-muon").readOnly = true;
        $("#muonsach").click(function(){
          $("#qltv-modal-muon-sach").modal("show");
        });
        $("#nut-cho-muon").click(function(){
          var manv = '<?php echo $manv; ?>';
          $.ajax({
            url : "ajax/ajax_cho_muon_sach.php",
            type : "post",
            dataType:"text",
            data : {
              s: $("#ma-ten-sach-muon").val(),
              dg: $("#ma-ten-doc-gia-muon").val(),
              nm: $("#ngay-muon").val(),
              sl: $("#so-luong-muon").val(),
              nv: manv
            },
            success : function (data){
                $("body").append(data);
            }
          });
        });
        $(".btn-gia-han").click(function(){
          var id = $(this).attr("data-qltv");
          $.ajax({
            url : "ajax/ajax_gia_han_sach.php",
            type : "post",
            dataType:"text",
            data : {
              id: id
            },
            success : function (data){
                $("body").append(data);
                //location.reload();
            }
          });
        });
        $(".btn-tra-sach").click(function(){
          var sl = $(this).attr("data-sl");
          var id = $(this).attr("data-qltv");
          $('#so-luong-tra')
              .find('option')
              .remove()
          ;
          for (var i = 1; i <= sl; i++) {
            $("#so-luong-tra").append('<option value='+i+'>'+i+'</option>');
          }
          $("#id-id-muon-tra").val(id);
          $("#qltv-modal-tra-sach").modal("show");
        });
        $("#nut-tra-sach").click(function(){
          var id = $("#id-id-muon-tra").val();
          $.ajax({
            url : "ajax/ajax_tra_sach.php",
            type : "post",
            dataType:"text",
            data : {
              sl: $("#so-luong-tra").val().trim(),
              id: id,
              s: $("#id-ma-s-mt-"+id).val(),
              nv: '<?php echo $manv; ?>'
            },
            success : function (data){
                //alert(data);
                $("body").append(data);
                //location.reload();
            }
          });
        });
      });
</script>
<script src="../bootstrap/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
  $('#qltv-loai-sach').DataTable();
  $('#qltv-tra-sach').DataTable();
</script>
<style type="text/css">
  .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px 1px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: 1px solid #ddd;
}
</style>