<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project_tri";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch the image path
$sql = "SELECT image FROM entries WHERE id = 1"; // Adjust the query according to your table structure
$result = $conn->query($sql);

$imagePath = '';
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $imagePath = $row["image"];
    }
} else {
    echo "0 results";
}


$conn->close();
?>

<?php
// Convert filesystem path to URL
$base_url = "http://localhost/assing/Images/";
$imageName = basename($imagePath); // Extract the image name from the path
$imageUrl = $base_url . $imageName;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Image</title>
</head>
<body>
    <?php if ($imagePath != ''): ?>
        <img src="<?php echo $imageUrl; ?>" alt="Image">
    <?php else: ?>
        <p>No image found.</p>
    <?php endif; ?>
</body>
</html>
