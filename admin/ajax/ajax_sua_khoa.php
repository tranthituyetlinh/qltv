<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_sua_ls($ma, $ten, $diachi, $sdt, $maold){
		if (empty($ma)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã khoa không để trống!\")</script>";
			exit();
		}
		if (empty($ten)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên khoa không để trống!\")</script>";
			exit();
		}
		if (empty($diachi)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> địa chỉ khoa không để trống!\")</script>";
			exit();
		}
		if (empty($sdt)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> số điện thoại khoa không để trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoimakhoa = "
				SELECT `MaK` FROM `khoa` WHERE (BINARY `MaK` = '$ma') and MaK NOT IN (SELECT MaK FROM khoa WHERE MaK = '$maold')
		";
		$tenkhoa = mysqli_query($conn, $hoimakhoa);
		$demmakhoa = mysqli_num_rows($tenkhoa);
		if ($demmakhoa>0) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mã khoa <b>".$ma."</b> đã tồn tại, vui lòng nhập mã khác!\")</script>";
			exit();
		}
		$hoi = "
				UPDATE `khoa` 
				SET 
					`MaK`='$ma',
					`TenK`='$ten',
					`DiaChiK`='$diachi',
					`SDT`= '$sdt' 
				WHERE 
					`MaK` = '$maold'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])){
		if(!qltv_login($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			if (vlu_sua_ls($_POST['ma'],$_POST['ten'],$_POST['diachi'],$_POST['sdt'],$_POST['maold'])){
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã lưu</strong> khoa ".$_POST['ma']." đã được cập nhật!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> có lỗi trong quá trình cập nhật!\")</script>";
				exit();
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>