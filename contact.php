<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClearTorrent - Contact</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include("includes/nav.php");?>
    <div class="checkout-container">
        <form action="confirmation.php" method="POST">
            <h2>Contact Us</h2>
            <label>Subject</label>
            <input type="text" name="subject" required>

            <label>Message</label>
            <input type="text" name="message" required>

            <button class="pay-btn" type="submit">Send</button>
        </form>
    </div>
    <footer>
        &copy; <?php echo date("Y"); ?> ClearTorrent. All rights reserved.
    </footer>
</body>

</html>