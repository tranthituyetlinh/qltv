<?php 
	class clsKetnoi
	{
		private $maychu ="localhost";
		private $tendangnhap="root";
		private $matkhau="";
		private $csdl="qltv";

		public function ketnoi(){
			$conn=@mysqli_connect($this->maychu, $this->tendangnhap, $this->matkhau);
			mysqli_select_db($conn, $this->csdl);
			mysqli_query($conn, "SET character_set_results=utf8");
			mb_language('uni');
			mb_internal_encoding('UTF-8');
			mysqli_query($conn, "set names 'utf8'");
			return $conn;
		}
	}
	function qltv_login($username, $password){	
		$password = md5($password);
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "SELECT * FROM `nhanvien` WHERE BINARY `TenDangNhap` = '$username' and `MatKhau` = '$password' and trangthainv='0'";
		$thucthi = mysqli_query($conn, $hoi);
		$dem_user = mysqli_num_rows($thucthi);
		if ($dem_user > 0){
			return true;
		}
		else{
			echo "<script type=\"text/javascript\">trangdangnhap()</script>";
			exit();
			return false;
		}
	}
	function qltv_login_ad($username, $password){	
		$password = md5($password);
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "SELECT * FROM `nhanvien` WHERE BINARY `TenDangNhap` = '$username' and `MatKhau` = '$password' and trangthainv='0' and DaXoa = '0' and LoaiNV = '0'";
		$thucthi = mysqli_query($conn, $hoi);
		$dem_user = mysqli_num_rows($thucthi);
		if ($dem_user > 0){
			return true;
		}
		else{
			echo "<script type=\"text/javascript\">trangdangnhap()</script>";
			exit();
			return false;
		}
	}
	function qltv_login_tt($username, $password){	
		$password = md5($password);
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "SELECT * FROM `nhanvien` WHERE BINARY `TenDangNhap` = '$username' and `MatKhau` = '$password' and trangthainv='0' and DaXoa = '0' and LoaiNV = '1'";
		$thucthi = mysqli_query($conn, $hoi);
		$dem_user = mysqli_num_rows($thucthi);
		if ($dem_user > 0){
			
			return true;
		}
		else{
			echo "<script type=\"text/javascript\">trangdangnhap()</script>";
			exit();
			return false;
		}
	}
	function qltv_kiem_tra_ton_tai($chuoi){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = $chuoi;
		$exhoi = mysqli_query($conn, $hoi);
		$dem = mysqli_num_rows($exhoi);
		if ($dem>0) {
			return true;
		}
		else{
			return false;
			echo "<script type=\"text/javascript\">trangdangnhap()</script>";
			exit();
		}
	}
 ?>