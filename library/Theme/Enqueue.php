<?php

namespace Simrishamn\Theme;

class Enqueue
{
    private $_stylePath = 'assets/dist/css';
    private $_scriptPath = 'assets/dist/js';

    /**
     * Constructor.
     */
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueueTheme'));
        add_action('admin_enqueue_scripts', array($this, 'enqueueAdmin'));
        add_action('wp_enqueue_editor', array($this, 'enqueueEditor'));
    }

    /**
     * Enqueues a style.
     *
     * @param string $name Name of the style for WordPress.
     * @param string $file File to load by the browser.
     *
     * @return void
     */
    private function _style($name, $file)
    {
        $path = $this->_stylePath . '/' . $file;
        $uri = get_stylesheet_directory_uri() . '/' . $path;
        $mtime = filemtime(get_stylesheet_directory() . '/' . $path);

        wp_enqueue_style($name, $uri, '', $mtime);
    }

    /**
     * Enqueues a script.
     *
     * @param string $name Name of the style for WordPress.
     * @param string $file File to load by the browser.
     *
     * @return void
     */
    private function _script($name, $file)
    {
        $path = $this->_scriptPath . '/' . $file;
        $uri = get_stylesheet_directory_uri() . '/' . $path;
        $mtime = filemtime(get_stylesheet_directory() . '/' . $path);

        wp_enqueue_script($name, $uri, '', $mtime, true);
    }

    /**
     * Enqueue theme assets.
     *
     * @return void
     */
    public function enqueueTheme()
    {
        $this->_style('simrishamn-theme', 'theme.min.css');
        $this->_script('simrishamn-theme', 'theme.min.js');
    }

    /**
     * Enqueue admin assets.
     *
     * @return void
     */
    public function enqueueAdmin()
    {
        $this->_style('simrishamn-admin', 'admin.min.css');
        $this->_script('simrishamn-admin', 'admin.min.js');
    }

    /**
     * Enqueue editor files.
     *
     * @return void
     */
    public function enqueueEditor()
    {
        $this->_style('simrishamn-editor', 'editor.min.css');
        $this->_script('simrishamn-editor', 'editor.min.js');
    }
}
