<?php 
	session_start();
	require_once ("../database.php");
	require_once ("../function.php");
	$db = new Database;

	define ("ROOT",$_SERVER["DOCUMENT_ROOT"]."/public/uploads/");
	$category = $db->fetchAll("category");

	$sqlNew = "SELECT * FROM product WHERE 1 ORDER BY ID DESC LIMIT 3";

	$productNew = $db->fetchsql($sqlNew);
?>
	