<?php 
	include_once("../admin/config/config.php");
	function tv_sua_profile($ten, $diachi, $tdn, $mail, $ma,$ns){
		if (empty($ten)) {
			echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa lưu</strong> tên không để trống!\")</script>";
			exit();
		}
		if (empty($diachi)) {
			echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa lưu</strong> địa chỉ không để trống!\")</script>";
			exit();
		}
		if (empty($tdn)) {
			echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa lưu</strong> tên đăng nhập không để trống!\")</script>";
			exit();
		}
		if (empty($mail)) {
			echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa lưu</strong> mail không để trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			UPDATE `docgia` 
			SET 
				`TenDG`='$ten',
				`NgaySinh`='$ns',
				`DiaChiDG`='$diachi',
				`TaiKhoanDG`='$tdn',
				`Mail`= '$mail'
			WHERE 
				`Id` = '$ma'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
		if(tv_sua_profile($_POST['ten'],$_POST['diachi'],$_POST['tdn'],$_POST['mail'],$_POST['ma'],$_POST['ns'])) {
			echo "<script type=\"text/javascript\">luuthanhcong(\"<strong>Đã lưu</strong> thông tin!\")</script>";
		}
		else{
			echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa lưu</strong> thông tin chưa đầy đủ hoặc chưa chính xác!\")</script>";
		}
 ?>
