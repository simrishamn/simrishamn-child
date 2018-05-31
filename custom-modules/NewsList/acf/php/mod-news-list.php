<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5ac352c1d57e4',
    'title' => __('News List', 'simrishamn'),
	'fields' => array(
		array(
			'key' => 'field_5ace09e0e9ada',
			'label' => __('Layout', 'simrishamn'),
			'name' => 'format',
			'type' => 'select',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'default' => 'Lista',
				'grid' => 'Rutnät',
			),
			'default_value' => array(
				0 => 'default',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5acf5367e4c88',
			'label' => __('Filter', 'simrishamn'),
			'name' => 'filter-p',
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
			'key' => 'field_5ac352c1dc9a3',
			'label' => __('Category', 'simrishamn'),
			'name' => 'category',
			'type' => 'taxonomy',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5acf5367e4c88',
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
			'taxonomy' => 'category',
			'field_type' => 'select',
			'allow_null' => 0,
			'add_term' => 0,
			'save_terms' => 1,
			'load_terms' => 1,
			'return_format' => 'id',
			'multiple' => 0,
		),
		array(
			'key' => 'field_5ac352c1dca9d',
			'label' => __('Color', 'simrishamn'),
			'name' => 'content_color',
			'type' => 'select',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'choices' => array(
				'blue' => 'Blå',
				'green' => 'Grön',
			),
			'default_value' => array(
				0 => 'light-blue',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
		array(
			'key' => 'field_5ac3532ce3c5d',
			'label' => __('Featured Post', 'simrishamn'),
			'name' => 'featured_one',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'post',
			),
			'taxonomy' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
		array(
			'key' => 'field_5ac353bce3c5e',
			'label' => __('Featured Post', 'simrishamn'),
			'name' => 'featured_two',
			'type' => 'post_object',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => array(
				array(
					array(
						'field' => 'field_5ace09e0e9ada',
						'operator' => '==',
						'value' => 'default',
					),
				),
			),
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'post_type' => array(
				0 => 'post',
			),
			'taxonomy' => array(
			),
			'allow_null' => 0,
			'multiple' => 0,
			'return_format' => 'object',
			'ui' => 1,
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'mod-news-list',
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