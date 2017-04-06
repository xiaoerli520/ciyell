<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>Change Password</h3>
            </div>

            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <?php
                        echo form_open('c=Admin&m=changePass');
                        ?>

                        <div class="spanaddTopCategory12 field-box">
                            <?php
                            if($this->session->changepass_info!=NULL){
                                echo $this -> session -> changepass_info;
                            }
                            ?>
                        </div>
                        <div class="span12 field-box">
                            <label>原密码</label>
                            <input class="span9" name="oldpass" type="password"/>
                            <input class="span9" name="id" type="hidden" value="<?php echo $userid;?>" />
                        </div>
                        <div class="span12 field-box">
                            <label>新密码</label>
                            <input class="span9" name="newpass" type="password"/>
                        </div>
                        <div class="span12 field-box">
                            <label>确认密码</label>
                            <input class="span9" name="repass" type="password" value=""/>
                        </div>

                        <div class="span11 field-box actions">
                            <input type="submit" class="btn-glow primary" value="Change Password" />
                            <span>OR</span>
                            <input type="reset" value="Reset" class="reset" />
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
