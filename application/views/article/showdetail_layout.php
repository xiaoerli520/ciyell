<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0056)http://www.bupt.edu.cn/content/content.php?p=101_42_4382 -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>梦之蓝-内容页</title>
    <meta name="keywords" content="社会主义核心价值观">
    <meta name="description" content="社会主义核心价值观">
    <link href="assets/index_res/content_files/common.css" rel="stylesheet" type="text/css">
    <link href="assets/index_res/content_files/list.css" rel="stylesheet" type="text/css">
    <script src="assets/index_res/content_files/hm.js"></script><script src="assets/index_res/content_files/jquery-1.9.1.min.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="assets/index_res/social/respond.min.js" type="text/javascript"></script>
    <![endif]-->
    <script src="assets/index_res/content_files/js.js" type="text/javascript"></script>
</head>
<body>
<div class="clear list_top ovhi psRe" style="height: 309px;">
    <div class="header psAb">
        <div class="psRe head">
            <h2 class="logo"><a class="disin" href="index.html"><img src="assets/index_res/social/logo3.png" alt="Socialist core values" height="102"></a></h2>
            <div id="top_nav" style="width: 412px; height: 206px;">
                <ul style="width: 618px;"><!---头部内容-->
                    <?php foreach ($catlist_p as $item):?>
                        <li class="nav-li per"><a class="top_nav" href="content.html" target="_self" style="width: 103px;"><span class="span1"><?php echo $item['catname'];?></span></a>
                            <dl class="nav-child span2">
                                <div class="lf span1">
                                    <?php foreach ($catlist_s as $s_item):?>
                                        <?php if($s_item['catpid']==$item['id']){?>
                                            <dd><a href="content.html" target="_self"><?php echo $s_item['catname'];?></a></dd>
                                        <?php }?>
                                    <?php endforeach;?>
                                </div> <div class="lf span1">    </div> </dl>
                        </li>
                    <?php endforeach;?>

                    <li class="nav-li per unuse">
                        <div style="background: url(&quot;assets/index_res/img/sub_nav.png&quot;) repeat-x; height: 103px; width: 103px;">
                            <div class="line" style="background: url(/img/top-line.png) repeat-x 0 34px; height: 35px;"></div>
                        </div>
                    </li>
                </ul>
            </div><!--/nav-->
            <div class="clear hover_right psRe" style="margin-left: 721px;">
                <ul class="head_right">
                    <li class="head_li rt"><a class="animate" href="index.html"><span>英文版</span><i class="icos ico_eng"></i></a></li>

                    <?php

                    if(!isset($_SESSION['admin_userid'])){
                        ?>
                        <li class="head_li rt"><a class="animate2" href="<?php echo base_url()."index.php?c=Member&m=signup";?>"><span>注册</span></a></li>
                        <li class="head_li rt"><a class="animate2" href="<?php echo base_url()."index.php?c=Member&m=login";?>"><span>登录</span></a></li>
                        <li class="head_li rt h35">&nbsp;</li>
                    <?php }else {
                        ?>
                        <li class="head_li rt"><a class="animate2"
                                                  href="<?php echo base_url() . "index.php?c=Member&m=logout"; ?>"><span>登出</span></a>
                        </li>

                        <li class="head_li rt"><a class="animate2"
                                                  href="#"><span><?php echo $_SESSION['admin_name'];?></span></a>
                        </li>
                        <li class="head_li rt"><a class="animate2"
                                                  href="<?php echo base_url() . "index.php?c=Member&m=login"; ?>"><span>后台管理页面</span></a>
                        </li>
                        <li class="head_li rt h35">&nbsp;</li>
                        <?php
                    }
                    ?>

                </ul>
                <ul id="search_ul">
                    <form id="search" action="#" method="get">
                        <input type="text" id="search_text" name="s" placeholder="搜索">
                        <input type="submit" id="search_submit" value="搜 索">
                    </form>
                </ul>
            </div>
        </div>
    </div>
    <ul class="psRe">
        <img src="assets/index_res/content_files/about.gif" style="width: 1519px;">        <div class="list_grd_bg psAb"></div>
    </ul>
    <a class="disin psAb menuname" href="#" style="top: 259px; left: 279.5px;">内容详情</a>
</div>