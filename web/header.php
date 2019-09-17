<?php 
	include("../autoload.php");
	error_reporting(1);
?>
<!DOCTYPE html>
<html>
<head>
<title>Laptop Store</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script src="js/jquery.min.js"></script>
</head>
<body> 
	<div class="header">
		<div class="top-header">
			<div class="container">
				<div class="top-header-left">
					<ul class="support">
						<li><a href="#"><label> </label></a></li>
						<li><a href="#">24x7<span class="live"> Vận Chuyển</span></a></li>
					</ul>
					<ul class="support">
						<li class="van"><a href="#"><label> </label></a></li>
						<li><a href="#"><span class="live">Shipping</span></a></li>
					</ul>
					<div class="clearfix"> </div>
				</div>
				<div class="top-header-right">
				 <div class="down-top">		
						  <select class="in-drop">
							  <option value="English" class="in-of">English</option>
							  <option value="Vietnamese" class="in-of">Tiếng Việt</option>
							</select>
					 </div>
					<div class="down-top top-down">
						  
					 </div>
					<div class="clearfix"> </div>	
				</div>
				<div class="clearfix"> </div>		
			</div>
		</div>
		<div class="bottom-header">
			<div class="container">
				<div class="header-bottom-left">
					<div class="logo">
						<a class="fa fa-fa-home" href="home.php">
							<button class="btn btn-success" style="font-size:24px">Trang chủ <i class="fa fa-home"></i></button></a>
					</div>
					<div class="search">
						<input type="text" name="search" id="search" value="" placeholder="Nhập để tìm kiếm">
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="header-bottom-right">
				<?php 
					if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
                               echo '<a href="account.php"><span> <button style="color: black;" type="button" class="btn btn-success">Xin chào '.$_SESSION["name_user"].'</button></span></a>';
                               echo '<a class="fa fa-cart" href="viewcart.php"><span> <button type="button" class="btn btn-success">Giỏ hàng</button></span></a>
						<a href="thoat.php"><span><button type="button" class="btn btn-success"><i class = "fa fa-share-square-o">Thoát</i></button> </span></a>';
                    }
                    else
                    {
                       echo '<a href="login.php"><span> </span> <button type="button" class="btn btn-success">Đăng nhập</button></a>
						<a  href="register.php"><button type="button"class="btn btn-success">Đăng ký</button></a>';
                   	} 
				?>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix">
					
				</div>	
			</div>
		</div>
	</div>