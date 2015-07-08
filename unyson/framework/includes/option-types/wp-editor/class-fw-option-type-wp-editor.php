<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

class FW_Option_Type_Wp_Editor extends FW_Option_Type {
	private $js_uri;
	private $css_uri;

	private $flag = false;

	public function get_type() {
		return 'wp-editor';
	}

	/**
	 * @internal
	 */
	protected function _get_defaults() {
		return array(
			/**
			 * boolean | array
			 */
			'tinymce'       => true,
			/**
			 * boolean
			 */
			'media_buttons' => true,
			/**
			 * boolean
			 */
			'teeny'         => false,
			/**
			 * boolean
			 */
			'wpautop'       => true,
			/**
			 * string
			 * Additional CSS styling applied for both visual and HTML editors buttons, needs to include <style> tags, can use "scoped"
			 */
			'editor_css'    => '',
			/**
			 * boolean
			 * if smth wrong try change true
			 */
			'reinit'        => false,
			/**
			 * string
			 */
			'value'         => '',
			/**
			 * Set the editor size: small - small box, large - full size
			 * string
			 */
			'size'          => 'small' // small, large
		);
	}

	/**
	 * @internal
	 */
	protected function _init() {
		$static_uri    = fw_get_framework_directory_uri( '/includes/option-types/' . $this->get_type() . '/static' );
		$this->js_uri  = $static_uri . '/js';
		$this->css_uri = $static_uri . '/css';
	}

	private function get_teeny_preset( $option ) {
		return apply_filters( 'wp_editor_settings', array(
			'menubar'            => false,
			'wpautop'            => $option['wpautop'],
			'tabfocus_elements'  => ":prev,:next",
			'toolbar1'           => "bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,fullscreen,wp_adv",
			'toolbar2'           => implode(',', apply_filters( 'mce_buttons_2', array( 'formatselect', 'underline', 'alignjustify', 'forecolor', 'pastetext', 'removeformat', 'charmap', 'outdent', 'indent', 'undo', 'redo', 'wp_help' ), $option['attr']['id'] )),
			'plugins'            => "hr,tabfocus,fullscreen,wordpress,wpeditimage",
			'preview_styles'     => 'font-family font-size font-weight font-style text-decoration text-transform',
			'content_css'        => $this->_get_tmce_content_css(),
			'language'           => $this->_get_tmce_locale(),
			'relative_urls'      => false,
			'remove_script_host' => false,
		), $option['attr']['id'] );
	}

