<?php
$server  = "127.0.0.1";
$user = "root";
$password = "";
$dbname = "phpblog";

$conn = mysqli_connect($server,$user,$password,$dbname);
if(!$conn){
    die("Connection failed" .mysqli_connect_error());
}
?>