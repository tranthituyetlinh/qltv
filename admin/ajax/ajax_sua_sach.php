<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_sua_sach($ten,$ls,$tg,$nxb,$nam,$trang,$luong,$gia,$anh,$ma){
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
		if(!qltv_login($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			if (tv_sua_sach($_POST['ten'],$_POST['ls'],$_POST['tg'],$_POST['nxb'],$_POST['nam'],$_POST['trang'],$_POST['luong'],$_POST['gia'],$_POST['anh'],$_POST['ma'])) {
				echo "Sách đã được sửa!";
			}
			else{
				echo "Có lỗi trong quá trình sửa!";
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>
