<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>ClearTorrent - About</title>
</head>

<body>
    <header>
        ClearTorrent
    </header>
    <?php
    include("includes/nav.php");
    ?>
    <div class="checkout-container">
        <h2>About ClearTorrent</h2>
        <p>Welcome to <span class="highlight">ClearTorrent</span>, your trusted platform for fast, clean, and secure torrent discovery. Our goal is to make accessing open-source, free-to-share, and legally distributed files simple and efficient.</p>


        <h2>Our Mission</h2>
        <p>At ClearTorrent, we aim to provide users worldwide with a safe and transparent environment for finding verified torrents. We prioritize community-driven content, modern technology, speed, and user privacy to bring you the best downloading experience.</p>


        <h2>Why ClearTorrent?</h2>
        <p>
            ✓ Lightning-Fast Search<br>
            ✓ Verified & Safe Torrents<br>
            ✓ No Ads, No Tracking<br>
            ✓ Privacy-Focused Experience
        </p>


        <h2>Contact</h2>
        <p>Have questions? We're always here to help.<br>
        <form action="contact.php" method="POST" class="contact-form">
            <button class="pay-btn" type="submit">Contact Us</button><br>
        </form>
    </div>
    <footer>
        &copy; <?php echo date("Y"); ?> ClearTorrent. All rights reserved.
    </footer>
</body>

</html>