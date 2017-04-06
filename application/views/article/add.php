<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>Create an Article</h3>
            </div>

            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <?php
                        echo form_open('c=Article&m=AddArticle');
                        ?>
                        <form class="new_user_form inline-input" />
                        <div class="spanaddTopCategory12 field-box">
                            <?php
                            if($this->session->article_addsuc!=NULL){
                                echo $this -> session -> article_addsuc;
                            }
                            ?>
                        </div>
                        <div class="span12 field-box">
                            <label>选择分类:</label>
                            <select name="cateid" >
                                <option value="0">请选择分类</option>
                                <option value="0">----头部分类----</option>
                                <?php foreach ($catelist_up_p as $item_u):?>
                                    <option value="<?php echo $item_u['id'];?>"><?php echo $item_u['catname'];?></option>
                                        <?php foreach ($catelist_up_s as $item_m):?>
                                            <?php if($item_m['catpid']==$item_u['id']){?>
                                            <option value="<?php echo $item_m['id'];?>"><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;".$item_m['catname'];?></option>
                                            <?php }?>
                                        <?php endforeach;?>
                                <?php endforeach;?>
                                <option value="0">----中部分类----</option>
                                <?php foreach ($catelist_mid as $item_mid):?>

                                        <option value="<?php echo $item_mid['id'];?>"><?php echo $item_mid['catname'];?></option>

                                <?php endforeach;?>
                            </select>

                        </div>
                        <div class="span12 field-box">
                            <label>题目:</label>
                            <input class="span9" name="title" type="text" />

                        </div>
                        <div class="span12 field-box" style="width:900px">
                            <label>内容:</label>
                            <!-- 加载编辑器的容器 -->
                            <script id="container" name="content" type="text/plain">
                            这里写你的初始化内容
                            </script>
                            <!-- 配置文件 -->
                            <script type="text/javascript" src="assets/utf8-php/ueditor.config.js"></script>
                            <!-- 编辑器源码文件 -->
                            <script type="text/javascript" src="assets/utf8-php/ueditor.all.js"></script>
                            <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                var ue = UE.getEditor('container');
                            </script>
                        </div>
                        <div class="span11 field-box actions">
                            <input type="submit" class="btn-glow primary" value="Create Article" />
                            <span>OR</span>
                            <input type="reset" value="Cancel" class="reset" />
                        </div>
                        </form>
                        <?php echo form_close();?>
                    </div>
                </div>

                <!-- side right column -->
                <div class="span3 form-sidebar pull-right">
                    <div class="btn-group toggle-inputs hidden-tablet">
                        <button class="glow left active" data-input="inline">INLINE INPUTS</button>
                        <button class="glow right" data-input="normal">NORMAL INPUTS</button>
                    </div>
                    <div class="alert alert-info hidden-tablet">
                        <i class="icon-lightbulb pull-left"></i>
                        Click above to see difference between inline and normal inputs on a form
                    </div>
                    <h6>Sidebar text for instructions</h6>
                    <p>Add multiple users at once</p>
                    <p>Choose one of the following file types:</p>
                    <ul>
                        <li><a href="#">Upload a vCard file</a></li>
                        <li><a href="#">Import from a CSV file</a></li>
                        <li><a href="#">Import from an Excel file</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main container -->
