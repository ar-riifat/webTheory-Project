<?php
session_start();
$username="ar_riffat";
$pass="admin";

$input_username = $_POST['l_username'];
$input_pass = $_POST['l_pass'];

if($input_username == $username && $input_pass==$pass){
    $_SESSION['l_username']=$username;
    echo "<script> location.href = 'product.php' </script>";
}
else{
    echo "<script> location.href = 'login.php' </script>";
}

?>