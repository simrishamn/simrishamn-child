<?php

namespace Simrishamn\Theme;

class Widget
{
    public function __construct()
    {
        add_action('widgets_init', [$this, 'load']);
    }

    public function load()
    {
        register_widget(new \Simrishamn\Widget\TranslateButton);
    }
}
