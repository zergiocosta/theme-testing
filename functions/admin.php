<?php
/**
 * --------------------------------------------------------------
 * ADMIN PANEL CONFIGURATION 
 * --------------------------------------------------------------
 *
 * @package Republitheme
 */

/*
 * Change the footer text
 */
function republitheme_remove_footer_admin () {
    echo "&copy;". date( 'Y' ) . ' - ' . get_bloginfo( 'name' ) . " - Todos os Direitos Reservados.";
}
add_filter('admin_footer_text', 'republitheme_remove_footer_admin');

/*
 * Remove version from footer.
 */
function republitheme_change_footer_version() {
    return 'Orgulhosamente desenvolvido por <a href="http://www.sergiocosta.net.br" target="_blank" title="Sergio Costa">Sergio Costa</a>';
}
add_filter( 'update_footer', 'republitheme_change_footer_version', 9999 );

/*
 * Add dashboard box
 */
add_action('wp_dashboard_setup', 'republitheme_mycustom_dashboard_widgets');
function republitheme_mycustom_dashboard_widgets() {
    global $wp_meta_boxes;
    wp_add_dashboard_widget('custom_help_widget', __('Welcome to '.WP_SITE_NAME.' admin panel'), 'republitheme_custom_dashboard_help');
}
function republitheme_custom_dashboard_help() {
    echo '<p>Here, you can manage all the content of your site.</p><p>If you have any questions, contact us!</p><p>This site is powered by WordPress</p>';
}

/**
 * Custom logo URL.
 */
function republitheme_admin_logo_url() {
	return home_url();
}
add_filter( 'login_headerurl', 'republitheme_admin_logo_url' );

/**
 * Custom logo title.
 */
function republitheme_admin_logo_title() {
	return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'republitheme_admin_logo_title' );

?>