	private function get_extended_preset( $option ) {
		$return =  apply_filters('tiny_mce_before_init', array(
			'theme'                        => 'modern',
			'skin'                         => 'lightgray',
			'formats'                      => array(
				'alignleft'     => array(
					array(
						'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li',
						'styles'   => array( 'textAlign' => 'left' ),
					),
					array(
						'selector' => 'img,table,dl.wp-caption',
						'classes'  => 'alignleft'
					),
				),
				'aligncenter'   => array(
					array(
						'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li',
						'styles'   => array( 'textAlign' => 'center' )
					),
					array(
						'selector' => 'img,table,dl.wp-caption',
						'classes'  => 'aligncenter'
					),
				),
				'alignright'    => array(
					array(
						'selector' => 'p,h1,h2,h3,h4,h5,h6,td,th,div,ul,ol,li',
						'styles'   => array( 'textAlign' => 'right' )
					),
					array(
						'selector' => 'img,table,dl.wp-caption',
						'classes'  => 'alignright'
					)
				),
				'strikethrough' => array( 'inline' => 'del' ),
			),
			'relative_urls'                => false,
			'remove_script_host'           => false,
			'convert_urls'                 => false,
			'browser_spellcheck'           => true,
			'fix_list_elements'            => true,
			'entities'                     => '38,amp,60,lt,62,gt',
			'entity_encoding'              => 'raw',
			'keep_styles'                  => false,
			'paste_webkit_styles'          => 'font-weight font-style color',
			'preview_styles'               => 'font-family font-size font-weight font-style text-decoration text-transform',
			'wpeditimage_disable_captions' => false,
			'wpeditimage_html5_captions'   => true,
			'plugins'                      => 'charmap,hr,media,paste,tabfocus,textcolor,fullscreen,wordpress,wpeditimage,wpgallery,wplink,wpdialogs,wpview,colorpicker,textcolor',
			'resize'                       => 'vertical',
			'menubar'                      => false,
			'indent'                       => false,
			'toolbar1'                     => 'bold,italic,strikethrough,bullist,numlist,blockquote,hr,alignleft,aligncenter,alignright,link,unlink,wp_more,spellchecker,fullscreen,wp_adv',
			'toolbar2'                     => implode(',', apply_filters( 'mce_buttons_2', array( 'formatselect', 'underline', 'alignjustify', 'forecolor', 'pastetext', 'removeformat', 'charmap', 'outdent', 'indent', 'undo', 'redo', 'wp_help' ), $option['attr']['id'] )),
			'toolbar3'                     => '',
			'toolbar4'                     => '',
			'tabfocus_elements'            => ':prev,:next',
			'body_class'                   => 'wp-admin',
			'content_css'                  => $this->_get_tmce_content_css(),
			'language'                     => $this->_get_tmce_locale(),
			'wpautop'                      => $option['wpautop'],
		), $option['attr']['id']);

		foreach ( $return as $key => $item ) {
			if ( ! is_string( $item ) ||  ! is_array( json_decode( $item, true ) ) ) {
				continue;
			}

			$return[$key] = json_decode($item, true);
		}

		return $return;
	}

	/**
	 * @internal
	 */
	protected function _render( $id, $option, $data ) {
		//replace \u00a0 char to &nbsp;
		$value = str_replace( chr( 194 ) . chr( 160 ), '&nbsp;', (string) $data['value'] );

		$name = $option['attr']['name'];
		unset( $option['attr']['name'], $option['attr']['value'] );

		$textarea_id = 'textarea_';
		if (
			// check if id contains characters that can produce errors
			preg_match( '/[^a-z0-9_\-]/i', $option['attr']['id'] )
			||
			$option['reinit']
		) {
			$textarea_id .= 'dynamic_id';
		} else {
			$textarea_id .= $option['attr']['id'];
		}

		$wrapper_attr = array_merge( $option['attr'], array(
			'data-name'          => $name,
			'data-config'        => $option['teeny'] ? 'teeny' : ( is_array( $option['tinymce'] ) ? 'custom' : 'extended' ),
			'data-tinymce'       => is_array( $option['tinymce'] ) ? json_encode( $option['tinymce'] ) : $option['tinymce'],
			'data-tmce-teeny'    => json_encode( $this->get_teeny_preset( $option ) ),
			'data-tmce-extended' => json_encode( $this->get_extended_preset( $option ) ),
			'data-width-type'    => $option['size'],
		) );

		echo '<div ' . fw_attr_to_html( $wrapper_attr ) . '>';

		$option['editor_css'] .= '<style>#wp-link-wrap{z-index: 160105} #wp-link-backdrop{z-index: 160100} .mce-container.mce-panel.mce-floatpanel.mce-menu, .mce-container.mce-panel.mce-floatpanel.mce-popover, .mce-container.mce-panel.mce-floatpanel.mce-window {z-index: 160105 !important;}</style>';

		wp_editor( $value, $textarea_id, array(
			'teeny'         => $option['teeny'],
			'media_buttons' => $option['media_buttons'],
			'tinymce'       => $option['tinymce'],
			'editor_css'    => $option['editor_css']
		) );

		echo '</div>';
	}

