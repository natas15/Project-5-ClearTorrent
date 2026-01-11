<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>ClearTorrent - Home</title>
</head>

<body>
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

    <div class="main-content">
            <section class="featured">
                <h2>Featured Games</h2>
                <?php
                $jsonData = file_get_contents('https://hydralinks.pages.dev/sources/onlinefix.json');
                $games = json_decode($jsonData, true)['downloads'];
                
                shuffle($games);
                $featuredGames = array_slice($games, 0, 3);
                ?>
                <div class="featured-games-grid">
                    <?php foreach ($featuredGames as $game): ?>
                        <?php
                        $title = htmlspecialchars($game['title'] ?? 'Unknown Game');
                        $fileSize = htmlspecialchars($game['fileSize'] ?? 'Unknown Size');
                        $uploadDate = isset($game['uploadDate']) ? date('M d, Y', strtotime($game['uploadDate'])) : 'Unknown Date';
                        $magnetLink = htmlspecialchars($game['uris'][0] ?? '');
                        ?>
                        <div class="featured-card">
                            <div class="featured-card-header">
                                <h3 class="featured-title"><?php echo $title; ?></h3>
                            </div>
                            <div class="featured-card-body">
                                <div class="featured-info">
                                    <span class="featured-label">Size:</span>
                                    <span class="featured-value"><?php echo $fileSize; ?></span>
                                </div>
                                <div class="featured-info">
                                    <span class="featured-label">Date:</span>
                                    <span class="featured-value"><?php echo $uploadDate; ?></span>
                                </div>
                            </div>
                            <div class="featured-card-footer">
                                <a href="<?php echo $magnetLink; ?>" class="featured-btn">Download</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
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