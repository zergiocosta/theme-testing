<?php 
/**
 * Optimization Functions and definitions
 *
 * @package Republitheme
 */

/**
 * Cleanup wp_head().
 */
function republitheme_head_cleanup() {
    // windows live writer.
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // index link.
    remove_action( 'wp_head', 'index_rel_link' );
    // previous link.
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // start link.
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // WP version.
    remove_action( 'wp_head', 'wp_generator' );
}

add_action( 'init', 'republitheme_head_cleanup' );

/**
 * Remove WP version from RSS.
 */
add_filter( 'the_generator', '__return_false' );

/**
 * Add feed link.
 */
// add_theme_support( 'automatic-feed-links' );

/**
 * Add CPT to the RSS Feed
 */
function republitheme_myfeed_request($qv) {
    if (isset($qv['feed']))
        $qv['post_type'] = get_post_types();
    return $qv;
}
add_filter('request', 'republitheme_myfeed_request');

/**
 * Obscure login screen error messages
 */
function republitheme_login_obscure() { 
    return '<strong>Sorry</strong>: Think you have gone wrong somwhere!';
}
add_filter( 'login_errors', 'republitheme_login_obscure' );

/**
 * Load Contact Form 7 files only when necessary
 */
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

?>