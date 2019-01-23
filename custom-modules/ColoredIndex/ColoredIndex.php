<?php

namespace Simrishamn\ColoredIndex;

class ColoredIndex extends \Modularity\Module
{
    
    public $nameSingular    = 'Colored Index';
    public $namePlural      = 'Colored Indices';
    public $description     = 'Outputs a colored index card text & customizable link to a page.';

    public function init()
    {
        
        $Module = \CustomModuleHelper::setModule($this);
        
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
            'items' => $data['colored-index'],
            'columnClass' => $data['index_columns'],
            'classes' => \CustomModuleHelper::classes(['box', 'box-panel'], $this)
        ]);

        return $data;
        
    }

    public function template() : string
    {
        
        return (get_field('format', $this->ID) == 'default') ? $this->slug . '.blade.php' : 'colored-info.blade.php';
        
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
