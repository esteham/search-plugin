<?php
/*
Plugin Name:Content Search
Descripition: A Plugin to search and display content from a specific directory
Version:1.0
Author : Esteham H. Zihad Ansari
Author URL: https://xetroot.com
*/

//Exit if acccessed directly
if (!defined('ABSPATH'))
{
    exit;
}

//Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/search-functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/shortcodes.php';

//Register activation/deactivation hooks
register_activation_hook(__FILE__, 'content_search_plugin_activate');
register_deactivation_hook(__FILE__, 'content_search_plugin_deactivate');

function content_search_plugin_activate(){
    //Activation code here
}

function content_search_plugin_deactivate(){
    //Deactivation code here
}

?>