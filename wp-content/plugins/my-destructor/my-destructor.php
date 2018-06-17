<?php
/*
Plugin Name: My Destructor by josemrp
Plugin URI: https://example.com/
Description: Creates a user role capability to destroy all
Version: 1.0
Author: Jose Manuel Romero
Author URI: https://automattic.com/wordpress-plugins/
License: GPLv2 or later
Text Domain: none
*/

/**
 * Creates a desctructor role
 */
function my_destructor_role()
{
    //Remove if exist and create new
    remove_role('destructor_role');
    add_role(
        'destructor_role',
        'Destructor Role',
        [
            'delete_site'               => true,
            'delete_others_pages'       => true,
            'delete_others_posts'       => true,
            'delete_pages'              => true,
            'delete_posts'              => true,
            'delete_private_pages'      => true,
            'delete_private_posts'      => true,
            'delete_published_pages'    => true,
            'delete_published_posts'    => true,
            'delete_themes'             => true,
            'delete_plugins'            => true,
            'delete_users'              => true,
        ]
    );
}
 
//This update the database in the first run. It isn't necessary execute every time
add_action('init', 'my_destructor_role');


//--------------------------------------------------------------------------------

/**
 * Load a destructor area for admin page
 */
function my_destructor_page()
{
    // check user capabilities
    if (!current_user_can('manage_options')) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?= esc_html(get_admin_page_title()); ?></h1>
        <form action="#" method="post">
            <?php
            // output security fields for the registered setting "wporg_options"
            settings_fields('destructor_options');
            // output setting sections and their fields
            // (sections are registered for "wporg", each field is registered to a specific section)
            do_settings_sections('destructor');
            // output save settings button
            submit_button('Save Settings (do nothing)');
            ?>
        </form>
    </div>
    <?php
}

function my_destructor_menu()
{
    add_menu_page(
        'Destructor page title',
        'Destruction options (menu)',
        'manage_options', //capabilities
        'destructor-slug',
        'my_destructor_page',
        '',//plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
        20
    );
}

add_action('admin_menu', 'my_destructor_menu');