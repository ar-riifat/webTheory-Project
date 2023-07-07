<?php
include 'config.php';
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

$image = $_Files['image'];

$imageLocation= $image['tmp_name'];

$imageName = $image['name'];

$image_des = "images/".$imageName;
 
move_uploaded_file($imageLocation,$image_des);

$insertQuery = "INSERT INTO `product`( `name`, `description`, `price`, `image`) VALUES ('$name', '$description','$price','$image_des')";

if(mysqli_query($conn,$insertQuery)){
    echo "<script>alert('Image Inserted!!!!)</script>";
    echo "<script>location.href='index.php'</script>";

}else{
    echo "<script>alert('image not inserted)</script>";
    echo "<script>location.href='index.php'</script>";
}

    ?