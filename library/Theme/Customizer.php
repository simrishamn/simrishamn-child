<?php
namespace Simrishamn\Theme;

class Customizer
{
    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'enableCustomizer'], 5);
        add_filter('kirki/config', [$this, 'configureKirki'], 20);
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

    public function configureKirki($config)
    {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $path = 'vendor/aristath/kirki/';

        if (!is_array($config)) {
            $config = [];
        }

        if ($root && file_exists("$root/$path")) {
            $config['url_path'] = get_home_url(null, $path);
        }

        return $config;
    }
}
