<?php

include 'config.php';

$token = $_GET['token'];

$verify_query = mysqli_query($conn, "SELECT * FROM registered WHERE verify_token = '$token'");
if (mysqli_num_rows($verify_query) > 0) {
    $row = mysqli_fetch_assoc($verify_query);
    if ($row['verify_status'] == 0) {
        $update_query = mysqli_query($conn, "UPDATE registered SET verify_status = '1' WHERE verify_token = '{$row['verify_token']}'");
        if ($update_query) {
            echo "<script>alert('Account Verified!!')</script>";
            echo "<script>location.href='register.php'</script>";
        } else {
            echo "<script>alert('Account not created.!!')</script>";
            echo "<script>location.href='register.php'</script>";
        }
    } else {
        echo "<script>alert('Account already verified!!')</script>";
        echo "<script>location.href='register.php'</script>";
    }
} else {
    echo "<script>alert('Token does not exist!!')</script>";
    echo "<script>location.href='register.php'</script>";
}

?>