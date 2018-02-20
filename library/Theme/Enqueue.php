<?php

namespace Simrishamn\Theme;

class Enqueue
{
  public function __construct()
  {
    // Enqueue scripts and styles
    add_action('wp_enqueue_scripts', array($this, 'style'));
    add_action('wp_enqueue_scripts', array($this, 'script'));
  }

  /**
   * Enqueue styles
   * @return void
   */
  public function style()
  {
    wp_enqueue_style('Simrishamn-css',
		     get_stylesheet_directory_uri(). '/assets/dist/css/app.min.css', '',
		     filemtime(get_stylesheet_directory() . '/assets/dist/css/app.min.css'));
  }

  /**
   * Enqueue scripts
   * @return void
   */
  public function script()
  {
    wp_enqueue_script('Simrishamn-js',
		      get_stylesheet_directory_uri(). '/assets/dist/js/app.min.js', '',
		      filemtime(get_stylesheet_directory() . '/assets/dist/js/app.min.js'), true);
  }
}
