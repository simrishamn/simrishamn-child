<?php

namespace Simrishamn\Theme;

class Helper
{
    /**
     * Returns the first $LEN characters of $TEXT with an ellipsis
     * appended to it.
     *
     * If $LEN is longer than $TEXT, do nothing.
     *
     * @param string $text The text to shorten.
     * @param int $len The length of the returned text.
     */
    public static function shortText($text, $len)
    {
        if (strlen($text) > $len) {
            return substr($text, 0, $len) . '...';
        }
        return $text;
    }

    public static function addTemplate($templateName, $templatePath)
    {
        \Municipio\Helper\Template::add($templateName, $templatePath);
    }

    /**
     * Returns true if the current page or post is using $TEMPLATE.
     *
     * @param string $template The name of the template to compare
     * to, without extension(s).
     */
    public static function isTemplate($template)
    {
        global $post;
        $currentTemplate = str_replace(
            ".blade.php",
            "",
            get_page_template_slug($post->ID)
        );
        return $currentTemplate == $template ? true : false;
    }
}
