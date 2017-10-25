<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_sua_lop($ten, $diachi, $mota, $macu){
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
				echo "Tác giả đã được sửa!";
			}
			else{
				echo "Có lỗi trong quá trình sửa!";
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>