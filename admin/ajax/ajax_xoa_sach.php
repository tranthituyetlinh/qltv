<?php 
	session_start();
	include_once("ajax_config.php");
	function qltv_xoa_sach($ma){

		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		if (qltv_kiem_tra_ton_tai("SELECT mt.Id FROM muontra mt, sach s WHERE s.MaS = mt.MaS AND s.MaS = '$ma' AND mt.TrangThai = '0'")) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> không thể xóa sách này, sách này hiện đang được mượn (chưa thu hồi hết)!\")</script>";
			exit();
		}
		$hoi = "
				UPDATE `sach` SET `XoaSach`= '1' WHERE `MaS`= '$ma'
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
			if (qltv_xoa_sach($_POST['ma'])) {
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã xóa</strong> sách!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa xóa</strong> có lỗi trong quá trình xóa!\")</script>";
				exit();
			}
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>