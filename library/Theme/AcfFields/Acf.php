<?php

namespace Simrishamn\Theme\AcfFields;

class Acf
{
    private $_path = SIMRISHAMN_PATH . '/library/Theme/AcfFields/php';

    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'includeThemeOptions'), 10, 3);
        add_action('after_setup_theme', array($this, 'includeModOverrides'), 10, 3);
    }

    /**
     * Include Theme Options ACF.
     *
     * @return void
     */
    public function includeThemeOptions()
    {
        foreach (glob($this->_path . '/theme-options/*') as $module) {
            include_once $module;
        }
    }

    /**
     * Include Modularity ACF Overrides.
     *
     * @return void
     */
    public function includeModOverrides()
    {
        foreach (glob($this->_path . '/modularity/*') as $module) {
            include_once $module;
        }
    }
}
