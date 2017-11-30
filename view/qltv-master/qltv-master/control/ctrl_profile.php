<?php 
	require_once("model/md_profile.php");
	session_start();
	if (!isset($_SESSION['us']) || !isset($_SESSION['mk'])) { 
            header("Location: index.php");
            exit();
    }
  	$dg = tv_get_thong_tin($_SESSION['us']);
	$row = mysqli_fetch_assoc($dg);
	$id = $row['Id'];
	$madg = $row['MaDG'];
	$tendg = $row['TenDG'];
	$ngaysinh = $row['NgaySinh'];
	$diachi =$row['DiaChiDG'];
	$ngaylap = $row['NgayLapThe'];
	$tendangnhap = $row['TaiKhoanDG'];
	$mail = $row['Mail'];
	$dl = tv_muon($madg);
	$dl1 = tv_tra($madg);
	require_once("view/vw_profile.php");
 ?>