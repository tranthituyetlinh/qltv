<?php 
	include_once("../admin/config/config.php");
	function tv_login($username, $password){
		$password = md5($password);	
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "SELECT * FROM `docgia` WHERE BINARY `TaiKhoanDG` = '$username' and `MatKhauDG` = '$password' and trangthai='0'";
		$thucthi = mysqli_query($conn, $hoi);
		$dem_user = mysqli_num_rows($thucthi);
		if ($dem_user > 0)
			return true;
		else
			return false;
	}
 ?>