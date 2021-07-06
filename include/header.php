<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BLOG  APP</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="col-lg-10">
    <a class="navbar-brand" href="#" style="color: #fff;">BLOG APP</a>
  </div>
  <div class="col-lg-2" style="margin-top:8px;">
    <div class="btn-group">
      <a href="#" class="btn btn-primary">SETTINGS</a>
      <a href="#" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        <span class="caret"></span>
      </a>
      <ul class="dropdown-menu">
      <?php  $login_url = 'http://'.$_SERVER['SERVER_NAME'] .$_SERVER['PHP_SELF'];?>
          <?php if($login_url=='http://localhost/posts/index.php'):?>
          <li><a href="login.php">Login</a></li>
          <?php elseif(isset($_SESSION['username'])):?>
            <li><a href="#">Dashboard</a></li>
            <li><a href="profile.php">Add Profile</a></li>
            <li><a href="post.php">Add Post</a></li>
            <li><a href="logout.php">LogOut</a></li>
          <?php else:?>
            <li><a href="index.php">Register</a></li>
         <?php endif;?>
      </ul>
    </div>
  </div>
</nav>
