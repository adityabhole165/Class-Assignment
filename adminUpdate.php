<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin_name'])) {
    header("Location: login.html");
    exit();
}

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

// Fetch user data
$id = $_GET['id'];
$sql = "SELECT * FROM admindashboard WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    echo "No record found";
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="update-container">
        <h2>Update User</h2>
        <form action="adminUpdateprc.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="name">Name *</label>
            <input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required>
            <br><br>
            <label for="image">Image *</label>
            <input type="text" id="image" name="image" value="<?php echo $row['image']; ?>" required>
            <br><br>
            <label for="city">City *</label>
            <input type="text" id="city" name="city" value="<?php echo $row['city']; ?>" required>
            <br><br>
            <label for="address">Address *</label>
            <input type="text" id="address" name="address" value="<?php echo $row['address']; ?>" required>
            <br><br>
            <label for="message">Message *</label>
            <textarea id="message" name="message" required><?php echo $row['message']; ?></textarea>
            <br><br>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>
