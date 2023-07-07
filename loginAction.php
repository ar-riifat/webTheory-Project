

<?php
if (isset($_POST['login'])) {
    include 'config.php';
    $l_username = $_POST['l_username'];
    $l_pass = $_POST['l_pass'];

    $result = mysqli_query($conn, "SELECT * FROM `registered` WHERE db_username='$l_username' AND db_pass='$l_pass'");

    if (!$result) {
        echo "Query execution failed: " . mysqli_error($conn);
    } else {
        if (mysqli_num_rows($result) > 0) {
            session_start();
            $_SESSION['username'] = $l_username; 
            echo "<script>location.href='./curd/index.php'</script>";
        } else {
            echo "<script>alert('Invalid username and password!')</script>";
            echo "<script>location.href='login.php'</script>";
        }
    }
        // else {
        //     echo "<script>location.href='login.php'</script>";
        // }
}
?>
