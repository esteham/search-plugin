<?php
function custom_content_search($query) {
    if (!empty($query)) {
        $args = array(
            's' => $query,
            'post_type' => array('post', 'page'), // Search posts and pages
            'post_status' => 'publish',
            'posts_per_page' => -1 // Get all results
        );
        
        $search_results = new WP_Query($args);
        
        return $search_results;
    }
    return false;
}