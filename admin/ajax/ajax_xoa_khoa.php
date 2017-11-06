<?php 
	session_start();
	include_once("ajax_config.php");
	function qltv_xoa_ls($ma){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();

		
		$hoi = "
				DELETE FROM `khoa` WHERE `MaK` = '$ma'
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
			if (qltv_xoa_ls($_POST['ma'])) {
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã xóa</strong> khoa ".$_POST['ma']."!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình xóa!\")</script>";
				exit();
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>