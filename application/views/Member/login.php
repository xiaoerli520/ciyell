
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
    <h2>Or Login with</h2>
    <?php
    if($this->session->signup_success!=NULL){
        echo $this -> session -> signup_success;
    }
    ?>
    <?php
    echo form_open('c=member&m=login');
    ?>
    <form>
        <div class="lable">
        </div>
        <div class="clear"> </div>
        <div class="lable-2">
            <?php
            $data = array(
                'type'  => 'text',
                'name'  => 'username',
                'placeholder' => 'Username',
                'class' => 'text'
            );
            echo form_input($data);?>
            <?php
            $data = array(
                'type'  => 'password',
                'name'  => 'password',
                'placeholder' => 'Password',
                'class' => 'text'
            );
            echo form_input($data);?>
        </div>
        <div class="clear"> </div>
        <h3>By <span><a href="<?php echo base_url()."index.php?c=Member&m=signup";?>"></span>creating an account</a>, you agree to our <span><a href="term">Terms & Conditions</a> <span></h3>
        <div class="submit">
            <?php
            $data = array(
                'name'      => 'button',
                'id'        => 'button',
                'value'     => 'true',
                'type'      => 'reset',
                'content'   => 'Reset'
            );

            echo form_submit('mysubmit', '登陆');
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