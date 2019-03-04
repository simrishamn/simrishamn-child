<?php

namespace Simrishamn\Theme;

use \Modularity\Editor;
use \Modularity\Helper\Post;

class DefaultModules
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        if (!defined('SIMRISHAMN_SHARED_NOTICES_MODULE')) {
            define('SIMRISHAMN_SHARED_NOTICES_MODULE', null);
        }

        if (!defined('SIMRISHAMN_SHARED_POSTS_MODULE')) {
            define('SIMRISHAMN_SHARED_POSTS_MODULE', null);
        }

        add_action('admin_head', [$this, 'render']);
    }

    /**
     * Returns which default modules to use.
     *
     * @param string $template The name of the page template.
     *
     * @return array A specification for which modules to add.
     */
    public function getDefinition($template)
    {
        $image = ['mod-image', __('Image', 'simrishamn')];
        $slider = ['mod-slider', __('Slider', 'simrishamn')];
        $teaser = ['mod-colored-index', __('Colored Index', 'simrishamn')];

        $notices = [
            'mod-inlay-index',
            __('Inlay Index', 'simrishamn'),
            strtoupper(__('Do not edit!', 'simrishamn')),
            SIMRISHAMN_SHARED_NOTICES_MODULE,
        ];

        $posts = [
            'mod-posts',
            __('Posts', 'simrishamn'),
            strtoupper(__('Do not edit!', 'simrishamn')),
            SIMRISHAMN_SHARED_POSTS_MODULE
        ];

        switch ($template) {
            case 'page':
                return [
                    'content-area-top' => [$slider, $image],
                    'right-sidebar' => [$notices],
                ];
            case 'single':
                return [
                    'right-sidebar' => [$notices, $posts],
                ];
            case 'full-width.blade.php':
                return [
                    'content-area' => [$teaser, $teaser],
                ];
        }
    }

    /**
     * Returns true if the the modularity additions tag should be added.
     *
     * @return bool
     */
    public function shouldRender()
    {
        global $post;

        if (!$post) {
            return false;
        }

        $modules = Editor::getPostModules($post->ID);

        return (
            $_REQUEST['page'] == 'modularity-editor' &&
            count($modules) == 0
        );
    }

    /**
     * Renders a meta tag for default modules.
     *
     * @return null
     */
    public function render()
    {
        if (!$this->shouldRender()) {
            return;
        }

        $template = trim(Post::getPostTemplate());
        $modules = $this->getDefinition($template);
        $data = esc_attr(wp_json_encode($modules));

        echo "<meta name=\"modularity-additions\" content=\"$data\"/>\n";
    }
}
