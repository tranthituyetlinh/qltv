<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_sua_profile($ten, $diachi, $tdn, $mail, $ma){
		if (empty($ten)) {
			echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa lưu</strong> tên không để trống!\")</script>";
			exit();
		}
		if (empty($diachi)) {
			echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa lưu</strong> địa chỉ không để trống!\")</script>";
			exit();
		}
		if (empty($tdn)) {
			echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa lưu</strong> tên đăng nhập không để trống!\")</script>";
			exit();
		}
		if (empty($mail)) {
			echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa lưu</strong> mail không để trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			UPDATE `nhanvien` 
			SET 
				`TenNV`='$ten',
				`DiaChiNV`='$diachi',
				`TenDangNhap`='$tdn',
				`Mail`='$mail'
			WHERE
				`Id`='$ma'
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
			if(tv_sua_profile($_POST['ten'],$_POST['diachi'],$_POST['tdn'],$_POST['mail'],$_POST['ma'])) {
				echo "<script type=\"text/javascript\">luuthanhcong(\"<strong>Đã lưu</strong> thông tin!\")</script>";
			}
			else{
				echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa lưu</strong> thông tin chưa đầy đủ hoặc chưa chính xác!\")</script>";
			}
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>
