<?php
include 'db.php';

$id = $_GET['id'];
$name = $_POST['name'];
$image = $_FILES['image']['name'];
$target = "Images/" . basename($image);

$sql = "UPDATE entries SET name='$name', image='$image' WHERE id=$id";

if (mysqli_query($conn, $sql)) {
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        echo "Image updated successfully";
    } else {
        echo "Failed to upload image";
    }
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
header('Location: index.html');
?>
