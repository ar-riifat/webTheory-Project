<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit Hospital</title>
</head>
<body>
    <div class="container my-5">
    <header class="d-flex justify-content-between my-4">
            <h1>Edit Hospital</h1>
            <div>
            <a href="index.php" class="btn btn-primary">Back</a>
            </div>
        </header>
        <form action="process.php" method="post">
            <?php 
            if (isset($_GET['id'])) {
                include("conn.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM hospital WHERE id=$id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>
                     <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="findhosp" placeholder="Find Hospital:" value="<?php echo $row["findhosp"]; ?>">
            </div>
            <div class="form-elemnt my-4">
                <input type="text" class="form-control" name="doctor" placeholder="specialized Name:" value="<?php echo $row["doctor"]; ?>">
            </div>
            <div class="form-elemnt my-4">
                <select name="specialized" id="" class="form-control"> 
                    <option value="">Doctor Specialized For:</option>
                    <option value="Internal medicine" <?php if($row["specialized"]=="Internal medicine"){echo "selected";} ?>>Internal medicine</option>
                    <option value="Ophthalmology" <?php if($row["specialized"]=="Ophthalmology"){echo "selected";} ?>>Ophthalmology</option>
                    <option value="Plastic surgery" <?php if($row["specialized"]=="Plastic surgery"){echo "selected";} ?>>Plastic surgery</option>
                    <option value="Radiology" <?php if($row["specialized"]=="Radiology"){echo "selected";} ?>>Radiology</option>
                    <option value="Family medicine" <?php if($row["specialized"]=="Family medicine"){echo "selected";} ?>>Family medicine</option>
                </select>
            </div>
            <div class="form-element my-4">
                <textarea name="description" id="" class="form-control" placeholder="Hospital Description:"><?php echo $row["description"]; ?></textarea>
            </div>
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <div class="form-element my-4">
                <input type="submit" name="edit" value="Edit Hospital" class="btn btn-primary">
            </div>
                <?php
            }else{
                echo "<h3>Book Does Not Exist</h3>";
            }
            ?>
           
        </form>
        
        
    </div>
</body>
</html>