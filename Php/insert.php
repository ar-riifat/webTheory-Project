<?php
    include 'config.php';
    $r_username = $_POST['r_username'];
    $r_pass = $_POST["r_pass"];
    $r_con_pass = $_POST["r_con_pass"];
    $r_email = $_POST["r_email"];
    $r_mobile = $_POST["r_mobile"];

    $_mobile_pattern = "/(\+88)?-?01[3-9]\d{8}/";
    $_email_pattern = "/(cse|eee)_\d{10}@lus\.ac\.bd/";

    $insert_query ="INSERT INTO `reg`(`username`, `pass`, `email`, `mobile`) VALUES ('$r_username','$r_pass','$r_email','$r_mobile')";
    
    $duplicate_username = mysqli_query($conn,"SELECT * FROM `reg` WHERE username='$r_username'");
    $duplicate_email = mysqli_query($conn,"SELECT * FROM `reg` WHERE email='$r_email'");

    if(strlen($r_username)<3 || strlen($r_username)>20){
        echo "<script>alert('User Name should be 3-20 char!!!!')</script>";
        echo "<script>location.href='register.php'</script>";
    }
    else if(!preg_match($_email_pattern,$r_email)){
        echo "<script>alert('Invalid Email!!')</script>";
        echo "<script>location.href='php/register.php'</script>";
    }
    else if(!preg_match($_mobile_pattern,$r_mobile)){
        echo "<script>alert('Invalid Mobile Number!!')</script>";
        echo "<script>location.href='php/register.php'</script>";
    }

    else if($r_pass !== $r_con_pass){
        echo "<script>alert('Pass and con-pass is not matching!!')</script>";
        echo "<script>location.href='php/register.php'</script>";
    }
    else if(mysqli_num_rows($duplicate_username)>0){
        echo "<script>alert('username already taken!!')</script>";
        echo "<script>location.href='php/register.php'</script>";
    }
    else if(mysqli_num_rows($duplicate_email)>0){
        echo "<script>alert('email already taken!!')</script>";
        echo "<script>location.href='php/register.php'</script>";
    }
    else{
        if(!mysqli_query($conn,$insert_query)){
            die("not inserted!!");
        }
        else{
            echo "<script>alert('Inserted!!')</script>";
            echo "<script>location.href='php/login.php'</script>";
        }  
    }