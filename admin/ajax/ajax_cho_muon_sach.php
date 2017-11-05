<?php 
	session_start();
	include_once("ajax_config.php");
	function vlu_them_khoa($s, $dg, $nm, $sl,$nv){
		settype($sl, 'int');
		if (empty($s)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa cho mượn</strong> mã - ten sách không được để trống!\")</script>";
			exit();
		}
		if (empty($dg)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa cho mượn</strong> mã - tên độc giả không được để trống!\")</script>";
			exit();
		}
		if (empty($nv)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa cho mượn</strong> không xác định rõ danh tính nhân viên!\")</script>";
			exit();
		}
		if (empty($sl)) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa cho mượn</strong> số lượng không hợp lệ!\")</script>";
			exit();
		}
		if ($sl > 3 ) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa cho mượn</strong> số lượng sách mượn không quá 3 quyển!\")</script>";
			exit();
		}
		// Khởi tạo ngày trả cách ngày mượn là 7 ngày
		$newnm = date_create($nm);
		$ds = 7;
		date_add($newnm,date_interval_create_from_date_string("$ds days"));
		$nt =  date_format($newnm,"Y-m-d");


		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		// Ràng buộc 'Không được mượn thêm sách khi chưa trả sách'
		// Số lượng mượn tối đa là 3 quyển
		$soluong = "SELECT SUM(SLMuon) as sl FROM `muontra` WHERE `TrangThai` = 0 AND `MaDG` = '$dg'";
		$resoluong = mysqli_query($conn, $soluong);
		$demsoluongex = mysqli_fetch_assoc($resoluong);
		$demsoluong = $demsoluongex['sl'];
		$demsoluong = 3 - $demsoluong;
		if ($demsoluong <= 0) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa cho mượn</strong> độc giả chỉ được mượn tối đa 3 quyển!\")</script>";
			exit();
		}
		if ($demsoluong < $sl) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa cho mượn</strong> độc giả chỉ được mượn thêm ".$demsoluong." quyển!\")</script>";
			exit();
		}
		$hoi = "
				INSERT INTO `muontra`(`MaNV`, `MaDG`, `MaS`, `NgayMuon`, `NgayTra`, `SLMuon`) VALUES ('$nv','$dg','$s','$nm','$nt','$sl')
		";
		if(mysqli_query($conn, $hoi)===TRUE)
			return true;
		else
			return false;
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if(!qltv_login($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			if (vlu_them_khoa($_POST['s'],$_POST['dg'],$_POST['nm'],$_POST['sl'],$_POST['nv'])) {
				echo "<script type=\"text/javascript\">thanhcong(\"<strong>Đã cho mượn</strong> ".$_POST['sl']." quyển!\")</script>";
				exit();
			}
			else{
				echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa cho mượn</strong> có lỗi trong quá trình cho mượn !\")</script>";
				exit();
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>