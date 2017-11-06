<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_them_khoa($ma, $ten, $diachi, $sdt){
		if (empty($ma)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã khoa không để trống!\")</script>";
			exit();
		}
		if (empty($ten)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên khoa không để trống!\")</script>";
			exit();
		}
		if (empty($diachi)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> địa chỉ khoa không để trống!\")</script>";
			exit();
		}
		if (empty($sdt)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> số điện thoại khoa không để trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		if (qltv_kiem_tra_ton_tai("SELECT `MaK` FROM `khoa` WHERE BINARY `MaK` = '$ma'")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã khoa <b>".$ma."</b> đã tồn tại, vui lòng nhập mã khác!\")</script>";
			exit();
		}
		$hoi = "
				INSERT INTO `khoa`(`MaK`, `TenK`, `DiaChiK`, `SDT`) VALUES ('$ma','$ten','$diachi','$sdt')
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if(!qltv_login($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			if (vlu_them_khoa($_POST['ma'],$_POST['ten'],$_POST['diachi'],$_POST['sdt'])) {
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> khoa đã được thêm!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình thêm!\")</script>";
				exit();
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>