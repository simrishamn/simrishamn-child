<?php

namespace Simrishamn\Theme;

class Template
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_filter('theme_page_templates', array($this, 'filter'), 20, 1);
        add_filter('ngettext', array($this, 'register_text'), 20, 3);
        add_filter('gettext', array($this, 'register_text'), 20, 3);
    }

    /**
     * Filters the list of available templates.
     *
     * @param array $templates The list of available templates.
     *
     * @return array A filtered list of templates.
     */
    public function filter($templates)
    {
        unset($templates['one-page.blade.php']);
        $templates['full-width.blade.php'] = 'Fullbredd';

        return $templates;
    }

    /**
     * Filters the login page text labels.
     *
     * @param string $text WordPress text labels.
     *
     * @return string A (maybe) replaced text label.
     */
    public function register_text( $text ) {
        $text = str_ireplace(
            'Användarnamn eller e-postadress',
            'Användarnamn',
            $text
        );
        $text = str_ireplace(
            'Username or Email Address',
            'Username',
            $text
        );
        return $text;
    }
}
