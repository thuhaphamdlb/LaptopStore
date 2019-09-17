<?php 
 	include ("../autoload.php");
 	error_reporting(1);
 	session_start();
 	$user = $db->fetchID("users",intval($_SESSION['name_id']));
 	//_debug($user);
 	if($_SERVER['REQUEST_METHOD'] = "POST")
 	{
 		$data =
 		[
 			'amount'  => $_SESSION['total'],
 			'users_id'=> $_SESSION['name_id'],
 			'note'    => postInput("note")
 		];
 		
 		$idtran = $db->insert("transaction",$data);
 		if($idtran >0)
 		{
 			foreach ($_SESSION['cart'] as $key => $value)
 			{
 				$data2 = 
			    [
				    'transaction_id' => $idtran 
			    ];
			    $id_insert2 = $db->insert('orders',$data2);

	
 			}

 			$_SESSION['success'] = "Lưu thông tin đơn hàng thành công. Chúng tôi sẽ liên hệ với quý khách khi chúng tôi giao hàng. Cảm ơn sự tin tưởng của quý khách";
 			header("location : thong-bao.php");
 		}
 	}

?>
<?php 
    require_once ("header.php") ;
?>
<div class="container">
	<selection class= "box-main1">
		<form class="form-horizontal" action="thanhtoan.php" method="POST" enctype= "multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-2">Tên khách hàng:</label>
                <div class="col-sm-8">
                    <input  type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $user['name']?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Email:</label>
                <div class="col-sm-8">
                    <input  type="email" name="email" class="form-control" id="email" placeholder="a@abc.com" value="<?php echo $user['email']?>">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Số điện thoại:</label>
                <div class="col-sm-8">
                    <input readonly="" type="number" name="phone" class="form-control" id="phone" placeholder="0888888888" value="<?php echo $user['phone']?>">
                </div>
            </div>
				
			<div class="form-group">
                <label class="control-label col-sm-2">Địa chỉ:</label>
                <div class="col-sm-8">
                    <input  type="text" name="address" class="form-control" id="address" placeholder="123 Điện Biên Hồ Chí Minh" value="<?php echo $user['address']?>">
                </div>

			</div>

			<div class="form-group">
                <label class="control-label col-sm-2">Số tiền:</label>
                <div class="col-sm-8">
                    <input readonly="" type="text" name="address" class="form-control" id="address" placeholder="123 Điện Biên Hồ Chí Minh" value="<?php echo formatPrice($_SESSION['total'])?>">
                </div>

			</div>

			<div class="form-group">
                <label class="control-label col-sm-2">Ghi chú:</label>
                <div class="col-sm-8">
                    <input type="text" name="note" class="form-control" id="note" placeholder="Nhập yêu cầu của bạn để chúng tôi biết" value="">
                </div>

			</div>
            
        </form>
	</selection>
	<center><button  type="submit" class="btn btn-success">Xác nhận</button></center>
</div>

<?php 
    require_once ("footer.php") ;
?>