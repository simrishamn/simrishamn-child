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
        if (!defined('SIMRISHAMN_SHARED_CONTACTS_MODULE')) {
            define('SIMRISHAMN_SHARED_CONTACTS_MODULE', null);
        }

        if (!defined('SIMRISHAMN_SHARED_NOTICES_MODULE')) {
            define('SIMRISHAMN_SHARED_NOTICES_MODULE', null);
        }

        if (!defined('SIMRISHAMN_SHARED_POSTS_MODULE')) {
            define('SIMRISHAMN_SHARED_POSTS_MODULE', null);
        }

        add_action('admin_head', array($this, 'render'));
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
        $image = array('mod-image', __('Image', 'simrishamn'));
        $slider = array('mod-slider', __('Slider', 'simrishamn'));
        $teaser = array('mod-colored-index', __('Colored Index', 'simrishamn'));

        $contacts = array(
            'mod-contacts',
            __('Contacts v2', 'simrishamn'),
            __('Shared Contacts', 'simrishamn'),
            SIMRISHAMN_SHARED_CONTACTS_MODULE
        );

        $notices = array(
            'mod-inlay-index',
            __('Inlay Index', 'simrishamn'),
            __('Shared Notices', 'simrishamn'),
            SIMRISHAMN_SHARED_NOTICES_MODULE,
        );

        $posts = array(
            'mod-posts',
            __('Posts', 'simrishamn'),
            __('Shared Posts', 'simrishamn'),
            SIMRISHAMN_SHARED_POSTS_MODULE
        );

        switch ($template) {
        case 'page':
            return array(
                'content-area-top' => array($slider, $image),
                'right-sidebar' => array($contacts, $notices),
            );
        case 'single':
            return array(
                'right-sidebar' => array($contacts, $notices, $posts),
            );
        case 'full-width.blade.php':
            return array(
                'slider-area' => array($image),
                'content-area' => array($teaser, $teaser, $contacts),
            );
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
