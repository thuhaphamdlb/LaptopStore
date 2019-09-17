<?php 
	include("header.php");
    $open = "users";
    include("../autoload.php");
    $category = $db->fetchAll('category');
?>

<?php 
	//$conn = new mysqli("localhost","root","","tutphp");
	$conn = mysqli_connect("localhost","root","","tutphp");
 	mysqli_set_charset($conn,"utf8");
 ?>

<?php   
    if(isset($_SESSION['name_id']))
    {
        echo "<script>
                        alert('Bạn đã đăng nhập thành công');
                        location.href='home.php';
                    </script>";
    }
	$name = $password =$address = $email = $phone = '';

    $data =
    [ 
        "name" => postInput('name'),
        "email" => postInput("email"),
        "phone" => postInput("phone"),
        "password" => MD5(postInput("password")),
        "address" => postInput("address")
    ];   
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {

        $error = [];
        if(postInput('name') == '')
        {
            $error['name'] = "Mời bạn nhập đầy đủ họ và tên";
        }

        if(postInput('email') == '')
        {
            $error['email'] = "Mời bạn nhập email";
        }
        else
        {
            $is_check = $db->fetchOne("admin", " email = '".$data['email']."' ");
            if($is_check != NULL)
            {
                $error['email'] = "Email đã tồn tại";
            }
        }
        if(postInput('phone') == '')
        {
            $error['phone'] = "Mời bạn nhập số điện thoại";
        }
        if(postInput('password') == '')
        {
            $error['password'] = "Mời bạn nhập mật khẩu";
        }
        if(postInput('address') == '')
        {
            $error['address'] = "Mời bạn nhập địa chỉ";
        }

        if($data['password'] != MD5( postInput("re_password")))
        {
            $error['password'] = "Mật khẩu không khớp";
        }
       
       
        if(empty($error))
        {
           $id_insert = $db->insert("users",$data);
            if($id_insert>0)
            {
                $_SESSION['success'] = "Đăng ký thành công. Mời bạn đăng nhập";
                header("location: login.php ");
            }
            else
            {
                header("location: register.php ");
            }
        }
    }
	
?>
<div class="container"> 
	<div class="register">
	  	<h3 class="title-main"><a href="">Đăng ký tài khoản</a> </h3>
    <div class="col-md-12">
        <form class="form-horizontal" action="register.php" method="POST" enctype= "multipart/form-data">
            <div class="form-group">
                <label class="control-label col-sm-2">Họ và tên:</label>
                <div class="col-sm-8">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?php echo $name?>">
                    <?php 
                    	if(isset($error['name'])):
                    ?>
                    <p class="text-danger"><?php echo $error['name']; ?></p>
                    <?php 
                    endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Email:</label>
                <div class="col-sm-8">
                    <input type="email" name="email" class="form-control" id="email" placeholder="a@abc.com" value="<?php echo $email ?>">
                    <?php 
                    	if(isset($error['email'])):
                    ?>
                    <p class="text-danger"><?php echo $error['email']; ?></p>
                    <?php 
                    endif; ?>
                  
                </div>
            </div>
			
			<div class="form-group">
                <label class="control-label col-sm-2">Mật khẩu:</label>
                <div class="col-sm-8">
                    <input type="password" name="password" class="form-control" id="password" placeholder="**********" value="<?php echo $password ?>">
                    <?php 
                    	if(isset($error['password'])):
                    ?>
                    <p class="text-danger"><?php echo $error['password']; ?></p>
                    <?php 
                    endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Nhập lại mật khẩu:</label>
                <div class="col-sm-8">
                    <input type="password" name="re_password" class="form-control" id="re_password" placeholder="**********" value="">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Số điện thoại:</label>
                <div class="col-sm-8">
                    <input type="number" name="phone" class="form-control" id="phone" placeholder="0888888888" value="<?php echo $phone ?>">
                    <?php 
                    	if(isset($error['phone'])):
                    ?>
                    <p class="text-danger"><?php echo $error['phone']; ?></p>
                    <?php 
                    endif; ?>
                </div>
            </div>
				
			<div class="form-group">
                <label class="control-label col-sm-2">Địa chỉ:</label>
                <div class="col-sm-8">
                    <input type="text" name="address" class="form-control" id="address" placeholder="123 Điện Biên Hồ Chí Minh" value="<?php echo $address ?>">
                    <?php 
                    	if(isset($error['address'])):
                    ?>
                    <p class="text-danger"><?php echo $error['address']; ?></p>
                    <?php 
                    endif; ?>
                </div>
			</div>
            <button  type="submit" class="btn btn-success">Đăng ký</button>
        </form>
    </div>
	<div class="clearfix">
		
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
            </div>
                 <a class="view-all all-product" href="danhmucsanpham.php">Xem tất cả sản phẩm<span> </span></a>   
        </div>  
</div>
<?php 
	include("footer.php")
?>
