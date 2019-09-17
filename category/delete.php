<?php 
	$open = "category";
	error_reporting(1);
	require_once ("../autoload.php");
	
	$id = intval(getInput('id'));

	$deleteCategory = $db->fetchID("category",$id);
	if(empty($deleteCategory))
	{
		$_SESSION['error'] ="Dữ liệu không tồn tại";
		redirectAdmin('category');
	}

	$is_product = $db->fetchOne("product","category_id = $id ");

	if($is_product ==  NULL)
	{
		$num = $db->delete('category',$id);
		if($num > 0)
		{
			$_SESSION['success'] = "Xóa dữ liệu thành công";
			redirectAdmin('category');
		}
		else
		{
			$_SESSION['error'] = "Xóa dữ liệu thất bại";
			redirectAdmin('category');
		}
	}
	else
	{
		$_SESSION['error'] = "Danh mục đã có sản phẩm. Bạn không thể xóa.";
			redirectAdmin('category');
	}
?>