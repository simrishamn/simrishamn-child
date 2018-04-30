<?php

if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array(
	'key' => 'group_5abba3ab0f97f',
	'title' => __('Link List', 'simrishamn'),
	'fields' => array(
		array(
			'key' => 'field_5abba3af77ba3',
			'label' => __('Link Items',  'simrishamn'),
			'name' => 'items',
			'type' => 'repeater',
			'instructions' => '',
			'required' => 1,
			'conditional_logic' => 0,
			'wrapper' => array(
				'width' => '',
				'class' => '',
				'id' => '',
			),
			'collapsed' => '',
			'min' => 1,
			'max' => 0,
			'layout' => 'block',
			'button_label' => __('Add Row', 'simrishamn'),
			'sub_fields' => array(
				array(
					'key' => 'field_5abba47c77ba6',
					'label' => __('Link Type', 'simrishamn'),
					'name' => 'link_type',
					'type' => 'radio',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'choices' => array(
						'internal' => 'Internal',
						'external' => 'External',
					),
					'allow_null' => 0,
					'other_choice' => 0,
					'save_other_choice' => 0,
					'default_value' => 'internal',
					'layout' => 'horizontal',
					'return_format' => 'value',
				),
				array(
					'key' => 'field_5abba43377ba4',
					'label' => __('Link', 'simrishamn'),
					'name' => 'url',
					'type' => 'page_link',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5abba47c77ba6',
								'operator' => '==',
								'value' => 'internal',
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
						1 => 'mod-posts',
					),
					'taxonomy' => array(
					),
					'allow_null' => 0,
					'allow_archives' => 1,
					'multiple' => 0,
				),
				array(
					'key' => 'field_5abba64677ba7',
					'label' => __('Link', 'simrishamn'),
					'name' => 'url',
					'type' => 'url',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => array(
						array(
							array(
								'field' => 'field_5abba47c77ba6',
								'operator' => '==',
								'value' => 'external',
							),
						),
					),
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => 'https://simrishamn.se',
				),
				array(
					'key' => 'field_5abba96e7f473',
					'label' => __('Title', 'simrishamn'),
					'name' => 'title',
					'type' => 'text',
					'instructions' => '',
					'required' => 1,
					'conditional_logic' => 0,
					'wrapper' => array(
						'width' => '',
						'class' => '',
						'id' => '',
					),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'maxlength' => 25,
				),
			),
		),
		array(
			'key' => 'field_5abbaac1db840',
			'label' => __('Color', 'simrishamn'),
			'name' => 'color',
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
				'red' => 'Red',
				'blue' => 'Blue',
				'light-blue' => 'Light Blue',
				'green' => 'Green',
				'gray' => 'Gray',
				'blue-gray' => 'Blue/Gray',
			),
			'default_value' => array(
				0 => 'blue-gray',
			),
			'allow_null' => 0,
			'multiple' => 0,
			'ui' => 0,
			'ajax' => 0,
			'return_format' => 'value',
			'placeholder' => '',
		),
	),
	'location' => array(
		array(
			array(
				'param' => 'post_type',
				'operator' => '==',
				'value' => 'mod-linklist',
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