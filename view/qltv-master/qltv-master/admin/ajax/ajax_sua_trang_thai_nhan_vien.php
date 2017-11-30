<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_cap_nhat_trang_thai_nhan_vien($ma){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi1 = "SELECT `TrangThaiNV` FROM nhanvien WHERE Id='$ma'";
		$thucthi1 = mysqli_query($conn, $hoi1);
		$kq1 = mysqli_fetch_assoc($thucthi1);
		$hoi="";
		$tt=$kq1['TrangThaiNV'];
		if ($kq1['TrangThaiNV']==1) {
			$hoi = "
				UPDATE `nhanvien` 
				SET 
					`TrangThaiNV`='0'
				WHERE
					`Id`='$ma'
			";
		} else{
			$hoi = "
				UPDATE `nhanvien` 
				SET 
					`TrangThaiNV`='1'
				WHERE
					`Id`='$ma'
			";
		}
		mysqli_query($conn, $hoi);
		return $kq1['TrangThaiNV'];
	}
	if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
		if(!qltv_login_ad($_SESSION['username'],$_SESSION['password'])){
			header("Location: ../login.php");
		}
		else{
			if(tv_cap_nhat_trang_thai_nhan_vien($_POST['ma'])==1) { ?>
					<a class="btn btn-success"><i class="fa fa-check" aria-hidden="true" title="Bình thường"></i></a>
					<script type="text/javascript">thanhcongtt("<strong>Đã cập nhật trạng thái</strong> thành công, trang thái bình thường!")</script>
			<?php } else { ?>
					<a class="btn btn-warning"><i class="fa fa-close" aria-hidden="true" title="Không được đăng nhập"></i></a>
					<script type="text/javascript">thanhcongtt("<strong>Đã cập nhật trạng thái</strong> thành công, trang thái không được đăng nhập!")</script>
			<?php }
		}
	}
	else{
		echo "<script type=\"text/javascript\">trangdangnhap()</script>";
		exit();
	}
 ?>
