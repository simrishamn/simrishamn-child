<?php

namespace Simrishamn\Teaser;

use \Simrishamn\Theme\CustomModuleHelper;

class Teaser extends \Modularity\Module
{

    public function init()
    {
        
        $this->nameSingular = __('Teaser Block', CustomModuleHelper::DOMAIN);
        $this->namePlural   = __('Teaser Blocks', CustomModuleHelper::DOMAIN);
        $this->namePlural   = __('Outputs a Teaser Block with lead text, image & customizable link to a page.', CustomModuleHelper::DOMAIN);
        
        $Module = \Simrishamn\Theme\CustomModuleHelper::setModule($this);
        
        foreach ($Module as $key => $val) {
            $this->{$key} = $val;
        }
        
    }

    public function data() : array
    {
        
        $data = get_fields($this->ID);
        
        $data = array_replace($data, [
            'items' => $data['teaser'],
            'columnClass' => $data['index_columns'],
            'classes' => CustomModuleHelper::classes(['box', 'box-panel'], $this)
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
