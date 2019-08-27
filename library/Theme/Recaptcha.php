<?php

namespace Simrishamn\Theme;

/**
 * Changes priority of the Login ReCAPTCHA filter.
 */
class Recaptcha
{
    const METHOD = ['LoginNocaptcha', 'authenticate'];

    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'reorderFilter']);
    }

    public function reorderFilter()
    {
        if (!has_filter('authenticate', self::METHOD)) {
            return;
        }

        if (remove_filter('authenticate', self::METHOD, 30, 3)) {
            add_filter('authenticate', self::METHOD, 5, 3);
        } else {
            error_log("Could not change ReCAPTCHA priority.");
        }
    }
}
