<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_xoa_nhan_vien($id){
		// kiem tra ngay sinh
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				UPDATE `nhanvien` 
				SET 
					`DaXoa`='1'
				WHERE 
					`Id` = '$id'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if(!qltv_login_ad($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			if (tv_xoa_nhan_vien($_POST['id'])) {
				echo "<script type=\"text/javascript\">dongxoa();thanhcong(\"<strong>Đã xóa</strong> thông tin nhân viên!\");tailai();</script>";
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