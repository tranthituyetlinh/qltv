<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_sua_lop($mal, $tenl, $mak, $malold){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				UPDATE `lop` 
				SET 
					`MaL`='$mal',
					`TenL`='$tenl',
					`MaK`='$mak' 
				WHERE 
					`MaL` = '$malold'
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
			if (vlu_sua_lop($_POST['mal'],$_POST['tenl'],$_POST['mak'],$_POST['malold'])){
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