<?php

/**
 * Gets the html markup for the logotype
 * @param  string  $type    Logotype source
 * @param  boolean $tooltip Show tooltip or not
 * @return string           HTML markup
 */
function municipio_get_logotype($type = 'standard', $tooltip = false, $logo_include = true, $tagline = false, $use_text_replacement = true)
{
    if ($type == '') {
        $type = 'standard';
    }

    $siteName = apply_filters('Municipio/logotype_text', get_bloginfo('name'));

    $logotype = array(
        'standard' => get_field('logotype', 'option'),
        'negative' => get_field('logotype_negative', 'option')
    );

    foreach ($logotype as &$logo) {
        if (!is_int($logo)) {
            continue;
        }

        $logoinfo = array();
        $logoinfo['id'] = $logo;
        $logoinfo['url'] = wp_get_attachment_url($logoinfo['id']);
        $logo = $logoinfo;
    }

    // Get the symbol to use (blog name or image)
    if ($use_text_replacement) {
        $symbol = '<span class="h1 no-margin no-padding">' . $siteName . '</span>';
    } else {
        $symbol = "";
    }

    if (isset($logotype[$type]['url'])) {
        $symbol = sprintf(
            '<img src="%s" alt="%s logotype">',
            $logotype[$type]['url'],
            $siteName
        );
    }

    // // Get the symbol to use (by file include)
    // if (isset($logotype[$type]['id']) && $logo_include === true) {
    //     $symbol = \Municipio\Helper\Svg::extract(get_attached_file($logotype[$type]['id']));
    // }

    $classes = apply_filters('Municipio/logotype_class', array('logotype'));
    $tooltip = apply_filters('Municipio/logotype_tooltip', $tooltip);
    $taglineHtml = '';

    if ($tagline === true) {
        $taglineText = get_bloginfo('description');

        if (get_field('header_tagline_type', 'option') == 'custom') {
            $taglineText = get_field('header_tagline_text', 'option');
        }

        $taglineHtml = '<span class="tagline">' . $taglineText . '</span>';
    }

    // Build the markup
    $markup = sprintf(
        '<a href="%s" class="%s" %s>%s%s</a>',
        home_url(),
        implode(' ', $classes),
        ($tooltip !== false && !empty($tooltip)) ? 'data-tooltip="' . $tooltip . '"' : '',
        $symbol,
        $taglineHtml
    );

    return $markup;
}
