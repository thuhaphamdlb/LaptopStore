<?php 
    error_reporting(1);
    session_start();
    include("../autoload.php");
	if(!isset($_SESSION['name_id']))
    {
       echo "<script>alert('Mời bạn đăng  nhập tài khoản để có thể mua hàng');
       location.href='login.php';</script>";
    }

   $id = intval(getInput('id'));

    $product = $db->fetchID('product',$id);
    if($product)
    {
        if(!isset($_SESSION['cart'][$id]))
        {
            $_SESSION['cart'][$id]['name'] = $product['name'];
            $_SESSION['cart'][$id]['thunbar'] = $product['thunbar'];
            $_SESSION['cart'][$id]['price'] = ((100 - $product['sale']* $product['price']))/100;
            $_SESSION['cart'][$id]['quantity'] = 1;
        }
        else
        {
            $_SESSION['cart'][$id]['quantity'] += 1;
        }
        echo "<script>alert('Thêm vào giỏ thành công');
            location.href='viewcart.php';</script>";
    }
    else
    {
        $_SESSION['cart']['error'] = 'Product not exist';
        header("localhost: home.php");
        exit();
    }   
?>
