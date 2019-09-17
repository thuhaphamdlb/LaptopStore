<?php 
	$open = "category";
	error_reporting(1);
	require_once ("../autoload.php");
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$data =
		[ 
			"name" => postInput('name'),
			"slug" => to_slug(postInput("name"))
		];

		$error = [];
		if(postInput('name') == '')
		{
			$error['name'] = "Mời bạn nhập đầy đủ tên danh mục";
		}
		if(empty($error))
		{
			$isset = $db->fetchOne("category","name = '".$data['name']."'");
			if(count($isset)>0)
			{
				$_SESSION['error'] = "Tên danh mục đã tồn tại !";
			}
			else
			{
				$id_insert = $db ->insert("category",$data);
				if($id_insert>0)
				{
					$_SESSION['success'] = "Thêm mới thành công";
					redirectAdmin('category');
					//trở về trang trước
				}
				else
				{
					$_SESSION['error'] = "Thêm mới thất bại";
				}
			}		
		}
	}
		
?>

<?php 
	require_once ("../header.php") ;
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
        	Thêm mới danh mục
        </h1>
        <ol class="breadcrumb">
            <li>
                <i></i>  <a href="index.php">Danh mục</a>
            </li>
            <li class="active">
                <i class="fa fa-file"></i>Thêm mới
            </li>
        </ol>
        <div class="clearfix">
        	<?php include ("../notification.php"); ?>
	    </div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal" action="" method="POST">
				<div class="form-group">
				    <label class="control-label col-sm-2" for="name">Tên danh mục:</label>
				    <div class="col-sm-8">
				      	<input type="text" name="name" class="form-control" id="name" placeholder="Name">
				      	<?php 
				      	if(isset($error['name'])): ?>
				      	<p class="text-danger"><?php echo $error['name']; ?></p> 
				      	<?php 
				      	endif; ?>
				    </div>
				</div>


				<div class="form-group"> 
				    <div class="col-sm-offset-2 col-sm-10">
				      	<button type="submit" class="btn btn-success">Lưu</button>
				    </div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php 
	require_once ("../footer.php") ;
?>