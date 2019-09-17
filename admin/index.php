<?php 
    $open = "admin";
    include ("../autoload.php");
    
    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p=1;
    }

    $sql = "SELECT admin.*FROM admin ORDER BY ID DESC";
    $admin = $db->fetchJone('admin',$sql,$p,3,true);

    if(isset($admin['page']))
    {
        $sotrang = $admin['page'];
        unset($admin['page']);
    } 
?>
<?php 
    require_once ("../header.php") ;
?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách admin
                <a href="add.php" class="btn btn-success">Thêm mới</a>
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-file"></i>Admin
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
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt= 1; foreach ($admin as $item) { ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['email']; ?></td>
                            <td><?php echo $item['phone']; ?></td>
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