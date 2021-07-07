
<?php 
include("config/db.php");
if(isset($_FILES['featuredimage'])){
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    if($title!="" && $description !="" && $category!=""){
        $upload = 1;
        $file_name = $_FILES['featuredimage']['name'];
        $file_size = $_FILES['featuredimage']['size'];
        $file_tmp = $_FILES['featuredimage']['tmp_name'];
        $file_type = $_FILES['featuredimage']['type'];
        $tar_dir = "assets/featuredimages";
        $target_file = $tar_dir . basename($_FILES['featuredimage']['name']);
        $check = getimageSize($_FILES['featuredimage']['tmp_name']);
        $tmp = explode('.',$_FILES['featuredimage']['name']);
        $file_ext = end($tmp);
       // $file_ext = strtolower(end(explode('.',$_FILES['featuredimage']['name'])));

        $extension = array("jpeg","jpg","png");
        if(in_array($file_ext, $extension)==false){
            $msg = "Please choose the image which has the extension as jpeg, jpg, png";
        }if(file_exists($target_file)){
            $msg = "Sorry! File already exists";
        }
        if($check==false){
            $msg = "File is not an image";
        }if(empty($msg)==true){
            move_uploaded_file($file_tmp,"assets/featuredimages/" .$file_name);
            $url = $_SERVER['HTTP_REFRER'];
            $seg = explode('/',$url);
            $path = $seg[0] .'/'.$seg[1].'/'.$seg[2].'/'.$seg[3];
            $full_url = $path.'/'.'assets/featuredimages/'.$file_name;
            $id = $_SESSION['id'];
            $sql = "INSERT INTO posts(title, description, category, feat_image, user_role)
             VALUES('$title', '$description', '$category','$full_url','$id')";
            $query = $conn->query($sql);
            if($query){
                header('Location:dashboard.php');
            }else{
                $msg = "Failed to upload image";
            }
        }
    }
}
?>
<?php if(isset($_SESSION['username'])):?>
    <?php header('Location:dashboard.php');?>
<?php else:?>
<?php include("include/header.php");?>
<div class="container">
<form class="form-horizontal" action="post.php" method="POST" enctype="multipart/form-data">
  <fieldset>
    <legend>ADD POST</legend>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title" class="col-lg-3 col-form-label">Title</label>
                <div class="col-lg-9">
                    <input type="text" name="title" class="form-control" placeholder="Title">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title" class="col-lg-3 col-form-label">Description</label>
                <div class="col-lg-9">
                   <textarea class="form-control" name="description" placeholder="Description" cols="10" rows="5"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="title" class="col-lg-3 col-form-label">Category</label>
                <div class="col-lg-9">
                    <select name="category" class="form-control">
                        <option>Select</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Technology">Technology</option>
                        <option value="Sports">Sports</option>
                        <option value="Politics">Politics</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="featuredimage" class="col-lg-3 col-form-label">Featured Image</label>
                <div class="col-lg-9">
                    <input type="file" name="featuredimage" class="form-control" required="" placeholder="Featured Image">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="col-lg-10">
                   <input type="submit" name="post" class="btn btn-primary" value="Add Post">
                   <button type="reset" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php if(isset($_POST['post'])):?>
                    <div class="alert alert-dismissible alert-warning">
                    <!-- ishould echo php code for echoeing err  -->
                    </div>
                <?php endif;?>
            </div>
        </div>
    </div>
  </fieldset>
</form>
</div>
<?php include("include/footer.php");?>
<?php endif;?>
