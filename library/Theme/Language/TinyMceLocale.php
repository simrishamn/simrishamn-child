<?php

function serialize_translations($data)
{
    $strings = array();

    foreach ($data as $key => $value) {
        $key = wp_json_encode($key);
        $value = wp_json_encode($value);
        $string = "tinyMCE.addI18n($key, $value);";
        array_push($strings, $string);
    }

    return implode("\n", $strings);
}

$strings = serialize_translations(array(
    "$mce_locale.infobox" => array(
        'titleText' => _x('Title', 'Default text shown in the infobox header upon creation', 'simrishamn'),
        'contentText' => _x('Content', 'Default text shown in the infobox content paragraph upon creation', 'simrishamn'),
        'buttonTitle' => _x('Infobox', 'Tooltip text for the infobox button', 'simrishamn'),
    ),
));
