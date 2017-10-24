<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_them_khoa($ma, $ten, $diachi, $sdt){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				INSERT INTO `khoa`(`MaK`, `TenK`, `DiaChiK`, `SDT`) VALUES ('$ma','$ten','$diachi','$sdt')
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
			if (vlu_them_khoa($_POST['ma'],$_POST['ten'],$_POST['diachi'],$_POST['sdt'])) {
				echo "Khoa đã được thêm!";
			}
			else{
				echo "Có lỗi trong quá trình thêm!";
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>