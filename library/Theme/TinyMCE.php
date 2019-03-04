<?php

namespace Simrishamn\Theme;

class TinyMCE
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_filter('mce_buttons', [$this, 'buttons']);
        add_filter('mce_external_languages', [$this, 'simrishamnLanguages']);
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
        $simrishamnLocales['simrishamn'] = SIMRISHAMN_PATH . '/library/Language/TinyMceLocale.php';
        return $simrishamnLocales;
    }
}
