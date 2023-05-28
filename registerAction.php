<?php
        include "config.php";

            $_mobile_pattern = "/(\+88)?-?01[3-9]\d{8}/";
            $_email_pattern = "/(cse|eee)_\d{10}@lus\.ac\.bd/";

        $r_username = $_POST['r_username'];
        $r_pass = $_POST["r_pass"];
        $r_con_pass = $_POST["r_con_pass"];
        $r_email = $_POST["r_email"];
        $r_mobile = $_POST["r_mobile"];

        $insert_query ="INSERT INTO `register`(`db_id`, `db_username`, `db_email`, `db_mobile`, `db_pass`) VALUES ('$r_username','$r_pass','$r_con_pass','$r_email','$r_mobile')";
        $duplicateUsernameQuery="SELECT * FROM `register` WHERE username='$r_username'";

        $duplicate_username = mysqli_query($conn,$insert_query);

        $duplicate_username = mysqli_query($conn,"SELECT * FROM `register` WHERE username='$r_username'");
        $duplicate_email = mysqli_query($conn,"SELECT * FROM `register` WHERE email='$r_email'");

    if(!mysqli_query($conn,$insert_query)){
        echo "<script>alert('Not Inserted!!')</script>";
        echo "<script>location.href = 'register.php'</script>";
    }

    if(!preg_match($_email_pattern,$r_email)){
            echo "<script>alert('Use Only LUS Email!!')</script>";
            echo "<script>location.href='register.php'</script>";
        }
        else if(!preg_match($_mobile_pattern,$r_mobile)){
            echo "<script>alert('Used BD Mobile Number!!')</script>";
            echo "<script>location.href='register.php'</script>";
        }
        else if($r_pass !== $r_con_pass){
        echo "<script>alert('Pass and con-pass is not matching!!')</script>";
        echo "<script>location.href='register.php'</script>";
        }

    else{
        echo "<script>alert('Registerd!!')</script>";
        echo "<script>location.href='login.php'</script>";
    }  