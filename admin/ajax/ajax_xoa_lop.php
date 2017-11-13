<?php 
	session_start();
	include_once("ajax_config.php");
	function qltv_xoa_lop($ma){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		if (qltv_kiem_tra_ton_tai("SELECT dg.MaL FROM lop l, docgia dg WHERE dg.MaL = l.MaL AND l.MaL = '$ma'")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> không thể xóa lớp khi khi còn chứa sinh viên!\")</script>";
			exit();
		}
		$hoi = "
				DELETE FROM `lop` WHERE `MaL` = '$ma'
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
			if (qltv_xoa_lop($_POST['ma'])) {
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã xóa</strong> lớp ".$_POST['ma']."!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> có lỗi trong quá trình xóa!\")</script>";
				exit();
			}
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>