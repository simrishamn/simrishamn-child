<?php

namespace Simrishamn\Theme;

class TinyMCE
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_filter('mce_buttons', array($this, 'buttons'));
        add_filter('mce_external_languages', array($this, 'simrishamnLanguages'));
    }

    /**
     * Configures the main toolbar.
     *
     * @param array $active The default buttons.
     *
     * @return array A list of active buttons.
     */
    public function buttons($active)
    {
        $active[] = 'infobox';

        return $active;
    }

    public function simrishamnLanguages($simrishamnLocales)
    {
        $simrishamnLocales['simrishamn'] = plugin_dir_path(__FILE__) . 'Language/TinyMceLocale.php';
        return $simrishamnLocales;
    }
}
