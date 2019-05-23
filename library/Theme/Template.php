<?php

namespace Simrishamn\Theme;

class Template
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        add_filter('theme_page_templates', [$this, 'templateListFilter'], 20);
        add_filter('ngettext', [$this, 'registerText'], 20);
        add_filter('gettext', [$this, 'registerText'], 20);
        add_filter('Municipio/controller/base/view_data', [$this, 'getFooterData']);
        add_filter('accessibility_items', [$this, 'removePrint'], 20);
        add_action('admin_init', [$this, 'removeContentEditor']);
    }

    /**
     * Hides the content editor for full-width (section page) template.
     *
     */
    public function removeContentEditor()
    {
        $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];

        if (!isset($post_id)) {
            return;
        }

        error_log(get_post_meta($post_id, '_wp_page_template', true));

        if (get_post_meta($post_id, '_wp_page_template', true) == 'full-width.blade.php') {
            remove_post_type_support('page', 'editor');
        }
    }

    /**
     * Adds Footer Data from ACF to the Base Controller view.
     *
     * @param array $data The Base Controller data.
     *
     * @return array Modified list of view data.
     */
    public function getFooterData($data) : array
    {
        $columns = get_field_object('column_amount', 'option')['value'];

        if ($columns == 3) {
            $columnData = get_field_object('3_columns', 'option');

            $data['footerData'] = [
                "contact" => [
                    "label" => __('Contact information', 'simrishamn'),
                    "phone_number" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'footer_phone_number'),
                        "value" => $columnData['value']['footer_phone_number']
                    ],
                    "post_box" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'post_box'),
                        "value" => $columnData['value']['post_box']
                    ],
                    "email" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'footer_email'),
                        "value" => $columnData['value']['footer_email'],
                        "type"  => "email"
                    ],
                    "office_address" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'office_address'),
                        "value" => $columnData['value']['office_address']
                    ],
                    "opening_times" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'opening_times'),
                        "value" => $columnData['value']['opening_times']
                    ],
                    "organization_number" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'organization_number'),
                        "value" => $columnData['value']['organization_number']
                    ]
                ],
                "links" => [
                    "label" => __('Useful links', 'simrishamn'),
                    "external_links" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'footer_external_links'),
                        "value" => $columnData['value']['footer_external_links']
                    ],
                    "internal_links" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'footer_internal_links'),
                        "value" => $columnData['value']['footer_internal_links']
                    ]
                ]
            ];
        }

        if ($columns == 4) {
            $columnData = get_field_object('4_columns', 'option');

            $data['footerData'] = [
                "contact_column_1" => [
                    "label" => __('Contact information', 'simrishamn'),
                    "post_box" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'post_box_2'),
                        "value" => $columnData['value']['contact_column_1']['post_box_2']
                    ],
                    "office_address" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'office_address_2'),
                        "value" => $columnData['value']['contact_column_1']['office_address_2']
                    ],
                    "phone_number" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'footer_phone_number_2'),
                        "value" => $columnData['value']['contact_column_1']['footer_phone_number_2']
                    ],
                    "email" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'footer_email_2'),
                        "value" => $columnData['value']['contact_column_1']['footer_email_2'],
                        "type"  => "email"
                    ]
                ],
                "contact_column_2" => [
                    "label" => __('Contact information', 'simrishamn'),
                    "post_box" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'post_box_3'),
                        "value" => $columnData['value']['contact_column_2']['post_box_3']
                    ],
                    "office_address" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'office_address_3'),
                        "value" => $columnData['value']['contact_column_2']['office_address_3']
                    ],
                    "phone_number" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'footer_phone_number_3'),
                        "value" => $columnData['value']['contact_column_2']['footer_phone_number_3']
                    ],
                    "email" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'footer_email_3'),
                        "value" => $columnData['value']['contact_column_2']['footer_email_3'],
                        "type"  => "email"
                    ]
                ],
                "links" => [
                    "label" => __('Useful links', 'simrishamn'),
                    "external_links" => [
                        "label" => $this->getLabelFromTitle($columnData['sub_fields'], 'footer_external_links_2'),
                        "value" => $columnData['value']['footer_external_links_2']
                    ]
                ]
            ];
        }

        $data['footerData'] = $this->removeEmptyValuesFooter($data['footerData']);

        // Add amount of columns
        $data['footerData']['columns'] = $columns;

        // Add social media title
        $data['footerData']['social'] = __('Follow us in social media', 'simrishamn');

        // Add presented by text
        $data['footerData']['presentedBy'] = get_field_object('presented_by', 'option')['value'];

        return $data;
    }

    /**
     * Removes empty values inside row array,
     * this function is very specific to footer data
     * 
     * @param array $data Array of footer data
     * 
     * @return array $data Footer data without empty values
     */
    public function removeEmptyValuesFooter($data) : array
    {
        foreach ($data as $type => &$array) {
            if ($type == 'links') {
                continue;
            }

            foreach ($array as $key => &$item) {
                if (
                    (is_array($item['value']) && empty(trim($item['value'][0]['row']))) ||
                    (is_string($item['value']) && empty(trim($item['value'])))
                ) {
                    unset($array[$key]);
                }
            }
        }
        
        return $data;
    }

    /**
     * Recursive checking for label from title
     *
     * @param array $haystack Haystack array
     * @param string $needle Needle string to search for
     *
     * @return string Recursive array or the label string
     */
    public function getLabelFromTitle($haystack, $needle) : ?string
    {
        foreach($haystack as $key => $value) {
            if (is_array($value)) {
                $sub = $this->getLabelFromTitle($value, $needle);

                if (is_string($sub)) {
                    return $sub;
                }
            } else if ($value === $needle) {
                return $haystack['label'];
            }
        }

        return null;
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

        $templates['full-width.blade.php'] = __('Full Width', 'simrishamn');

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
        $filteredItems = array_filter($items, [$this, 'isNotPrint']);
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
