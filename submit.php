<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $target = "Images/" . basename($image);

    // Check if image file is a actual image or fake image
    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $stmt = $conn->prepare("INSERT INTO entries (name, image) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $image);

        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    $conn->close();
    header('Location: display.php');
    // header('Location: home.php');
}
?>
