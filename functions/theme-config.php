<?php
function republitheme_config_output() {
	$republitheme_config_options = get_option('republitheme_general');
	print_r($republitheme_config_options);
	$img = wp_get_attachment_image_src( 4, 'full' );
	echo '<img src="'.$img[0].'" />';
}
// add_action('wp_head', 'republitheme_config_output');
?>