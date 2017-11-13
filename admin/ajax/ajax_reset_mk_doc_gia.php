<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_reset_mk($ma){
		// kiem tra ngay sinh
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$mk = md5('123456');
		$hoi = "
				UPDATE `docgia` 
				SET 
					`MatKhauDG`='$mk'
				WHERE
					`Id` = '$ma'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if(!qltv_login_tt($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			if (tv_reset_mk($_POST['ma'])) {
				echo "<script type=\"text/javascript\">thanhcong(\"<strong>Đã reset mật khẩu!</strong>\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa reset</strong> có lỗi trong quá trình reset!\")</script>";
				exit();
			}
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>