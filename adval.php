<?php// Retrieve and sanitize form data
include('db.php');
$name = mysqli_real_escape_string($conn, $_POST['name']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Check for the user in the database
$sql = "SELECT * FROM admin WHERE name='$name' AND password='$password'";
$result = $conn->query($sql);
header('Location: admin_dashboard.php');
?>