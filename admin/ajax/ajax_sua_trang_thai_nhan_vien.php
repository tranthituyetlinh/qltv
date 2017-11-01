<?php 
	session_start();
	include_once("ajax_config.php");
	function tv_cap_nhat_trang_thai_nhan_vien($ma,$tt){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$hoi="";
		if ($tt=='1') {
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
			if(tv_cap_nhat_trang_thai_nhan_vien($_POST['ma'],$_POST['tt'])) {
				if($_POST['tt']=='0'){ ?>
					<a class="btn btn-success btn-trang-thai-nhan-vien" data-tt="1" data-qltv="<?php echo $_POST['ma']; ?>" title="Sửa"><i class="fa fa-check" aria-hidden="true"></i></a>
					<script type="text/javascript">thanhcongtt("<strong>Đã cập nhật trạng thái</strong> thành công!")</script>
			<?php } else { ?>
					<a class="btn btn-warning btn-trang-thai-nhan-vien" data-tt="0" data-qltv="<?php echo $_POST['ma']; ?>" title="Sửa"><i class="fa fa-close" aria-hidden="true"></i></a>
					<script type="text/javascript">thanhcongtt("<strong>Đã cập nhật trạng thái</strong> thành công!")</script>
			<?php } ?>
		<?php } else{
				echo "<script type=\"text/javascript\">luukhongthanhcong(\"<strong>Chưa cập nhật</strong> có lỗi!\")</script>";
			}
		}
	}
	else
		header("Location: ../login.php");
 ?>
