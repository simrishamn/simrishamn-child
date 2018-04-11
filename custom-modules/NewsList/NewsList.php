<?php

namespace Simrishamn\NewsList;

class NewsList extends \Modularity\Module
{
    public $slug = 'news-listing';
    public $supports = array();

    public function init()
    {
        $this->nameSingular = __("News", 'modularity');
        $this->namePlural  = __("News", 'modularity');
        $this->description  = __(
            "Description",
            'modularity'
        );
    }

    public function data() : array
    {
        $data = array();


        $args = array(
            'numberposts'	=> 3,
            'post_type'		=> 'post',
            'taxonomy' => get_field('post_types', $this->ID)
        );

        $data['items'] = get_posts( $args );
        $data['content_color'] = get_field('content_color', $this->ID);

        $data['featured_one'] = get_field('featured_one', $this->ID);
        $data['thumb_one'] = get_the_post_thumbnail($data['featured_one']);

        $data['featured_two'] = get_field('featured_two', $this->ID);

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


    public function template() {
        if(get_field('format', $this->ID) == 'default') {
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
