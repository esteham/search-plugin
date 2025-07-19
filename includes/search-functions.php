<?php
function custom_content_search($query) {
    if (!empty($query)) {
        $args = array(
            's' => $query,
            'post_type' => array('post', 'page'),
            'post_status' => 'publish',
            'posts_per_page' => 5
        );
        
        $search_results = new WP_Query($args);
        
        if ($search_results->have_posts()) {
            $output = '<ul class="live-search-results">';
            while ($search_results->have_posts()) {
                $search_results->the_post();
                $output .= sprintf(
                    '<li><a href="%s">%s</a><span class="result-excerpt">%s</span></li>',
                    get_permalink(),
                    get_the_title(),
                    wp_trim_words(get_the_excerpt(), 15, '...')
                );
            }
            $output .= '</ul>';
            wp_reset_postdata();
            return $output;
        }
    }
    return '<div class="no-results">No results found for "<strong>' . esc_html($query) . '</strong>"</div>';
}

// AJAX handler for live search
add_action('wp_ajax_live_search', 'handle_live_search');
add_action('wp_ajax_nopriv_live_search', 'handle_live_search');

function handle_live_search() {
    $query = sanitize_text_field($_GET['query']);
    echo custom_content_search($query);
    wp_die();
}