<?php 
	if (isset($_GET["p"]) && !empty($_GET["p"])) {
		switch ($_GET["p"]) {
			case 'khoa':
				include_once("control/ctrl_sach_theo_khoa.php");
				break;
			case 'nhapsach':
				include_once("control/ctrl_nhap_sach.php");
				break;
			default:
				# code...
				break;
		}
	}
	else
		include_once("control/ctrl_trang_chu.php");
 ?>