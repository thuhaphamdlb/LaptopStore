<?php 
	$open = "product";
	error_reporting(1);
	require_once ("../autoload.php");
	
	$id = intval(getInput('id'));

	$deleteproduct = $db->fetchID("product",$id);
	if(empty($deleteproduct))
	{
		$_SESSION['error'] ="Dữ liệu không tồn tại";
		redirectAdmin('product');
	}

	$num = $db->delete('product',$id);
	if($num > 0)
	{
		$_SESSION['success'] = "Xóa dữ liệu thành công";
		redirectAdmin('product');
	}
	else
	{
		$_SESSION['error'] = "Xóa dữ liệu thất bại";
		redirectAdmin('product');
	}
?>