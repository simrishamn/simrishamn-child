<?php

namespace Simrishamn\InlayIndex;

use \Simrishamn\Theme\CustomModuleHelper;

class InlayIndex extends \Modularity\Module
{

    public function init()
    {
        
        $this->nameSingular = __('Inlay Index', CustomModuleHelper::DOMAIN);
        $this->namePlural   = __('Inlay Indices', CustomModuleHelper::DOMAIN);
        $this->namePlural   = __('Outputs 2-4 of the latest posts from the selected post-type.', CustomModuleHelper::DOMAIN);
        
        $Module = CustomModuleHelper::setModule($this);
        
        foreach ($Module as $key => $val) {
            $this->{$key} = $val;
        }
        
    }

    public function data() : array
    {
      
        $data = get_fields($this->ID);

        $args = ['numberposts' => 2, 'post_type' => $data['post_types']];
        
        $data = array_replace($data, [
            'items' => get_posts($args),
            'box_color' => $data['excerpt_box_color'],
            'classes' => 'box box-panel'
        ]);

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
