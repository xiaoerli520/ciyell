<!-- main container -->
<div class="content">

    <div class="container-fluid">
        <div id="pad-wrapper" class="new-user">
            <div class="row-fluid header">
                <h3>Change Infomation</h3>
            </div>

            <div class="row-fluid form-wrapper">
                <!-- left column -->
                <div class="span9 with-sidebar">
                    <div class="container">
                        <?php
                        echo form_open('c=Admin&m=Menberinfo');
                        ?>

                        <div class="spanaddTopCategory12 field-box">
                            <?php
                            if($this->session->change_info!=NULL){
                                echo $this -> session -> change_info;
                            }
                            ?>
                        </div>
                        <div class="span12 field-box">
                            <label>姓:<?php echo $userdetail['firstname'];?></label>


                        </div>
                        <div class="span12 field-box">
                            <label>名:<?php echo $userdetail['lastname'];?></label>

                        </div>
                        <div class="span12 field-box">
                            <label>Email: <?php echo $userdetail['email'];?></label>

                        </div>
                        <div class="span12 field-box">
                            <label>电话:<?php echo $userdetail['phone'];?></label>

                        </div>
                        <div class="span12 field-box">
                            <label>Have a nice Day :D</label>

                        </div>
                        <div class="span11 field-box actions">



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
