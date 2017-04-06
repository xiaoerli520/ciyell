
    <div class="wrap_main span8 psAb" style="top: 309px; left: 309px;">
        <ul class="wrap_main_ul">
            <?php
            $i = 0;
            foreach ($catlist_m as $item):
                $i++;
                if($i==1){
                ?>

            <div class="lf griditem zoom" gridw="4" gridh="2" style="left: 206px; top: 0px; width: 514px; height: 205px;">
                <?php }else{?>
            <div class="lf griditem box1" gridw="1" gridh="1" style="left: 0px; top: 0px; width: 102px; height: 102px;">
                <?php }?>
                <span class="main_nav psAb cupo"><?php echo $item['catname'];?></span>
                <?php if($i==1){?>
                <ul class="psAb main_ul">
                    <?php }else{?>
                <ul class="psAb main_ul" style="display: none;">
                    <?php }?>
                    <h5 class="lh35 clear main_h5"><a class="lf main_a fb" href="javascript:void(0)"><?php echo $item['catname'];?></a></h5>
                    <?php foreach ($article_list as $art_item):?>
                        <?php if($art_item['id']==$item['id']){?>
                            <h6 class="fn"><a class="clear" href="<?php echo base_url()."index.php?c=Article&m=Showdetail&articleid=".$art_item['aid'];?>" title="<?php echo $art_item['title'];?>"><span class="main_ul_span lf"><?php echo $art_item['title'];?></span><span class="rt padl20 disin"><?php echo(substr($art_item['created_at'],5,6));?></span></a></h6>
                        <?php }?>
                    <?php endforeach;?>
                </ul>
                <p class="blue_bg psAb"></p>
            </div>
            <?php endforeach;?>







        </ul>
    </div><!--/main-->
    