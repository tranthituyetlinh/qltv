<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_sua_lop($ngay, $ma, $sl, $ghichu){
		settype($sl, 'int');
		if ($sl<=0) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> số lượng sách phải lớn hơn 0!\")</script>";
			exit();
		}
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
			if (vlu_sua_lop($_POST['ngay'],$_POST['ma'],$_POST['sl'],$_POST['ghichu'])){
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