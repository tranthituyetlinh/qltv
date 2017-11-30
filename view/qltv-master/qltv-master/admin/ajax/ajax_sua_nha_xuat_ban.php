<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_sua_nxb($ma, $ten){
		if (empty($ten)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên NXB không để trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				UPDATE `nhaxuatban` 
				SET 
					`TenNXB`='$ten'
				WHERE `MaNXB` = '$ma'
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
			if (vlu_sua_nxb($_POST['ma'], $_POST['ten'])) {
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã cập nhật</strong> tác giả ".$_POST['ten']."!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa cập nhật</strong> có lỗi trong quá trình cập nhật!\")</script>";
				exit();
			}
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>