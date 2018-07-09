<?php

namespace Simrishamn\Theme;

class AdminBar
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_action('admin_bar_menu', array($this, 'customizeMenu'), 999);
    }

    /**
     * Customises the admin bar.
     *
     * @param void $wp_admin_bar The bar to customize.
     *
     * @return void
     */
    public function customizeMenu($wp_admin_bar)
    {
        if (!current_user_can('administrator')) {
            $wp_admin_bar->remove_menu('customize');
        }

        $unused = array(
            'comments',
            'new-user',
            'new-media',
            'new-image',
            'new-mod-contacts',
            'new-mod-form',
            'new-mod-iframe',
            'new-mod-fileslist',
            'new-mod-image',
            'new-mod-index',
            'new-mod-inlaylist',
            'new-mod-notice',
            'new-mod-posts',
            'new-mod-slider',
            'new-mod-table',
            'new-mod-wpwidget',
            'new-mod-action-card',
            'new-mod-colored-index',
            'new-mod-inlay-index',
            'new-mod-linklist',
            'new-mod-related-news',
            'new-servicemeddelande',
        );

        array_walk($unused, array($wp_admin_bar, 'remove_menu'));

        $wp_admin_bar->add_menu(array(
            'parent' => 'new-content',
            'id' => 'new-post',
            'title' => __('News Article', 'simrishamn'),
            'href' => admin_url('post-new.php'),
            'meta' => false,
        ));
    }
}
