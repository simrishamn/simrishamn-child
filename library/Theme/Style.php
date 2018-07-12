<?php

namespace Simrishamn\Theme;

class Style
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_filter('Municipio/mobile_menu_breakpoint', array($this, 'mobileMenu'), 10, 1);
        add_filter('Municipio/Widget/Header/Links/MapLinks/avalibleLinkTypes', array($this, 'availableLinkTypes'));
    }

    /**
     * Sets the mobile menu visibility classes
     *
     * @param array $classes The list of classes.
     *
     * @return string An empty string.
     */
    public function mobileMenu($classes)
    {
        return '';
    }

    /**
     * Sets the available link types
     *
     * @param array $data The available link types.
     *
     * @return array The updated available link types.
     */
    public function availableLinkTypes($data)
    {
        $data['search_trigger']['classes'] = $data['search_trigger']['classes'] . ' hamburger hamburger--slider';
        $data['search_trigger']['attributes'] = 'onclick="jQuery(\'.js-search-trigger\').toggleClass(\'is-active\'); jQuery(\'body\').toggleClass(\'search-is-open\'); jQuery(\'.search .input-group .form-control\').focus(); return false;"';
        $data['search_trigger']['template'] = 'widget.header-links.partials.burger';

        $data['menu_trigger']['attributes'] = 'aria-controls="navigation" aria-expanded="false" onclick="Simrishamn.helpers.toggleMenu(this);" data-target="#mobile-menu"';

        return $data;
    }
}
