<?php 
	session_start();
	include_once("ajax_config.php");
	function qltv_them_tg($ten, $diachi, $mota){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				INSERT INTO `tacgia`(`MaTG`, `TenTG`, `DiaChiTG`, `MoTa`) VALUES (null,'$ten','$diachi','$mota')
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
			if (qltv_them_tg($_POST['ten'],$_POST['diachi'],$_POST['mota'])) {
				echo "Tác giả đã được thêm!";
			}
			else{
				echo "Có lỗi trong quá trình thêm!";
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>