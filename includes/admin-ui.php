<?php
if (!defined('ABSPATH')) exit;

add_action('admin_menu', function () {
    add_menu_page(
        'Meta Server Pixel Pro',
        'Meta Server Pixel Pro',
        'manage_options',
        'meta-server-pixel-pro',
        'mspp_admin_page',
        'dashicons-chart-area'
    );
});

add_action('admin_enqueue_scripts', function () {
    wp_enqueue_style('mspp-admin', MSPP_URL . 'assets/admin.css');
});

function mspp_admin_page() {
    if (isset($_POST['mspp_save'])) {
        update_option('mspp_settings', $_POST['mspp']);
        echo '<div class="updated"><p>Settings saved</p></div>';
    }

    $o = get_option('mspp_settings', []);
    ?>
    <div class="wrap mspp-wrap">
        <h1>Meta Server Pixel Pro</h1>

        <form method="post">
            <div class="mspp-card">
                <h2>Pixel Setup</h2>
                <input name="mspp[pixel_id]" placeholder="Pixel ID" value="<?= esc_attr($o['pixel_id'] ?? '') ?>">
                <input name="mspp[token]" placeholder="Access Token" value="<?= esc_attr($o['token'] ?? '') ?>">
            </div>

            <div class="mspp-card">
                <h2>Events</h2>
                <?php
                $events = ['pageview','viewcontent','addtocart','initiatecheckout','purchase'];
                foreach ($events as $e) {
                    $checked = !empty($o['events'][$e]) ? 'checked' : '';
                    echo "<label><input type='checkbox' name='mspp[events][$e]' $checked> $e</label><br>";
                }
                ?>
            </div>

            <p><button class="button button-primary" name="mspp_save">Save Settings</button></p>
            <p><small>Powered by <a href="https://onetech.com.bd/" target="_blank">ONETECH</a></small></p>
        </form>
    </div>
    <?php
}
