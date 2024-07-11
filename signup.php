<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Signup</h2>
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        <form method="POST">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Signup</button>
            <?php
        include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['name'];
    $password = md5($_POST['password']);

    $checkUser = $conn->query("SELECT * FROM users WHERE username='$username'");
    if ($checkUser->num_rows > 0) {
        $error = "Username already exists.";
    } else {
        $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
        header('Location: login.php');
    }
}
?>
        </form>
    </div>
</body>
</html>
