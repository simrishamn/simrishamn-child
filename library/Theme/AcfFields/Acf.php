<?php

namespace Simrishamn\Theme\AcfFields;

class Acf
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
        include_once $this->_path . '/options-theme-footer-information.php';
        include_once $this->_path . '/options-theme-front-page-slider.php';
    }
}