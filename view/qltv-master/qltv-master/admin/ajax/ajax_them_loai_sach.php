<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_them_gv($ten){
		if (empty($ten)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên loại không để trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				INSERT INTO `loaisach`(`MaLS`, `TenLS`) VALUES (null,'$ten')
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
			if (vlu_them_gv($_POST['ten'])) {
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã thêm</strong> loại ".$_POST['ten']."!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> có lỗi trong quá trình thêm!\")</script>";
				exit();
			}
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>