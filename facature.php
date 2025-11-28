<?php
// checkout.php for Keytron VirtualKey Webshop
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - ClearTorrent</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="invoice">

<header>ClearTorrent Invoice</header>

<div class="checkout-container">
    <h2>Invoice Details</h2>
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
