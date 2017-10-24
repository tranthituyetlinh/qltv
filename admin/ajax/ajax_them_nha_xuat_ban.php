<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_them_nxb($ten){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				INSERT INTO `nhaxuatban`(`MaNXB`, `TenNXB`) VALUES (null,'$ten')
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
			if (vlu_them_nxb($_POST['ten'])) {
				echo "Nhà xuất bản đã được thêm!";
			}
			else{
				echo "Có lỗi trong quá trình thêm!";
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>