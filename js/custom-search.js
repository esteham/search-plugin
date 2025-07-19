jQuery(document).ready(function($) {
    var searchInput = $('#live-search-input');
    var resultsContainer = $('#live-search-results');
    var searchTimer;
    
    searchInput.on('input', function() {
        clearTimeout(searchTimer);
        var query = $(this).val().trim();
        
        if (query.length < 2) {
            resultsContainer.html('').removeClass('has-results');
            return;
        }
        
        searchTimer = setTimeout(function() {
            $.ajax({
                url: ajaxurl,
                type: 'GET',
                data: {
                    action: 'live_search',
                    query: query
                },
                beforeSend: function() {
                    resultsContainer.html('<div class="search-loading">Searching...</div>');
                },
                success: function(response) {
                    resultsContainer.html(response).addClass('has-results');
                },
                error: function() {
                    resultsContainer.html('<ul class="live-search-results"><li>Error loading results</li></ul>').addClass('has-results');
                }
            });
        }, 300); // 300ms delay after typing stops
    });
    
    // Hide results when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.custom-search-container').length) {
            resultsContainer.html('').removeClass('has-results');
        }
    });
});