<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_them_lop($ma, $ten, $tdn, $mail,$diachi,$loai,$hspc){
		if (empty($ma)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã nhân viên không để trống!\")</script>";
			exit();
		}
		if (empty($ten)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên nhân viên không để trống!\")</script>";
			exit();
		}
		if (empty($tdn)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên đăng nhập không để trống!\")</script>";
			exit();
		}
		if (empty($diachi)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> địa chỉ không để trống!\")</script>";
			exit();
		}
		if (empty($mail)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> địa chỉ mail không để trống!\")</script>";
			exit();
		}
		if (empty($hspc)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> HSPC không để trống!\")</script>";
			exit();
		}
		settype($hspc, 'float');
		$mk = md5("123456");
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoitdn = "
				SELECT `TenDangNhap` FROM `nhanvien` WHERE BINARY `TenDangNhap` = '$tdn'
		";
		$tdnex = mysqli_query($conn, $hoitdn);
		$demtdn = mysqli_num_rows($tdnex);
		if ($demtdn>0) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên đăng nhập đã tồn tại, vui lòng chọn lại tên đăng nhập!\")</script>";
			exit();
		}


		$hoima = "
				SELECT `MaNV` FROM `nhanvien` WHERE BINARY `MaNV` = '$ma'
		";
		$maex = mysqli_query($conn, $hoima);
		$demma = mysqli_num_rows($maex);
		if ($demma>0) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã đã tồn tại, vui lòng chọn lại tên đăng nhập!\")</script>";
			exit();
		}

		$hoi = "
				INSERT INTO `nhanvien`(`MaNV`, `TenNV`, `DiaChiNV`, `TenDangNhap`, `MatKhau`, `Mail`, `HeSoPhuCap`, `LoaiNV`) VALUES ('$ma', '$ten', '$diachi','$tdn','$mk','$mail', '$hspc', '$loai')
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if(!qltv_login_ad($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			if (vlu_them_lop($_POST['ma'],$_POST['ten'],$_POST['tdn'],$_POST['mail'],$_POST['diachi'],$_POST['loai'],$_POST['hspc'])) {
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> nhân viên!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình thêm!\")</script>";
				exit();
			}
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>