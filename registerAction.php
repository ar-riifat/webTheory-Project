<?php
        include "config.php";

            $_mobile_pattern = "/(\+88)?-?01[3-9]\d{8}/";
            $_username_pattern = "/^[a-zA-Z0-9_-]{3,16}$/";
            $_email_pattern = "/(cse|eee|ce)_\d{10}@lus\.ac\.bd/";
            $_pass_pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{6,15}$/";
            $_dob_pattern = "/^(0[1-9]|[12]\d|3[01])-(0[1-9]|1[0-2])-(19|20)\d{2}$/";

        $r_fullName = $_POST['r_fullName'];
        $r_username = $_POST['r_username'];
        $r_email = $_POST["r_email"];
        $r_dob = $_POST["r_dob"];
        $r_mobile = $_POST["r_mobile"];
        $r_pass = $_POST["r_pass"];
        $r_con_pass = $_POST["r_con_pass"];
        $r_gender = $_POST['r_gender'];
        
        
        

        $insert_query ="INSERT INTO `registered`(`db_fullName`, `db_username`, `db_email`, `db_dob`, `db_mobile`, `db_pass`, `db_gender`) VALUES ('$r_fullName','$r_username','$r_email','$r_dob','$r_mobile','$r_pass','$r_gender')";

        $duplicate_username = mysqli_query($conn,"SELECT * FROM `registered` WHERE username='$r_username'");
        $duplicate_email = mysqli_query($conn,"SELECT * FROM `registered` WHERE email='$r_email'");

    if(strlen($r_username)<3 || strlen ($r_username)>20){
        echo "<script>alert('User Name should be 3-20 char!!!!')</script>";
        echo "<script>location.href='Php/register.php'</script>";
    }
   
    if (!preg_match($_username_pattern, $r_username)) { 
        echo "<script>alert('Invalid Username!!')</script>";
        echo "<script>location.href='register.php'</script>";
    }

    if(!preg_match($_email_pattern,$r_email)){
            echo "<script>alert('Use Only LUS Email!!')</script>";
            echo "<script>location.href='register.php'</script>";
        }
    if (mysqli_num_rows($duplicate_username) > 0) { //duplicate username check from db
            echo "<script>alert('This Username is already taken!!!!')</script>";
            echo "<script>location.href='register.php'</script>"; 
        // } else if (mysqli_num_rows($duplicate_email) > 0) { //duplicate email check from db
        //     echo "<script>alert('This email is already taken..!!')</script>";
        //     echo "<script>location.href='register.php'</script>";
        }
        else if (!preg_match($_dob_pattern, $r_dob)) { //DOB check
            echo "<script>alert('Invalid Date of Birth..!!')</script>";
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
    if(!mysqli_query($conn,$insert_query)){
        echo "<script>alert('Not Inserted!!')</script>";
        echo "<script>location.href = 'register.php'</script>";
    }

    else{
        echo "<script>alert('Your Account Successfully Register!!')</script>";
        echo "<script>location.href='login.php'</script>";
    }  