<?php session_start(); ?>
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
        
        <div class="search-bar-container">
            <input type="text" id="gameSearch" class="game-search-input" placeholder="Search games...">
        </div>
        
        <div class="sort-controls">
            <label for="sortSelect" class="sort-label">Sort by:</label>
            <select id="sortSelect" class="sort-select">
                <option value="default">Default</option>
                <option value="recent">Most Recent</option>
                <option value="oldest">Oldest</option>
                <option value="alphabet">A - Z</option>
                <option value="reverse-alphabet">Z - A</option>
                <option value="largest">Largest Size</option>
                <option value="smallest">Smallest Size</option>
            </select>
        </div>
        
        <div class="games-grid" id="gamesGrid">
            <?php
            $jsonData = file_get_contents('https://hydralinks.pages.dev/sources/steamrip.json');
            $games = json_decode($jsonData, true)['downloads'];
            
            // Get sort type from URL parameter
            $sortType = isset($_GET['sort']) ? $_GET['sort'] : 'default';
            
            // Function to parse file size to bytes
            function sizeToBytes($sizeStr) {
                $units = array('GB' => 1e9, 'MB' => 1e6, 'KB' => 1e3, 'B' => 1);
                preg_match('/^([\d.]+)\s*(GB|MB|KB|B)?$/i', $sizeStr, $matches);
                if (!isset($matches[1])) return 0;
                $value = (float)$matches[1];
                $unit = strtoupper($matches[2] ?? 'B');
                return $value * ($units[$unit] ?? 1);
            }
            
            // Sort all games based on sort type
            if ($sortType === 'recent') {
                usort($games, function($a, $b) {
                    $dateA = strtotime($a['uploadDate'] ?? '1970-01-01');
                    $dateB = strtotime($b['uploadDate'] ?? '1970-01-01');
                    return $dateB - $dateA;
                });
            } elseif ($sortType === 'oldest') {
                usort($games, function($a, $b) {
                    $dateA = strtotime($a['uploadDate'] ?? '1970-01-01');
                    $dateB = strtotime($b['uploadDate'] ?? '1970-01-01');
                    return $dateA - $dateB;
                });
            } elseif ($sortType === 'alphabet') {
                usort($games, function($a, $b) {
                    return strcmp($a['title'] ?? '', $b['title'] ?? '');
                });
            } elseif ($sortType === 'reverse-alphabet') {
                usort($games, function($a, $b) {
                    return strcmp($b['title'] ?? '', $a['title'] ?? '');
                });
            } elseif ($sortType === 'largest') {
                usort($games, function($a, $b) {
                    $sizeA = sizeToBytes($a['fileSize'] ?? '0 B');
                    $sizeB = sizeToBytes($b['fileSize'] ?? '0 B');
                    return $sizeB - $sizeA;
                });
            } elseif ($sortType === 'smallest') {
                usort($games, function($a, $b) {
                    $sizeA = sizeToBytes($a['fileSize'] ?? '0 B');
                    $sizeB = sizeToBytes($b['fileSize'] ?? '0 B');
                    return $sizeA - $sizeB;
                });
            }
            
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
                <a href="?page=1&sort=<?php echo htmlspecialchars($sortType); ?>" class="pagination-btn">« First</a>
                <a href="?page=<?php echo $currentPage - 1; ?>&sort=<?php echo htmlspecialchars($sortType); ?>" class="pagination-btn">‹ Prev</a>
            <?php endif; ?>
            
            <span class="pagination-info">Page <?php echo $currentPage; ?> of <?php echo $totalPages; ?></span>
            
            <?php if ($currentPage < $totalPages): ?>
                <a href="?page=<?php echo $currentPage + 1; ?>&sort=<?php echo htmlspecialchars($sortType); ?>" class="pagination-btn">Next ›</a>
                <a href="?page=<?php echo $totalPages; ?>&sort=<?php echo htmlspecialchars($sortType); ?>" class="pagination-btn">Last »</a>
            <?php endif; ?>
        </div>
    </main>
    
    <script>
        const searchInput = document.getElementById('gameSearch');
        const sortSelect = document.getElementById('sortSelect');
        const gameCards = document.querySelectorAll('.featured-card');
        const gamesGrid = document.getElementById('gamesGrid');
        
        // Get current sort type from URL
        const urlParams = new URLSearchParams(window.location.search);
        const currentSort = urlParams.get('sort') || 'default';
        sortSelect.value = currentSort;
        
        // Handle sort change - redirect to page 1 with new sort
        sortSelect.addEventListener('change', function(e) {
            const sortType = e.target.value;
            window.location.href = '?page=1&sort=' + encodeURIComponent(sortType);
        });
        
        // Search functionality
        searchInput.addEventListener('keyup', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            let visibleCount = 0;
            
            gameCards.forEach(card => {
                const gameTitle = card.querySelector('.featured-title').textContent.toLowerCase();
                
                if (gameTitle.includes(searchTerm)) {
                    card.style.display = '';
                    visibleCount++;
                } else {
                    card.style.display = 'none';
                }
            });
            
            // Show no results message if needed
            const existingMessage = gamesGrid.querySelector('.no-results');
            if (existingMessage) existingMessage.remove();
            
            if (visibleCount === 0 && searchTerm !== '') {
                const noResults = document.createElement('div');
                noResults.className = 'no-results';
                noResults.textContent = 'No games found matching your search.';
                gamesGrid.appendChild(noResults);
            }
        });
        
        // Clear search on Escape key
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                searchInput.value = '';
                searchInput.dispatchEvent(new Event('keyup'));
            }
        });
    </script>
</body>

</html>