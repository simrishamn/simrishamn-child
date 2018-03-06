<?php
namespace Simrishamn\Theme;

class CustomizerFeatures {
    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'customizerHeader'), 5);
    }
    public function customizerHeader()
    {
        add_filter(
            'Municipio/Controller/BaseController/Customizer',
            array($this, 'activateCustomizerFeatures')
        );
        add_filter(
            'Municipio/Theme/Enqueue/Bem',
            array($this, 'activateCustomizerFeatures')
        );
        add_filter(
            'Municipio/Widget/Widgets/CustomizerWidgets',
            array($this, 'activateCustomizerFeatures')
        );
    }

    public function activateCustomizerFeatures($boolean)
    {
        return true;
    }
}
