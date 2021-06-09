<?
if (isset($_GET["username"]) && isset($_GET["token"])) {
$connection= new mysqli("localhost", "if20","if20", "user");
    $username = $connection->real_escape_string($_GET["username"]);
    $token = $connection->real_escape_string($_GET["token"]);
    $data = $connection->query("SELECT id FROM user WHERE username='$username' AND token='$token'");
 if($data->num_rows >0){
             echo "please check your link";
             $str="0123456789qwertyuioplkjhgfdsa";
             $str = str_shuffle($str);
             $str = substr($str, 0, 15); <?php
 $password = sha1($str);
             $connection->query("UPDATE user SET password='$password', token='' WHERE username='$username'");
             echo "Your New Password is $str";
         }else{ 
 header('Location: login.php');
             exit();
         } 
 }else{
     header("Location: login.php");
     exit();
 } 