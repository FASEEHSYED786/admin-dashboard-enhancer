<?php
// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Add a menu item for the settings page
function ade_add_settings_page() {
    add_options_page('Admin Dashboard Enhancer', 'Dashboard Widgets', 'manage_options', 'ade-settings', 'ade_render_settings_page');
}
add_action('admin_menu', 'ade_add_settings_page');

// Render the settings page
function ade_render_settings_page() {
    ?>
    <div class="wrap">
        <h1>Admin Dashboard Enhancer</h1>
        <form id="ade-settings-form">
            <?php settings_fields('ade_settings_group'); ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row">Widget Content</th>
                    <td>
                        <textarea id="ade-widget-content" name="widget_content" rows="10" cols="50"><?php echo esc_textarea(get_option('ade_custom_widget_content')); ?></textarea>
                    </td>
                </tr>
            </table>
            <?php submit_button('Save Widget Content', 'primary', 'ade-save-widget-content'); ?>
        </form>
    </div>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#ade-settings-form').on('submit', function(e) {
                e.preventDefault();
                var data = {
                    action: 'ade_save_widget_content',
                    security: '<?php echo wp_create_nonce('ade_save_widget_content'); ?>',
                    widget_content: $('#ade-widget-content').val()
                };
                $.post(ajaxurl, data, function(response) {
                    if (response.success) {
                        alert('Widget content saved.');
                    } else {
                        alert('Error: ' + response.data);
                    }
                });
            });
        });
    </script>
    <?php
}
?>