	/**
	 * @internal
	 * {@inheritdoc}
	 */
	protected function _enqueue_static( $id, $option, $data ) {
		add_action( 'admin_print_footer_scripts', array( $this, '_action_print_wp_editor' ), 9999 );

		wp_enqueue_script( 'quicktags' );
		wp_enqueue_style( 'buttons' );

		wp_enqueue_script(
			'fw-option-type-' . $this->get_type(),
			$this->js_uri . '/scripts.js',
			array( 'jquery', 'fw-events', 'editor', 'fw' ),
			fw()->manifest->get_version(),
			true
		);

		wp_enqueue_style(
			'editor-buttons-css',
			includes_url( "/css/editor.min.css" ),
			array(),
			fw()->manifest->get_version()
		);
		wp_enqueue_style(
			'dashicons-css',
			includes_url( "css/dashicons.min.css" ),
			array(),
			fw()->manifest->get_version()
		);
		wp_enqueue_style(
			'fw-option-type-' . $this->get_type(),
			$this->css_uri . '/styles.css',
			array(),
			fw()->manifest->get_version()
		);
	}

	private function  _get_tmce_locale() {
		$mce_locale = get_locale();

		return empty( $mce_locale ) ? 'en' : strtolower( substr( $mce_locale, 0, 2 ) );
	}

	/**
	 * @internal
	 **/
	public function _action_print_wp_editor() {
		if ( ! class_exists( '_WP_Editors' ) ) {
			require( ABSPATH . WPINC . '/class-wp-editor.php' );

			$id = 'fw-wp-editor-option-type';

			$set = _WP_Editors::parse_settings( $id, array(
				'teeny'         => true,
				'media_buttons' => true,
				'tinymce'       => true,
				'editor_css'    => true,
				'quicktags'     => true
			) );

			_WP_Editors::editor_settings( $id, $set );

			_WP_Editors::enqueue_scripts();
			_WP_Editors::editor_js();
		}
	}

	//styles for wp-editor content
	private function _get_tmce_content_css() {
		$suffix  = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		$version = 'ver=' . $GLOBALS['wp_version'];

		$mce_css = array(
			includes_url( "css/dashicons$suffix.css?$version" ),
			includes_url( "js/mediaelement/mediaelementplayer$suffix.css?$version" ),
			includes_url( "js/mediaelement/wp-mediaelement.css?$version" ),
			includes_url( 'js/tinymce/skins/wordpress/wp-content.css?' . $version )
		);

		// load editor_style.css if the current theme supports it
		if ( ! empty( $GLOBALS['editor_styles'] ) && is_array( $GLOBALS['editor_styles'] ) ) {
			$editor_styles = $GLOBALS['editor_styles'];

			$editor_styles = array_unique( array_filter( $editor_styles ) );
			$style_uri     = get_stylesheet_directory_uri();
			$style_dir     = get_stylesheet_directory();

			// Support externally referenced styles (like, say, fonts).
			foreach ( $editor_styles as $key => $file ) {
				if ( preg_match( '~^(https?:)?//~', $file ) ) {
					$mce_css[] = esc_url_raw( $file );
					unset( $editor_styles[ $key ] );
				}
			}

			// Look in a parent theme first, that way child theme CSS overrides.
			if ( is_child_theme() ) {
				$template_uri = get_template_directory_uri();
				$template_dir = get_template_directory();

				foreach ( $editor_styles as $key => $file ) {
					if ( $file && file_exists( "$template_dir/$file" ) ) {
						$mce_css[] = "$template_uri/$file";
					}
				}
			}

			foreach ( $editor_styles as $file ) {
				if ( $file && file_exists( "$style_dir/$file" ) ) {
					$mce_css[] = "$style_uri/$file";
				}
			}
		}

		return $mce_css_urls = trim( implode( ',', $mce_css ) );
	}

	/**
	 * @internal
	 */
	protected function _get_value_from_input( $option, $input_value ) {
		if ( is_null( $input_value ) ) {
			return $option['value'];
		}

		$value = (string) $input_value;

		if ( $option['wpautop'] === true ) {
			$value = preg_replace( "/\n/i", "", wpautop( $value ) );
		}

		return $value;
	}

	/**
	 * {@inheritdoc}
	 */
	public function _get_backend_width_type() {
		return 'auto';
	}
}

FW_Option_Type::register( 'FW_Option_Type_Wp_Editor' );
