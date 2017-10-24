<?php 
	include_once("config.php");
	function tv_get_lop(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT l.MaL, l.TenL, l.MaK, k.TenK FROM `lop` l, `khoa` k WHERE l.`MaK` = k.`MaK`";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function tv_get_khoa(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM `khoa`";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>