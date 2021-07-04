<?php session_start();?>
<?php 
include("config/db.php");
if(isset($_FILES['avatar'])){
    $profession = $_POST['profession'];
    if($profession!=""){
        $upload = 1;
        $file_name = $_FILES['avatar']['name'];
        $file_name = $_FILES['avatar']['size'];
        $file_name = $_FILES['avatar']['tmp_name'];
        $file_name = $_FILES['avatar']['type'];
        $tar_dir = "assets/uploads";
        $target_file = $target_dir . basename($_FILES['avatar']['name']);
        $check = getimageSize($_FILES['avatar']['tmp_name']);
        $file_ext = strtolower(end(explode('.',$_FILES['avatar']['name'])));

        /*$data = array(
            ''=>$file_name,
            ''=>$file_size,
            ''=>$file_tmp,
            ''=>$file_type,
            ''=>$target_dir,
            ''=>$file_ext
        );
        echo '<prev>';
        print_r($data);
        echo '<prev>';
        exit();*/
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
<form class="form-horizontal" action="profile.php" method="POST">
  <fieldset>
    <legend>ADD PROFILE</legend>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="profession" class="col-lg-2 col-form-label">Profession</label>
                <div class="col-lg-10">
                    <input type="text" name="email" class="form-control" placeholder="Email">
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