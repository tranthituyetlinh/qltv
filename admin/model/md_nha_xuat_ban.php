<?php 
	include_once("config.php");
	function tv_get_nha_xuat_ban(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM `nhaxuatban`";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>