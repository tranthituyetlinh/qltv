<?php 
	include_once("model/md_nhap_sach.php");
	include_once("model/md_loai_sach.php");
	$dulieu = tv_get_sach();
	$dulieu_ls = tv_get_loai_sach();
	$dulieu_ls_s = tv_get_loai_sach();
	$dulieu_lich_su = tv_lich_su_nhap_sach();
	include_once("view/vw_nhap_sach.php");
 ?>