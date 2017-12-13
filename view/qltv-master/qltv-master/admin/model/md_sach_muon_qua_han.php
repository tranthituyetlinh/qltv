<?php 
	include_once("config.php");
	function tv_get_sach_qua_han(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT mt.Id, mt.MaNV, nv.TenNV, mt.MaDG, dg.TenDG, dg.Mail, mt.MaS, s.TenS, NgayMuon, NgayTra, mt.TrangThai, SLMuon, SLThucTe, GiaHan FROM muontra mt, sach s, docgia dg, nhanvien nv WHERE mt.MaNV = nv.MaNV and mt.MaDG = dg.MaDG and mt.MaS = s.MaS AND NgayTra < CURRENT_DATE() AND (mt.TrangThai = '0')";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>