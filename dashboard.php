<?php
session_start();
?>
<?php
    include("config/db.php");
    $id = $_SESSION['id'];
    $query = "SELECT * FROM profile WHERE id='$id'";
    $result = mysqli_query($conn, $query) or die('error');
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            $image = $row['image'];
            $profession = $row['profession'];
        }
    }
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
    <?php if($_SESSION['id']):?>
    <h1>Admin Dashboard</h1>
    <?php else:?>
    <h1>Users Dashboard</h1>
    <?php endif;?>
    <h1 style="text-align:center;">Welcome <?php echo $_SESSION['username'];?></h1>
    <div class="row">
        <div class="col-lg-12">
        <p style="text-align:center;">
            <?php if(isset($avatar)):?>
            <!-- code for displaying image should be here though it displays a bigger imae on the screen. i had to remove it -->
            <h4 style="text-align:center;"><?php echo $profession;?></h4>
            <?php else:?>
            <img src=<?php echo $full_url;?>>
            <?php endif;?>
            </p>
        </div>
        <h1>All Posts</h1>
    </div>
    <?php 
    $posts_query = "SELECT * FROM posts";
    $posts_result = mysqli_query($conn,$posts_query) or die("error");
    if(mysqli_num_rows($posts_result)>0){
        while($posts = mysqli_fetch_assoc($posts_result)){
            $id = $posts['id'];
            $title = $posts['title'];
            $description = $posts['description'];
            $category = $posts['category'];
            $featuredimg = $posts['feat_image'];

         ?>

            <div class="row">
                <div class="col-lg-2">
                <img src=<?php echo $featuredimg;?> style="width: 150px;">
                </div>
                <div class="col-lg-10">
                <h3><a href=""><?php echo $title;?></a></h3>
                <p><?php echo $description?></p>
                <a href=""><?php echo $category;?></a>
                <div class="row">
                    <div class="col-lg-1"><a href=view.php?id=<?php echo $id?>>VIEW</a></div>
                    <div class="col-lg-1"><a href=edit.php>EdIT</a></div>
                    <div class="col-lg-1"><a href=delete.php>DELETE</a></div>
                </div>
                </div>
                </div>
         <?php
        }
    }
    ?>
</div>
<?php include("include/footer.php");?>
<?php endif;?>    