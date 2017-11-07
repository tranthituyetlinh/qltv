<?php 
	include_once("config.php");
	function tv_get_sach_theo_nam(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT Year(NgayNhap) as nam FROM sach ORDER BY Year(NgayNhap)";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>