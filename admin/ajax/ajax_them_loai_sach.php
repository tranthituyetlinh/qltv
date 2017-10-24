<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_them_gv($ten){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				INSERT INTO `loaisach`(`MaLS`, `TenLS`) VALUES (null,'$ten')
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
			if (vlu_them_gv($_POST['ten'])) {
				echo "Loại sách đã được thêm!";
			}
			else{
				echo "Có lỗi trong quá trình thêm!";
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>