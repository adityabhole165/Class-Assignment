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

// Query to fetch multiple image paths
$sql = "SELECT image FROM entries"; // Adjust the query according to your table structure
$result = $conn->query($sql);

$imagePaths = [];
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $imagePaths[] = $row["image"];
    }
} else {
    echo "0 results";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Images</title>
</head>
<body>
    <?php if (!empty($imagePaths)): ?>
        <?php foreach ($imagePaths as $imagePath): ?>
            <?php
            // Convert filesystem path to URL
            $base_url = "http://localhost/assing/Images/";
            $imageName = basename($imagePath); // Extract the image name from the path
            $imageUrl = $base_url . $imageName;
            ?>
            <img src="<?php echo $imageUrl; ?>" alt="Image">
        <?php endforeach; ?>
    <?php else: ?>
        <p>No images found.</p>
    <?php endif; ?>
</body>
</html>
