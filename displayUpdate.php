<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    $sql = "SELECT * FROM entries WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <style>/* Style the form */
form {
    width: 300px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

/* Style the form labels */
form label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

/* Style the form inputs */
form input[type="text"],
form input[type="file"] {
    width: 100%;
    padding: 8px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

/* Style the submit button */
form input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* Add hover effect to the submit button */
form input[type="submit"]:hover {
    background-color: #45a049;
}
</style>
</head>
<body>
    <form action="update.php" method="post" enctype="multipart/form-data">
        <label for="id">id</label>
        <input type="number" name="id" value="<?php echo $row['id']; ?>">
        <label for="name">Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>">
        <br>
        <label for="image">Image:</label>
        <input type="file" name="image">
        <br>
        <input type="submit" value="Update">
    </form>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image = $_FILES['image']['name'];
    $target = "uploads/" . basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $sql = "UPDATE some_table SET name = ?, image = ? WHERE id = ?";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("ssi", $name, $target, $id);
        $stmt->execute();

        header("Location: index.php");
        exit();
    }
}
?>
