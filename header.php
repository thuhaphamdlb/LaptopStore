<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Trang Admin</title>
    <link href="<?php echo base_url(); ?>/public/admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/public/admin/css/sb-admin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/public/admin/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>Tên ai nì</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">In tên ra <span class="label label-default">In danh hiệu nữa</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">Xem tất cả này</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Tên in khi nãy<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Lý lịch</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Tin nhắn</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i>Cài đặt</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i>Đi ra</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a style="font-size: 150%;" href="">Xin chào Admin</a>
                    </li>

                    <li class="<?php echo isset($open) && $open == 'category' ? 'active' : ''; ?>">
                        <a href="<?php echo modules('category'); ?>"><i class="fa fa-fw fa-list"></i> Danh mục sản phẩm</a>

                    </li>
                    <li class="<?php echo isset($open) && $open == 'product' ? 'active' : ''; ?>">
                        <a href="<?php echo modules('product'); ?>"><i class="fa fa-fw fa-database"></i> Sản phẩm</a>

                    </li>
                    <li class="<?php echo isset($open) && $open == 'admin' ? 'active' : ''; ?>">
                        <a href="<?php echo modules('admin'); ?>"><i class="fa fa-user"></i>   Admin</a>

                    </li>
                    <li class="<?php echo isset($open) && $open == 'users' ? 'active' : ''; ?>">
                        <a href="<?php echo modules('users'); ?>"><i class="fa fa-user"></i> Thành viên</a>
                    </li>
                    <li class="<?php echo isset($open) && $open == 'transaction' ? 'active' : ''; ?>">
                        <a href="#"><i ></i> Quản lý đơn hàng</a>
                    </li>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i>Thêm</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-dashboard"></i>Cuối trang</a>
                    </li>
                </ul>
            </div>
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">