<?php 
	include_once("model/md_export_sach_dang_muon.php");
	$sdm = tv_get_sach_dang_muon();
	$dem = mysqli_num_rows($sdm);
	include_once("view/vw_export_sach_dang_muon.php");
 ?>