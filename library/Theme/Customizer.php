<?php
namespace Simrishamn\Theme;

class Customizer
{
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'enableCustomizer'], 5);
    }

    public function enableCustomizer()
    {
        $enable = function ($boolean) {
            return true;
        };

        add_filter('Municipio/Controller/BaseController/Customizer', $enable);
        add_filter('Municipio/Theme/Enqueue/Bem', $enable);
        add_filter('Municipio/Widget/Widgets/CustomizerWidgets', $enable);
    }
}
