<?php
include 'config.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

function send_password_link($get_name, $get_email, $token)
{
    $mail = new PHPMailer();
    $mail->isSMTP();                                            //Send using SMTP                    
    $mail->SMTPAuth   = true;

    $mail->Host       = 'smtp.gmail.com'; 
    $mail->Username   = 'anisurrahmanrifat54@gmail.com';       //SMTP username
    $mail->Password   = '';                                  //SMTP password
    $mail->SMTPSecure = "tls";                               
    $mail->Port       = 465;                                 

    //Recipients
    $mail->setFrom('anisurrahmanrifat54@gmail.com', $get_name);
    $mail->addAddress($get_email);

    $mail->isHTML(true);
    $mail->Subject = "Reset Password Notification";

    $email_template = "
    <h2>Hello</h2>
    <h4>You are receiving this email because we received a password reset request for your account</h4>
    <br><br>
    <a href='http://localhost/4th-project/Password-reset.php?token=$token&email=$email'>Click Me</a>
";

    $mail->Body = $email_template;
    $mail->send();
}

if (isset($_POST['password_reset_link'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM registration WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row['name'];
        $get_email = $row['email'];

        $update_token = "UPDATE registration SET verify_token = '$token' WHERE email = '$get_email' LIMIT 1 ";
        $update_token_run = mysqli_query($conn, $update_token);
        if ($update_token_run) {
            send_password_link($get_name, $get_email, $token);
            $_SESSION['status'] = "We e-mailed you a password reset link";
            header("Location: Password-reset.php");
            exit(0);
        } else {
            $_SESSION['status'] = "Something went Wrong. #1";
            header("Location: Password-reset.php");
            exit(0);
        }
    } else {
        $_SESSION['status'] = "No Email Found";
        header("Location: Password-reset.php");
        exit(0);
    }
}

if(isset($_POST['password_update']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($conn, $_POST['password_token']);
}
if(!empty($email))
{
    if(!empty($token)&& !empty($new_password) && !empty($confirm_password))
    {
        $check_token = "SELECT verify_token FROM registration WHERE verify_token='$token' LIMIT 1";
        $check_token_run = mysqli_query($conn, $check_token);

        if(mysqli_num_rows($check_token_run) > 0)
        {
            if($new_password == $confirm_password)
            {
                $update_password ="UPDATE registration SET password='$new_password WHERE verify_token='$token' LIMIT 1";
                $update_password_run =mysqli_query($conn, $update_password);
                
                if($update_password_run)
                {
                    $new_token = md5(rand())."anis";
                    $update_to_new_token ="UPDATE registration SET verify_token='$new_token WHERE verify_token='$token' LIMIT 1";
                    $update_to_new_token_run =mysqli_query($conn, $update_to_new_token);

                    $_SESSION['status'] = "New Password Successfully Updated!!";
                header("Location: login.php");
                exit(0);
                }
                else
                {
                    $_SESSION['status'] = " Did not update password. Something went wrong!!";
                header("Location: Password-change.php?token=$token&email=$email");
                exit(0);
                }
            }
            else
            {
                $_SESSION['status'] = "Password & Confirm Password does not match";
                header("Location: Password-change.php?token=$token&email=$email");
                exit(0);

            }
        }
        else
        {
            $_SESSION['status'] = "Invalid Token";
            header("Location: Password-change.php?token=$token&email=$email");
            exit(0);

        }
    }
    else
    {
        $_SESSION['status'] = "All Filed are Mendatory!!";
        header("Location: Password-change.php?token=$token&email=$email");
        exit(0);
    }

}
else
{
    $_SESSION['status'] = "No Token Available";
    header("Location: Password-reset.php");
    exit(0);

}


?>
