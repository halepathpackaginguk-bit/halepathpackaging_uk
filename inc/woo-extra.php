<?php


// In your theme's functions.php
function get_instagram_feed() {
    $access_token = 'YOUR_ACCESS_TOKEN'; // Get from Facebook Developer Dashboard
    $user_id = 'YOUR_INSTAGRAM_USER_ID';
    
    $api_url = "https://graph.instagram.com/{$user_id}/media?fields=id,caption,media_url,permalink,media_type&access_token={$access_token}&limit=12";
    
    $response = wp_remote_get($api_url);
    
    if (is_wp_error($response)) {
        return [];
    }
    
    $data = json_decode(wp_remote_retrieve_body($response), true);
    return $data['data'] ?? [];
}