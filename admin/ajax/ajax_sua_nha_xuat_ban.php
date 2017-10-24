<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_sua_nxb($ma, $ten){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				UPDATE `nhaxuatban` 
				SET 
					`TenNXB`='$ten'
				WHERE `MaNXB` = '$ma'
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
			if (vlu_sua_nxb($_POST['ma'], $_POST['ten'])) {
				echo "Nhà xuất bản đã được sửa!";
			}
			else{
				echo "Có lỗi trong quá trình sửa!";
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>