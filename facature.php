<?php
// checkout.php for Keytron VirtualKey Webshop
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facature - ClearTorrent</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header>ClearTorrent Facature</header>

<div class="checkout-container">
    <h2>Factuurgegevens</h2>
    <form action="payment.php" method="POST">
        <label>Voornaam</label>
        <input type="text" name="firstname" required>

        <label>Achternaam</label>
        <input type="text" name="lastname" required>

        <label>Emailadres</label>
        <input type="email" name="email" required>

        <label>Betaalmethode</label>
        <select name="payment" required>
            <option value="ideal">iDEAL</option>
            <option value="paypal">PayPal</option>
            <option value="creditcard">Creditcard</option>
        </select>

        <button class="pay-btn" type="submit">Bevestigen</button>
    </form>
</div>

<footer>
    &copy; <?php echo date("Y"); ?> ClearTorrent. Alle rechten voorbehouden.
</footer>

</body>
</html>
