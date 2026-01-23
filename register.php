<?php
session_start();
require 'db.php';

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = trim($_POST['firstname']);
    $lastname  = trim($_POST['lastname']);
    $email     = trim($_POST['email']);
    $password  = $_POST['password'];
    $confirm   = $_POST['confirm_password'];

    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        $error = "Email is already registered";
    }

    elseif (!preg_match('/^(?=.*[A-Za-z])(?=.*\d).{8,}$/', $password)) {
        $error = "Password must be at least 8 characters and include a number";
    }

    elseif ($password !== $confirm) {
        $error = "Passwords do not match";
    }

    else {
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare(
            "INSERT INTO users (firstname, lastname, email, password)
             VALUES (?, ?, ?, ?)"
        );
        $stmt->execute([$firstname, $lastname, $email, $hashed]);

        $success = "Account created successfully. You can now log in.";
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
    <form method="POST" class="auth-form">
    <h2>Register</h2>

    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if ($success): ?>
        <p class="success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>
    <label>First Name</label>
    <input type="text" name="firstname" required>
    <label>Last Name</label>
    <input type="text" name="lastname" required>
    <label>Email</label>
    <input type="email" name="email" required>
    <label>Password</label>
    <input type="password" name="password" required>
    <label>Confirm Password</label>
    <input type="password" name="confirm_password" required>

    <button class="pay-btn" type="submit">Register</button>

    <p class="auth-link">
        Already have an account?
        <a href="login.php">Login here</a>
    </p>
    </form>
</div>

    <footer>
        &copy; <?php echo date("Y"); ?> ClearTorrent. All rights reserved.
    </footer>

</body>
</html>
