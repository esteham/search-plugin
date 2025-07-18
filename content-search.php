<?php
/*
Plugin Name: Custom Content Search
Description: A plugin to search and display website content
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