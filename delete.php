<?php
include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM entries WHERE id=$id";

if (conn_query($conn, $sql)) {
    header('Location: index.html');
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
