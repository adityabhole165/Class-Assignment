<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['name'];
    $password = md5($_POST['password']);

    $result = $conn->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

    if ($result->num_rows > 0) {
        $_SESSION['user'] = $result->fetch_assoc();
        header('Location: home.php');
    } else {
        $error = "Invalid login credentials.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <meta name="description" content="this is login page">
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <div class="login">
            <h2>Login</h2>
                <form action="login.php" method="post">
                    <input type="text" name="name" placeholder="Name *" required>
                    <input type="password" name="password" placeholder="Password *"required >
                    <button type="submit" href="home.php" >Login</button>
                </form>
        </div>
        <div class="signup">
            <h2>Signup</h2>
            
                <form action="signup.php" method="post">
                    <input type="text" name="name" placeholder="Name *" required>
                    <input type="password" name="password" placeholder="Password *"required >
                    <button type="submit">Signup</button>
                </form>
        </div>
    </div>
</body>
</html>