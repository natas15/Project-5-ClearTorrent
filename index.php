<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClearTorrent - Home</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <header>
        ClearTorrent
    </header>
    <?php 
    include("includes/nav.php");
    ?>
    <div class="checkout-container">
        <h2>Featured Games</h2>
        <p>Explore, Download and Play.</p>
        <div class="slideshow">
            <input type="radio" name="slide" id="s1" checked>
            <input type="radio" name="slide" id="s2">
            <input type="radio" name="slide" id="s3">

            <div class="slide" id="slide1">
                <img src="img/game1." alt="">
            </div>

            <div class="slide" id="slide2">
                <img src="images/game2.jpg" alt="">
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