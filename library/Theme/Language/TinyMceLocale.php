<?php
$strings = 'tinyMCE.addI18n(
    \'' . $mce_locale . '.infobox\',
    {
        titleText: \'' . esc_js(_x('Title', 'Default text shown in the infobox header upon creation', 'simrishamn')) . '\',
        contentText: \'' . esc_js(_x('Content', 'Default text shown in the infobox content paragraph upon creation', 'simrishamn')) . '\',
        buttonTitle: \'' . esc_js(_x('Infobox', 'Tooltip text for the infobox button', 'simrishamn')) . '\'
    });';
