<?php

namespace Simrishamn\Widget;

class TranslateButton extends \Municipio\Widget\Source\HeaderWidget
{
    public function setup()
    {
        return [
            'id' => 'header-translate-button',
            'name' => 'Header widget: Translate',
            'description' => 'Display translate button',
            'template' => 'translate-button.blade.php'
        ];
    }

    public function viewController($args, $instance)
    {
        // This is not the alpaca you're looking for.
    }
}
