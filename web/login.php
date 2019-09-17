<?php 
	include("header.php");
	include ("../autoload.php");
	$open = "category";

	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
       header("location: home.php");
       exit;
   }

	$category = $db->fetchAll('category');
	$data =
	[
		"email" => postInput("email"),
		"password" => MD5(postInput("password"))
	];

	$error = [];

	if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
    	if($data['email'] == '')
        {
            $error['email'] = "Mời bạn nhập email";
        }
        if($data['password'] == '')
        {
            $error['password'] = "Mời bạn nhập mật khẩu";
        }


        if(empty($error))
        {
        	/*if(($data['email'] == "ha.pham@student.passerellesnumeriques.org") && $data['password'] == "11111111" )
        	{
        		header("location: ../../admin/");
        	}
        	else
        	{
        		
        	}*/
        	$is_check =$db->fetchOne("users", " email = '".$data['email']."' AND  password = '".$data['password']."'  ");
        	if($is_check != NULL)
        	{
        		$_SESSION["loggedin"] = true;
        		$_SESSION['name_user'] = $is_check['name'];
        		$_SESSION['name_id'] = $is_check['id'];
        		echo "<script>
        				alert('Đăng nhập thành công');
						location.href='home.php';
        			</script>";	
        	}
        	else
        	{
        		$_SESSION['error'] =" Đăng nhập thất bại. Email hoặc mật khẩu không đúng";
        	}
        }
    }
?>

<div class="container">
   <div class="account_grid">
		<div class= "login-right">
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

			<?php 
				if(isset($_SESSION['error'])):
			?>
			<div class="alert alert-danger" role="alert">
		  				<?php echo $_SESSION['error'];
		  				unset($_SESSION['error']);
		  			?>
			</div>
			<?php 
				endif;
			?>
			<h3>Đăng ký tài khoản khách hàng</h3>
			<p>Nếu bạn đã có tài khoản. Vui lòng đăng nhập.</p>
			<h3 class="title-main"><a href="">Đăng nhập tài khoản</a> </h3>
			<form action="login.php" method="POST" role="form" style="margin-top: 20px">
				<div class="row">
	                <label class="control-label col-sm-2">Email:</label>
	                <div class="col-sm-8">
	                    <input type="email" name="email" class="form-control" id="email" placeholder="a@abc.com" value="">
	                    <?php 
		                    if(isset($error['email'])):
		                ?>
		                <p style="color: red"><?php echo $error['email']; ?></p>
			            <?php 
			                endif;
			            ?>
	                </div>
	            </div>

	            <div class="row">
	                <label class="control-label col-sm-2">Mật khẩu:</label>
	                <div class="col-sm-8">
	                    <input type="password" name="password" class="form-control" id="password" placeholder="**********" value="">
	                    <?php 
	                    	if(isset($error['password'])):
		                ?>
		                    <p style="color: red"><?php echo $error['password']; ?></p>
		                <?php 
		                    endif;
		                ?>
	                </div>
	            </div>
	            <div class="row"></div>
				<a class="forgot" href="#">Quên mật khẩu?</a>
			  	<a href="login.php"><button  type="submit" class="btn btn-success">Đăng nhập</button></a>
	        </form>
        </div>

    	<div class=" login-left">
		  	<h3>Nếu bạn chưa có tài khoản</h3>
			<p>Tạo một tài khoản để có thể mua sắm dễ dàng và chúng tôi biết địa chỉ của bạn thuận lợi cho việc vận chuyển</p>
			<a class="btn btn-success" href="register.php">Tạo tài khoản</a>
   		</div>
   		<div class="clearfix"></div>
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
   		     		 <a class="view-all all-product" href="danhmucsanpham.php">Xem tất cả sản phẩm<span> </span></a>
   		     	</div>
   		     	 	
		</div>
  	<div class="clearfix"></div>
</div>
<?php 
	include("footer.php")
?>