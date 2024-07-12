<?php
session_start();

// Check if the user is logged in
// if (!isset($_SESSION['admin_name'])) {
//     header("Location: login.html");
//     exit();
// }

// Database connection
$servername = "localhost"; // Change as necessary
$username = "root"; // Change as necessary
$password = ""; // Change as necessary
$dbname = "project_tri"; // Change as necessary

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update the user in the database
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $message = mysqli_real_escape_string($conn, $_POST['address']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "UPDATE contacts SET 
                name='$name', 
                image='$image', 
                city='$city', 
                address='$address', 
                message='$message' 
            WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
header("Location: admin_dashboard.php");
exit();
?>
