<?php 
	include_once("model/md_nhap_sach.php");
	include_once("model/md_loai_sach.php");
	#include_once("model/md_tac_gia.php");
	#include_once("model/md_nha_xuat_ban.php");
	$dulieu = tv_get_sach();
	$dulieu_ls = tv_get_loai_sach();
	$dulieu_ls_s = tv_get_loai_sach();
	#$dulieu_tg = tv_get_tac_gia();
	#$dulieu_tg_s = tv_get_tac_gia();
	#$dulieu_nxb = tv_get_nha_xuat_ban();
	#$dulieu_nxb_s = tv_get_nha_xuat_ban();
	include_once("view/vw_nhap_sach.php");
 ?>