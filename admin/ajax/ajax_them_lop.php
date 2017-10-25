<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_them_lop($mal, $tenl, $mak){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				INSERT INTO `lop`(`MaL`, `TenL`, `MaK`) VALUES ('$mal','$tenl','$mak')
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
			if (vlu_them_lop($_POST['mal'],$_POST['tenl'],$_POST['mak'])) {
				echo "Lớp đã được thêm!";
			}
			else{
				echo "Có lỗi trong quá trình thêm!";
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>