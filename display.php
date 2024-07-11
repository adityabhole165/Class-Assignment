<?php
include 'db.php';

$sql = "SELECT * FROM entries";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Table with Update and Delete</title>
    <link rel="stylesheet" href="display.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Image</th>
                <th>Delete</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><img src="<?php $base_url = "http://localhost/assing/Images/";
$imageName = basename($imagePath); // Extract the image name from the path
$imageUrl = $base_url . $imageName;; ?>" alt="Image" style="width: 50px; height:50px"></td>
                    <td>
                        <form action="displayDelete.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" value="Delete" class="delete-button">
                        </form>
                    </td>
                    <td>
                        <form action="displayUpdate.php" method="get">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                            <input type="submit" value="Update" class="update-button">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>
