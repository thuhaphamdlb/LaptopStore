<?php 
	include("header.php");
	$open = "category";
	include ("../autoload.php");
	$category = $db->fetchAll('category');

	//connect to DB
 	//var_dump($_SESSION['name_user']); ra tên rồi

 	$id = intval(getinput('id'));//ép kiểu

 	$editCategory = $db->fetchID("category",$id);

 	//code phân trang
 	if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p=1;
    }


	if(isset($_GET['action']) && $_GET['action']=="add"){ 
          
        $id=intval($_GET['id']); 
          
        if(isset($_SESSION['cart'][$id])){ 
              
            $_SESSION['cart'][$id]['quantity']++; 
              
        }else{ 
              
            $sql_s="SELECT * FROM product 
                WHERE id={$id}"; 
            $res = $db-> fetchSql($sql_s);
            foreach ($res as $key => $row) {
            	
                $_SESSION['cart'][$row['id']]=array( 
                    "quantity" => 1, 
                    "price" => $row['price'] 
                ); 
            }
        } 
	 }         




    //truy vấn
 	$sql = "SELECT * FROM product WHERE category_id = $id";
 	$product = $db->fetchJones("product",$sql,1,$p,9,true);

 	if(isset($product['page']))
    {
        $sotrang = $product['page'];
        unset($product['page']);
    } 
    //truy vấn
	$sqlhomeCate = "SELECT name,id FROM category WHERE home = 1 ORDER BY updated_at ";
    $categoryHome = $db->fetchsql($sqlhomeCate);
   
    $data = [];
    foreach ($categoryHome as $item) 
    {
        $cateID = intval($item['id']);
        $sql = "SELECT * FROM product WHERE category_id = $cateID";
        $productHome = $db->fetchsql($sql);
        $data[$item['name']] = $productHome; 
    }
?>
<style>
    .price
    {
        color: #ea3a3c;
    }
    </style>

<div class="container">
	<div class="shoes-grid">
		<a href="home.php">
			<div class="wrap-in">
				<div class="wmuSlider example1 slide-grid">		 
				   <div class="wmuSliderWrapper">		  
					   <article style="position: absolute; width: 100%; opacity: 0;">					
						<div class="banner-matter">
						<div class="col-md-5 banner-bag">
							<img width="100%" height="100%" src="../public/uploads/slide/banner.jpg">
							</div>
							<div class="col-md-7 banner-off">							
								<h2>SALE 10% 0FF</h2>
								<label>Cho tất cả các mặt hàng trong <b>HÔM NAY</b></label>					
								<span class="on-get">Săn ngay</span>
							</div>
							
							<div class="clearfix"> </div>
						</div>
						
					 	</article>
					 	<article style="position: absolute; width: 100%; opacity: 0;">					
						<div class="banner-matter">
						<div class="col-md-5 banner-bag">
							<img width="100%" height="100%" src="../public/uploads/slide/banner.jpg">
							</div>
							<div class="col-md-7 banner-off">
								<h2>SALE 10% 0FF</h2>
								<label>Cho tất cả các mặt hàng trong <b>HÔM NAY</b></label>					
								<span class="on-get">Săn ngay</span>							
							</div>
							
							<div class="clearfix"> </div>
						</div>
						
					 	</article>
					 	<article style="position: absolute; width: 100%; opacity: 0;">					
						<div class="banner-matter">
						<div class="col-md-5 banner-bag">
							<img width="100%" height="100%"" src="../public/uploads/slide/banner.jpg">
							</div>
							<div class="col-md-7 banner-off">							
								<h2>SALE 10% 0FF</h2>
								<label>Cho tất cả các mặt hàng <b>HÔM NAY</b></label>					
								<span class="on-get">Săn ngay</span>
							</div>
							
							<div class="clearfix"> </div>
						</div>
						
					 	</article>
						
					 </div>
					</a>
	                <ul class="wmuSliderPagination">
	                	<li><a href="#" class="">0</a></li>
	                	<li><a href="#" class="">1</a></li>
	                	<li><a href="#" class="">2</a></li>
	                </ul>
					 <script src="js/jquery.wmuSlider.js"></script> 
				  <script>
	       			$('.example1').wmuSlider();         
	   		     </script> 
	            </div>
			</div>
        </a>
   		<div class="row">
		<a href="single.php">				 
   		    <div class="col-md-12">
   		     	<div class="row"> 
	   		     <?php 
            		foreach ($data as $key => $value): 
        		?>
        		<div class="row">
            		<h3 class="title-main"><a href=""><?php echo $key ?></a> </h3>
		            <div class="showitem" style="margin-top: 10px; margin-bottom: 10px;">
		                <?php 
		                    foreach ($value as $item):
		                ?>
		                <div class="col-md-3 item-product bor">
		                    <a href="single.php?id=<?php echo $item['id'] ?>">
		                       <img src="<?php echo uploads()?>/product/<?php echo $item['thunbar'] ?>" class="" width="80%" height="20%">
		                    </a>
		                    <div class="info-item">
		                       <a href="single.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']; ?></a>
		                       <p><strike class="sale"><?php echo formatPrice($item['price']); ?></strike><b class="price">  <?php echo formatPriceSale($item['price'],$item['sale']); ?></b></p>
		                       <span class=""><center><a class="btn btn-success" href="home.php?action=add&id=<?php echo $item['id'] ?>">Mua</a>
			                       <a href=""><i class="fa fa-heart"></i></a>
			                       <a href=""><i class="fa fa-shopping-basket"></i></a></span>
		                       </center>
		                       
		                    </div>
		                    <div class="hidenitem">
		                      <!--  <p><a href=""><i class="fa fa-search"></i></a></p>
		                      <p><a href=""><i class="fa fa-heart"></i></a></p>
		                      <p><a href=""><i class="fa fa-shopping-basket"></i></a></p> -->
		                    </div>
		                </div>
		                <?php 
		                    endforeach;
		                ?>
		            </div>
		        </div>
		        <?php 
		            endforeach;
		        ?>
				</div>		
					
					
				<div class="clearfix"> </div>
   		     	</div>
   		     </div>
   		     <div class="products">
   		     	<h5 class="latest-product">Sản phẩm mới</h5>	
   		     	  <a class="view-all" href="danhmucsanpham.php">XEM TẤT CẢ<span> </span></a> 		     
   		     </div>
   		     <div class="clearfix"> </div>
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
   		<div class="clearfix">
   			
   		</div>
   		<div  class="pull-right">
		<nav aria-label="Page navigation" class="clearfix">
            <ul class="pagination">
                <li>
                    <a href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>

                <?php 
                    for ($i=1; $i <= $sotrang ; $i++):
                ?>
                <?php 
                    if(isset($_GET['page']))
                    {
                        $p = $_GET['page'];
                    }
                    else
                    {
                        $p= 1;
                    }
                ?>

                <li class="<?php echo isset($_GET['page']) && $_GET['page'] == $i  ? 'active' : '' ?>">
                    <a href="?page= <?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
                <!-- <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li> -->
                <li>
                    <a href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>        	         
</div>
<?php 
include("footer.php") 
?>