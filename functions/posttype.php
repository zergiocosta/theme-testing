<?php
/**
 * Post type configuration
 *
 * @package Republitheme
 */


/////////////////////////////////////////////
// Register Custom Post Type Portfolio
/////////////////////////////////////////////
function republitheme_cpt_portfolio() {
        $labels = array(
                'name'                => _x( 'Portfolio', 'Post Type General Name', 'republitheme' ),
                'singular_name'       => _x( 'Portfolio', 'Post Type Singular Name', 'republitheme' ),
                'menu_name'           => __( 'Portfolio', 'republitheme' ),
                'name_admin_bar'      => __( 'Portfolio', 'republitheme' ),
                'parent_item_colon'   => __( 'Parent Item:', 'republitheme' ),
                'all_items'           => __( 'All Items', 'republitheme' ),
                'add_new_item'        => __( 'Add New Item', 'republitheme' ),
                'add_new'             => __( 'Add New', 'republitheme' ),
                'new_item'            => __( 'New Item', 'republitheme' ),
                'edit_item'           => __( 'Edit Item', 'republitheme' ),
                'update_item'         => __( 'Update Item', 'republitheme' ),
                'view_item'           => __( 'View Item', 'republitheme' ),
                'search_items'        => __( 'Search Item', 'republitheme' ),
                'not_found'           => __( 'Not found', 'republitheme' ),
                'not_found_in_trash'  => __( 'Not found in Trash', 'republitheme' ),
        );
        $args = array(
                'label'               => __( 'portfolio', 'republitheme' ),
                'description'         => __( 'Portfolio', 'republitheme' ),
                'labels'              => $labels,
                'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),
                'taxonomies'          => array( 'portfolio', 'post_tag' ),
                'hierarchical'        => true,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'menu_position'       => 5,
                'menu_icon'           => get_bloginfo('template_url') . '/assets/img/icons/posttypes/portfolio.png',
                'show_in_admin_bar'   => true,
                'show_in_nav_menus'   => true,
                'can_export'          => true,
                'has_archive'         => true,          
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'capability_type'     => 'page',
        );
        register_post_type( 'portfolio', $args );
}
// Hook into the 'init' action
add_action( 'init', 'republitheme_cpt_portfolio', 0 );


/////////////////////////////////////////////
// Register Custom Post Type Team
/////////////////////////////////////////////
function republitheme_cpt_team() {
        $labels = array(
                'name'                => _x( 'Team', 'Post Type General Name', 'republitheme' ),
                'singular_name'       => _x( 'Team', 'Post Type Singular Name', 'republitheme' ),
                'menu_name'           => __( 'Team', 'republitheme' ),
                'name_admin_bar'      => __( 'Team', 'republitheme' ),
                'parent_item_colon'   => __( 'Parent Item:', 'republitheme' ),
                'all_items'           => __( 'All Items', 'republitheme' ),
                'add_new_item'        => __( 'Add New Item', 'republitheme' ),
                'add_new'             => __( 'Add New', 'republitheme' ),
                'new_item'            => __( 'New Item', 'republitheme' ),
                'edit_item'           => __( 'Edit Item', 'republitheme' ),
                'update_item'         => __( 'Update Item', 'republitheme' ),
                'view_item'           => __( 'View Item', 'republitheme' ),
                'search_items'        => __( 'Search Item', 'republitheme' ),
                'not_found'           => __( 'Not found', 'republitheme' ),
                'not_found_in_trash'  => __( 'Not found in Trash', 'republitheme' ),
        );
        $args = array(
                'label'               => __( 'team', 'republitheme' ),
                'description'         => __( 'Team', 'republitheme' ),
                'labels'              => $labels,
                'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),
                'taxonomies'          => array( 'team', 'post_tag' ),
                'hierarchical'        => true,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'menu_position'       => 5,
                'menu_icon'           => get_bloginfo('template_url') . '/assets/img/icons/posttypes/team.png',
                'show_in_admin_bar'   => true,
                'show_in_nav_menus'   => true,
                'can_export'          => true,
                'has_archive'         => true,          
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'capability_type'     => 'page',
        );
        register_post_type( 'team', $args );
}
// Hook into the 'init' action
add_action( 'init', 'republitheme_cpt_team', 0 );


