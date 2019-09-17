<?php 
	include ("../autoload.php");
	session_start();
	unset($_SESSION['name_user']);
	unset($_SESSION['name_id']);
	unset($_SESSION['loggedin']);
	unset($_SESSION['cart']);
	session_destroy();
	redirectAdmin('web/home.php');
?>