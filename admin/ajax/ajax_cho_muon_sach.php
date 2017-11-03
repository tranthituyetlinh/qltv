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
		if ($sl > 2 ) {
			echo "<script type=\"text/javascript\">khongthanhcong(\"<strong>Chưa cho mượn</strong> số lượng sách mượn không quá 2 quyển!\")</script>";
			exit();
		}
		// Khởi tạo ngày trả cách ngày mượn là 7 ngày
		$newnm = date_create($nm);
		$ds = 7;
		date_add($newnm,date_interval_create_from_date_string("$ds days"));
		$nt =  date_format($newnm,"Y-m-d");
		// Ràng buộc 'Không được mượn thêm sách khi chưa trả sách'
		// Số lượng mượn tối đa là 2 quyển


		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		exit();
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
				echo "Khoa đã được thêm!";
			}
			else{
				echo "Có lỗi trong quá trình thêm!";
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>