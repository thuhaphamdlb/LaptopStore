<?php 
	$open = "admin";
	error_reporting(1);
	require_once ("../autoload.php");
	
	$id = intval(getInput('id'));

	$deleteadmin = $db->fetchID("admin",$id);
	if(empty($deleteadmin))
	{
		$_SESSION['error'] ="Dữ liệu không tồn tại";
		redirectAdmin('admin');
	}

	$num = $db->delete('admin',$id);
	if($num > 0)
	{
		$_SESSION['success'] = "Xóa dữ liệu thành công";
		redirectAdmin('admin');
	}
	else
	{
		$_SESSION['error'] = "Xóa dữ liệu thất bại";
		redirectAdmin('admin');
	}
?>