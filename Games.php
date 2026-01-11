<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ClearTorrent - Games</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <?php include("includes/nav.php"); ?>
    
    <main class="games-container">
        <h1>Available Games</h1>
        <div class="games-grid">
            <?php
            $jsonData = file_get_contents('https://hydralinks.pages.dev/sources/onlinefix.json');
            $games = json_decode($jsonData, true)['downloads'];
            
            $itemsPerPage = 35;
            $currentPage = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
            $totalGames = count($games);
            $totalPages = ceil($totalGames / $itemsPerPage);
            $currentPage = min($currentPage, $totalPages);
            
            $startIndex = ($currentPage - 1) * $itemsPerPage;
            $paginatedGames = array_slice($games, $startIndex, $itemsPerPage);
            
            foreach ($paginatedGames as $game) {
                $title = htmlspecialchars($game['title'] ?? 'Unknown Game');
                $fileSize = htmlspecialchars($game['fileSize'] ?? 'Unknown Size');
                $uploadDate = isset($game['uploadDate']) ? date('M d, Y', strtotime($game['uploadDate'])) : 'Unknown Date';
                $magnetLink = htmlspecialchars($game['uris'][0] ?? '');
                
                echo <<<HTML
                <div class="featured-card">
                    <div class="featured-card-header">
                        <h3 class="featured-title">$title</h3>
                    </div>
                    <div class="featured-card-body">
                        <div class="featured-info">
                            <span class="featured-label">Size:</span>
                            <span class="featured-value">$fileSize</span>
                        </div>
                        <div class="featured-info">
                            <span class="featured-label">Date:</span>
                            <span class="featured-value">$uploadDate</span>
                        </div>
                    </div>
                    <div class="featured-card-footer">
                        <a href="$magnetLink" class="featured-btn">Download</a>
                    </div>
                </div>
                HTML;
            }
            ?>
        </div>
        
        <div class="pagination">
            <?php if ($currentPage > 1): ?>
                <a href="?page=1" class="pagination-btn">« First</a>
                <a href="?page=<?php echo $currentPage - 1; ?>" class="pagination-btn">‹ Prev</a>
            <?php endif; ?>
            
            <span class="pagination-info">Page <?php echo $currentPage; ?> of <?php echo $totalPages; ?></span>
            
            <?php if ($currentPage < $totalPages): ?>
                <a href="?page=<?php echo $currentPage + 1; ?>" class="pagination-btn">Next ›</a>
                <a href="?page=<?php echo $totalPages; ?>" class="pagination-btn">Last »</a>
            <?php endif; ?>
        </div>
    </main>
</body>

</html>