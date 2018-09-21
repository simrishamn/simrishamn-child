<?php

namespace Simrishamn\Theme;

class Template
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_filter('theme_page_templates', array($this, 'templateListFilter'), 20, 1);
        add_filter('ngettext', array($this, 'registerText'), 20, 3);
        add_filter('gettext', array($this, 'registerText'), 20, 3);
        add_filter(
            'Municipio/controller/base/view_data',
            array($this, 'getFooterData'),
            10,
            1
        );
        add_filter('accessibility_items', array($this, 'removePrint'), 20, 1);
        add_filter('init', array($this, 'addCustomTemplates'), 10, 1);
        add_action('admin_init', array($this, 'removeContentEditor'));
    }


    /**
     * Hides the content editor for full-width (section page) template.
     *
    */
    public function removeContentEditor() {
        $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

	if(!isset($post_id))
            return;

        error_log(get_post_meta($post_id, '_wp_page_template', true));

        if(get_post_meta($post_id, '_wp_page_template', true) == 'full-width.blade.php') {
            remove_post_type_support( 'page', 'editor' );
        }
    }

    public function addCustomTemplates()
    {
        \Municipio\Helper\Template::add(
            __('Section Page', 'simrishamn'),
            \Municipio\Helper\Template::locateTemplate('section-page.blade.php')
        );
    }

    /**
     * Adds Footer Data from ACF to the Base Controller view.
     *
     * @param array $data The Base Controller data.
     *
     * @return array Modified list of view data.
     */
    public function getFooterData($data)
    {
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
    public function templateListFilter($templates)
    {
        unset($templates['one-page.blade.php']);
        unset($templates['page-two-column.blade.php']);

        global $post;

        if ($post && $post->post_name == 'krismeddelande') {
            $templates['global-notice.blade.php'] = 'Krismeddelanden';
        } elseif ($post && $post->post_name == 'webbkarta') {
            $templates['sitemap.blade.php'] = 'Webbkarta';
        }

        return $templates;
    }

    /**
     * Filters the login page text labels.
     *
     * @param string $text WordPress text labels.
     *
     * @return string A (maybe) replaced text label.
     */
    public function registerText($text)
    {
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

    /**
     * Removes print from accessability items.
     *
     * @param array $items The available items.
     *
     * @return string A new array without any print items.
     */
    public function removePrint($items)
    {
        $filteredItems = array_filter($items, array($this, 'isNotPrint'));
        return $filteredItems;
    }

    /**
     * Determines if an html string contains a window.print() call
     * inside an onclick event.
     *
     * @param string $htmlString the html string to search.
     *
     * @return bool True if the string does not contain a javascript
     * invokation to window.print(). Otherwise false.
     */
    public function isNotPrint($item)
    {
        return preg_match('/onclick="[^"]*window.print\(\)/', $item) !== 1;
    }
}
