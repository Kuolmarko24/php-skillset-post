<?php include("config/db.php");
    if(isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        if($username !='' && $email !='' && $password !=''){
            $password_hash = md5($password);
            $sql = "INSERT INTO  users(username, email, password,user_role) VALUES('$username','$email','$password_hash',0)";
            $run = $conn->query($sql);
            if($run){
                header('Location:login.php');
            }else{
                $error = 'Failed to register user';
            }
        }else{
            $error =  "Please fill all  the details";
        }
    }
?>
<?php include("include/header.php");?>
<div class="container">
<form class="form-horizontal" action="index.php" method="POST">
  <fieldset>
    <legend>REGISTER USER</legend>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="username" class="col-lg-2 col-form-label">Username</label>
                <div class="col-lg-10">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="email" class="col-lg-2 col-form-label">Email</label>
                <div class="col-lg-10">
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="password" class="col-lg-2 col-form-label">Password</label>
                <div class="col-lg-10">
                    <input type="password" name="password" class="form-control" required="" placeholder="Password">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <div class="col-lg-10">
                   <input type="submit" name="register" class="btn btn-primary" value="Register">
                   <button type="reset" class="btn btn-default">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?php if(isset($_POST['register'])):?>
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

