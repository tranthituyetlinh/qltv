<?php 
	include_once("config.php");
	function tv_get_nam_sach_top_10(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT Year(NgayMuon) as nam FROM muontra ORDER BY Year(NgayMuon)";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>