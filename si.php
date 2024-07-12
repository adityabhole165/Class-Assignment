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
    // echo "0 results";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Images in Slider</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <style></style>
</head>
<body>
    <!-- Slider main container -->
    <div class="swiper">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper" style="width: 100%;">
            <?php if (!empty($imagePaths)): ?>
                <?php foreach ($imagePaths as $imagePath): ?>
                    <?php
                    // Convert filesystem path to URL
                    $base_url = "http://localhost/assing/Images/";
                    $imageName = basename($imagePath); // Extract the image name from the path
                    $imageUrl = $base_url . $imageName;
                    ?>
                    <!-- Slides -->
                    <div class="swiper-slide" >
                        <img src="<?php echo $imageUrl; ?>" alt="Image" class="d-block w-100" width="1500" height="725">
                        <p>
                            Hello <?php
                            if(isset($_SESSION['username']))
                            {
                                    $username = $_SESSION['username'];
                                    $query = mysqli_query($con, "SELECT userdata.* FROM `userdata` WHERE userdata.username = '$username'");
                                    while($row = mysqli_fetch_array($query))
                                        {
                                            echo $row['username'];
                                        }
                            }
                            ?>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No images found.</p>
            <?php endif; ?>
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination"></div>
        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            loop: true,
            
            // If we need pagination
            pagination: {
                el: '.swiper-pagination',
            },

            // Navigation arrows
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },

            // And if we need scrollbar
            scrollbar: {
                el: '.swiper-scrollbar',
            },
        });
    </script>
</body>
</html>
