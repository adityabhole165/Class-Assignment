<?php
session_start();

// Check if the user is logged in
// if (!isset($_SESSION['admin'])) {
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

// Fetch data from the database
$sql = "SELECT id, name, city, address, message FROM contacts";

$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="adminDashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome Admin</h2>
        <a href="index.php" class="logout-btn">LOGOUT</a>
        <?php
        if ($result->num_rows > 0) {
        echo "<table>
            <tr>
                <th>ID</th>
                <th>USERNAME</th>
                <th>City</th>
                <th>Address</th>
                <th>Message</th>
                <th>Action</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        $user_id = $row['id'];
        $username = $row['name'];
        $city = $row['city'];
        $address = $row['address'];
        $message = $row['message'];
        echo "<tr>
                <td>$user_id</td>
                <td>$username</td>
                <td>$city</td>
                <td>$address</td>
                <td>$message</td>
                <td>
                    <form method='POST' action='adminDeletbtn.php' style='display:inline;'>
                        <input type='hidden' name='id' value='" . $user_id . "'>
                        <button type='submit' style='background-color:red;color:white;'>Delete</button>
                    </form>
                    <form method='POST' action='adminUpdate.php' style='display:inline;'>
                        <input type='hidden' name='id' value='" . $user_id . "'>
                        <button type='submit' style='background-color:blue;color:white;'>Update</button>
                    </form>
                </td>
            </tr>";
    }
    echo "</table>";?>
<?php } else {
    echo "0 results";
}?>
    </div>
</body>
</html>

<?php
$conn->close();
?>

