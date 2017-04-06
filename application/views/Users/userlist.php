<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="users-list">
            <div class="row-fluid header">
                <h3>Users</h3>
                <div class="span10 pull-right">
                    <input type="text" class="span5 search" placeholder="Type a user's name..." />

                    <!-- custom popup filter -->
                    <!-- styles are located in css/elements.css -->
                    <!-- script that enables this dropdown is located in js/theme.js -->
                    <div class="ui-dropdown">
                        <div class="head" data-toggle="tooltip" title="Click me!">
                            Filter users
                            <i class="arrow-down"></i>
                        </div>
                        <div class="dialog">
                            <div class="pointer">
                                <div class="arrow"></div>
                                <div class="arrow_border"></div>
                            </div>
                            <div class="body">
                                <p class="title">
                                    Show users where:
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
                    <?php
                    if($this->session->change_info!=NULL){
                        echo $this -> session -> change_info;
                    }
                    ?>
                    <a href="new-user.html" class="btn-flat success pull-right">
                        <span>&#43;</span>
                        NEW USER
                    </a>
                </div>
            </div>

            <!-- Users table -->
            <div class="row-fluid table">

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="span4 sortable">
                            用户名
                        </th>
                        <th class="span3 sortable">
                            <span class="line"></span>注册时间
                        </th>
                        <th class="span2 sortable">
                            <span class="line"></span>姓名
                        </th>
                        <th class="span3 sortable align-right">
                            <span class="line"></span>电话
                        </th>
                        <th class="span3 sortable align-right">
                            <span class="line"></span>操作
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- row -->
                    <?php foreach ($user_list as $item):?>
                    <tr class="first">
                        <td>
                            <img src="img/contact-img.png" class="img-circle avatar hidden-phone" />
                            <a href="user-profile.html" class="name"><?php echo $item['username'];?></a>

                        </td>
                        <td>
                            <?php echo date("Y-m-d H:i:s",$item['created_at']);?>
                        </td>
                        <td>
                            <?php echo $item['firstname'].$item['lastname'];?>
                        </td>
                        <td class="align-right">
                            <a href="#"><?php echo $item['phone'];?></a>
                        </td>
                        <td class="align-right">
                            <a href="<?php echo base_url()."index.php?c=Admin&m=Menberinfo&userid=".$item['id'];?>">修改</a>
                            <a href="<?php echo base_url()."index.php?c=Users&m=DelUser&userid=".$item['id'];?>">删除</a>
                        </td>
                    </tr>
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