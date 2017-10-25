<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_them_sach($ten,$ls,$tg,$nxb,$nam,$trang,$luong,$gia,$nhap,$anh){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi = "
				INSERT INTO `sach`(`MaS`, `TenS`, `MaLS`, `MaTG`, `MaNXB`, `NamXB`, `SoTrang`, `HinhAnhS`, `SL`, `Gia`, `NgayNhap`) VALUES (null,'$ten','$ls','$tg','$nxb',$nam,'$trang','$anh','$luong','$gia','$nhap')
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
			if (tv_them_sach($_POST['ten'],$_POST['ls'],$_POST['tg'],$_POST['nxb'],$_POST['nam'],$_POST['trang'],$_POST['luong'],$_POST['gia'],$_POST['nhap'],$_POST['anh'])) {
				echo "Sách đã được thêm!";
			}
			else{
				echo "Có lỗi trong quá trình thêm!";
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>
