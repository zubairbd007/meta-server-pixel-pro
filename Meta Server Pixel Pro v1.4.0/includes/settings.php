<?php
if (!defined('ABSPATH')) exit;

function mspp_get_option($key, $default = '') {
    $opts = get_option('mspp_settings', []);
    return $opts[$key] ?? $default;
}
