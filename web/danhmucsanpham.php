<?php 
 	include ("../autoload.php");
    //session_start();
 	error_reporting(1);
 	$id = intval(getinput('id'));
 	$editCategory = $db->fetchID("category",$id);


 	if(isset($_GET['p']))
 	{
 		$p = $_GET['p'];
 	}
 	else 
 	{
 		$p = 1;	
 	}
 	$sql = "SELECT * FROM product WHERE category_id = $id";
 	$product = $db->fetchJones("product",$sql,1,$p,9,true);
 	unset($product['page']);

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
<?php 
    require_once ("header.php") ;
?>
<style>
    .price
    {
        color: #ea3a3c;
    }
    </style>
<div class="container">
        <div id="slide" class="text-center">
            <img width="1000px" height="400px;" src="<?php echo base_url()?>public/uploads/slide/banner.jpg">
        </div>
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
                       <img src="<?php echo uploads()?>/product/<?php echo $item['thunbar'] ?>" class="" width="100%" height="180">
                    </a>
                    <div class="info-item">
                       <a href="single.php?id=<?php echo $item['id'] ?>"><?php echo $item['name']; ?></a>
                       <p><strike class="sale"><?php echo formatPrice($item['price']); ?></strike><b class="price">  <?php echo formatPriceSale($item['price'],$item['sale']); ?></b></p>
                        <span class=""><center><a class="btn btn-success" href="danhmucsanpham.php?action=add&id=<?php echo $item['id'] ?>">Mua</a>
                                   <a href=""><i class="fa fa-heart"></i></a>
                                   <a href=""><i class="fa fa-shopping-basket"></i></a></span>
                               </center>
                    </div>
                    <div class="hidenitem">
                       <!-- <p><a href=""><i class="fa fa-heart"></i></a></p>
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

<?php 
    require_once ("footer.php") ;
?>