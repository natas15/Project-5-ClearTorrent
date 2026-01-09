<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClearTorrent - Contact</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        ClearTorrent
    </header>

    <nav class="site-nav">
        <a class="nav-brand" href="/">ClearTorrent</a>
        <ul class="nav-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="games.php">Games</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a class="nav-cta" href="userdetails.php">login/register</a></li>
        </ul>
    </nav>
    <?php
    include("includes/nav.php");
    ?>
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
    <footer>
        &copy; <?php echo date("Y"); ?> ClearTorrent. All rights reserved.
    </footer>
</body>

</html>