<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keytron - Home</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        ClearTorrent
    </header>

    <nav class="site-nav">
        <a class="nav-brand" href="/">ClearTorrent</a>
        <ul class="nav-menu">
            <li><a href="#">Home</a></li>
            <li><a href="#">Games</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a class="nav-cta" href="userdetails.php">Log in/Register</a></li>
        </ul>
    </nav>

    <div class="checkout-container">
        <h2>featured games</h2>
        <p>Explore, download and play.</p>
        <div class="game-grid">
            <div class="game-card">
                <img src="images/game1.jpg" alt="Game 1">
                <h3>Game Title 1</h3>
                <p>Exciting adventure game.</p>
                <a href="checkout.php" class="btn">Buy Now</a>
            </div>
            <div class="game-card">
                <img src="images/game2.jpg" alt="Game 2">
                <h3>Game Title 2</h3>
                <p>Thrilling action game.</p>
                <a href="checkout.php" class="btn">Buy Now</a>
            </div>
            <div class="game-card">
                <img src="images/game3.jpg" alt="Game 3">
                <h3>Game Title 3</h3>
                <p>Challenging puzzle game.</p>
                <a href="checkout.php" class="btn">Buy Now</a>
            </div>
    </div>

    <div class="checkout-container">
        <h2>Latest Updates</h2>
        <p>New Tools Added</p>
        <p>Improved UI</p>
        <p>Faster Performance</p>
    </div>

    <footer>
        &copy; <?php echo date("Y"); ?> ClearTorrent. All rights reserved.
    </footer>
</body>

</html>