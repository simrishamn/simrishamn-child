<?php

namespace Simrishamn\Theme;

class GlobalNotice
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->loadFieldGroup();

        add_filter('Municipio/blade/data', function($data) {
            $data['notice'] = array(
                'active' => get_field('active', 'options'),
                'title' => get_field('global_notice_title', 'options'),
                'text' => get_field('global_notice_text', 'options'),
                'url' => get_field('global_notice_page', 'options'),
                'excerpt' => \Simrishamn\Theme\Helper::shortText(
                    get_field('global_notice_text', 'options'),
                    150
                )
            );
            return $data;
        });
    }

    public function loadFieldGroup()
    {
        if( function_exists('acf_add_local_field_group') ):
            acf_add_local_field_group(array(
                'key' => 'group_5b0d148cb105b',
                'title' => __('Global Notice', 'simrishamn'),
                'fields' => array(
                    array(
                        'key' => 'field_5b0d665cb5620',
                        'label' => __('Active', 'simrishamn'),
                        'name' => 'active',
                        'type' => 'true_false',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'message' => '',
                        'default_value' => 0,
                        'ui' => 0,
                        'ui_on_text' => '',
                        'ui_off_text' => '',
                    ),
                    array(
                        'key' => 'field_5b0d14a47cf56',
                        'label' => __('Title', 'simrishamn'),
                        'name' => 'global_notice_title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 1,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_5b0d665cb5620',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_5b0d14d27cf57',
                        'label' => __('Message', 'simrishamn'),
                        'name' => 'global_notice_text',
                        'type' => 'wysiwyg',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_5b0d665cb5620',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'tabs' => 'all',
                        'toolbar' => 'basic',
                        'media_upload' => 1,
                        'delay' => 0,
                    ),
                    array(
                        'key' => 'field_5b0d66c9b5621',
                        'label' => __('Link to Notice Page', 'simrishamn'),
                        'name' => 'global_notice_page',
                        'type' => 'page_link',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => array(
                            array(
                                array(
                                    'field' => 'field_5b0d665cb5620',
                                    'operator' => '==',
                                    'value' => '1',
                                ),
                            ),
                        ),
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'post_type' => array(
                            0 => 'page',
                        ),
                        'taxonomy' => array(
                        ),
                        'allow_null' => 0,
                        'allow_archives' => 0,
                        'multiple' => 0,
                    ),
                ),
                'location' => array(
                    array(
                        array(
                            'param' => 'options_page',
                            'operator' => '==',
                            'value' => 'acf-options-header',
                        ),
                    ),
                ),
                'menu_order' => 0,
                'position' => 'normal',
                'style' => 'default',
                'label_placement' => 'top',
                'instruction_placement' => 'label','hide_on_screen' => array(
                    0 => 'discussion',
                    1 => 'comments',
                    2 => 'revisions',
                    3 => 'author',
                    4 => 'format',
                    5 => 'page_attributes',
                    6 => 'featured_image',
                    7 => 'categories',
                    8 => 'tags',
                    9 => 'send-trackbacks',
                ),
                'active' => 1,
                'description' => '',
            ));

        endif;

    }
}
