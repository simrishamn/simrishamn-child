<?php

namespace Simrishamn\ColoredIndex;

class  ColoredIndex extends \Modularity\Module
{
  public $slug = 'colored-index';
  public $supports = array();

  public function init()
  {
    $this->nameSingular = __("Colored Index", 'modularity');
    $this->namePlural  = __("Colored Indices", 'modularity');
    $this->description  = __(
      "Outputs a colored index card with image, text & customizable link to a page.",
      'modularity'
    );
  }

  public function data() : array
  {
    $data = array();
    $data['items'] = get_field('colored-index', $this->ID);
    $data['color'] = get_field('color', $this->ID);
    $data['lead'] = get_field('lead', $this->ID);
    $data['columnClass'] = get_field('index_columns', $this->ID);
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
