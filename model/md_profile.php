<?php 
	include_once("admin/config/config.php");
	function tv_get_thong_tin($tk){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM `docgia` where binary (TaiKhoanDG = '$tk')";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function tv_muon($tk){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT * FROM muontra mt, sach s WHERE mt.MaDG = '$tk' and mt.MaS = s.MaS";
		$result = mysqli_query($conn, $query);
		return $result;
	}
	function tv_tra($tk){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT DISTINCT * FROM cttra t, sach s WHERE t.MaDG = '$tk' and t.MaS = s.MaS";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>