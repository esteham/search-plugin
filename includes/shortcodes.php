<?php
function custom_search_form_shortcode() {
    ob_start();
    ?>
    <form role="search" method="get" class="custom-search-form" action="<?php echo esc_url(home_url('/')); ?>">
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search...', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
        <button type="submit" class="search-submit"><?php echo esc_attr_x('Search', 'submit button'); ?></button>
    </form>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_search', 'custom_search_form_shortcode');

function custom_search_results_shortcode() {
    if (is_search()) {
        global $wp_query;
        
        if ($wp_query->have_posts()) {
            ob_start();
            echo '<div class="custom-search-results">';
            while ($wp_query->have_posts()) {
                $wp_query->the_post();
                ?>
                <div class="search-result-item">
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="search-excerpt"><?php the_excerpt(); ?></div>
                </div>
                <?php
            }
            echo '</div>';
            wp_reset_postdata();
            return ob_get_clean();
        } else {
            return '<p>No results found.</p>';
        }
    }
    return '';
}
add_shortcode('custom_search_results', 'custom_search_results_shortcode');