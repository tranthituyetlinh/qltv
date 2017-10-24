<?php 
	session_start();
	include_once("ajax_config.php");
	function qltv_xoa_ls($ma){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				DELETE FROM `nhaxuatban` WHERE `manxb` = '$ma'
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
				echo "Nhà xuất bản đã được xóa!";
			}
			else{
				echo "Có lỗi trong quá trình xóa!";
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>