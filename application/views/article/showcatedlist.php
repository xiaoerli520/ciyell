
<div class="crumbs_left lf" style="width: 488.5px;"></div>
<div class="crumbs lh35 lf crumb">
    <a href="<?php echo base_url()."index.php"?>">回 到 首 页</a>


    <a href="#"></a>

    <a href="#"></a></div>


    <a href="#"></a></div>




<div class="bk"></div>
<div class="bagf wrap_list clear grd24 mar0a">
    <div class="list_left lf">
        <div id="wrap_sub"></div>
        <ul class="wrap_sub">
            <li class="on"><a class="subnav_a" href="#" target=""><?php echo $cate_name;?></a></li>

        </ul>
    </div>

    <div class="list-content rt list_main">
        <div class="article psRe">
            <h1></h1>
            <div class="bk20"></div>
            <div class="content detail">
                <?php foreach ($article_list as $item):?>
                <p style="text-align: left ;font-size:20px;"><a href="<?php echo base_url()."index.php?c=Article&m=showDetail&articleid=".$item['aid'];?>"> <?php echo $item['title'];?></a></p>
                <?php endforeach;?>


            </div>
