<?php

namespace Simrishamn\Theme;

class AcfFields
{
    private $_path = SIMRISHAMN_PATH . '/library/Theme/AcfFields/php';

    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'includeThemeOptions'), 10, 3);
    }

    /**
     * Include Theme Options ACF.
     *
     * @return void
     */
    public function includeThemeOptions()
    {
        foreach (glob($this->_path . '/*') as $module) {
            include_once $module;
        }
    }
}