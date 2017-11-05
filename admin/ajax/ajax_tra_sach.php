<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_gia_han_sach($id, $sl, $s, $nv){
		settype($sl, 'int');
		// kiem tra ngay sinh
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$soluongx = "SELECT `SLMuon`, `MaDG` FROM `muontra` WHERE `id` = '$id'";
		$resoluongx = mysqli_query($conn, $soluongx);
		$demsoluongexx = mysqli_fetch_assoc($resoluongx);
		$demsoluongx = $demsoluongexx['SLMuon'];
		$dg = $demsoluongexx['MaDG'];
		$het = 0;
		if ($demsoluongx == $sl) {
			$het = 1;
		}
		$hoi = "
				UPDATE `muontra` 
				SET 
					SLMuon = SLMuon - $sl
				WHERE 
					`muontra`.`Id` = '$id'
		";
		$hoiu = "
				UPDATE `sach` 
				SET 
					`SL` = SL + $sl 
				WHERE 
					`sach`.`MaS` = '$s';
		";
		$hoiuuu = "
				INSERT INTO `cttra`(`MaNV`, `MaDG`, `MaS`, `NgayTra`, `SLTra`) VALUES ('$nv','$dg','$s',CURRENT_DATE(),'$sl')
		";
		$hoiuu="";
		if ($het == 1) {
			$hoiuu="
				UPDATE `muontra` 
				SET 
					TrangThai = '1'
				WHERE 
					`Id` = '$id'
			";
			mysqli_query($conn, $hoiuu);
		}
		if(mysqli_query($conn, $hoi)===TRUE && mysqli_query($conn, $hoiu)===TRUE)
		{
			mysqli_query($conn, $hoiuuu);
			return true;
		}
		else
			return false;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if(!qltv_login($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			if (tv_gia_han_sach($_POST['id'],$_POST['sl'],$_POST['s'],$_POST['nv'])) {
				echo "<script type=\"text/javascript\">tailai();thanhcong(\"<strong>Đã trả</strong>!\");tailai();</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa trả</strong> có lỗi trong quá trình trả!\")</script>";
				exit();
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>