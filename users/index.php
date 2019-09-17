<?php 
    $open = "users";
    include ("../autoload.php");
    
    if(isset($_GET['page']))
    {
        $p = $_GET['page'];
    }
    else
    {
        $p=1;
    }

    $sql = "SELECT users.*FROM users ORDER BY ID DESC";
    $users = $db->fetchJone('users',$sql,$p,3,true);

    if(isset($users['page']))
    {
        $sotrang = $users['page'];
        unset($users['page']);
    } 
?>
<?php 
    require_once ("../header.php") ;
?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Danh sách người dùng
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-file"></i>Người dùng
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
                        <th>Địa chỉ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt= 1; foreach ($users as $item) { ?>
                        <tr>
                            <td><?php echo $stt; ?></td>
                            <td><?php echo $item['name']; ?></td>
                            <td><?php echo $item['email']; ?></td>
                            <td><?php echo $item['phone']; ?></td>
                             <td><?php echo $item['address']; ?></td>
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