<?php 
	$open = "category";
	error_reporting(1);
	require_once ("../autoload.php");
	
	$id = intval(getInput('id'));
	$editCategory = $db->fetchID("category",$id);

	if(empty($editCategory))
	{
		$_SESSION['error'] = "Dữ liệu không tồn tại";
		redirectAdmin('category');
	}
	$home = $editCategory['home'] == 0 ? 1 : 0;

	$update = $db->update("category",array("home" => $home),array("id" => $id));
	if($update > 0)
	{
		$_SESSION['succes'] = "Cập nhật thành công";
		redirectAdmin('category');
	}
	else
	{
		$_SESSION['error'] = "Cập nhật thất bại";
		redirectAdmin('category');
	}
?>