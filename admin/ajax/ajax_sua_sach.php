<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_sua_sach($ten,$ls,$tg,$nxb,$nam,$trang,$luong,$gia,$anh,$ma){
		if (empty($ten)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> tên sách không để trống!\")</script>";
			exit();
		}
		if (empty($nam)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> năm không để trống!\")</script>";
			exit();
		}
		if (empty($trang)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> trang không để trống!\")</script>";
			exit();
		}
		if (empty($gia)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa lưu</strong> giá không để trống!\")</script>";
			exit();
		}
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
			UPDATE `sach` 
			SET 
				`TenS`='$ten',
				`MaLS`='$ls',
				`MaTG`='$tg',
				`MaNXB`='$nxb',
				`NamXB`='$nam',
				`SoTrang`='$trang',
				`HinhAnhS`='$anh',
				`SL`='$luong',
				`Gia`='$gia'
			WHERE 
				`MaS` = '$ma'
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if(!qltv_login_tt($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			if (tv_sua_sach($_POST['ten'],$_POST['ls'],$_POST['tg'],$_POST['nxb'],$_POST['nam'],$_POST['trang'],$_POST['luong'],$_POST['gia'],$_POST['anh'],$_POST['ma'])) {
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã cập nhật</strong> sách ".$_POST['ten']."!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa cập nhật</strong> có lỗi trong quá trình cập nhật!\")</script>";
				exit();
			}
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>
