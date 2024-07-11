<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['admin'])) {
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

// Fetch data from the database
$sql = "SELECT * FROM contacts ";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome Admin</h2>
        <a href="logout.php" class="logout-btn">LOGOUT</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>USERNAME</th>
                    <th>City</th>
                    <th>Address</th>
                    <th>Message</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['city'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['message'] . "</td>";
                        echo "<td>
                                <form action='delete.php' method='post' style='display:inline;'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <button type='submit' class='delete-btn'>Delete</button>
                                </form>
                                <form action='update.php' method='get' style='display:inline;'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <button type='submit' class='update-btn'>Update</button>
                                </form>
                            </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No records found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
