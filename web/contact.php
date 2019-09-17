<?php 
	include("header.php");
	include ("../autoload.php");
	$category = $db->fetchAll('category');
?>
	<div class="container">

	<div class="main"> 
	<div class="reservation_top">          
		<div class=" contact_right">
			<h3>Thông tin liên lạc</h3>
			<div class="contact-form">
					<form method="post" action="contact-post.php">
						<input type="text" class="textbox" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
						<input type="text" class="textbox" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
						<textarea value="Message" onfocus="this.value= '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
						<input type="submit" value="Send">
						<div class="clearfix"> </div>
					</form>
				<address class="address">
	        		<p>101B Lê Hữu Trác, <br>Sơn Trà, Đà nẵng</p>
		        	<dl>
		            	<dt> </dt>
			            <dd>SĐT:<span> 0988 888 888</span></dd>
			            <dd>Di động:<span> 086604870699</span></dd>
			            <dd>Email:&nbsp; <a href="laptopstore@support.com">laptopstore@support.com</a></dd>
		        	</dl>
	    		</address>
			</div>
		</div>
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
   		     	</div>
   		     	 <a class="view-all all-product" href="danhmucsanpham.php">Xem tất cả sản phẩm<span> </span></a> 	
		</div>
	<div class="clearfix"></div>
</div>
<?php 
	include("footer.php")
?>