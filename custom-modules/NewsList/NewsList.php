<?php

namespace Simrishamn\NewsList;

class NewsList extends \Modularity\Module
{
    public $slug = 'news-list';
    public $supports = array();
    public function init()
    {

        $this->fields = SIMRISHAMN_PATH . '/custom-modules/NewsList/acf/php/mod-news-list.php';
        $this->nameSingular = __("News", 'simrishamn');
        $this->namePlural = __("News", 'simrishamn');
        $this->description = __(
            "Outputs a number of featured and latests posts in a grid- or list manner.",
            'modularity'
        );
        include_once $this->fields;
    }

    public function data() : array
    {
        $data = array();
        $args = array(
            'numberposts' => 3,
            'post_type' => 'post',
            'category' => get_field('category', $this->ID)
        );

        $data['items'] = get_posts($args);
        $this->setMetaData($data['items'], 150);

        $data['featured'] = array(
            get_field('featured_one', $this->ID),
            get_field('featured_two', $this->ID)
        );
        $this->setMetaData($data['featured']);

        $data['content_color'] = get_field('content_color', $this->ID);
        $data['classes'] = implode(
            ' ',
            apply_filters(
                'Modularity/Module/Classes',
                array('box', 'box-panel'),
                $this->post_type,
                $this->args
            )
        );

        return $data;
    }

    public function setMetaData($items, $excerpt_length = 270)
    {
        foreach ($items as $item) {
            if ($item) {
                $item->thumbnail = get_the_post_thumbnail_url($item, 'small');
                $excerpt = $item->post_excerpt ? $item->post_excerpt : $item->post_content;

                $item->post_excerpt = \Simrishamn\Theme\Helper::shortText(
                    $excerpt,
                    $excerpt_length
                );

                if (strlen($item->post_title) > 25) {
                    $item->post_title = \Simrishamn\Theme\Helper::shortText(
                        $item->post_title,
                        25
                    );
                }
            }
        }
    }

    public function template()
    {
        if (get_field('format', $this->ID) == 'default') {
            return 'news-list.blade.php';
        }
        return 'news-grid.blade.php';
    }

    /**
     * Available "magic" methods for modules:
     * init()            What to do on initialization
     * data()            Use to send data to view (return array)
     * style()           Enqueue style only when module is used on page
     * script            Enqueue script only when module is used on page
     * adminEnqueue()    Enqueue scripts for the module edit/add page in admin
     * template()        Return the view template (blade) the module should use when displayed
     */
}
