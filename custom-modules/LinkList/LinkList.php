<?php

namespace Simrishamn\LinkList;

class LinkList extends \Modularity\Module
{
    
    public $nameSingular    = 'Link List';
    public $namePlural      = 'Link Lists';
    public $description     = 'Outputs a list of links, with option to choose color.';
    
    public function init()
    {
        
        $Module = \CustomModuleHelper::setModule($this);
        
        foreach ($Module as $key => $val)
        {
            $this->{$key} = $val;
        }
        
        // Already registered slug & fields as "linklist", breaks if changed to correct kebab-case
        $this->slug     = 'linklist';
        $this->fields   = \CustomModuleHelper::fields(\CustomModuleHelper::moduleName($this), 'linklist');

        require_once $this->fields;
        
    }

    public function data() : array
    {
        
        $data = get_fields($this->ID);

        $data = array_replace($data, [
            'classes' => \CustomModuleHelper::classes(['box', 'box-panel'], $this)
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
