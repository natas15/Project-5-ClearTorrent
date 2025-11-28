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
        <h2>Your Order</h2>
        <p>Product: <strong><?php echo $_POST['product'] ?? 'Game Key'; ?></strong></p>
        <p>Price: <strong>€<?php echo $_POST['price'] ?? '0.00'; ?></strong></p>
    </div>
    <div class="checkout-container">
        <form action="confirmation.php" method="POST">
        <label>Payment Method</label>
            <select name="payment" required>
                <option value="ideal">iDEAL</option>
                <option value="paypal">PayPal</option>
                <option value="creditcard">Credit Card</option>
            </select>
            <button class="pay-btn" type="submit">Checkout</button>
        </form>
    </div>
</body>
<footer>
    &copy; <?php echo date("Y"); ?> ClearTorrent. All rights reserved.
</footer>
</html>
