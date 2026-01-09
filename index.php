<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Keytron - Home</title>
</head>

<body>
    <header>
        ClearTorrent
    </header>

    <nav class="site-nav">
        <a class="nav-brand" href="/">ClearTorrent</a>
        <ul class="nav-menu">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Games</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></li>
            <li><a class="nav-cta" href="#">login/register</a></li>
        </ul>
    </nav>

    <div class="main-content">
            <section class="featured">
                <h2>Featured Games</h2>
                <div class="game-grid">
                    <div class="game-card">
                        <img src="img/game1.jpg" alt="Nova Strike">
                        <h3>Nova Strike</h3>
                        <p>Fast-paced space shooter with stunning visuals.</p>
                        <a class="btn" href="Games.php">Download</a>
                    </div>
                    <div class="game-card">
                        <img src="img/game2.jpg" alt="Mystic Quest">
                        <h3>Mystic Quest</h3>
                        <p>Atmospheric puzzle-adventure with rich storytelling.</p>
                        <a class="btn" href="Games.php">Download</a>
                    </div>
                    <div class="game-card">
                        <img src="img/game3.jpg" alt="Turbo Racers">
                        <h3>Turbo Racers</h3>
                        <p>High-speed racing action with customizable rides.</p>
                        <a class="btn" href="Games.php">Download</a>
                    </div>
                </div>
            </section>
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