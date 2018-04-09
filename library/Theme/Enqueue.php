<?php

namespace Simrishamn\Theme;

class Enqueue
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        // Enqueue scripts and styles
        add_action('wp_enqueue_scripts', array($this, 'appStyle'));
        add_action('admin_enqueue_scripts', array($this, 'adminStyle'));
        add_action('wp_enqueue_scripts', array($this, 'appScript', ));
        add_action('admin_enqueue_scripts', array($this, 'adminScript'));
    }

    /**
     * Enqueues a style.
     *
     * @param string $name Name of the style.
     * @param string $path Path to the style.
     *
     * @return void
     */
    private function _style($name, $path)
    {
        $uri = get_stylesheet_directory_uri() . $path;
        $mtime = filemtime(get_stylesheet_directory() . $path);

        wp_enqueue_style($name, $uri, '', $mtime);
    }

    /**
     * Enqueue styles
     *
     * @return void
     */
    public function appStyle()
    {
        $this->_style('simrishamn-app-style', '/assets/dist/css/app.min.css');
    }

    /**
     * Enqueue admin styles
     *
     * @return void
     */
    public function adminStyle()
    {
        $this->_style('simrishamn-admin-style', '/assets/dist/css/admin.min.css');
    }

    /**
     * Enqueues a script.
     *
     * @param string $name Name of the script.
     * @param string $path Path to the script.
     *
     * @return void
     */
    private function _script($name, $path)
    {
        $uri = get_stylesheet_directory_uri() . $path;
        $mtime = filemtime(get_stylesheet_directory() . $path);

        wp_enqueue_script($name, $uri, '', $mtime, true);
    }

    /**
     * Enqueue scripts
     *
     * @return void
     */
    public function appScript()
    {
        $this->_script('simrishamn-app-script', '/assets/dist/js/app.min.js');
    }

    /**
     * Enqueue admin scripts
     *
     * @return void
     */
    public function adminScript()
    {
        $this->_script('simrishamn-admin-script', '/assets/dist/js/admin.min.js');
    }
}
