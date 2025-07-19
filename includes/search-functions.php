<?php
function custom_content_search($query) {
    if (!empty($query)) {
        $args = array(
            's' => $query,
            'post_type' => array('post', 'page'),
            'post_status' => 'publish',
            'posts_per_page' => 5 // Limit to 5 results for live search
        );
        
        $search_results = new WP_Query($args);
        
        if ($search_results->have_posts()) {
            $output = '<ul class="live-search-results">';
            while ($search_results->have_posts()) {
                $search_results->the_post();
                $output .= '<li><a href="' . get_permalink() . '">' . get_the_title() . '</a></li>';
            }
            $output .= '</ul>';
            wp_reset_postdata();
            return $output;
        }
    }
    return '<ul class="live-search-results"><li>No results found</li></ul>';
}

// AJAX handler for live search
add_action('wp_ajax_live_search', 'handle_live_search');
add_action('wp_ajax_nopriv_live_search', 'handle_live_search');

function handle_live_search() {
    $query = sanitize_text_field($_GET['query']);
    echo custom_content_search($query);
    wp_die();
}