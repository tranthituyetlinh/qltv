<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_sua_lop($mal, $tenl, $mak, $malold){
		if (empty($mal)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã lớp không để trống!\")</script>";
			exit();
		}
		if (empty($tenl)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên lớp không để trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		if (qltv_kiem_tra_ton_tai("SELECT `MaL` FROM `lop` WHERE (BINARY `MaL` = '$mal') and MaL NOT IN (SELECT MaL FROM lop WHERE MaL = '$malold')")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã lop <b>".$mal."</b> đã tồn tại, vui lòng nhập mã khác!\")</script>";
			exit();
		}
		$hoi = "
				UPDATE `lop` 
				SET 
					`MaL`='$mal',
					`TenL`='$tenl',
					`MaK`='$mak' 
				WHERE 
					`MaL` = '$malold'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])){
		if(!qltv_login_tt($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			if (vlu_sua_lop($_POST['mal'],$_POST['tenl'],$_POST['mak'],$_POST['malold'])){
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> lớp đã được cập nhật!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình cập nhật!\")</script>";
				exit();
			}
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>