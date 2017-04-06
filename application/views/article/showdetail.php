
<div class="crumbs_left lf" style="width: 488.5px;"></div>
<div class="crumbs lh35 lf crumb">
    <a href="<?php echo base_url()."index.php"?>">首 页</a>
    &nbsp;&nbsp;⋅&nbsp;&nbsp;
    <?php if(isset($content['cat_p_name'])){?>
    <a href="#"><?php echo $content['cat_p_name'];?></a>
    &nbsp;&nbsp;⋅&nbsp;&nbsp;
    <a href="#"><?php echo $content['catname'];?></a></div>
    <?php } else {?>

<a href="#"><?php echo $content['catname'];?></a></div>

<?php }?>


<div class="bk"></div>
<div class="bagf wrap_list clear grd24 mar0a">
    <div class="list_left lf">
        <div id="wrap_sub"></div>
        <ul class="wrap_sub">
            <li class="on"><a class="subnav_a" href="#" target=""><?php echo $content['catname'];?></a></li>

        </ul>
    </div>

    <div class="list-content rt list_main">
        <div class="article psRe">
            <h1><?php echo $content['title'];?></h1>
            <div class="bk20"></div>
            <div class="content detail">
                <p style="text-align: center"><?php echo $content['content'];?></p>



            </div>
