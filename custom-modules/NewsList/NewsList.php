<?php

namespace Simrishamn\NewsList;

use \Simrishamn\Theme\CustomModuleHelper;

class NewsList extends \Modularity\Module
{
    public function init()
    {
        $this->nameSingular = __('News', CustomModuleHelper::DOMAIN);
        $this->namePlural   = __('News', CustomModuleHelper::DOMAIN);
        $this->namePlural   = __('Outputs a number of featured and latests posts in a grid- or list manner.', CustomModuleHelper::DOMAIN);

        $Module = CustomModuleHelper::setModule($this);

        foreach ($Module as $key => $val) {
            $this->{$key} = $val;
        }
    }

    public function data() : array
    {
        $data = get_fields($this->ID);

        $args = [
            'post__not_in' => [
                $data['featured_one']->ID,
                $data['featured_two']->ID
            ],
            'numberposts' => 3,
            'post_type' => 'post',
            'category' => $data['category']
        ];

        $data = array_replace($data, [
            'featured' => [$data['featured_one'], $data['featured_two']],
            'items' => get_posts($args),
            'columnClass' => $columnClass,
            'classes' => CustomModuleHelper::classes(['box', 'box-panel'], $this)
        ]);

        $this->setMetaData($data['items'], 150);
        $this->setMetaData($data['featured']);

        return $data;
    }

    public function setMetaData($items, $excerpt_length = 270)
    {
        foreach ($items as $item) {
            if ($item) {
                $item->thumbnail = get_the_post_thumbnail_url($item, 'medium');

                $excerpt = $item->post_excerpt ? $item->post_excerpt : $item->post_content;
                if (get_extended($excerpt)['main']) {
                    $excerpt = get_extended($excerpt)['main'];
                }

                $item->post_excerpt = \Simrishamn\Theme\Helper::shortText(
                    wp_strip_all_tags(strip_shortcodes($excerpt)),
                    $excerpt_length
                );

                $item->category = get_the_category($item->ID)[0]->name;
            }
        }
    }

    public function template()
    {
        return (get_field('format', $this->ID) == 'default') ? $this->slug . '.blade.php' : 'news-grid.blade.php';
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
