<?php

namespace Simrishamn\Theme;

class Login
{
    private $stylePath = 'assets/dist/css';
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_action( 'login_enqueue_scripts', [$this, 'my_login_stylesheet']);
    
        //add_action( 'login_enqueue_scripts', 'my_login_logo' );
    }
    
    
    public function my_login_stylesheet() {
        wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/assets/dist/css/login.dev.css');
        //wp_enqueue_script( 'custom-login', get_stylesheet_directory_uri() . '/login.js' );
    }

    }
