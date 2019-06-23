<?php
    add_theme_support( 'post-thumbnails' ); 
    add_filter( 'excerpt_length', function(){
        return 30;
    } );
    add_filter('excerpt_more', function($more) {
        return '...';
    });
    function wpse27856_set_content_type(){
        return "text/html";
    }
    add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );
    function true_custom_fields() {
    	add_post_type_support( 'post', 'custom-fields'); 
    }
     
    add_action('init', 'true_custom_fields');


?>