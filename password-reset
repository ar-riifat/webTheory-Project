<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><Password Reset Form></title>
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/style.css">
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
                        <h5>Reset Password</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="password-reset-code.php" method="POST">
                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="Enter Email Address">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="password_reset_link" class="btn btn-primary btn-block">Send Password Reset Link</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>