<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sách mượn quá hạn
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
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
                    <th class="giua">SL mượn</th>
                    <th class="giua">Gửi mail</th>
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
                        <span class="chuatra" style="background: #e74c3c;">Quá hạn</span>
                    </td>
                    <td class="giua" id="id-trang-thai-mt-<?php echo $row['Id']; ?>">
                        <span class="slmuon" ><?php echo $row['SLThucTe']; ?></span>
                    </td>
                    <td class="giua">
                    <?php 
                      if ($row['TrangThai']==0) { ?>
                      <div class="nut nam-giua"><a class="btn btn-primary btn-gui-mail" data-mail="<?php echo $row['Mail']; ?>" data-qltv="<?php echo $row['Id']; ?>" title="Sửa"><i class="fa fa-paper-plane" aria-hidden="true"></i></a></div>
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
    </section>

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
        $("#muonsach").click(function(){
          $("#qltv-modal-muon-sach").modal("show");
        });
        $(".btn-gui-mail").click(function(){
          var id = $(this).attr("data-qltv");
          var mail = $(this).attr("data-mail");
          $.ajax({
            url : "ajax/ajax_gui_mail_qua_han.php",
            type : "post",
            dataType:"text",
            data : {
              tens: $("#id-ten-dg-mt-"+id).text().trim(),
              tendg: $("#id-ten-s-mt-"+id).text().trim(),
              dc: mail
            },
            success : function (data){
                  $("body").append(data);
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