<?php

namespace Simrishamn\Theme;

class Style
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_filter('Municipio/mobile_menu_breakpoint', array($this, 'mobile_menu'), 10, 1);
    }

    /**
     * Sets the mobile menu visibility classes
     *
     * @param array $classes The list of classes.
     *
     * @return string An empty string.
     */
    public function mobile_menu($classes)
    {
        return '';
    }
}
