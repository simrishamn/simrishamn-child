<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5a9802073804c',
	'title' => __('Inlay Index', 'simrishamn'),
	'fields' => array(
		array(
			'key' => 'field_5a98020f63338',
			'label' => __('Post Type', 'simrishamn'),
			'name' => 'post_types',
			'type' => 'posttype_select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '',
			'allow_null' => 0,
			'multiple' => 0,
			'placeholder' => '',
			'disabled' => 0,
			'readonly' => 0,
		),
		array(
			'key' => 'field_5a9804f363339',
			'label' => __('Color: Title', 'simrishamn'),
			'name' => 'title_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#0069B3',
		),
		array(
			'key' => 'field_5aa6781e6557f',
			'label' => __('Color: Box', 'simrishamn'),
			'name' => 'excerpt_box_color',
			'type' => 'color_picker',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'default_value' => '#C8E0F5',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'mod-inlay-index',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;