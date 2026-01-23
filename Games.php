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
        
        <div class="games-grid" id="gamesGrid"></div>
        
        <div class="pagination" id="pagination"></div>
        
        <script>
            const allGames = <?php echo json_encode(json_decode(file_get_contents('https://hydralinks.pages.dev/sources/steamrip.json'), true)['downloads']); ?>;
        </script>
    </main>
    
    <script>
        const searchInput = document.getElementById('gameSearch');
        const sortSelect = document.getElementById('sortSelect');
        const gamesGrid = document.getElementById('gamesGrid');
        const paginationDiv = document.getElementById('pagination');
        const itemsPerPage = 35;
        
        const urlParams = new URLSearchParams(window.location.search);
        const currentSort = urlParams.get('sort') || 'default';
        sortSelect.value = currentSort;
        
        function sizeToBytes(sizeStr) {
            const units = { GB: 1e9, MB: 1e6, KB: 1e3, B: 1 };
            const match = sizeStr.match(/([\d.]+)\s*(GB|MB|KB|B)?/i);
            return match ? parseFloat(match[1]) * (units[match[2]?.toUpperCase() || 'B'] || 1) : 0;
        }
        
        function sortGames(games, sortType) {
            const copy = [...games];
            switch(sortType) {
                case 'recent':
                    return copy.sort((a, b) => new Date(b.uploadDate) - new Date(a.uploadDate));
                case 'oldest':
                    return copy.sort((a, b) => new Date(a.uploadDate) - new Date(b.uploadDate));
                case 'alphabet':
                    return copy.sort((a, b) => a.title.localeCompare(b.title));
                case 'reverse-alphabet':
                    return copy.sort((a, b) => b.title.localeCompare(a.title));
                case 'largest':
                    return copy.sort((a, b) => sizeToBytes(b.fileSize) - sizeToBytes(a.fileSize));
                case 'smallest':
                    return copy.sort((a, b) => sizeToBytes(a.fileSize) - sizeToBytes(b.fileSize));
                default:
                    return copy;
            }
        }
        
        function renderGames(games, currentPage = 1) {
            const totalPages = Math.ceil(games.length / itemsPerPage);
            const start = (currentPage - 1) * itemsPerPage;
            const paginatedGames = games.slice(start, start + itemsPerPage);
            
            gamesGrid.innerHTML = paginatedGames.map(game => `
                <div class="featured-card">
                    <div class="featured-card-header">
                        <h3 class="featured-title">${game.title || 'Unknown Game'}</h3>
                    </div>
                    <div class="featured-card-body">
                        <div class="featured-info">
                            <span class="featured-label">Size:</span>
                            <span class="featured-value">${game.fileSize || 'Unknown Size'}</span>
                        </div>
                        <div class="featured-info">
                            <span class="featured-label">Date:</span>
                            <span class="featured-value">${game.uploadDate ? new Date(game.uploadDate).toLocaleDateString('en-US', {year: 'numeric', month: 'short', day: 'numeric'}) : 'Unknown Date'}</span>
                        </div>
                    </div>
                    <div class="featured-card-footer">
                        <a href="${game.uris?.[0] || '#'}" class="featured-btn">Download</a>
                    </div>
                </div>
            `).join('');
            
            // Render pagination
            let paginationHTML = '';
            if (currentPage > 1) {
                paginationHTML += `<a href="#" class="pagination-btn" onclick="renderGames(filteredGames, 1)">« First</a>`;
                paginationHTML += `<a href="#" class="pagination-btn" onclick="renderGames(filteredGames, ${currentPage - 1})">‹ Prev</a>`;
            }
            paginationHTML += `<span class="pagination-info">Page ${currentPage} of ${totalPages}</span>`;
            if (currentPage < totalPages) {
                paginationHTML += `<a href="#" class="pagination-btn" onclick="renderGames(filteredGames, ${currentPage + 1})">Next ›</a>`;
                paginationHTML += `<a href="#" class="pagination-btn" onclick="renderGames(filteredGames, ${totalPages})">Last »</a>`;
            }
            paginationDiv.innerHTML = paginationHTML;
        }
        
        let filteredGames = sortGames(allGames, currentSort);
        renderGames(filteredGames);
        
        sortSelect.addEventListener('change', function(e) {
            filteredGames = sortGames(filteredGames, e.target.value);
            renderGames(filteredGames, 1);
        });
        
        searchInput.addEventListener('keyup', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            filteredGames = searchTerm 
                ? sortGames(allGames.filter(g => g.title.toLowerCase().includes(searchTerm)), currentSort)
                : sortGames(allGames, currentSort);
            renderGames(filteredGames, 1);
        });
        
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                searchInput.value = '';
                searchInput.dispatchEvent(new Event('keyup'));
            }
        });
    </script>
</body>

</html>