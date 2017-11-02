<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Mượn - Trả sách
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12">
          <a id="themdocgia" class="btn btn-success"><i class="fa fa-pencil" aria-hidden="true"></i> Cho mượn sách</a>
        </div>
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div class="windows-table animated fadeIn">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #2980b9;color: #fff;">
                    <th class="giua">STT</th>
                    <th class="giua">Tên NV</th>
                    <th class="giua">Tên ĐG</th>
                    <th class="giua">Tên sách</th>
                    <th class="giua">Ngày mượn</th>
                    <th class="giua">Ngày trả</th>
                    <th class="giua">Trạng thái</th>
                    <th class="giua">Số lượng</th>
                    <th class="giua">Số lần gia hạn</th>
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
                    <input type="text" hidden="hidden" id="id-ma-nv-mt-<?php echo $row['Id']; ?>" value="<?php echo $row['MaNV'] ?>" >
                    <td id="id-ten-nv-mt-<?php echo $row['Id']; ?>"><a><?php echo $row['TenNV']; ?></a></td>
                    <input type="text" hidden="hidden" id="id-ma-dg-mt-<?php echo $row['Id']; ?>" value="<?php echo $row['MaDG'] ?>" >
                    <td id="id-ten-dg-mt-<?php echo $row['Id']; ?>"><a><?php echo $row['TenDG']; ?></a></td>
                    <input type="text" hidden="hidden" class="giua" id="id-ma-s-mt-<?php echo $row['Id']; ?>" value="<?php echo $row['MaS'] ?>" >
                    <td id="id-ten-s-mt-<?php echo $row['Id']; ?>"><a><?php echo $row['TenS']; ?></a></td>
                    <td class="giua" id="id-ngay-muon-mt-<?php echo $row['Id']; ?>"><a><?php echo $row['NgayMuon']; ?></a></td>
                    <td class="giua" id="id-ngay-tra-mt-<?php echo $row['Id']; ?>"><a><?php echo $row['NgayTra']; ?></a></td>
                    <td class="giua" id="id-trang-thai-mt-<?php echo $row['Id']; ?>">
                    <?php 
                      if ($row['TrangThai']==0) { ?>
                        <span class="chuatra" >Chưa trả</span>
                    <?php } else { ?>
                        <span class="datra" >Đã trả</span>
                    <?php } ?>
                    </td>
                    <td class="giua" id="id-trang-thai-mt-<?php echo $row['Id']; ?>"><a><?php echo $row['SLMuon']; ?></a></td>
                    <td class="giua" id="id-so-lan-gia-han-mt-<?php echo $row['Id']; ?>"><a><?php echo $row['SLGiaHan']; ?></a></td>
                    <td class="giua">
                      <div class="nam-giua"><a class="btn btn-primary btn-sua-sach" data-qltv="<?php echo $row['Id']; ?>" title="Sửa"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></div>
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
           $("#qltv-modal-them-dg").modal("hide");
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