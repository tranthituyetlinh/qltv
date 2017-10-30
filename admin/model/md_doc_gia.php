<?php 
	include_once("config.php");
	function tv_get_doc_gia(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT dg.Id, `MaDG`, `TenDG`, `NgaySinh`, `DiaChiDG`, `NgayLapThe`, `TaiKhoanDG`, `MatKhauDG`, l.TenL, k.TenK, `Mail`, k.MaK, l.MaL,TrangThai FROM `docgia` dg, lop l, khoa k WHERE dg.MaL = l.MaL and l.MaK = k.MaK Order By MaDG asc";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>