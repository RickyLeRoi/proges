<?php
	//header('Content-Type: text/plain');
	session_start();

	$user = $_SESSION['login_user'];
	$userID = $_SESSION['id_user'];

	if(!isset($_SESSION['login_user'])){
  		header("location:function/login.php");

   }
?>
