<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="CSS/style.css">
<link rel="stylesheet" href="CSS/bootstrap.min.css">
<style>
    .card {
        width: 500px;
        margin: 0 auto;
        margin-top: 100px;
    }
</style>
</head>
<body>
    <div class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <?php
                    if(isset($_SESSION['status']))
                    {
                        ?>
                        <div class="alert alert-success">
                            <h5><?php echo $_SESSION['status']; ?></h5>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }
                    ?>
                <div class="card">
                        <div class="card-header">
                            <h5>Change Password</h5>
                        </div>
                    <div class="card-body p-4">
                        <form action="password-reset-code.php" method="POST">
                            <input type="hidden" name="password_token" value="<?php if (isset($_GET['token'])) {echo $_GET['token'];}?>">

                            <div class="form-group mb-3">
                                <label >Email Address</label>
                                <input type="text"  name="email" value="<?php if (isset($_GET['email'])) {echo $_GET['email'];}?>" class="form-control" placeholder="Enter Email Address">
                            </div>
                            <div class="form-group mb-3">
                                <label >New Password</label>
                                <input type="text"  name="new_password" class="form-control" placeholder="Enter New Password">
                            </div>
                            <div class="form-group mb-3">
                                <label >Email Address</label>
                                <input type="text"  name="confirm_password" class="form-control" placeholder="Enter Confirm Password">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="password_update" class="btn btn-success w-100 ">Update Password </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
</body>
</html>