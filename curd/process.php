<?php
include('conn.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $findhosp = $_POST["findhosp"];
    $specialized = $_POST["specialized"];
    $doctor = $_POST["doctor"];
    $description = $_POST["description"];

    $sqlInsert = "INSERT INTO `hospital`(`findhosp`, `specialized`, `doctor`, `description`) VALUES ('$findhosp','$spspecialized','$doctor','$description')";

    if (mysqli_query($conn, $sqlInsert)) {
        session_start();
        $_SESSION["create"] = "Hospital Added Successfully!";
        header("Location:index.php");
       
    } else {
        die("Something Went wrong: " . mysqli_error($conn));
    }
}



if (isset($_POST["edit"])) {

    $findhosp = $_POST["findhosp"];
    $specialized = $_POST["specialized"];
    $doctor = $_POST["doctor"];
    $description = $_POST["description"];
    $id = $_POST["id"];

    $sqlUpdate = "UPDATE `hospital` SET findhosp = '$findhosp', specialized = '$specialized', doctor = '$doctor', description = '$description' WHERE id = '$id'";

    if (mysqli_query($conn, $sqlUpdate)) {
        session_start();
        $_SESSION["update"] = "Hospital Updated Successfully!";
        header("Location: index.php");
        exit();
    } else {
        die("Something went wrong");
    }
}

?>