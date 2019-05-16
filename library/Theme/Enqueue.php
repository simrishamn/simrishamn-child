<?php

namespace Simrishamn\Theme;

class Enqueue
{
    private $stylePath = 'assets/dist/css';
    private $scriptPath = 'assets/dist/js';

    /**
     * Constructor.
     */
    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueueTheme']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueAdmin']);

        add_filter('mce_css', [$this, 'enqueueEditorStyle']);
        add_filter('mce_external_plugins', [$this, 'enqueueEditorScript']);
    }

    /**
     * Enqueues a style.
     *
     * @param string $name Name of the style for WordPress.
     * @param string $file File to load by the browser.
     *
     * @return void
     */
    private function style($name, $file)
    {
        $path = $this->stylePath . '/' . $file;
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
    private function script($name, $file)
    {
        $path = $this->scriptPath . '/' . $file;
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
        $this->style('simrishamn-theme', 'theme.css');
        $this->script('simrishamn-theme', 'theme.js');
    }

    /**
     * Enqueue admin assets.
     *
     * @return void
     */
    public function enqueueAdmin()
    {
        $this->style('simrishamn-admin', 'admin.css');
        $this->script('simrishamn-admin', 'admin.js');
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
        $path = $this->stylePath . '/editor.css';
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
        $path = $this->scriptPath . '/editor.js';
        $uri = get_stylesheet_directory_uri() . '/' . $path;

        $plugins['simrishamn'] = $uri;

        return $plugins;
    }
}
