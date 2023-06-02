<?php
        include "config.php";

            $_mobile_pattern = "/(\+88)?-?01[3-9]\d{8}/";
            $_email_pattern = "/(cse|eee|ce)_\d{10}@lus\.ac\.bd/";
            $_pass_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,20}$/";


        $r_username = $_POST['r_username'];
        $r_email = $_POST["r_email"];
        $r_mobile = $_POST["r_mobile"];
        $r_pass = $_POST["r_pass"];
        $r_con_pass = $_POST["r_con_pass"];
        
        

        $insert_query ="INSERT INTO `register`( `db_username`, `db_email`, `db_mobile`, `db_pass`) VALUES ('$r_username','$r_email','$r_mobile','$r_pass')";
        $duplicateUsernameQuery="SELECT * FROM `register` WHERE username='$r_username'";

        $duplicate_username = mysqli_query($conn,$insert_query);

        $duplicate_username = mysqli_query($conn,"SELECT * FROM `register` WHERE username='$r_username'");
        $duplicate_email = mysqli_query($conn,"SELECT * FROM `register` WHERE email='$r_email'");

    if(!mysqli_query($conn,$insert_query)){
        echo "<script>alert('Not Inserted!!')</script>";
        echo "<script>location.href = 'register.php'</script>";
    }
    // if (!preg_match($_userName_pattern, $r_username)) { 
    //     echo "<script>alert('Invalid Username!!')</script>";
    //     echo "<script>location.href='register.php'</script>";
    // }

    if(!preg_match($_email_pattern,$r_email)){
            echo "<script>alert('Use Only LUS Email!!')</script>";
            echo "<script>location.href='register.php'</script>";
        }
        else if(!preg_match($_mobile_pattern,$r_mobile)){
            echo "<script>alert('Used BD Mobile Number!!')</script>";
            echo "<script>location.href='register.php'</script>";
        }
        else if (!preg_match($_pass_pattern, $r_pass)) { 
            echo "<script>alert('Invalid Password..!!')</script>";
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