<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_get_sach_tu_nha_xuat_ban($nam){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT s.MaS, s.TenS, ls.MaLS, ls.TenLS, tg.MaTG, tg.TenTG, nxb.MaNXB, nxb.TenNXB,s.NamXB, s.SoTrang, s.HinhAnhS, s.SL, s.Gia, s.NgayNhap FROM sach s,tacgia tg, loaisach ls, nhaxuatban nxb WHERE s.MaLS = ls.MaLS and s.MaTG = tg.MaTG and s.MaNXB = nxb.MaNXB and `XoaSach`= '0' and Year(s.NgayNhap) = '$nam'";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])){
		if(!qltv_login_tt($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			$nam = $_POST['nam'];
			$dulieu = tv_get_sach_tu_nha_xuat_ban($nam);
			$dem = mysqli_num_rows($dulieu);
	?>
        <table id="qltv-loai-sach" class="table table-striped">
            <thead>
                <tr role="row">
                  <tr style="background-color: #e0e0e0;color: #7d7d7d;border-top: 3px solid #9e9e9e;">
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
                    <td><?php echo $row['TenS']; ?></td>
                    <td><?php echo $row['TenLS']; ?></td>
                    <td><?php echo $row['TenTG']; ?></td>
                    <td><?php echo $row['TenNXB']; ?></td>
                    <td class="giua"><?php echo $row['NamXB']; ?></td>
                    <td class="giua"><?php echo $row['SoTrang']; ?></td>
                    <td class="giua"><?php echo $row['SL']; ?></td>
                    <td><?php echo $row['Gia']; ?></td>
                    <td class="giua"><?php echo $row['NgayNhap']; ?></td>
                </tr>
                <?php
                $stt++;
              }
            ?>
            </tbody>
        </table>
<?php	}
	}
    else{
        echo "<script type=\"text/javascript\">trangdangnhap()</script>";
        exit();
    }
	if ($dem > 0) {
 ?>
 	<form action="ajax/ajax_export_sach_theo_nam.php" method="post">
 		<input type="text" hidden="hidden" name="nam" value="<?php echo $nam; ?>">
 		<input class="animated pulse btn btn-success" type="submit" name="" value="Tải xuống file Excel" target="_blank" style="position: absolute;bottom: 0;margin-bottom: 10px;left: 44%;" >
 	</form>
 <?php } ?>
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
  $('#qltv-loai-sach').DataTable();
</script>