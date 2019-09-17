<?php 
	include("header.php");
	include ("../autoload.php");
?>
<div class="container">	
	<div class="women-product">
		<div class=" w_content">
			
		</div>
		
		<div class="grid-product">
		    <div class="  product-grid">
				<div class="content_box"><a href="single.php">
				   	<div class="left-grid-view grid-view-left">
				   	   	<img src="" class="img-responsive watch-right" alt=""/>
					   	<div class="mask">
		                    <div class="info">Xem chi tiết</div>
				        </div>
					</div>
					    <h4><a href="#"> Tên sản phẩm</a></h4>
					    <p>Giá sản phẩm</p></a>
				</div>
	   		</div> 
	    </div>
		<div class="clearfix"> </div>
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
				<div class=" chain-grid menu-chain">
   		     		<a href="single.php"><img class="img-responsive chain" src="" alt=" " /></a>	   		     		
   		     		<div class="grid-chain-bottom chain-watch">
	   		     		  		     			   		     										
   		     		</div>
   		     	</div>
   		     	 <a class="view-all all-product" href="danhmcusanpham.php">Xem tất cả sản phẩm<span> </span></a> 	
		</div>  
<div class="clearfix"> </div>
<?php 
	include("footer.php")
?>