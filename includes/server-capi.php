<?php
if (!defined('ABSPATH')) exit;

function mspp_send_capi($event) {
    $pid = mspp_get_option('pixel_id');
    $token = mspp_get_option('token');
    if (!$pid || !$token) return;

    $payload = [
        'data' => [[
            'event_name' => $event,
            'event_time' => time(),
            'action_source' => 'website',
            'user_data' => [
                'client_user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? ''
            ]
        ]]
    ];

    wp_remote_post("https://graph.facebook.com/v18.0/$pid/events?access_token=$token", [
        'headers' => ['Content-Type'=>'application/json'],
        'body' => wp_json_encode($payload)
    ]);
}

add_action('wp_footer', function () {
    $events = mspp_get_option('events', []);
    if (!empty($events['pageview'])) {
        mspp_send_capi('PageView');
    }
});
