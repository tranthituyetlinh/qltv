<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_gia_han_sach($id, $sl){
		// kiem tra ngay sinh
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				UPDATE `muontra` 
				SET 
				
				WHERE 
					`muontra`.`Id` = $id
		";
		$hoiu = "
				UPDATE `sach` 
				SET 
					`SL` = SL + $sl 
				WHERE 
					`sach`.`MaS` = '$s';
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
			if (tv_gia_han_sach($_POST['id'],$_POST['sl'])) {
				echo "<script type=\"text/javascript\">thanhcong(\"<strong>Đã gia hạn</strong>!\");tailai();</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa gia hạn</strong> có lỗi trong quá trình gia hạn!\")</script>";
				exit();
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>