/////////////////////////////////////////////
// Register Custom Post Type Services
/////////////////////////////////////////////
function republitheme_cpt_services() {
        $labels = array(
                'name'                => _x( 'Services', 'Post Type General Name', 'republitheme' ),
                'singular_name'       => _x( 'Services', 'Post Type Singular Name', 'republitheme' ),
                'menu_name'           => __( 'Services', 'republitheme' ),
                'name_admin_bar'      => __( 'Services', 'republitheme' ),
                'parent_item_colon'   => __( 'Parent Item:', 'republitheme' ),
                'all_items'           => __( 'All Items', 'republitheme' ),
                'add_new_item'        => __( 'Add New Item', 'republitheme' ),
                'add_new'             => __( 'Add New', 'republitheme' ),
                'new_item'            => __( 'New Item', 'republitheme' ),
                'edit_item'           => __( 'Edit Item', 'republitheme' ),
                'update_item'         => __( 'Update Item', 'republitheme' ),
                'view_item'           => __( 'View Item', 'republitheme' ),
                'search_items'        => __( 'Search Item', 'republitheme' ),
                'not_found'           => __( 'Not found', 'republitheme' ),
                'not_found_in_trash'  => __( 'Not found in Trash', 'republitheme' ),
        );
        $args = array(
                'label'               => __( 'services', 'republitheme' ),
                'description'         => __( 'Services', 'republitheme' ),
                'labels'              => $labels,
                'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),
                'taxonomies'          => array( 'services', 'post_tag' ),
                'hierarchical'        => true,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'menu_position'       => 5,
                'menu_icon'           => get_bloginfo('template_url') . '/assets/img/icons/posttypes/services.png',
                'show_in_admin_bar'   => true,
                'show_in_nav_menus'   => true,
                'can_export'          => true,
                'has_archive'         => true,          
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'capability_type'     => 'page',
        );
        register_post_type( 'services', $args );
}
// Hook into the 'init' action
add_action( 'init', 'republitheme_cpt_services', 0 );


/////////////////////////////////////////////
// Register Custom Post Type Customers
/////////////////////////////////////////////
function republitheme_cpt_customers() {
        $labels = array(
                'name'                => _x( 'Customers', 'Post Type General Name', 'republitheme' ),
                'singular_name'       => _x( 'Customers', 'Post Type Singular Name', 'republitheme' ),
                'menu_name'           => __( 'Customers', 'republitheme' ),
                'name_admin_bar'      => __( 'Customers', 'republitheme' ),
                'parent_item_colon'   => __( 'Parent Item:', 'republitheme' ),
                'all_items'           => __( 'All Items', 'republitheme' ),
                'add_new_item'        => __( 'Add New Item', 'republitheme' ),
                'add_new'             => __( 'Add New', 'republitheme' ),
                'new_item'            => __( 'New Item', 'republitheme' ),
                'edit_item'           => __( 'Edit Item', 'republitheme' ),
                'update_item'         => __( 'Update Item', 'republitheme' ),
                'view_item'           => __( 'View Item', 'republitheme' ),
                'search_items'        => __( 'Search Item', 'republitheme' ),
                'not_found'           => __( 'Not found', 'republitheme' ),
                'not_found_in_trash'  => __( 'Not found in Trash', 'republitheme' ),
        );
        $args = array(
                'label'               => __( 'customers', 'republitheme' ),
                'description'         => __( 'Customers', 'republitheme' ),
                'labels'              => $labels,
                'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),
                'taxonomies'          => array( 'customers', 'post_tag' ),
                'hierarchical'        => true,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'menu_position'       => 5,
                'menu_icon'           => get_bloginfo('template_url') . '/assets/img/icons/posttypes/customers.png',
                'show_in_admin_bar'   => true,
                'show_in_nav_menus'   => true,
                'can_export'          => true,
                'has_archive'         => true,          
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'capability_type'     => 'page',
        );
        register_post_type( 'customers', $args );
}
// Hook into the 'init' action
add_action( 'init', 'republitheme_cpt_customers', 0 );


