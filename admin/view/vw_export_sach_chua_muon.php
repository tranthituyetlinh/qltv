<!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Thống kê sách chưa mượn
        <div class="line"></div>
      </h1>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12 col-ms-12 cach"></div>
      </div>
      <div id="bang-du-lieu" class="windows-table animated fadeIn">
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #e0e0e0;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
                    <th class="giua">STT</th>
                    <th class="giua">Mã sách</th>
                    <th class="giua">Tên sách</th>
                    <th class="giua">Loại sách</th>
                    <th class="giua">Số lượng</th>
                  </tr>
                </tr>
            </thead>
            <tbody>
            <?php 
              $stt = 1;
              while ($row = mysqli_fetch_assoc($sdm)) {
                ?>
                  <tr>
                    <th class="giua"><?php echo $stt; ?></th>
                    <td class="giua"><a>S<?php echo $row['MaS']; ?></a></td>
                    <td><?php echo $row['TenS']; ?></td>
                    <td><?php echo $row['TenLS']; ?></td>
                    <td class="giua"><?php echo $row['SL']; ?></td>
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
      </div>
    </section>
<?php 
  if ($dem > 0) {
?>
    <form action="ajax/ajax_du_lieu_sach_chua_muon.php" method="post">
    <input type="text" hidden="hidden" name="chuamuon" value="1">
    <input class="animated pulse btn btn-success" type="submit" name="" value="Tải xuống file Excel" target="_blank" style="position: relative;bottom: 0;margin-bottom: 10px;left: 44%;" >
  </form>
<?php
  }
 ?>
 <style type="text/css">
   table.dataTable {
      clear: both;
      margin-top: 6px !important;
      margin-bottom: 6px !important;
      max-width: none !important;
      font-size: 12px;
  }
 </style>
<script type="text/javascript">
    document.title = "VLUTE LIB | Thống kê sách chưa mượn";
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$("#thong-ke").addClass("active");
	});
</script>
<link rel="stylesheet" href="css/datatables.min.css">
<script src="js/datatables.min.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
      $(document).ready(function() {
        $('#qltv-khoa-sach').DataTable();
      });
</script>
<script src="../bootstrap/dist/js/bootstrap-select.min.js"></script>
<script type="text/javascript">
  $('#qltv-loai-sach').DataTable();
</script>