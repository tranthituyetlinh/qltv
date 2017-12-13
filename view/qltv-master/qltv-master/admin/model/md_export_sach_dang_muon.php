<?php 
	include_once("config.php");
	function tv_get_sach_dang_muon(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT mt.MaS, s.TenS, ls.TenLS, SUM(SLMuon) as 'SLMuon' FROM muontra mt, sach s, loaisach ls WHERE mt.MaS = s.MaS and s.MaLS = ls.MaLS and mt.TrangThai = '0' GROUP BY mt.MaS, s.TenS";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>