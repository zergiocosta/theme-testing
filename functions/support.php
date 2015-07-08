<?php
/**
 * -----------------------------------------------------------------
 * THEME FEATURES AND CONFIGURATION - Do not change anything here!
 * -----------------------------------------------------------------
 *
 * @package {Project Name}
 */

// if (!is_admin()) {
    add_filter( 'show_admin_bar', '__return_false' );
// }

function republitheme_GetCertainPostTypes($query) {
    if ($query->is_search) {
        $query->set('post_type',array('noticias','videos','filmes'));
    }
return $query;
}
add_filter('pre_get_posts','republitheme_GetCertainPostTypes');

//////////
// thumbs
//////////
add_theme_support('post-thumbnails');

//////////////////////////////////////
// Menu
//////////////////////////////////////
register_nav_menus( array(
    'menu-principal'        => __( 'Main Menu', 'republitheme' ),
) );

///////////////
// the excerpt
///////////////
function republitheme_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'republitheme_custom_excerpt_length', 999 );

/////////////////////////////////////////////////
// Add metabox for CTP Archives in wp nav menu
/////////////////////////////////////////////////
/* inject cpt archives meta box */
add_action( 'admin_head-nav-menus.php', 'republitheme_inject_cpt_archives_menu_meta_box' );
function republitheme_inject_cpt_archives_menu_meta_box() {
   add_meta_box( 'add-cpt', __( 'Custom Post Types', 'default' ), 'republitheme_wp_nav_menu_cpt_archives_meta_box', 'nav-menus',    'side', 'default' );
}
/* render custom post type archives meta box */
function republitheme_wp_nav_menu_cpt_archives_meta_box() {
    /* get custom post types with archive support */
    $post_types = get_post_types( array( 'show_in_nav_menus' => true, 'has_archive' => true ), 'object' );    
    /* hydrate the necessary object properties for the walker */
    foreach ( $post_types as &$post_type ) {
        $post_type->classes = array();
        $post_type->type = $post_type->name;
        $post_type->object_id = $post_type->name;
        $post_type->title = $post_type->labels->name . ' ' . __( 'Archive', 'default' );
        $post_type->object = 'cpt-archive';
    }
    $walker = new Walker_Nav_Menu_Checklist( array() );
    ?>
        <div id="cpt-archive" class="posttypediv">
            <div id="tabs-panel-cpt-archive" class="tabs-panel tabs-panel-active">
                <ul id="ctp-archive-checklist" class="categorychecklist form-no-clear">
                    <?php
                      echo walk_nav_menu_tree( array_map('wp_setup_nav_menu_item', $post_types), 0, (object) array( 'walker' => $walker) );
                    ?>
                </ul>
            </div><!-- /.tabs-panel -->
        </div>
        <p class="button-controls">
            <span class="add-to-menu">
                <input type="submit"<?php disabled( $nav_menu_selected_id, 0 ); ?> class="button-secondary submit-add-to-menu" value="<?php esc_attr_e('Add to Menu'); ?>" name="add-ctp-archive-menu-item" id="submit-cpt-archive" />
            </span>
        </p>
    <?php
}
/* take care of the urls */
add_filter( 'wp_get_nav_menu_items', 'republitheme_cpt_archive_menu_filter', 10, 3 );
function republitheme_cpt_archive_menu_filter( $items, $menu, $args ) {
/* alter the URL for cpt-archive objects */
foreach ( $items as &$item ) {
    if ( $item->object != 'cpt-archive' ) continue;
    $item->url = get_post_type_archive_link( $item->type );
    /* set current */
    if ( get_query_var( 'post_type' ) == $item->type ) {
        $item->classes []= 'current-menu-item';
        $item->current = true;
    }
}
return $items;
}

?>