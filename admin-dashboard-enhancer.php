<?php
/*
Plugin Name: Admin Dashboard Enhancer
Plugin URI: https://wordpress.org/plugins/admin-dashboard-enhancer
Description: Add and manage custom widgets on the WordPress admin dashboard.
Version: 1.0
Author: Syed Faseeh Ul Hassan
Author URI: https://syedfaseeh.com
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Include necessary files
require_once plugin_dir_path(__FILE__) . 'includes/widget-functions.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin/settings-page.php';

// Enqueue custom styles
function ade_enqueue_styles() {
    wp_enqueue_style('ade-styles', plugin_dir_url(__FILE__) . 'assets/css/styles.css');
}
add_action('admin_enqueue_scripts', 'ade_enqueue_styles');
?>
