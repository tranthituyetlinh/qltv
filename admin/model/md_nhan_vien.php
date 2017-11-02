<?php 
	include_once("config.php");
	function tv_get_nhan_vien(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = @"SELECT * FROM `nhanvien` where DaXoa = '0'";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>