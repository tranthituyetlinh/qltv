<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_sua_ls($ma, $ten, $diachi, $sdt, $maold){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
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
				echo "Khoa đã được sửa!";
			}
			else{
				echo "Có lỗi trong quá trình sửa!";
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>