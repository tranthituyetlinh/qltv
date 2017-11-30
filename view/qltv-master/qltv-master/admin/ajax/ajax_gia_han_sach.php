<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_gia_han_sach($id){
		// kiem tra ngay sinh
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				UPDATE `muontra` 
				SET 
					`GiaHan` = '1', 
					`NgayTra` = DATE_ADD(`NgayTra`, INTERVAL 3 DAY) 
				WHERE 
					`muontra`.`Id` = $id
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
			if (tv_gia_han_sach($_POST['id'])) {
				echo "<script type=\"text/javascript\">thanhcong(\"<strong>Đã gia hạn</strong>!\");tailai();</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa gia hạn</strong> có lỗi trong quá trình gia hạn!\")</script>";
				exit();
			}
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>