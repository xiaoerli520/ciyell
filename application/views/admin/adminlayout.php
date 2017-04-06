<!DOCTYPE html>
<html>
<head>
    <title>后台管理</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- bootstrap -->
    <link href="assets/backend/css/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="assets/backend/css/bootstrap/bootstrap-responsive.css" rel="stylesheet" />
    <link href="assets/backend/css/bootstrap/bootstrap-overrides.css" type="text/css" rel="stylesheet" />

    <!-- libraries -->
    <link href="assets/backend/css/lib/jquery-ui-1.10.2.custom.css" rel="stylesheet" type="text/css" />
    <link href="assets/backend/css/lib/font-awesome.css" type="text/css" rel="stylesheet" />

    <!-- global styles -->
    <link rel="stylesheet" type="text/css" href="assets/backend/css/layout.css" />
    <link rel="stylesheet" type="text/css" href="assets/backend/css/elements.css" />
    <link rel="stylesheet" type="text/css" href="assets/backend/css/icons.css" />

    <!-- this page specific styles -->
    <link rel="stylesheet" href="assets/backend/css/compiled/index.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="assets/backend/css/compiled/calendar.css" type="text/css" media="screen" />
    <link href='assets/backend/css/lib/fullcalendar.css' rel='stylesheet' />
    <link href='assets/backend/css/lib/fullcalendar.print.css' rel='stylesheet' media='print' />
    
    <!-- open sans font -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
<body>

<!-- navbar -->
<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <button type="button" class="btn btn-navbar visible-phone" id="menu-toggler">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="brand" href="<?php base_url()."index.php?c=Admin&m=Index";?>" style="font-weight:700;font-family:Microsoft Yahei">后台管理</a>

        <ul class="nav pull-right">
            <li class="hidden-phone">
                <input class="search" type="text" />
            </li>
            <li class="notification-dropdown hidden-phone">
                <a href="#" class="trigger">
                    <i class="icon-warning-sign"></i>
                    <span class="count">6</span>
                </a>
                <div class="pop-dialog">
                    <div class="pointer right">
                        <div class="arrow"></div>
                        <div class="arrow_border"></div>
                    </div>
                    <div class="body">
                        <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                        <div class="notifications">
                            <h3>你有 6 个新通知</h3>
                            <a href="#" class="item">
                                <i class="icon-signin"></i> 新用户注册
                                <span class="time"><i class="icon-time"></i> 13 分钟前.</span>
                            </a>
                            <a href="#" class="item">
                                <i class="icon-signin"></i> 新用户注册
                                <span class="time"><i class="icon-time"></i> 18 分钟前.</span>
                            </a>
                            <a href="#" class="item">
                                <i class="icon-signin"></i> 新用户注册
                                <span class="time"><i class="icon-time"></i> 49 分钟前.</span>
                            </a>
                            <a href="#" class="item">
                                <i class="icon-download-alt"></i> 新订单
                                <span class="time"><i class="icon-time"></i> 1 天前.</span>
                            </a>
                            <div class="footer">
                                <a href="#" class="logout">查看所有通知</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="notification-dropdown hidden-phone">
                <a href="#" class="trigger">
                    <i class="icon-envelope-alt"></i>
                </a>
                <div class="pop-dialog">
                    <div class="pointer right">
                        <div class="arrow"></div>
                        <div class="arrow_border"></div>
                    </div>
                    <div class="body">
                        <a href="#" class="close-icon"><i class="icon-remove-sign"></i></a>
                        <div class="messages">
                            <a href="#" class="item">
                                <img src="assets/backend/img/contact-img.png" class="display" />
                                <div class="name">Alejandra Galván</div>
                                <div class="msg">
                                    There are many variations of available, but the majority have suffered alterations.
                                </div>
                                <span class="time"><i class="icon-time"></i> 13 min.</span>
                            </a>
                            <a href="#" class="item">
                                <img src="assets/backend/img/contact-img2.png" class="display" />
                                <div class="name">Alejandra Galván</div>
                                <div class="msg">
                                    There are many variations of available, have suffered alterations.
                                </div>
                                <span class="time"><i class="icon-time"></i> 26 min.</span>
                            </a>
                            <a href="#" class="item last">
                                <img src="assets/backend/img/contact-img.png" class="display" />
                                <div class="name">Alejandra Galván</div>
                                <div class="msg">
                                    There are many variations of available, but the majority have suffered alterations.
                                </div>
                                <span class="time"><i class="icon-time"></i> 48 min.</span>
                            </a>
                            <div class="footer">
                                <a href="#" class="logout">View all messages</a>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle hidden-phone" data-toggle="dropdown">
                    账户管理
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu">
                    <li><a href="<?php echo base_url()."index.php?c=Admin&m=userDetail";?>">用户详情</a></li>
                    <li><a href="<?php echo base_url()."index.php?c=Admin&m=Menberinfo&userid=".$_SESSION['admin_userid'];?>">个人信息管理</a></li>
                    <li><a href="<?php echo base_url()."index.php?c=Admin&m=changePass";?>">修改密码</a></li>

                </ul>
            </li>
            <li class="settings hidden-phone">
                <a href="personal-info.html" role="button">
                    <i class="icon-cog"></i>
                </a>
            </li>
            <li class="settings hidden-phone">
                <a href="<?php echo base_url()."index.php?c=Member&m=logout";?>" role="button">
                    <i class="icon-share-alt"></i>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- end navbar -->

<!-- sidebar -->
<div id="sidebar-nav">
    <ul id="dashboard-menu">
        <li class="active">
            <div class="pointer">
                <div class="arrow"></div>
                <div class="arrow_border"></div>
            </div>
            <a href="<?php echo base_url()."index.php?c=Admin&m=Index";?>">
                <i class="icon-home"></i>
                <span>后台首页</span>
            </a>
        </li>
        <li>
            <a href="chart-showcase.html">
                <i class="icon-signal"></i>
                <span>统计</span>
            </a>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-group"></i>
                <span>用户管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo base_url()."index.php?c=Users&m=UserList";?>">用户列表</a></li>
                <li><a href="<?php echo base_url()."index.php?c=Users&m=UserList";?>">加入新用户</a></li>

            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-th-large"></i>
                <span>分类管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo base_url()."index.php?c=category&m=catlist";?>">分类列表</a></li>
                <li><a href="<?php echo base_url()."index.php?c=category&m=addTopCategory";?>">添加顶部分类</a></li>
                <li><a href="<?php echo base_url()."index.php?c=category&m=addMiddleCategory";?>">添加中部分类</a></li>
            </ul>
        </li>
        <li>
            <a class="dropdown-toggle" href="#">
                <i class="icon-edit"></i>
                <span>文章管理</span>
                <i class="icon-chevron-down"></i>
            </a>
            <ul class="submenu">
                <li><a href="<?php echo base_url()."index.php?c=Article&m=Showlist";?>">文章列表</a></li>
                <li><a href="<?php echo base_url()."index.php?c=Article&m=AddArticle";?>">添加文章</a></li>

            </ul>
        </li>
        <li>
            <a href="gallery.html">
                <i class="icon-picture"></i>
                <span>相册管理</span>
            </a>
        </li>
        <li>
            <a href="calendar.html">
                <i class="icon-calendar-empty"></i>
                <span>日历事件管理</span>
            </a>
        </li>




    </ul>
</div>
<!-- end sidebar -->