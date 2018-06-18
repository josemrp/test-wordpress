<?php
/*
Plugin Name: My Custom Post Type by jose
Plugin URI: https://example.com/
Description: Creates a cpt
Version: 1.0
Author: Jose Manuel Romero
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: none
*/

/**
 * CUSTOM POST TYPE
 */
function my_jose_post_type() {
    $labels = array(
        'name'              => __( 'Jose'),
        'menu_name'         => __( 'Menu of jose'),
        'add_new_item '     => __('Add new Jose')
    );

    $args = array(
        'labels'            => $labels,
        'description'       => __('Description', 'your-plugin-textdomain'),
        'public'            => true,
        'public_queryable'  => true,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'jose' ),
        'capability_type'   => 'post',
        'has_archive'       => true,
        'hierarchical'      => false,
        'menu_icon'         => 'dashicons-universal-access-alt',
        'supports'          => array( 'title', 'editor', 'author', 'thumbnail', 'custom-fields' )
    );

    register_post_type( 'jose', $args );
}

add_action( 'init', 'my_jose_post_type' );