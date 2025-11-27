<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - ClearTorrent</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="order-summary">
            <h2>Jouw Bestelling</h2>
            <p>Product: <strong><?php echo $_POST['product'] ?? 'Game Key'; ?></strong></p>
            <p>Prijs: <strong>€<?php echo $_POST['price'] ?? '0.00'; ?></strong></p>
    </div>
    <div class="checkout-container">
        <form action="confirmation.php" method="POST">
        <label>Betaalmethode</label>
            <select name="payment" required>
                <option value="ideal">iDEAL</option>
                <option value="paypal">PayPal</option>
                <option value="creditcard">Creditcard</option>
            </select>
            <button class="pay-btn" type="submit">Afrekenen</button>
        </form>
    </div>
</body>
</html>