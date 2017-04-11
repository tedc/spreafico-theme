<?php
    include( locate_template( 'extras/vendor/autoload.php', false, false) );
    
    add_action( 'rest_api_init', 'api_init' );
    
    function api_init() {
        register_rest_route('api/v1', '/instagram', array(
            "methods" => 'GET',
            "callback" => 'instagram_posts'
        ));
        function instagram_posts() {
            $client_id = get_field('instagram_client_id', 'options');
            $client_secret = get_field('instagram_client_secret', 'options');
            $access_token = get_field('instagram_access_token', 'options');
            $user_id = get_field('instagram_user_id', 'options');
            $count = get_field('instagram_count', 'options');
            $api = new Instaphp\Instaphp([
                    'client_id' => $client_id,
                    'client_secret' => $client_secret,
                    'redirect_uri' => get_bloginfo('url'),
                    'http_timeout' => 6000,
                    'http_connect_timeout' => 2000
                ]);
            if(!$api) {
                return;
            }
            $api->setAccessToken($access_token);
            $items = $api->Users->Recent($user_id, array('count'=>$count));
            $cached = get_transient($user_id);
            if($cached !== false) {
                return $cached;
            } else {
                $expiration_time = 60*60*2;
                set_transient($user_id, $items, $expiration_time);
                return $items;
            }
        }
    }
