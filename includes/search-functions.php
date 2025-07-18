<?php
function content_search($query)
{
    if(!empty($query)){
        $args=array(
            's' => $query,
            'post_type' => array('post', 'page'),
            'post_status' => 'publish',
            'posts_per_page' => -1,
        );

        $search_results =new WP_Query($args);

        return $search_results;
    }
    return false;
}
?>