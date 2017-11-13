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
				INSERT INTO `nhapsach`(`NgayNhap`, `MaS`, `SoLuong`, `GhiChu`) VALUES ('$ngay','$ma','$sl','$ghichu')
		";
		$hoi1 = "
				UPDATE `sach` 
				SET 
					`SL`= `SL`+'$sl'
				WHERE 
					`MaS` = '$ma'
		";
		if(mysqli_query($conn, $hoi)===TRUE && mysqli_query($conn, $hoi1)===TRUE)
			return true;
		else
			return false;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])){
		if(!qltv_login_tt($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			if (vlu_sua_lop($_POST['ngay'],$_POST['ma'],$_POST['sl'],$_POST['ghichu'])){
				echo "<script type=\"text/javascript\">thanhcong(\"<strong>Nhập sách </strong> thành công!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa nhập</strong> có lỗi trong quá trình nhập!\")</script>";
				exit();
			}
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>