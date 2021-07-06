<?php include("include/header.php");?>
<?php include("config/db.php");?>
    <div class="container">
        <h1>View Post</h1>
        <?php  $id = $_GET['id'];?>
        <?php 
            $posts_query = "SELECT * FROM posts WHERE id = '$id'";
            $posts_result = mysqli_query($conn,$posts_query) or die("error");
            if(mysqli_num_rows($posts_result)>0){
                while($posts = mysqli_fetch_assoc($posts_result)){
                    $id = $posts['id'];
                    $title = $posts['title'];
                    $description = $posts['description'];
                    $category = $posts['category'];
                    $featuredimg = $posts['feat_image']; 

                    $data = array(
                        'id'=>$id,
                        'title'=>$title,
                        'description'=>$description,
                        'category'=>$category,
                        'image'=>$featuredimg,
                    );
                }
            }
     
         ?>
        <div class="row">
            <h1 style="text-align:center;"><?php echo $title;?></h1>
            <div class="col-lg-4">
                <img src=<?php echo $featuredimg;?> alt="">
            </div>
            <div class="col-lg-8">
                <p><?php echo $description;?></p>
                <a href=""><?php echo $category;?></a>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="col-lg-2">
                                <a href="">Like (0)</a>
                            </div>
                            <div class="col-lg-3">
                                <a href="">Dislike (0)</a>
                            </div>
                            <div class="col-lg-3">
                                <a href="">Comment (0)</a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
<?php include("include/footer.php");?>