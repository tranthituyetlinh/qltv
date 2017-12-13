<?php 
	session_start();
	include_once("ajax_config.php");
	function qltv_xoa_ls($ma){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				DELETE FROM `nhaxuatban` WHERE `manxb` = '$ma'
		";
		// Kiểm tra xem có tồn tại trong bảng sách hay chưa, nếu chưa tồn tại thì không thể xóa
		$kiemtra = "Select count(MaNXB) as so from sach where MaNXB = '$ma'";
		$kiemtra_ec = mysqli_query($conn, $kiemtra);
		$dem_kiemtra = mysqli_num_rows($kiemtra_ec);
		if ($dem_kiemtra > 0){
			$mang_kiemtra = mysqli_fetch_array($kiemtra_ec);
			if($mang_kiemtra[0] > 0){
				echo "<script>khongthanhcong(\"Bạn không thể xóa NXB này. Đang có ".$mang_kiemtra[0]." quyển sách thuộc NXB này trong thư viện!\")</script>";
				exit();
			}
		}
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
			if (qltv_xoa_ls($_POST['ma'])) {
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã xóa</strong> nhà xuất bản!\")</script>";
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