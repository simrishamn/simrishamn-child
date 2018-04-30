<?php

namespace Simrishamn\InlayIndex;

class InlayIndex extends \Modularity\Module
{
    public $slug = 'inlay-index';
    public $supports = array();

    public function init()
    {
        $this->fields = SIMRISHAMN_PATH . '/custom-modules/InlayIndex/acf/php/mod-inlay-index.php';
        $this->nameSingular = __("Inlay Index", 'simrishamn');
        $this->namePlural  = __("Inlay Indices", 'simrishamn');
        $this->description  = __(
            "Outputs 2-4 of the latest posts from the selected post-type.",
            'simrishamn'
        );

        require_once $this->fields;
    }

    public function data() : array
    {
        $data = array();
        $args = array(
            'numberposts'	=> 2,
            'post_type'		=> get_field('post_types', $this->ID)
        );

        $data['items'] = get_posts($args);
        $data['title_color'] = get_field('title_color', $this->ID);
        $data['box_color'] = get_field('excerpt_box_color', $this->ID);
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
