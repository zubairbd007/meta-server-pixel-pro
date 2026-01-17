<?php
/**
 * Plugin Name: Meta Server Pixel Pro
 * Description: Server-side Meta Pixel (Conversions API) with premium UI.
 * Version: 1.4.0
 * Author: Emon
 * Author URI: https://onetech.com.bd/
 */

if (!defined('ABSPATH')) exit;

define('MSPP_PATH', plugin_dir_path(__FILE__));
define('MSPP_URL', plugin_dir_url(__FILE__));

require MSPP_PATH . 'includes/settings.php';
require MSPP_PATH . 'includes/admin-ui.php';
require MSPP_PATH . 'includes/browser-pixel.php';
require MSPP_PATH . 'includes/server-capi.php';
require MSPP_PATH . 'includes/woocommerce-events.php';
