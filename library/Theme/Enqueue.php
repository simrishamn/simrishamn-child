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

        add_filter('mce_css', array($this, 'enqueueEditorStyle'));
        add_filter('mce_external_plugins', array($this, 'enqueueEditorScript'));
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
     * Enqueue editor style.
     *
     * @param array $styles The default styles.
     *
     * @return array A list of active styles.
     */
    public function enqueueEditorStyle($styles)
    {
        $path = $this->_stylePath . '/editor.min.css';
        $uri = get_stylesheet_directory_uri() . '/' . $path;

        $styles = preg_split('/\s*,\s*/', trim($styles));
        $styles[] = $uri;

        return join(',', $styles);
    }

    /**
     * Enqueue editor script.
     *
     * @param array $plugins The default plugins.
     *
     * @return array A mapping of active plugins.
     */
    public function enqueueEditorScript($plugins)
    {
        $path = $this->_scriptPath . '/editor.min.js';
        $uri = get_stylesheet_directory_uri() . '/' . $path;

        $plugins['simrishamn'] = $uri;

        return $plugins;
    }
}
