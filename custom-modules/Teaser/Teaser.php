<?php

namespace Simrishamn\Teaser;

class Teaser extends \Modularity\Module
{
    
    public $nameSingular    = 'Teaser Block';
    public $namePlural      = 'Teaser Blocks';
    public $description     = 'Outputs a Teaser Block with lead text, image & customizable link to a page.';

    public function init()
    {
        
        $Module = \Simrishamn\Theme\CustomModuleHelper::setModule($this);
        
        foreach ($Module as $key => $val)
        {
            $this->{$key} = $val;
        }
        
        include_once $this->fields;
        
    }

    public function data() : array
    {
        
        $data = get_fields($this->ID);
        
        $data = array_replace($data, [
            'items' => $data['teaser'],
            'columnClass' => $data['index_columns'],
            'classes' => \Simrishamn\Theme\CustomModuleHelper::classes(['box', 'box-panel'], $this)
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
