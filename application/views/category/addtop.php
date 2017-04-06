<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>Create a new Top Category</h3>
            </div>

            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <?php
                        echo form_open('c=Category&m=addTopCategory');
                        ?>
                        <form class="new_user_form inline-input" />
                        <div class="spanaddTopCategory12 field-box">
                            <?php
                            if($this->session->cate_addsuc!=NULL){
                                echo $this -> session -> cate_addsuc;
                            }
                            ?>
                            <label>分类父级:</label>
                            <div class="ui-select span5">

                                <select name="catpid">
                                    <option value="0" />请选择分类
                                    <?php foreach ($toplist as $item):?>
                                        <option value="<?php echo $item['id'];?>" /><?php echo $item['catname'];?>
                                    <?endforeach;?>
                                </select>
                            </div>
                        </div>
                        <div class="span12 field-box">
                            <label>分类名:</label>
                            <input class="span9" name="cat_name" type="text" />
                        </div>
                        <div class="span11 field-box actions">
                            <input type="submit" class="btn-glow primary" value="Create Category" />
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
