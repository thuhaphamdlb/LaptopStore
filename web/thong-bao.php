<?php 
 	include ("../autoload.php");
 	error_reporting(1);
?>
<?php 
    require_once ("header.php") ;
?>
<div class="container">
	<selection class= "box-main1">
		<h3 class="title-main"><a href="">Lưu thông tin đơn hàng</a> </h3>
		<?php 
			if(isset($_SESSION['success'])):
			?>
			<div class="alert alert-success" role="alert">
		  				<?php echo $_SESSION['success'];
		  				unset($_SESSION['success']);
		  			?>
			</div>
			<?php 
				endif;
			?>
	</selection>
	<a href="index.php">Quay lại trang chủ</a>
</div>

<?php 
    require_once ("footer.php") ;
?>