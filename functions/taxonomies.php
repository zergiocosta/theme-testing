<?php
/**
 * Taxonomies configurations
 *
 * @package {Project Name}
 */

/////////////////////////////////////////////
// Register Taxonomy for Portfolio
/////////////////////////////////////////////
function republitheme_tax_portfolio() {
        $labels = array(
                'name'                       => _x( 'Project Types', 'Taxonomy General Name', 'republitheme' ),
                'singular_name'              => _x( 'Project Type', 'Taxonomy Singular Name', 'republitheme' ),
                'menu_name'                  => __( 'Project Types', 'republitheme' ),
                'all_items'                  => __( 'All Items', 'republitheme' ),
                'parent_item'                => __( 'Parent Item', 'republitheme' ),
                'parent_item_colon'          => __( 'Parent Item:', 'republitheme' ),
                'new_item_name'              => __( 'New Item Name', 'republitheme' ),
                'add_new_item'               => __( 'Add New Item', 'republitheme' ),
                'edit_item'                  => __( 'Edit Item', 'republitheme' ),
                'update_item'                => __( 'Update Item', 'republitheme' ),
                'view_item'                  => __( 'View Item', 'republitheme' ),
                'separate_items_with_commas' => __( 'Separate items with commas', 'republitheme' ),
                'add_or_remove_items'        => __( 'Add or remove items', 'republitheme' ),
                'choose_from_most_used'      => __( 'Choose from the most used', 'republitheme' ),
                'popular_items'              => __( 'Popular Items', 'republitheme' ),
                'search_items'               => __( 'Search Items', 'republitheme' ),
                'not_found'                  => __( 'Not Found', 'republitheme' ),
        );
        $args = array(
                'labels'                     => $labels,
                'hierarchical'               => false,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
        );
        register_taxonomy( 'portfolio', array( 'portfolio' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'republitheme_tax_portfolio', 0 );

/////////////////////////////////////////////
// Register Taxonomy for team
/////////////////////////////////////////////
function republitheme_tax_team() {
        $labels = array(
                'name'                       => _x( 'Member Types', 'Taxonomy General Name', 'republitheme' ),
                'singular_name'              => _x( 'Member Type', 'Taxonomy Singular Name', 'republitheme' ),
                'menu_name'                  => __( 'Member Types', 'republitheme' ),
                'all_items'                  => __( 'All Items', 'republitheme' ),
                'parent_item'                => __( 'Parent Item', 'republitheme' ),
                'parent_item_colon'          => __( 'Parent Item:', 'republitheme' ),
                'new_item_name'              => __( 'New Item Name', 'republitheme' ),
                'add_new_item'               => __( 'Add New Item', 'republitheme' ),
                'edit_item'                  => __( 'Edit Item', 'republitheme' ),
                'update_item'                => __( 'Update Item', 'republitheme' ),
                'view_item'                  => __( 'View Item', 'republitheme' ),
                'separate_items_with_commas' => __( 'Separate items with commas', 'republitheme' ),
                'add_or_remove_items'        => __( 'Add or remove items', 'republitheme' ),
                'choose_from_most_used'      => __( 'Choose from the most used', 'republitheme' ),
                'popular_items'              => __( 'Popular Items', 'republitheme' ),
                'search_items'               => __( 'Search Items', 'republitheme' ),
                'not_found'                  => __( 'Not Found', 'republitheme' ),
        );
        $args = array(
                'labels'                     => $labels,
                'hierarchical'               => false,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
        );
        register_taxonomy( 'team', array( 'team' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'republitheme_tax_team', 0 );

/////////////////////////////////////////////
// Register Taxonomy for Services
/////////////////////////////////////////////
function republitheme_tax_services() {
        $labels = array(
                'name'                       => _x( 'Service Types', 'Taxonomy General Name', 'republitheme' ),
                'singular_name'              => _x( 'Service Type', 'Taxonomy Singular Name', 'republitheme' ),
                'menu_name'                  => __( 'Service Types', 'republitheme' ),
                'all_items'                  => __( 'All Items', 'republitheme' ),
                'parent_item'                => __( 'Parent Item', 'republitheme' ),
                'parent_item_colon'          => __( 'Parent Item:', 'republitheme' ),
                'new_item_name'              => __( 'New Item Name', 'republitheme' ),
                'add_new_item'               => __( 'Add New Item', 'republitheme' ),
                'edit_item'                  => __( 'Edit Item', 'republitheme' ),
                'update_item'                => __( 'Update Item', 'republitheme' ),
                'view_item'                  => __( 'View Item', 'republitheme' ),
                'separate_items_with_commas' => __( 'Separate items with commas', 'republitheme' ),
                'add_or_remove_items'        => __( 'Add or remove items', 'republitheme' ),
                'choose_from_most_used'      => __( 'Choose from the most used', 'republitheme' ),
                'popular_items'              => __( 'Popular Items', 'republitheme' ),
                'search_items'               => __( 'Search Items', 'republitheme' ),
                'not_found'                  => __( 'Not Found', 'republitheme' ),
        );
        $args = array(
                'labels'                     => $labels,
                'hierarchical'               => false,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
        );
        register_taxonomy( 'services', array( 'services' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'republitheme_tax_services', 0 );

/////////////////////////////////////////////
// Register Taxonomy for Customers
/////////////////////////////////////////////
function republitheme_tax_customers() {
        $labels = array(
                'name'                       => _x( 'Customer Types', 'Taxonomy General Name', 'republitheme' ),
                'singular_name'              => _x( 'Customer Type', 'Taxonomy Singular Name', 'republitheme' ),
                'menu_name'                  => __( 'Customer Types', 'republitheme' ),
                'all_items'                  => __( 'All Items', 'republitheme' ),
                'parent_item'                => __( 'Parent Item', 'republitheme' ),
                'parent_item_colon'          => __( 'Parent Item:', 'republitheme' ),
                'new_item_name'              => __( 'New Item Name', 'republitheme' ),
                'add_new_item'               => __( 'Add New Item', 'republitheme' ),
                'edit_item'                  => __( 'Edit Item', 'republitheme' ),
                'update_item'                => __( 'Update Item', 'republitheme' ),
                'view_item'                  => __( 'View Item', 'republitheme' ),
                'separate_items_with_commas' => __( 'Separate items with commas', 'republitheme' ),
                'add_or_remove_items'        => __( 'Add or remove items', 'republitheme' ),
                'choose_from_most_used'      => __( 'Choose from the most used', 'republitheme' ),
                'popular_items'              => __( 'Popular Items', 'republitheme' ),
                'search_items'               => __( 'Search Items', 'republitheme' ),
                'not_found'                  => __( 'Not Found', 'republitheme' ),
        );
        $args = array(
                'labels'                     => $labels,
                'hierarchical'               => false,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
        );
        register_taxonomy( 'customers', array( 'customers' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'republitheme_tax_customers', 0 );

/////////////////////////////////////////////
// Register Taxonomy for Testimonials
/////////////////////////////////////////////
function republitheme_tax_testimonials() {
        $labels = array(
                'name'                       => _x( 'Testimonial Types', 'Taxonomy General Name', 'republitheme' ),
                'singular_name'              => _x( 'Testimonial Type', 'Taxonomy Singular Name', 'republitheme' ),
                'menu_name'                  => __( 'Testimonial Types', 'republitheme' ),
                'all_items'                  => __( 'All Items', 'republitheme' ),
                'parent_item'                => __( 'Parent Item', 'republitheme' ),
                'parent_item_colon'          => __( 'Parent Item:', 'republitheme' ),
                'new_item_name'              => __( 'New Item Name', 'republitheme' ),
                'add_new_item'               => __( 'Add New Item', 'republitheme' ),
                'edit_item'                  => __( 'Edit Item', 'republitheme' ),
                'update_item'                => __( 'Update Item', 'republitheme' ),
                'view_item'                  => __( 'View Item', 'republitheme' ),
                'separate_items_with_commas' => __( 'Separate items with commas', 'republitheme' ),
                'add_or_remove_items'        => __( 'Add or remove items', 'republitheme' ),
                'choose_from_most_used'      => __( 'Choose from the most used', 'republitheme' ),
                'popular_items'              => __( 'Popular Items', 'republitheme' ),
                'search_items'               => __( 'Search Items', 'republitheme' ),
                'not_found'                  => __( 'Not Found', 'republitheme' ),
        );
        $args = array(
                'labels'                     => $labels,
                'hierarchical'               => false,
                'public'                     => true,
                'show_ui'                    => true,
                'show_admin_column'          => true,
                'show_in_nav_menus'          => true,
                'show_tagcloud'              => true,
        );
        register_taxonomy( 'testimonials', array( 'testimonials' ), $args );
}
// Hook into the 'init' action
add_action( 'init', 'republitheme_tax_testimonials', 0 );

?>