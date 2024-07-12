<?php
include 'db.php';

$id = $_GET['id'];
$name = $_POST['name'];
$image = $_FILES['image']['name'];
$target = "Images/" . basename($image);

$sql = "UPDATE entries SET name='$name', image='$image' WHERE id=$id";

if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo "Image updated successfully";
    } 

mysqli_close($conn);
header('Location: home.php');
?>
