<?php 
    $open = "product";
    include ("../autoload.php");
    
    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p=1;
    }

    $sql = "SELECT product.*,category.name AS namecate FROM product LEFT JOIN category ON category.id = product.category_id";
    $product = $db->fetchJone('product',$sql,$p,4,true);

    if(isset($product['page']))
    {
        $sotrang = $product['page'];
        unset($product['page']);
    } 
?>
<?php 
    require_once ("../header.php") ;
?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách sản phẩm
                <a href="add.php" class="btn btn-success">Thêm mới</a>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-file"></i>Sản phẩm
                </li>
            </ol>
            <div class="clearfix">
                <?php include ("../notification.php"); ?>
            </div>
            
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Danh mục</th>
                        <th>Slug</th>
                        <th>Thông tin</th>
                        <th>Hình ảnh</th>
                        <th width="20%;">Ngày tạo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt= 1; foreach ($product as $item) { ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['namecate'] ?></td>
                            <td><?php echo $item['slug']; ?></td>
                            <td>
                                <ul>
                                    <li>Giá: <?php echo $item['price']; ?></li>
                                    <li>Số lượng: <?php echo $item['number']; ?></li>
                                </ul>
                            </td>
                            <td>
                                <img width="80px" height="80px" src="<?php echo uploads() ?>product/<?php echo $item['thunbar'] ?>">
                            </td>
                            <td><?php echo $item['created_at']; ?></td>
                            <td>
                                <a class="btn btn-xs btn-info" href="edit.php?id=<?php echo $item['id']; ?>"><i class="fa fa-edit">Sửa</i></a>
                                <a class="btn btn-xs btn-danger" href="delete.php?id=<?php echo $item['id']; ?>"><i class="fa fa-trash">Xóa</i></a>
                            </td>

                        </tr>
                    <?php $stt++; }?>
                </tbody>
            </table>
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

                        <li class="<?php echo ($i==$p)? 'active' : '' ?>">
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
    </div>
<?php 
    require_once ("../footer.php") ;
?>