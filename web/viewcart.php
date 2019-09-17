<?php 
 	include ("../autoload.php");
 	error_reporting(1);
 	session_start();

 	if(isset($_POST['reset'])){ 
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
            }else{ 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        } 
    }

	if(isset($_GET['action']) && $_GET['action']=="delete"){ 
    	$id=intval($_GET['id']); 
        if(isset($_SESSION['cart'][$id])){ 
            unset($_SESSION['cart'][$id]); 
            echo '<script>window.location="viewcart.php"</script>';
        }
    }

?>
<?php 
    require_once ("header.php") ;
?>
<form action="viewcart.php" method="POST" role="form" enctype="multipart/form-data">
<div class="container">
	<selection class= "box-main1">
		<?php 
			if(isset($_SESSION['cart'])):?>
		<h3 class="title-main"><a href="">Giỏ hàng của bạn</a> </h3>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>STT</th>
					<th>Tên sản phẩm</th>
					<th>Hình ảnh</th>
					<th>Số lượng</th>
					<th>Đơn giá</th>
					<th>Thành tiền</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					$stt = 1;
					$sql ="SELECT * FROM product WHERE id IN ("; 
					    foreach($_SESSION['cart'] as $id => $item) 
					    { 
					        $sql.= intval($id) .","; 
					    } 
				    $sql= substr($sql, 0, -1).")";
				    $query=$db->fetchsql($sql); 
				    $totalprice = 0;
				    $total = 0;
				    
				    
				    foreach ($query as $key => $item) {
			        	$subtotal=$_SESSION['cart'][$item['id']]['quantity']*$item['price']; 
			        	$totalprice += $subtotal; 
			        	$price = ((100 - $item['sale']* $item['price']))/100;
				?>

				<tr>
					<td><?php echo $stt; ?></td>
					<td><?php echo $item['name']; ?></td>
					<td style="width: 30%"><img width="20%" height="20%" src="../public/uploads/product/<?php echo $item['thunbar'] ?>"></td>
					<td><input type="number" min="0" max="5" name="quantity[<?php echo $item['id'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$item['id']]['quantity'] ?>" /></td>
					<td><?php echo $item['price']; ?></td>
					<td><?php echo $subtotal; ?></td>
					<td>
						<a type="submit" class="btn btn-xs btn-danger" name="delete" href="viewcart.php?action=delete&id=<?php echo $item['id']; ?>" ><i class="fa fa-remove"></i>Xóa</a>
						<button type="submit" class="btn btn-xs btn-info" name="reset" href="viewcart.php?action=reset&id=<?php echo $item['id']; ?>"><i class="fa fa-refresh"></i>Update</button>
					</td>
				</tr>
				<?php 
					$stt++;
				}
				?> 

			</tbody>
		</table>
		
		<div class="col-md-5 pull-right">
			<ul class="list-group">
				<li class="list-group-item">
					<h3 style="color: red" >Thông tin đơn hàng</h3>
					<h4>Số tiền: <?php echo $totalprice; ?>VND</h4>
					<h4>Thuế VAT: <?php echo "10 % " ?></h4>
					<h4>Giảm giá: <?php echo "10 % " ?></h4>

				</li>
				<?php $_SESSION['total'] = $totalprice;?>
				<h4 class="text-danger">Tổng tiền thanh toán: <?php echo $_SESSION['total'] ?>VND</h4>
			</ul>

		<button class="btn btn-success"><a href="thanhtoan.php">Thanh toán</a></button>
		<button class="btn btn-success"><a href="home.php">Tiếp tục mua hàng</a></button>
		</div>

		
		<?php else: ?>
			<center>
				<h2>
					<img width="100%" height="50%" src="<?php echo base_url()?>public/uploads/slide/banner.jpg">
					<p class="text-danger">Giỏ hàng của bạn đang rỗng.</p>
					<a href="home.php">Vui lòng chọn một số sản phẩm</a>
				</h2>
			</center>
		<?php endif; ?>
	</selection>
</div>
</form>
<?php 
    require_once ("footer.php") ;
?>