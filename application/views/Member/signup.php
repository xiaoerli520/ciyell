
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="assets/signup_res/css/style.css" rel='stylesheet' type='text/css' />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

</head>

<body>
<div class="main">
    <!-----start-main---->
    <div class="inset">
        <div class="social-icons">
            <h1></h1>
            <div class="span"><a href="#"><img src="assets/signup_res/images/fb.png" alt=""/><i>Connect with Facebook </i><div class="clear"></div></a></div>
            <div class="span1"><a href="#"><img src="assets/signup_res/images/t-bird.png" alt=""/><i>Connect with Twitter</i><div class="clear"></div></a></div>
            <div class="clear"></div>
        </div>
    </div>
    <h2>Or sign up with</h2>
    <?php echo validation_errors(); ?>
    <?php
        if($this->session->signup_error!=NULL){
            echo $this -> session -> signup_error;
        }
    ?>
    <?php
    echo form_open('c=member&m=signup');
    ?>
    <form>
        <div class="lable">
            <?php
            $data = array(
                'type'  => 'text',
                'name'  => 'firstname',
                'placeholder' => 'Firstname',
                'class' => 'text'
            );
            echo form_input($data);?>
            <?php
            $data = array(
                'type'  => 'text',
                'name'  => 'lastname',
                'placeholder' => 'Lastname',
                'class' => 'text'
            );
            echo form_input($data);?>
        </div>
        <div class="clear"> </div>
        <div class="lable-2">
            <?php
            $data = array(
                'type'  => 'text',
                'name'  => 'username',
                'placeholder' => 'Username  6-16位',
                'class' => 'text'
            );
            echo form_input($data);?>
            <?php
            $data = array(
                'type'  => 'password',
                'name'  => 'password',
                'placeholder' => 'Password  6-255位',
                'class' => 'text'
            );
            echo form_input($data);?>
            <?php
            $data = array(
                'type'  => 'password',
                'name'  => 'repass',
                'placeholder' => 'repeat Password',
                'class' => 'text'
            );
            echo form_input($data);?>
        </div>
        <div class="clear"> </div>
        <h3>By creating an account, you agree to our <span><a href="<?php echo base_url()."index.php?c=Member&term";?>">Terms & Conditions</a> <span></h3>
        <h3>已经拥有账号 <span><a href="<?php echo base_url()."index.php?c=Member&m=login";?>">登录</a> <span></h3>
        <div class="submit">
            <?php
            $data = array(
                'name'      => 'button',
                'id'        => 'button',
                'value'     => 'true',
                'type'      => 'reset',
                'content'   => 'Reset'
            );

            echo form_submit('mysubmit', '建立账户');
            ?>

        </div>
        <div class="clear"> </div>
    </form>
    <?php echo form_close();?>
    <!-----//end-main---->
</div>
<!-----start-copyright---->
<div class="copy-right">
    <p>Powered<a href="http://www.fushengshe.com" target="_blank" title="浮生社">浮生社</a></p>
</div>
<!-----//end-copyright---->

</body>
</html>