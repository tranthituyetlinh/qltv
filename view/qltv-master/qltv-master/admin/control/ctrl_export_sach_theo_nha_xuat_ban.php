<?php 
	include_once("model/md_export_sach_theo_nha_xuat_ban.php");
	include_once("model/md_nha_xuat_ban.php");
	$nxb = tv_get_nha_xuat_ban();
	include_once("view/vw_export_sach_theo_nha_xuat_ban.php");
 ?>