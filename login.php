<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['name'] = $user['firstname'];

        header("Location: index.php");
        exit;
    } else {
        $error = "Invalid login details";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClearTorrent</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include("includes/nav.php"); ?>
    <div class="checkout-container">
        <form method="POST">
        <h2>Login</h2>
        <label>Email</label>
        <input type="email" name="email" required>
        <label>Password</label>
        <input type="password" name="password" required>

        <button class= "pay-btn" type="submit">Login</button>

        <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>

        <p class="auth-link">
            Don’t have an account?
            <a href="register.php">Register here</a>
        </p>
        </form>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> ClearTorrent. All rights reserved.
    </footer>

</body>

</html>