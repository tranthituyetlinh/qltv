<?php 
	include_once("config.php");
	function tv_get_sach_chua_muon(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT s.MaS, s.TenS, ls.TenLS, s.SL FROM sach s, muontra mt, loaisach ls WHERE s.MaLS = ls.MaLS AND s.MaS NOT IN (SELECT m.MaS FROM muontra m) GROUP BY s.MaS, s.TenS, ls.TenLS, s.SL";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>