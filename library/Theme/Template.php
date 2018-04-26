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
        add_filter(
            'Municipio/controller/base/view_data',
            array($this, 'getFooterData'), 10, 1
        );
    }

    /**
     * Adds Footer Data from ACF to the Base Controller view.
     *
     * @param array $data The Base Controller data.
     *
     * @return array Modified list of view data.
     */
    public function getFooterData($data) {
        $data['footerData'] = array(
            array(
                "phone_number" => get_field_object('footer_phone_number', 'option'),
                "email" => get_field_object('footer_email', 'option'),
                "opening_times" => get_field_object('opening_times', 'option')
            ),
            array(
                "post_box" => get_field_object('post_box', 'option'),
                "office_address" => get_field_object('office_address', 'option'),
            ),
            array (
                "external_links" => get_field_object('footer_external_links', 'option'),
                "internal_links" => get_field_object('footer_internal_links', 'option')
            )
        );
        return $data;
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
