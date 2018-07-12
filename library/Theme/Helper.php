<?php

namespace Simrishamn\Theme;

class Helper
{
    /**
     * Returns the first $LEN characters of $TEXT. If $ELLIPSIS,
     * appended an ellipsis before returning.
     *
     * If $LEN is longer than $TEXT, do nothing.
     *
     * @param string $text The text to shorten.
     * @param int $len The length of the returned text.
     * @param bool $ellipsis Append an ellipsis to the string.
     */
    public static function shortText($text, $len, $ellipsis=true)
    {
        if (strlen($text) > $len) {
            $text = rtrim(substr($text, 0, $len));
            return $text . ($ellipsis ? '...' : '');
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
