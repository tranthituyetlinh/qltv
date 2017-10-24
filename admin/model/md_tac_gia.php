<?php 
	include_once("config.php");
	function tv_get_tac_gia(){
		$ketnoi = new clsKetnoi();
		$conn = $ketnoi->ketnoi();
		$query = "SELECT * FROM `tacgia`";
		$result = mysqli_query($conn, $query);
		return $result;
	}
 ?>