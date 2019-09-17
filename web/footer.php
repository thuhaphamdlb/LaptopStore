<?php 
	$category = $db->fetchAll('category');
?>
	<div class="footer">
		<div class="footer-top">
			<div class="container">
				<div class="latter">
					<h6>Thông tin</h6>
					<div class="sub-left-right">
						<form>
							<!-- <input type="email" name="emailcmt" id="emailcmt" class="form-control" value="Nhập email" required="required" > -->
							<input type="text" value="Nhập email"onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Nhập email';}" />
							<input type="submit" class="btn btn-success" value="XONG" />
						</form>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="latter-right">
					<p>Theo dõi chúng tôi 
					</p>
					<div class="clearfix"> </div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom-cate">
					<h6>Danh mục</h6>
					<ul>
						<li class="">
						<?php 
                            foreach ($category as $item):?>
                            <li value="<?php echo $item['id'] ?>"><a href=""><?php echo $item['name']; ?></a></li>
                        <?php 
                            endforeach; 
                        ?> 
						</li>
					</ul>
				</div>
				<div class="footer-bottom-cate bottom-grid-cat">
					<h3>Tại sao chọn chúng tôi</h3>
					<ul>
						<li><a href="#">Vận chuyển nhanh</a></li>
						<li><a href="#">Đảm bảo chất lượng</a></li>
						<li><a href="#">Hàng mới</a></li>
						<li ><a href="#">Đẹp</a></li>
						<li ><a href="#">Đúng giá</a></li>
					</ul>
				</div>
				<div class="footer-bottom-cate">
					<h3>LAPTOP STORE</h3>
					<ul>
						<li><a href="#">Hàng chất lượng cao</a></li>
						<li><a href="#">Hàng nhật khẩu</a></li>
					</ul>
				</div>
				<div class="footer-bottom-cate cate-bottom">
					<h6>Địa chỉ</h6>
					<ul>
						<li class="address">
							<a href="https://www.google.com/maps/place/101B+L%C3%AA+H%E1%BB%AFu+Tr%C3%A1c,+An+H%E1%BA%A3i+%C4%90%C3%B4ng,+S%C6%A1n+Tr%C3%A0,+%C4%90%C3%A0+N%E1%BA%B5ng+550000/data=!4m2!3m1!1s0x3142177e16d75991:0x711c915f162f6505?ved=2ahUKEwiJ7sf13PTfAhUOd94KHU09Cg8Q8gEwAHoECAUQAQ">
								Địa chỉ: 101B Lê Hữu Trác, Sơn Trà, Đà Nẵng
							</a>
						</li>
						<li class="email">
							<a href="#">Email: laptopstore@support.com</a>
						</li>
						<li class="phone">SĐT: 6985792466
						</li>
						<li class="temp">
							<p class="footer-class">Design by
								<a href="" target="_blank">Team Project</a> 
							</p>
						</li>
					</ul>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
</body>
</html>