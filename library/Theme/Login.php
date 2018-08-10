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
        add_action('login_enqueue_scripts', [$this, 'myLoginStylesheet']);
        add_action('after_setup_theme', [$this, 'themePrefixSetup']);
        add_action('login_head', [$this, 'replaceLogo'], 100);
    }
    
    public function myLoginStylesheet()
    {
        wp_enqueue_style('custom-login', get_stylesheet_directory_uri() . '/assets/dist/css/login.dev.css');
    }
    
    public function themePrefixSetup()
    {
        add_theme_support('custom-logo');
    }
    
    public function replaceLogo()
    {
        if (has_custom_logo()) :
            $image = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');
            
            ?>
            <style type="text/css">
                .login h1 a {
                    background-image: url(<?php echo esc_url($image[0]); ?>);
                    -webkit-background-size: <?php echo absint($image[1])?>px;
                    background-size: <?php echo absint($image[1]) ?>px;
                    height: <?php echo absint($image[2]) ?>px;
                    width: <?php echo absint($image[1]) ?>px;
                }
            </style>
            <?php
        endif;
    }
}
