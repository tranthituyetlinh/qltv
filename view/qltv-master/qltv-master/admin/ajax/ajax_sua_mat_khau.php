<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_sua_profile($cu,$moi,$xnmoi,$ma){
		if (empty($cu)) {
			echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa lưu</strong> mật khẩu cũ không để trống!\")</script>";
			exit();
		}
		if (empty($moi)) {
			echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa lưu</strong> mật khẩu mới không để trống!\")</script>";
			exit();
		}
		if (empty($xnmoi)) {
			echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa lưu</strong> mật khẩu xác nhận không để trống!\")</script>";
			exit();
		}
		if ($moi != $xnmoi) {
			echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa lưu</strong> mật khẩu xác nhận không đúng!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$moi=md5($moi);
		$cu=md5($cu);
		$hoi = "
			UPDATE `nhanvien` 
			SET 
				`MatKhau`= '$moi'
			WHERE
				`Id`='$ma'
		";
		$hoimk = "
			SELECT * from nhanvien where MatKhau = '$cu' and Id = '$ma'
		";
		$ktmk = mysqli_query($conn, $hoimk);
		$demmk = mysqli_num_rows($ktmk);
		if ($demmk<=0) {
			echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa lưu</strong> mật khẩu cũ không đúng!\")</script>";
			exit();
		}
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
			if(tv_sua_profile($_POST['cu'],$_POST['moi'],$_POST['xnmoi'],$_POST['ma'])) {
				echo "<script type=\"text/javascript\">tailai();luuthanhcong(\"<strong>Đã lưu</strong> mật khẩu đã được thay đổi!\")</script>";
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
