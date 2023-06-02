<?php
session_start();

if(isset($_SESSION['userName'])) {
    include 'product.php';
}

else {
    echo "<script>alert('You Have to Login First')</script>";
    echo "<script>location.href='login.php'</script>";
}

?>