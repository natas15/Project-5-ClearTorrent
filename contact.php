<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        ClearTorrent
    </header>
    <div class="checkout-container">
        <form action="confirmation.php" method="POST">
            <h2>Contact Us</h2>
            <label>Name</label>
            <input type="text" name="name" required>

            <label>Email</label>
            <input type="email" name="email" required>

            <label>Message</label>
            <input type="text" name="message" required>

            <button class="pay-btn" type="submit">Send</button>
        </form>
    </div>
</body>
</html>