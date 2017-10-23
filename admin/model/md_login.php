<?php 
	include_once("config/config.php");
	function tv_login($username, $password){
		$password = md5($password);	
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "SELECT * FROM `nhanvien` WHERE `TenDangNhap` = '$username' and `MatKhau` = '$password'";
		$thucthi = mysqli_query($conn, $hoi);
		$dem_user = mysqli_num_rows($thucthi);
		if ($dem_user > 0)
			return true;
		else
			return false;
	}
 ?>