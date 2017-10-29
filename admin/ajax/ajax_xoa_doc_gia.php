<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_xoa_doc_gia($ma){
		// kiem tra ngay sinh
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				DELETE FROM `docgia` WHERE `MaDG` = '$ma'
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
			if (tv_xoa_doc_gia($_POST['ma'])) {
				echo "<script type=\"text/javascript\">dongxoa();thanhcong(\"<strong>Đã xóa</strong> thông tin độc giả!\");tailai();</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> có lỗi trong quá trình xóa!\")</script>";
				exit();
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>