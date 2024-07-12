<?php
session_start();

// Check if the user is logged in
// if (!isset($_SESSION['name'])) {
//     header("Location: home.php");
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

// Delete the user from the database
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $sql = "DELETE FROM contacts WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
header("Location: admin_dashboard.php");
exit();
?>
