<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keytron - Home</title>
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
            <li><a class="nav-cta" href="#">Checkout</a></li>
        </ul>
    </nav>

    <div class="checkout-container">
        <h2>featured games</h2>
        <p>Explore, download and play.</p>
        <div class="slideshow">
            <input type="radio" name="slide" id="s1" checked>
            <input type="radio" name="slide" id="s2">
            <input type="radio" name="slide" id="s3">


            <div class="slide" id="slide1">
                <img src="img/game1." alt="">
            </div>
            <div class="game-card">
                <img src="images/game2.jpg" alt="Game 2">
                <h3>Game Title 2</h3>
                <p>Thrilling action game.</p>
                <a href="checkout.php" class="btn">Buy Now</a>
            </div>

            <div class="slide" id="slide3">
                <img src="images/game3.jpg" alt="">
            </div>



            <div class="nav">
                <label for="s1"></label>
                <label for="s2"></label>
                <label for="s3"></label>
            </div>
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