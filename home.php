<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

</head>
<body>
    <header class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Logo</a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="contact.html">contact us</a></li> -->
                <li class="nav-item"><a class="nav-link" href="contact.php">myaccount</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">user</a></li>
            </ul>
        </div>
    </header>

    <object data="si.php" class="d-block w-100" width="1300" height="725"></object>
</body>
</html>