<?php 
	require_once("model/md_sach_theo_loai.php");
  	$loaisach = tv_get_loai_sach();
    $khoa = tv_get_khoa();
    $sachmoi = tv_get_sach_moi();
    $sach = tv_get_loai_sach_s($_GET['id']);
    $tenloai = $_GET['ten'];
	require_once("view/vw_sach_theo_loai.php");
 ?>