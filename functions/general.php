<?php
/**
 * ------------------------------------------------------------------------- *
 * GENERAL CONFIGURATION (styles and scripts) - Do not change anything here! *
 * ------------------------------------------------------------------------- *
 *
 * @package Republitheme
 */

/**
 * Load scripts and style.
 */
function republitheme_enqueue_scripts() {

    wp_enqueue_style('theme-style', get_stylesheet_uri(), array(), null, 'all');

    wp_enqueue_style('main-css', WP_STYLE_URL . '/style.css', array(), null, false);

    wp_deregister_script('jquery');

    wp_register_script('modernizr', WP_SCRIPT_URL . '/vendor/modernizr-2.6.2-respond-1.1.0.min.js', array(), null, false);
    wp_enqueue_script('modernizr');

    wp_register_script('jquery', WP_SCRIPT_URL . '/vendor/jquery.js', array(), null, true);
    wp_enqueue_script('jquery');

    wp_register_script('main', WP_SCRIPT_URL . '/main.min.js', array(), null, true);
    wp_enqueue_script('main');
}
add_action('wp_enqueue_scripts', 'republitheme_enqueue_scripts');

$current_user = wp_get_current_user();
if ($current_user->user_login != 'sergio') {
    // admin styles
    function republitheme_custom_wp_admin_style() {
        wp_register_style( 'custom_wp_admin_css', get_template_directory_uri() . '/assets/admin/admin.css', false, '1.0.0' );
        wp_enqueue_style( 'custom_wp_admin_css' );
    }
    add_action( 'admin_enqueue_scripts', 'republitheme_custom_wp_admin_style' );
}

// login styles
function republitheme_themeslug_enqueue_style() {
    wp_enqueue_style( 'core', get_template_directory_uri() . '/assets/admin/login.css', false ); 
}
add_action( 'login_enqueue_scripts', 'republitheme_themeslug_enqueue_style', 10 );