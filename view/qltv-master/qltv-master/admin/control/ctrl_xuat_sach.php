<?php 
	include_once("model/md_xuat_sach.php");
	include_once("model/md_loai_sach.php");
	#include_once("model/md_tac_gia.php");
	#include_once("model/md_nha_xuat_ban.php");
	$dulieu = tv_get_sach();
	$dulieu_lich_su = tv_lich_su_xuat_sach();
	include_once("view/vw_xuat_sach.php");
 ?>