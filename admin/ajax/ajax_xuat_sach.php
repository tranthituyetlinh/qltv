<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_xuat_sach($ngay, $ma, $sl, $ghichu){
		settype($sl, 'int');
		if ($sl<=0) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> số lượng sách phải lớn hơn 0!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		// kiểm tra số lượng quá hạn
		settype($sl, 'int');
		$ktsl = "
				SELECT `SL` FROM `sach` WHERE `MaS` = '$ma'
		";
		$ktslex = mysqli_query($conn, $ktsl);
		$result = mysqli_fetch_array($ktslex);
		$slt=$result[0];
		settype($slt, 'int');
		if ($slt - $sl < 0) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> số lượng sách xuất lớn hơn số sách hiện có trong thư viện!\")</script>";
			exit();
		}
		///////////////////////////////////////////////
		$hoi = "
				INSERT INTO `xuatsach`(`NgayXuat`, `MaS`, `SoLuong`, `GhiChu`) VALUES ('$ngay','$ma','$sl','$ghichu')
		";
		$hoi1 = "
				UPDATE `sach` 
				SET 
					`SL`= `SL`-'$sl'
				WHERE 
					`MaS` = '$ma'
		";
		if(mysqli_query($conn, $hoi)===TRUE && mysqli_query($conn, $hoi1)===TRUE)
			return true;
		else
			return false;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])){
		if(!qltv_login($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			if (tv_xuat_sach($_POST['ngay'],$_POST['ma'],$_POST['sl'],$_POST['ghichu'])){
				echo "<script type=\"text/javascript\">thanhcong(\"<strong>Xuất sách </strong> thành công!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xuất</strong> có lỗi trong quá trình xuất!\")</script>";
				exit();
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>