<?php
    session_start();

    if(isset($_SESSION['username'])){
        echo "welcome ". $_SESSION['username'];
        include 'product.php';
        echo "<br><a href='php/logout.php'><input type='button' value='logout' name='logout'></a>";
    }

    else{
        echo "<script>alert('First Login to Access Homepage!!')</script>";
        echo "<script>location.href='php/login.php'</script>";
        
    }
?>