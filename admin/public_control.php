<?php 
	if (isset($_GET["p"]) && !empty($_GET["p"])) {
		switch ($_GET["p"]) {
			case 'sach':
				include_once("control/ctrl_sach.php");
				break;
			case 'loaisach':
				include_once("control/ctrl_loai_sach.php");
				break;
			default:
				# code...
				break;
		}
	}
	else
		include_once("control/ctrl_trang_chu.php");
 ?>