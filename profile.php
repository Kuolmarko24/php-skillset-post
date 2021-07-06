
<?php 
include("config/db.php");
if(isset($_FILES['avatar'])){
    $profession = $_POST['profession'];
    if($profession!=""){
        $upload = 1;
        $file_name = $_FILES['avatar']['name'];
        $file_size = $_FILES['avatar']['size'];
        $file_tmp = $_FILES['avatar']['tmp_name'];
        $file_type = $_FILES['avatar']['type'];
        $tar_dir = "assets/uploads";
        $target_file = $tar_dir . basename($_FILES['avatar']['name']);
        $check = getimageSize($_FILES['avatar']['tmp_name']);
        $tmp = explode('.',$_FILES['avatar']['name']);
        $file_ext = end($tmp);

        $extensions = array("jpeg","jpg","png");
        if(in_array($file_ext, $extensions)==false){
            $msg = "Please choose the image which has the extension as jpeg, jpg, png";
        }if(file_exists($target_file())){
            $msg = "Sorry! File already exists";
        }
        if($check==false){
            $msg = "File is not an image";
        }if(empty($msg)==true){
            move_uploaded_file($file_tmp,"assets/uploads/" .$file_name);
            $url = $_SERVER['HTTP_REFRER'];
            $seg = explode('/',$url);
            $path = $seg[0] .'/'.$seg[1].'/'.$seg[2].'/'.$seg[3];
            $full_url = $path.'/'.'assets/uploads/'.$file_name;
            $id = $_SESSION['id'];
            $sql = "INSERT INTO profile(profession, profile_image, user_role) VALUES('$profession', '$full_url', '$id')";
            $query = $conn->query($sql);
            if($query){
                header('Location:dashboard.php');
            }else{
                $msg = "Failed to upload image";
            }
        }
    }else{
        $error = "Please fill in all the details";
    }
}
?>
<?php if(isset($_SESSION['username'])):?>
    <?php header('Location:dashboard.php');?>
<?php else:?>
<?php include("include/header.php");?>
<div class="container">
<form class="form-horizontal" action="profile.php" method="POST" enctype="multipart/form-data">
  <fieldset>
    <legend>ADD PROFILE</legend>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="profession" class="col-lg-2 col-form-label">Profession</label>
                <div class="col-lg-10">
                    <input type="text" name="profession" class="form-control" placeholder="Email">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="avatar" class="col-lg-2 col-form-label">Avatar</label>
                <div class="col-lg-10">
                    <input type="file" name="avatar" class="form-control" required="" placeholder="Avatar">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="col-lg-10">
                   <input type="submit" name="profile" class="btn btn-primary" value="Add Profile">
                   <button type="reset" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php if(isset($_POST['profile'])):?>
                    <div class="alert alert-dismissible alert-warning">
                    <p><?php echo $error;?></p>
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