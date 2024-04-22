<?php

/**
 * Plugin Name:   Meadows Footer Bar
 * Description:   Contact options that appear as a bar at the bottom of pages.
 * Version:           1.31
 * Requires at least: 5.9.3
 * Requires PHP:  7.4
 * Author:            Astute Communications
 * Author URI:        https://astute.co
 * License:           MIT
 * Text Domain:       meadows-footer-bar
 */

// RENDER FOOTER BAR

function add_custom_body_class($classes) {
    $hide_on_this_page = 0;
    if (is_array(get_field('exclude_on_pagesposts', 'option'))) {
        if (in_array(get_the_id(), get_field('exclude_on_pagesposts', 'option'))) {
            $hide_on_this_page = 1;
        }
    }

    if (!$hide_on_this_page && get_field('show_bar', 'option') == 'yes') {
        $classes[] = 'has-footer-bar';
    }

    return $classes;
}
add_filter('body_class', 'add_custom_body_class');

function show_meadows_bar() {
	wp_reset_postdata();
    $show_bar = get_field('show_bar', 'option');
    $show_close_button = get_field('show_close_button', 'option');
    $background_color = get_field('bar_background_color', 'option');
    $text_color = get_field('bar_text_color', 'option');

    // Assume you're going to show it on every page
    $hide_on_this_page = 0;
    // Run this check only if the list of pages is a list of pages
    if (is_array(get_field('exclude_on_pagesposts', 'option'))) {
        // But if the current page's ID is on the list of IDs to exclude it
        if (in_array(get_the_id(), get_field('exclude_on_pagesposts', 'option'))) {
            // Set hiding it to true
            $hide_on_this_page = 1;
            // See next "if" which only shows if the above value is false
        }
    }

    if (!$hide_on_this_page && $show_bar == 'yes') {
        echo '<div class="footer-bar-container">';
        echo '<div class="footer-bar-inner" 
            style="
            background-color: ' . $background_color . ';
            color: ' . $text_color . ';
            ">';
        if( have_rows('bar_items','option') ):

            while( have_rows('bar_items','option') ) : the_row();

                $show_item = get_sub_field('show_item');
                $is_chat = get_sub_field('is_chat');
                $item_icon = get_sub_field('item_icon');
                $item_text = get_sub_field('item_text');
                $item_url = get_sub_field('item_url');

                if ($show_item == 'yes') {
                    if ($is_chat == 'yes') {
                        echo '<a title="' . $item_text . '" onclick="parent.IMIChatInit.chatswitchicon()" id="footer-live-chat" class="chat-closed">';
                    }
                    else {
                        echo '<a href="' . $item_url . '" title="' . $item_text . '">';
                    }
                    echo '<div class="footer-bar-item">';
                    if ($is_chat == 'yes') {
                        echo '<span class="dashicons dashicons-' . $item_icon . ' chat-icon"></span>';
                        echo '<span class="dashicons dashicons-dismiss"></span>';
                    } else {
                        echo '<span class="dashicons dashicons-' . $item_icon . '"></span>';
                    }
                    echo '<div style="text-align: center; padding: 0 0.25rem;">' . $item_text . '</div>';
                    echo '</div>';
                    echo '</a>';
                }

            endwhile;

        else :
            echo 'There are no items to display. Please turn off the Footer Contact bar.';
        endif;

        if ($show_close_button == 'yes') {
            echo '<a title="Close Footer Notification Bar" class="footer-bar-close" onclick="this.parentNode.parentNode.remove()"><span class="dashicons dashicons-no"></span></a>';
        }

        echo '</div>';
        echo '</div>';
    }

}
add_action( 'wp_footer', 'show_meadows_bar' );

// FOOTER BAR CSS

add_action('init', 'footer_bar_styles');
function footer_bar_styles() {
    wp_register_style( 'new_style', plugins_url('./meadows-footer-bar.css', __FILE__), false, '1.23', 'all');
}

add_action('wp_enqueue_scripts', 'footer_bar_styles_enqueue');
function footer_bar_styles_enqueue(){

   wp_enqueue_style( 'new_style' );
}

// FOOTER BAR JS

add_action('wp_enqueue_scripts','footer_bar_scripts');
function footer_bar_scripts() {
    wp_enqueue_script( 'footer-bar-js', plugins_url( './meadows-footer-bar.js', __FILE__ ), false, '1.23', 'all');
}

// ENABLE DASHICONS

function meadows_load_dashicons(){
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'meadows_load_dashicons');

 // ACF OPTIONS PAGE

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Footer Contact',
		'menu_title'	=> 'Footer Contact',
		'menu_slug' 	=> 'footer-contact',
	));
		
}

// ACF FIELDSET

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
                'key' => 'field_6311f9fa97c84',
                'label' => 'Show Close Button?',
                'name' => 'show_close_button',
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
                'key' => 'field_631f98658fcb9',
                'label' => 'Hide SMS on Desktop?',
                'name' => 'hide_sms_desktop',
                'instructions' => 'If selected, this will hide "Text" option above 600px.',
                'type' => 'true_false',
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
                'key' => 'field_6399eb6374e99',
                'label' => 'Exclude on Pages/Posts',
                'name' => 'exclude_on_pagesposts',
                'aria-label' => '',
                'type' => 'post_object',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'post_type' => array(
                    0 => 'page',
                    1 => 'post',
                    2 => 'wpcode',
                ),
                'taxonomy' => '',
                'return_format' => 'id',
                'multiple' => 1,
                'allow_null' => 1,
                'ui' => 1,
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
                'max' => 4,
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
                        'key' => 'field_6311001893e76',
                        'label' => 'Is Chat?',
                        'name' => 'is_chat',
                        'type' => 'true_false',
                        'instructions' => 'Chat behaves a little differently from the others. So please check this box to indicate if this item is the live chat.',
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
                        'key' => 'field_6310afc2fecb6',
                        'label' => 'Item Icon',
                        'name' => 'item_icon',
                        'type' => 'text',
                        'instructions' => 'See list of items <a href="https://developer.wordpress.org/resource/dashicons/#flag" target="_blank">on the WordPress site</a>. You only need to add the part that comes after "dashicon-" -- for example, use "flag" for "dashicons-flag"',
                        'required' => 1,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => 'dashicons-',
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