<?php
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


    <div class="checkout-container">
        <h2>User Details</h2>
        <form action="payment.php" method="POST">
            <label>First Name</label>
            <input type="text" name="firstname" required>

            <label>Last Name</label>
            <input type="text" name="lastname" required>

            <label>Email Address</label>
            <input type="email" name="email" required>

            <button class="pay-btn" type="submit">Confirm</button>
        </form>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> ClearTorrent. All rights reserved.
    </footer>

</body>

</html>