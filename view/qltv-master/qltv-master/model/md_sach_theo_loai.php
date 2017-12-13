<?php 
	include_once("admin/config/config.php");
	function tv_get_loai_sach(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM `loaisach`";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function tv_get_loai_sach_s($id){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM `sach` where MaLS = '$id' and XoaSach = 0";
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
	function tv_get_sach_moi(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM `sach` where XoaSach = '0' Order by MaS Desc Limit 0, 10";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>