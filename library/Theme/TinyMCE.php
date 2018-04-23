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
}
