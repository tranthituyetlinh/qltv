<?php 
	include_once("model/md_doc_gia.php");
	include_once("model/md_lop.php");
	$dulieu_lop = tv_get_lop();
	$dulieu_lop_s = tv_get_lop();
	$dulieu = tv_get_doc_gia();
	include_once("view/vw_doc_gia.php");
 ?>