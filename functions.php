<?php
@ini_set( 'upload_max_size' , '64M' );
@ini_set( 'post_max_size', '64M');
@ini_set( 'max_execution_time', '300' );
header("Content-Type: text/html; charset=UTF-8");

/**
 * @package {Project Name}
 * @category Theme Functions
 * @author República Interativa
 */

/**
 * Sets up theme default constants
 */
if(!defined('WP_SITE_NAME'))  { define('WP_SITE_NAME', get_bloginfo('name')); }
if(!defined('WP_SITE_URL'))   { define('WP_SITE_URL', get_bloginfo('url')); }
if(!defined('WP_THEME_URL'))  { define('WP_THEME_URL', get_stylesheet_directory_uri()); }
if(!defined('WP_SCRIPT_URL')) { define('WP_SCRIPT_URL', WP_THEME_URL . '/assets/js'); }
if(!defined('WP_STYLE_URL'))  { define('WP_STYLE_URL', WP_THEME_URL . '/assets/css'); }
if(!defined('WP_IMAGE_URL'))  { define('WP_IMAGE_URL', WP_THEME_URL . '/assets/img'); }
if(!defined('WP_UNYSON_URL')) { define('WP_UNYSON_URL', WP_THEME_URL . '/unyson'); }


$functions_path = get_template_directory() . '/functions/';
$core_path   	= get_template_directory() . '/core/';

/**
 * Odin Classes.
 */
require_once $core_path . 'helpers.php';
require_once $core_path . 'classes/class-bootstrap-nav.php';
require_once $core_path . 'classes/class-shortcodes.php';
require_once $core_path . 'classes/class-thumbnail-resizer.php';
require_once $core_path . 'classes/class-theme-options.php';
require_once $core_path . 'classes/class-options-helper.php';
require_once $core_path . 'classes/class-post-type.php';
require_once $core_path . 'classes/class-taxonomy.php';
require_once $core_path . 'classes/class-metabox.php';
require_once $core_path . 'classes/abstracts/abstract-front-end-form.php';
require_once $core_path . 'classes/class-contact-form.php';
require_once $core_path . 'classes/class-post-form.php';
require_once $core_path . 'classes/class-user-meta.php';

/**
 * Unyson
 */
if (defined('FW')):
    // the framework was already included in another place, so this version will be inactive/ignored
else:
    /** @internal */
    function republitheme_unyson() {
        return WP_UNYSON_URL . '/framework';
    }
    add_filter('fw_framework_directory_uri', 'republitheme_unyson');

    require_once('unyson/framework/bootstrap.php');
endif;

/**
 * Require functions partials.
 */
require_once($functions_path . 'general.php');
require_once($functions_path . 'theme-config.php');
require_once($functions_path . 'optimize.php');
require_once($functions_path . 'user-meta.php');
require_once($functions_path . 'widgets.php');
require_once($functions_path . 'theme-options.php');
require_once($functions_path . 'support.php');
require_once($functions_path . 'posttype.php');
require_once($functions_path . 'taxonomies.php');
require_once($functions_path . 'admin.php');
require_once($functions_path . 'google.php');

?>