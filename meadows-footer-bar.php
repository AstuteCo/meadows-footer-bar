<?php

/**

 * Plugin Name:   Meadows Footer Bar

 * Description:   Contact options that appear as a bar at the bottom of pages.

 * Version:           0.1.0

 * Requires at least: 5.9.3

 * Requires PHP:  7.4

 * Author:            Astute Communications
 
 * Author URI:        https://astute.co

 * License:           MIT

 * Text Domain:       meadows-footer-bar

 */

function your_function() {
    echo '<span>This is inserted at the bottom</span>';
}
add_action( 'wp_footer', 'your_function' );

 // ACF FIELDS AND OPTIONS PAGE

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Footer Contact',
		'menu_title'	=> 'Footer Contact',
		'menu_slug' 	=> 'footer-contact',
	));
		
}

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_6310af5a93c59',
        'title' => 'Footer Contact',
        'fields' => array(
            array(
                'key' => 'field_6310af5cfecb1',
                'label' => 'Show Bar?',
                'name' => 'show_bar',
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
                'default_value' => 1,
                'ui' => 0,
                'ui_on_text' => '',
                'ui_off_text' => '',
            ),
            array(
                'key' => 'field_6310af7afecb2',
                'label' => 'Bar Background Color',
                'name' => 'bar_background_color',
                'type' => 'color_picker',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'enable_opacity' => 0,
                'return_format' => 'string',
            ),
            array(
                'key' => 'field_6310af96fecb3',
                'label' => 'Bar Text Color',
                'name' => 'bar_text_color',
                'type' => 'color_picker',
                'instructions' => '',
                'required' => 1,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '#000000',
                'enable_opacity' => 0,
                'return_format' => 'string',
            ),
            array(
                'key' => 'field_6310afa9fecb4',
                'label' => 'Bar Items',
                'name' => 'bar_items',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => 'field_6310aff5fecb7',
                'min' => 0,
                'max' => 0,
                'layout' => 'block',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_6310afb4fecb5',
                        'label' => 'Show Item?',
                        'name' => 'show_item',
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
                        'default_value' => 1,
                        'ui' => 0,
                        'ui_on_text' => '',
                        'ui_off_text' => '',
                    ),
                    array(
                        'key' => 'field_6310afc2fecb6',
                        'label' => 'Item Icon',
                        'name' => 'item_icon',
                        'type' => 'text',
                        'instructions' => 'See list of items at the URL below. You only need to add the part that comes after "dashicon-" -- for example, use "flag" for "dashicons-flag"
    
    https://developer.wordpress.org/resource/dashicons/#flag',
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
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_6310aff5fecb7',
                        'label' => 'Item Text',
                        'name' => 'item_text',
                        'type' => 'text',
                        'instructions' => 'Text label below icon',
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
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_6310b001fecb8',
                        'label' => 'Item URL',
                        'name' => 'item_url',
                        'type' => 'text',
                        'instructions' => 'Use # for Live Chat',
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
                        'maxlength' => '',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'footer-contact',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
    
    endif;		