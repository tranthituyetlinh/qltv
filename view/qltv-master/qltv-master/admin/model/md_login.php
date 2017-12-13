<?php 
	include_once("config.php");
	function tv_login($username, $password){
		$password = md5($password);	
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "SELECT * FROM `nhanvien` WHERE BINARY `TenDangNhap` = '$username' and `MatKhau` = '$password' and trangthainv='0'";
		$thucthi = mysqli_query($conn, $hoi);
		$dem_user = mysqli_num_rows($thucthi);
		if ($dem_user > 0)
			return true;
		else
			return false;
	}
	function tv_login_ad($username, $password){
		$password = md5($password);	
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "SELECT * FROM `nhanvien` WHERE BINARY `TenDangNhap` = '$username' and `MatKhau` = '$password' and trangthainv='0' and DaXoa = '0' and LoaiNV = '0'";
		$thucthi = mysqli_query($conn, $hoi);
		$dem_user = mysqli_num_rows($thucthi);
		if ($dem_user > 0)
			return true;
		else
			return false;
	}
	function tv_login_tt($username, $password){
		$password = md5($password);	
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "SELECT * FROM `nhanvien` WHERE BINARY `TenDangNhap` = '$username' and `MatKhau` = '$password' and trangthainv='0' and DaXoa = '0' and LoaiNV = '1'";
		$thucthi = mysqli_query($conn, $hoi);
		$dem_user = mysqli_num_rows($thucthi);
		if ($dem_user > 0)
			return true;
		else
			return false;
	}
	
 ?>