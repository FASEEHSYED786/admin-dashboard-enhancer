<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Register a custom dashboard widget
function ade_register_custom_widget() {
    wp_add_dashboard_widget('ade_custom_widget', 'Custom Widget', 'ade_display_custom_widget');
}
add_action('wp_dashboard_setup', 'ade_register_custom_widget');

// Display the custom widget content
function ade_display_custom_widget() {
    $widget_content = get_option('ade_custom_widget_content', 'This is a custom widget.');
    echo wp_kses_post($widget_content);
}

// Save widget content via AJAX
function ade_save_widget_content() {
    check_ajax_referer('ade_save_widget_content', 'security');

    if (current_user_can('manage_options')) {
        $widget_content = isset($_POST['widget_content']) ? wp_kses_post($_POST['widget_content']) : '';
        update_option('ade_custom_widget_content', $widget_content);
        wp_send_json_success();
    } else {
        wp_send_json_error('Unauthorized user');
    }
}
add_action('wp_ajax_ade_save_widget_content', 'ade_save_widget_content');
?>
