


<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>Categories</h3>
                <div class="span10 pull-right">
                    <input type="text" class="span5 search" placeholder="Type a user's name..." />

                    <!-- custom popup filter -->
                    <!-- styles are located in css/elements.css -->
                    <!-- script that enables this dropdown is located in js/theme.js -->
                    <div class="ui-dropdown">
                        <div class="head" data-toggle="tooltip" title="Click me!">
                            Filter categories
                            <i class="arrow-down"></i>
                        </div>
                        <div class="dialog">
                            <div class="pointer">
                                <div class="arrow"></div>
                                <div class="arrow_border"></div>
                            </div>
                            <div class="body">
                                <p class="title">
                                    Show categories where:
                                </p>
                                <div class="form">
                                    <select>
                                        <option />Name
                                        <option />Email
                                        <option />Number of orders
                                        <option />Signed up
                                        <option />Last seen
                                    </select>
                                    <select>
                                        <option />is equal to
                                        <option />is not equal to
                                        <option />is greater than
                                        <option />starts with
                                        <option />contains
                                    </select>
                                    <input type="text" />
                                    <a class="btn-flat small">Add filter</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
            <?php
            if($this->session->cate_chasuc!=NULL){
                echo $this -> session -> cate_chasuc;
            }
            ?>
            <!-- Users table -->
            <div class="row-fluid table">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        
                        <th class="span4 sortable">
                            分类名
                        </th>
                        <th class="span3 sortable">
                            <span class="line"></span>添加时间
                        </th>

                        <th class="span3 sortable">
                            <span class="line"></span>分类位置
                        </th>

                        <th class="span3 sortable align-right">
                            <span class="line"></span>操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- row -->
                    <?php foreach ($catlist_p as $item):?>
                    <tr class="first">
                        <td>
                            <a href="#" class="name">
                                <?php
                                echo $item['catname'];
                                ?>
                                </a>
                            <span class="subtext"></span>
                        </td>
                        <td>
                            <?php echo $item['created_at'];?>
                        </td>
                        <td>
                            <?php
                            if($item['cat_pos']==0){
                                echo "首页顶部";
                            }else{
                                echo "首页中部";
                            }
                            ?>
                        </td>
                        <td class="align-right">
                            <a href="<?php echo base_url()."index.php?c=Category&m=changeCate&cateid=".$item['id'];?>">修改</a>
                            <a href="<?php echo base_url()."index.php?c=Category&m=delCate&cateid=".$item['id'];?>">删除</a>
                        </td>
                    </tr>
                        <?php foreach ($catlist_s as $item_s):
                            if($item_s['catpid']==$item['id']){
                            ?>
                            <tr class="first">
                                <td>
                                    <a href="#" class="name">
                                        <?php
                                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                        echo $item_s['catname'];
                                        ?>
                                    </a>
                                    <span class="subtext"></span>
                                </td>
                                <td>
                                    <?php echo $item_s['created_at'];?>
                                </td>
                                <td>
                                    <?php
                                    if($item_s['cat_pos']==0){
                                        echo "首页顶部";
                                    }else{
                                        echo "首页中部";
                                    }
                                    ?>
                                </td>
                                <td class="align-right">
                                    <a href="<?php echo base_url()."index.php?c=Category&m=changeCate&cateid=".$item_s['id'];?>">修改</a>
                                    <a href="<?php echo base_url()."index.php?c=Category&m=delCate&cateid=".$item_s['id'];?>">删除</a>
                                </td>
                            </tr>
                        <?php }endforeach;?>
                    <?php endforeach;?>

                    </tbody>
                </table>
            </div>
            <div class="pagination pull-right">
                <ul>
                    <li><a href="#">&#8249;</a></li>
                    <li><a class="active" href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a href="#">&#8250;</a></li>
                </ul>
            </div>
            <!-- end users table -->
        </div>
    </div>
</div>
<!-- end main container -->


