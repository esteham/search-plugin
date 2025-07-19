<?php
/*
Plugin Name: Custom Content Search
Description: A plugin to search and display website content
Shortcode: [custom_search] for search form, [custom_search_results] for displaying search results.
Version: 1.0
Author: Esteham H. Zihad Ansari
Author URI: https://xetroot.com
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/search-functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcodes.php';

// Register activation/deactivation hooks
register_activation_hook(__FILE__, 'custom_search_plugin_activate');
register_deactivation_hook(__FILE__, 'custom_search_plugin_deactivate');

function custom_search_plugin_activate() {
    // Activation code here
}

function custom_search_plugin_deactivate() {
    // Deactivation code here
}

// Enqueue scripts
function custom_search_enqueue_scripts() {
    wp_enqueue_script(
        'custom-live-search',
        plugin_dir_url(__FILE__) . 'js/custom-search.js',
        array('jquery'),
        '1.0',
        true
    );

     wp_enqueue_style(
        'custom-search-style',
        plugin_dir_url(__FILE__) . 'css/custom-search.css',
        array(),
        '1.0'
    );
    
    wp_localize_script(
        'custom-live-search',
        'ajaxurl',
        admin_url('admin-ajax.php')
    );
}
add_action('wp_enqueue_scripts', 'custom_search_enqueue_scripts');