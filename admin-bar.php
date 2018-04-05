<?php

function customize_admin_bar($wp_admin_bar) {
    if(!current_user_can('administrator')) {
        $wp_admin_bar->remove_menu('customize');
    }

    $unused = array(
        'comments',
        'new-user',
        'new-media',
        'new-image',
        'new-mod-contacts',
        'new-mod-filesl,ist',
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
        'new-servicemeddelande'
    );

    array_walk(
        $unused,
        function($item) use ($wp_admin_bar) {
            $wp_admin_bar->remove_menu($item);
        }
    );

    $wp_admin_bar->add_menu(array(
        'parent' => 'new-content',
        'id' => 'new-post',
        'title' => __('News Article'),
        'href' => admin_url( 'post-new.php'),
        'meta' => false
    ));
}
add_action('admin_bar_menu', 'customize_admin_bar', 999);