


<!-- main container -->
<div class="content">

    <div class="container-fluid">

        <!-- upper main stats -->
        <div id="main-stats">
            <div class="row-fluid stats-row">
                <div class="span3 stat">
                    <div class="data">
                        <span class="number">2457</span>
                        个访客
                    </div>
                    <span class="date">今天</span>
                </div>
                <div class="span3 stat">
                    <div class="data">
                        <span class="number">3240</span>
                        个用户
                    </div>
                    <span class="date">2016年3月</span>
                </div>
                <div class="span3 stat">
                    <div class="data">
                        <span class="number"><?php echo $_SESSION['admin_name'];?></span>
                        Hello world!
                    </div>
                    <span class="date"><?php echo date("Y/m/d");?></span>
                </div>
                <div class="span3 stat">
                    <div class="data">
                        <span class="number"><a href="<?php echo base_url()."index.php";?>">查看首页</a></span>

                    </div>
                    <span class="date"></span>
                </div>


            </div>
        </div>
        <!-- end upper main stats -->

        <div id="pad-wrapper">

            <!-- statistics chart built with jQuery Flot -->
            <div class="row-fluid chart">
                <h4>
                    统计
                    <div class="btn-group pull-right">
                        <button class="glow left">天</button>
                        <button class="glow middle active">月</button>
                        <button class="glow right">年</button>
                    </div>
                </h4>
                <div class="span12">
                    <div id="statsChart"></div>
                </div>
            </div>
            <!-- end statistics chart -->

            <!-- table sample -->
            <!-- the script for the toggle all checkboxes from header is located in assets/backend/js/theme.js -->
        
            <!-- end table sample -->
        </div>
    </div>
</div>

