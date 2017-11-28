<?php
	include_once("../model/md_login.php");
	if (isset($_POST['username']) && isset($_POST['password'])) {
		if(tv_login($_POST['username'],$_POST['password'])){
			session_start();
			$_SESSION['us'] = $_POST['username'];
			$_SESSION['mk'] = $_POST['password'];
			header("Location: ..");
		}
		else{
			header("Location: ../login.php");
		}
	}
	else
		header("Location: ../login.php");
 ?>