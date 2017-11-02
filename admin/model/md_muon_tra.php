<?php 
	include_once("config.php");
	function tv_get_muon(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT m.Id,nv.Id as 'IdNV', m.MaNV, nv.TenNV,dg.Id as 'IdDG', m.MaDG, dg.TenDG,m.MaS, s.TenS, m.NgayMuon, m.NgayTra, m.TrangThai,m.SLMuon,m.SLGiaHan FROM muontra m, docgia dg, nhanvien nv,sach s WHERE m.MaNV = nv.MaNV and m.MaDG = dg.MaDG and m.MaS = s.MaS";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>