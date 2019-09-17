<?php 
	include("header.php");
	include("../autoload.php");
	$category = $db->fetchAll('category');
	$id = intval(getInput('id'));
	$product = $db->fetchID("product",$id);
	$cate = $product['category_id'];
?>
<div class="container"> 
	<div class=" single_top">
	    <div class="single_grid">
			<div class="grid images_3_of_2">
		
			</div> 
			<div class="desc1 span_3_of_2">
				<h3 class="m_3">CHI TIẾT SẢN PHẨM</h3>
				<div class="cart-b">
					<div class="pull-right">
						<a href=""><img width="50%" height="50%" src="../public/uploads/product/<?php echo $product['thunbar'] ?>"></a>
						
					</div>
					<div class="left-n">
						<a href=""> Giá sản phẩm: <?php echo $product['price']; ?> đ</a>
					</div>
					<div class="left-n">
						<a href=""> Nội dung: <?php echo $product['content']; ?></a>
					</div>
					<div class="left-n">
						<a href=""> Ngày sản xuất: <?php echo $product['updated_at']; ?></a>
					</div>
					<div class="left-n">
						<a href=""> Bảo hành: 2 năm</a>
					</div>


				    
				    <div class="clearfix">
				    </div>
				    <button class="btn btn-success" href="single.php?action=add&id=<?php echo $product['id'] ?>">Mua </button>
				</div>

				<h3 class="m_3">SẢN PHẨM LIÊN QUAN</h3>
			   	<p></p>
			   	<div class="share">
					<h5>Chia sẻ sản phẩm :</h5>
					<!-- <ul class="share_nav">
						<li><a href="#"><img  title="facebook"></a></li>
						<li><a href="#"><img  title="Twiiter"></a></li>
						<li><a href="#"><img  title="Google+"></a></li>
					</ul> -->
				</div>
			</div>
          	<div class="clearfix"></div>
        </div>

		<script type="text/javascript" src="js/jquery.flexisel.js"></script>

	    <div class="toogle">
	     	
	    </div>	
    </div>
          	   
	<div class="sub-cate">

			<div class=" top-nav rsidebar span_1_of_left">
				<h3 class="cate">CATEGORIES</h3>
			 	<ul class="menu">
					<ul class="kid-menu ">
						<li class="menu-kid-left">
						<?php 
                            foreach ($category as $item):?>
                            <a value="<?php echo $item['id'] ?>"><?php echo $item['name']; ?></a>
                        <?php 
                            endforeach; 
                        ?> 
						</li>
						<li class="menu-kid-left">
							<a href="contact.php">Liên hệ với chúng tôi</a>
						</li>
					</ul>
				</ul>
			</div>
   		    <a class="view-all all-product" href="danhmucsanpham.php">Xem tất cả sản phẩm<span> </span></a> 	
		</div>
  	<div class="clearfix"></div>
</div>
<?php 
	include("footer.php")
?>