/////////////////////////////////////////////
// Register Custom Post Type Testimonials
/////////////////////////////////////////////
function republitheme_cpt_testimonials() {
        $labels = array(
                'name'                => _x( 'Testimonials', 'Post Type General Name', 'republitheme' ),
                'singular_name'       => _x( 'Testimonials', 'Post Type Singular Name', 'republitheme' ),
                'menu_name'           => __( 'Testimonials', 'republitheme' ),
                'name_admin_bar'      => __( 'Testimonials', 'republitheme' ),
                'parent_item_colon'   => __( 'Parent Item:', 'republitheme' ),
                'all_items'           => __( 'All Items', 'republitheme' ),
                'add_new_item'        => __( 'Add New Item', 'republitheme' ),
                'add_new'             => __( 'Add New', 'republitheme' ),
                'new_item'            => __( 'New Item', 'republitheme' ),
                'edit_item'           => __( 'Edit Item', 'republitheme' ),
                'update_item'         => __( 'Update Item', 'republitheme' ),
                'view_item'           => __( 'View Item', 'republitheme' ),
                'search_items'        => __( 'Search Item', 'republitheme' ),
                'not_found'           => __( 'Not found', 'republitheme' ),
                'not_found_in_trash'  => __( 'Not found in Trash', 'republitheme' ),
        );
        $args = array(
                'label'               => __( 'testimonials', 'republitheme' ),
                'description'         => __( 'Testimonials', 'republitheme' ),
                'labels'              => $labels,
                'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),
                'taxonomies'          => array( 'testimonials', 'post_tag' ),
                'hierarchical'        => true,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'menu_position'       => 5,
                'menu_icon'           => get_bloginfo('template_url') . '/assets/img/icons/posttypes/testimonials.png',
                'show_in_admin_bar'   => true,
                'show_in_nav_menus'   => true,
                'can_export'          => true,
                'has_archive'         => true,          
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'capability_type'     => 'page',
        );
        register_post_type( 'testimonials', $args );
}
// Hook into the 'init' action
add_action( 'init', 'republitheme_cpt_testimonials', 0 );


/////////////////////////////////////////////
// Register Custom Post Type Pricing
/////////////////////////////////////////////
function republitheme_cpt_pricing() {
        $labels = array(
                'name'                => _x( 'Pricing', 'Post Type General Name', 'republitheme' ),
                'singular_name'       => _x( 'Pricing', 'Post Type Singular Name', 'republitheme' ),
                'menu_name'           => __( 'Pricing', 'republitheme' ),
                'name_admin_bar'      => __( 'Pricing', 'republitheme' ),
                'parent_item_colon'   => __( 'Parent Item:', 'republitheme' ),
                'all_items'           => __( 'All Items', 'republitheme' ),
                'add_new_item'        => __( 'Add New Item', 'republitheme' ),
                'add_new'             => __( 'Add New', 'republitheme' ),
                'new_item'            => __( 'New Item', 'republitheme' ),
                'edit_item'           => __( 'Edit Item', 'republitheme' ),
                'update_item'         => __( 'Update Item', 'republitheme' ),
                'view_item'           => __( 'View Item', 'republitheme' ),
                'search_items'        => __( 'Search Item', 'republitheme' ),
                'not_found'           => __( 'Not found', 'republitheme' ),
                'not_found_in_trash'  => __( 'Not found in Trash', 'republitheme' ),
        );
        $args = array(
                'label'               => __( 'pricing', 'republitheme' ),
                'description'         => __( 'Pricing', 'republitheme' ),
                'labels'              => $labels,
                'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', ),
                'taxonomies'          => array( 'post_tag' ),
                'hierarchical'        => true,
                'public'              => true,
                'show_ui'             => true,
                'show_in_menu'        => true,
                'menu_position'       => 5,
                'menu_icon'           => get_bloginfo('template_url') . '/assets/img/icons/posttypes/pricing.png',
                'show_in_admin_bar'   => true,
                'show_in_nav_menus'   => true,
                'can_export'          => true,
                'has_archive'         => true,          
                'exclude_from_search' => false,
                'publicly_queryable'  => true,
                'capability_type'     => 'page',
        );
        register_post_type( 'pricing', $args );
}
// Hook into the 'init' action
add_action( 'init', 'republitheme_cpt_pricing', 0 );


?>