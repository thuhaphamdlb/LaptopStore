<?php 
    $open = "product";
    error_reporting(1);
    require_once ("../autoload.php");

    $category = $db->fetchAll("category");

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $data =
        [ 
            "name" => postInput('name'),
            "slug" => to_slug(postInput("name")),
            "category_id" => postInput("category_id"),
            "number" => postInput("number"),
            "price" => postInput("price"),
            "sale" =>postInput("sale"),
            "content" => postInput("content"),
            "thunbar" => postInput("thunbar")
        ];

        $error = [];
        if(postInput('name') == '')
        {
            $error['name'] = "Mời bạn nhập tên sản phẩm";
        }

        if(postInput('category_id') == '')
        {
            $error['category_id'] = "Mời bạn chọn tên danh mục";
        }
        if(postInput('price') == '')
        {
            $error['price'] = "Mời bạn nhập giá sản phẩm";
        }
        if(postInput('sale') == '')
        {
            $error['sale'] = "Có sale không?";
        }
        if(postInput('content') == '')
        {
            $error['content'] = "Mời bạn nhập mô tả sản phẩm";
        }
        if(postInput('number') == '')
        {
            $error['number'] = "Mời bạn số lượng";
        }

        if(isset($FILES['thunbar']))
        {
            $error['thunbar'] = "Mời bạn chọn ảnh cho sản phẩm";
        }

       

        if(empty($error))
        {
            if(!isset($FILES['thunbar']))
            {
                $file_name = $_FILES['thunbar']['name'];
                $file_tmp = $_FILES['thunbar']['tmp_name'];
                $file_type = $_FILES['thunbar']['type'];
                $file_error = $_FILES['thunbar']['error'];
            }
            if($file_error ==0)
            {
                $part = "ROOT"."product/";
                $data['thunbar'] = $file_name;
            }

            _debug($data);

            $id_insert = $db->insert("product",$data);
            if($id_insert)
            {
                $_SESSION['success'] = "Thêm mới thành công";
                redirectAdmin("product");
            }
            else
            {
                $_SESSION['error'] = "Thêm mới thất bại";
                redirectAdmin("product");
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
            Sản phẩm
        </h1>
        <ol class="breadcrumb">
            <li>
                <i></i>  <a href="index.php">Sản phẩm</a>
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
            <form class="form-horizontal" action="" method="POST" enctype= "multipart/form-data">
                <div class="form-group">
                    <label class="control-label col-sm-2">Tên danh mục:</label>
                    <div class="col-sm-8">
                        <select class="form-control col-md-8" name="category_id">
                            <option value="">Mời bạn chọn danh mục sản phẩm</option>
                            <?php 
                                foreach ($category as $item):?>
                            <option value="<?php echo $item['id'] ?>"><?php echo $item['name']; ?></option>
                            <?php 
                            endforeach ?>   
                        </select>

                        <?php 
                        if(isset($error['category_id'])): ?>
                        <p class="text-danger"><?php echo $error['category_id']; ?></p> 
                        <?php 
                        endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="name">Tên sản phẩm:</label>
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
                    <label class="control-label col-sm-2" for="price">Giá sản phẩm:</label>
                    <div class="col-sm-8">
                        <input type="number" name="price" class="form-control" id="price" placeholder="9.000.000">
                        <?php 
                        if(isset($error['price'])): ?>
                        <p class="text-danger"><?php echo $error['price']; ?></p> 
                        <?php 
                        endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="number">Số lượng:</label>
                    <div class="col-sm-8">
                        <input type="number" name="number" class="form-control" id="number" placeholder="0">
                        <?php 
                        if(isset($error['number'])): ?>
                        <p class="text-danger"><?php echo $error['number']; ?></p> 
                        <?php 
                        endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="sale">Phần trăm giảm:</label>
                    <div class="col-sm-3">
                        <input type="number" name="sale" class="form-control" id="sale" placeholder="10%" value="0">
                    </div>
                    <?php 
                        if(isset($error['sale'])): ?>
                        <p class="text-danger"><?php echo $error['sale']; ?></p> 
                    <?php 
                        endif; 
                    ?>

                    <label class="control-label col-sm-2" for="thunbar">Ảnh sản phẩm:</label>
                    <div class="col-sm-3">
                        <input type="file" name="thunbar" class="form-control" id="thunbar">
                    </div>
                    <?php 
                        if(isset($error['thunbar'])): ?>
                        <p class="text-danger"><?php echo $error['thunbar']; ?></p> 
                    <?php 
                        endif; 
                    ?>
                </div>

                <div class="form-group">
                    <label class="control-label col-sm-2" for="content">Mô tả sản phẩm:</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" name="content" id="content" rows="3" required="required"></textarea>
                        <?php 
                        if(isset($error['content'])): ?>
                        <p class="text-danger"><?php echo $error['content']; ?></p> 
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