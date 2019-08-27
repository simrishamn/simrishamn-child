<?php

namespace Simrishamn\Theme;

use \LoginNocaptcha;
use \WP_Error;

/**
 * Replaces the Login ReCAPTCHA filter.
 */
class Recaptcha
{
    const METHOD = ['LoginNocaptcha', 'authenticate'];

    public function __construct()
    {
        add_action('after_setup_theme', [$this, 'replace']);
    }

    public function replace()
    {
        if (!has_filter('authenticate', self::METHOD)) {
            return;
        }

        if (remove_filter('authenticate', self::METHOD, 30, 3)) {
            add_filter('authenticate', [$this, 'authenticate'], 5, 3);
        } else {
            error_log("Could not replace ReCAPTCHA filter.");
        }
    }

    public function authenticate($obj, $user, $pass)
    {
        $obj = LoginNocaptcha::authenticate($obj, $user, $pass);

        if ($obj instanceof WP_Error) {
            wp_die($obj->get_error_message());
        }

        return $obj;
    }
}
