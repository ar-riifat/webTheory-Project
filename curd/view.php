<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Book Details</title>
    <style>
        .book-details{
            background-color:#2874f0;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Hospital Details</h1>
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <div class="hospital-details p-5 my-4">
            <?php
            include("conn.php");
            $id = $_GET['id'];
            if ($id) {
                $sql = "SELECT * FROM hospital WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                 ?>
                 <h3>Hospital:</h3>
                 <p><?php echo $row["findhosp"]; ?></p>
                 <h3>Specialized:</h3>
                 <p><?php echo $row["specialized"]; ?></p>
                 <h3>Doctor Name:</h3>
                 <p><?php echo $row["doctor"]; ?></p>
                 <h3>Description:</h3>
                 <p><?php echo $row["description"]; ?></p>
                
                 <?php
                }
            }
            else{
                echo "<h3>Hospital description are coming soon...........</h3>";
            }
            ?>
            
        </div>
    </div>
</body>
</html>