<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_them_nxb($ten){
		if (empty($ten)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên NXB không để trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				INSERT INTO `nhaxuatban`(`MaNXB`, `TenNXB`) VALUES (null,'$ten')
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
			if (vlu_them_nxb($_POST['ten'])) {
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã thêm</strong> tác giả ".$_POST['ten']."!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa thêm</strong> có lỗi trong quá trình thêm!\")</script>";
				exit();
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>