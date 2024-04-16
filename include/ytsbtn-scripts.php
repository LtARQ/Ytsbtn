<?php

    add_action( 'wp_enqueue_scripts', 'ytsbtn_add_scripts');
        //ADD Scripts
    function ytsbtn_add_scripts()
    {
    // ADD custom CSS
    wp_enqueue_style( 'ytsbtn_main_style', plugin_dir_url(__FILE__). 'ytsbtn/css/ytstyle.css');
    
    // Add and register google script
    wp_register_script( 'google', 'https://apis.google.com/js/platform.js' );
    wp_enqueue_script( 'google' );
    }



