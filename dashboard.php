<?php
session_start();
?>
<?php if(!$_SESSION['username']):?>
    <?php header('Location:login.php');?>
<?php else:?>
<?php include("include/header.php");?>
<div class="container">
    <?php 
        $url = $_SERVER['PHP_SELF'];
        $seg  = explode('/',$url);
        $path = "http://127.0.0.1".$seg[0].'/'.$seg[1];
        $full_url = $path.'/'.'img'.'/'.'kuol.jpg';
    ?>
    <h1 style="text-align:center;">Welcome <?php echo $_SESSION['username'];?></h1>
    <div class="row">
        <div class="col-lg-12">
            <p style="text-align:center;">
            <img src="<?php echo $full_url;?>" style="width: 200px; height=200px border-radius:50%" alt="kuol"/>
            </p>
        </div>
    </div>
</div>
<?php include("include/footer.php");?>
<?php endif;?>