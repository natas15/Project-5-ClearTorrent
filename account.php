<?php
session_start();
require 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$userId = $_SESSION['user_id'];
$success = $error = "";

$stmt = $pdo->prepare("SELECT email, password FROM users WHERE id = ?");
$stmt->execute([$userId]);
$user = $stmt->fetch();

if (isset($_POST['update_email'])) {
    $newEmail = trim($_POST['email']);

    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? AND id != ?");
    $stmt->execute([$newEmail, $userId]);

    if ($stmt->rowCount() > 0) {
        $error = "Email is already in use";
    } else {
        $stmt = $pdo->prepare("UPDATE users SET email = ? WHERE id = ?");
        $stmt->execute([$newEmail, $userId]);
        $success = "Email updated successfully";
    }
}

if (isset($_POST['update_password'])) {
    $currentPassword = $_POST['current_password'];
    $newPassword     = $_POST['new_password'];
    $confirmPassword = $_POST['confirm_password'];

    if (!preg_match('/^(?=.*[A-Za-z])(?=.*\d).{8,}$/', $newPassword)) {
        $error = "Password must be at least 8 characters and include a number";
    } elseif ($newPassword !== $confirmPassword) {
        $error = "New passwords do not match";
    } elseif (!password_verify($currentPassword, $user['password'])) {
        $error = "Current password is incorrect";
    } else {
        $hashed = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->execute([$hashed, $userId]);
        $success = "Password updated successfully";
    }
}

if (isset($_POST['delete_account'])) {
    $deletePassword = $_POST['delete_password'];

    if (!password_verify($deletePassword, $user['password'])) {
        $error = "Password incorrect. Account not deleted.";
    } else {
        $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
        $stmt->execute([$userId]);

        session_destroy();
        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Account Settings</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include("includes/nav.php"); ?>

<div class="checkout-container">
<form method="POST" class="settings-form">
    <h2>Account Settings</h2>
    <?php if ($success): ?>
    <p class="success"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>

    <?php if ($error): ?>
        <p class="error"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <h3>Change Email</h3>
    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
    <button class="pay-btn" type="submit" name="update_email">Update Email</button>
</form>

<form method="POST" class="settings-form">
    <h3>Change Password</h3>
    <input type="password" name="current_password" placeholder="Current password" required>
    <input type="password" name="new_password" placeholder="New password" required>
    <input type="password" name="confirm_password" placeholder="Confirm new password" required>
    <button class="pay-btn" type="submit" name="update_password">Update Password</button>
</form>

<form method="POST" class="settings-form danger">
    <h3>Delete Account</h3>
    <p>This action is permanent.</p>
    <input type="password" name="delete_password" placeholder="Confirm password" required>
    <button type="submit" name="delete_account">Delete Account</button>
</form>
</div>

</body>
</html>

