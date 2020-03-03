<?php
/*
Plugin Name: TinyMCE Button Button
Plugin URI: 
Description: Add a <button> button to the TinyMCE WYSIWYG editor in WordPress.
Author: Sully Syed
Version: 1.0
Author URI: http://yllus.com/
*/

add_action('admin_head', 'tinymce_button_add_button');
add_action('admin_enqueue_scripts', 'tinymce_button_button_css');

function tinymce_button_add_button() {
    global $typenow;

    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
     	return;
    }

    if ( get_user_option('rich_editing') == 'true') {
    	add_filter("mce_external_plugins", "tinymce_button_button_add_plugin");
    	add_filter('mce_buttons', 'tinymce_button_button_register');
    }
}

function tinymce_button_button_add_plugin($plugin_array) {
   	$plugin_array['tinymce_button_button'] = plugins_url( '/tinymce-button-button.js', __FILE__ );

   	return $plugin_array;
}

function tinymce_button_button_register($buttons) {
    array_push($buttons, "tinymce_button_button");

    return $buttons;
}

function tinymce_button_button_css() {
    wp_enqueue_style('tinymce_button_button_css', plugins_url('/style.css', __FILE__));
}