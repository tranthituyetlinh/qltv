<?php
	session_start();
	include_once("model/md_login.php");
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if(!tv_login($_SESSION['username'],$_SESSION['password'])){
			header("Location: login.php");
		}
	}
	else
		header("Location: login.php");
	/*$ketnoi = new clsKetnoi();
	$hoi_user = "select * from user where (email = '".$_SESSION['username']."' or tendn = '".$_SESSION['username']."') and matkhau = '".md5($_SESSION['password'])."' and quyen!='0'";
	$thucthi_user = mysqli_query($ketnoi->ketnoi(), $hoi_user);*/
 ?>
