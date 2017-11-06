<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_sua_lop($ten, $diachi, $mota, $macu){
		if (empty($ten)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên tác giả không để trống!\")</script>";
			exit();
		}
		if (empty($diachi)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> địa chỉ tác giả không để trống!\")</script>";
			exit();
		}
		if (empty($mota)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> mô tả tác giả không để trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				UPDATE `tacgia` 
				SET 
					`TenTG`='$ten',
					`DiaChiTG`='$diachi',
					`MoTa`='$mota'
				 WHERE
				 	 `MaTG` = '$macu'
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
			if (vlu_sua_lop($_POST['ten'],$_POST['diachi'],$_POST['mota'],$_POST['macu'])){
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã cập nhật</strong> tác giả ".$_POST['ten']."!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa cập nhật</strong> có lỗi trong quá trình cập nhật!\")</script>";
				exit();
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>