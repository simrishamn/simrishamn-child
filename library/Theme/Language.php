<?php

namespace Simrishamn\Theme;

class Language
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_action('after_setup_theme', array($this, 'load'), 10, 3);
        add_filter('gettext', array($this, 'translate'), 10, 2);
    }

    /**
     * Loads translations.
     *
     * @return void
     */
    public function load()
    {
        $dir = get_stylesheet_directory() . '/languages';

        load_theme_textdomain('simrishamn', "$dir/simrishamn");
        load_theme_textdomain('maxgalleria-media-library', "$dir/media-library");
    }

    /**
     * Filters translated strings.
     *
     * @param string $translation String after translating.
     * @param string $original    String before translating.
     *
     * @return string The translation, or the original if untranslated.
     */
    public function translate($translation, $original)
    {
        if (trim($translation) == '') {
            return $original;
        }

        return $translation;
    }
}
