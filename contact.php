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
    <title>Image Upload Form</title>
    <link rel="stylesheet" href="contact.css">
</head>
<body>
    <div class="container">
        <form action="submit.php" method="POST" enctype="multipart/form-data">
            <label for="name">Name *</label>
            <input type="text" id="name" name="name" required>
            <label for="image">Image *</label>
            <input type="file" id="image" name="image" required>
            <button type="submit" name="submit">Submit</button>
        </form>
    
                <!-- <option value="tablefetch.php"></option> -->
                
          
    </div>
</body>
</html>
