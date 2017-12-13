<?php 
	if (isset($_GET["p"]) && !empty($_GET["p"])) {
		switch ($_GET["p"]) {
			case 'sach':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_sach.php");
				break;
			case 'nhapsach':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_nhap_sach.php");
				break;
			case 'xuatsach':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_xuat_sach.php");
				break;
			case 'loaisach':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_loai_sach.php");
				break;
			case 'tacgia':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_tac_gia.php");
				break;
			case 'nhaxuatban':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_nha_xuat_ban.php");
				break;
			case 'khoa':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_khoa.php");
				break;
			case 'lop':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_lop.php");
				break;
			case 'docgia':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_doc_gia.php");
				break;
			case 'nhanvien':
				include_once("control/ctrl_nhan_vien.php");
				break;
			case 'profile':
				include_once("control/ctrl_profile.php");
				break;
			case 'muon-tra':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_muon_tra.php");
				break;
			case 'sachquahan':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_sach_qua_han.php");
				break;
			case 'sachtheonxb':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_export_sach_theo_nha_xuat_ban.php");
				break;
			case 'soluongtheonam':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_export_sach_theo_nam.php");
				break;
			case 'top10sachmuon':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_export_sach_top_10_nhat_nam.php");
				break;
			case 'sachdangmuon':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_export_sach_dang_muon.php");
				break;
			case 'muonquahan':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_sach_muon_qua_han.php");
				break;
			case 'sachchuamuon':
				include_once("control/ctrl_login_check_thu_thu.php");
				include_once("control/ctrl_exprot_sach_chua_muon.php");
				break;
			default:
				# code...
				break;
		}
	}
	else
		include_once("control/ctrl_trang_chu.php");
 ?>