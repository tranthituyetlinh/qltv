<?php 
	include_once("config.php");
	function tv_get_doc_gia(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT `MaDG`, `TenDG`, `NgaySinh`, `DiaChiDG`, `NgayLapThe`, `TaiKhoanDG`, `MatKhauDG`, l.TenL, k.TenK FROM `docgia` dg, lop l, khoa k WHERE dg.MaL = l.MaL and l.MaK = k.MaK and `TrangThai` = '1'";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>