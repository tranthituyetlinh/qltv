<?php 
	include_once("config.php");
	function tv_get_sach(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT MaS, TenS, TenLS, SoTrang, SL, HinhAnhS FROM `sach` s, `loaisach` ls WHERE s.`MaLS` = ls.`MaLS`";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function tv_lich_su_xuat_sach(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT xs.MaS, s.TenS, ls.TenLS, xs.NgayXuat, xs.SoLuong, xs.GhiChu FROM `XuatSach` xs, sach s, loaisach ls WHERE s.MaS = xs.MaS and s.MaLS = ls.MaLS ORDER BY `NgayXuat` DESC";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>