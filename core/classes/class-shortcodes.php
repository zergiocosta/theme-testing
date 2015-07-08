<?php
/**
 * Odin_Shortcodes class.
 *
 * Built Shortcodes.
 *
 * @package  Odin
 * @category Shortcodes
 * @author   WPBrasil
 * @version  2.1.4
 */
class Republitheme_Shortcodes {

	/**
	 * Construct Post Type.
	 */
	public function __construct() {
		add_shortcode( 'button', array( $this, 'republitheme_button' ) );
		add_shortcode( 'button_group', array( $this, 'republitheme_button_group' ) );
		add_shortcode( 'alert', array( $this, 'republitheme_alert' ) );
		add_shortcode( 'label', array( $this, 'republitheme_label' ) );
		add_shortcode( 'badge', array( $this, 'republitheme_badge' ) );
		add_shortcode( 'icon', array( $this, 'republitheme_icon' ) );
		add_shortcode( 'well', array( $this, 'republitheme_well' ) );
		add_shortcode( 'table', array( $this, 'republitheme_table' ) );
		add_shortcode( 'row', array( $this, 'republitheme_row' ) );
		add_shortcode( 'col', array( $this, 'republitheme_col' ) );
		add_shortcode( 'progress', array( $this, 'republitheme_progress' ) );
		add_shortcode( 'panel', array( $this, 'republitheme_panel' ) );
		add_shortcode( 'panel_heading', array( $this, 'republitheme_panel_heading' ) );
		add_shortcode( 'panel_body', array( $this, 'republitheme_panel_body' ) );
		add_shortcode( 'panel_footer', array( $this, 'republitheme_panel_footer' ) );
		add_shortcode( 'tabs', array( $this, 'republitheme_tabs' ) );
		add_shortcode( 'tab', array( $this, 'republitheme_tab' ) );
		add_shortcode( 'tab_dropdown', array( $this, 'republitheme_tab_dropdown' ) );
		add_shortcode( 'tab_contents', array( $this, 'republitheme_tab_contents' ) );
		add_shortcode( 'tab_content', array( $this, 'republitheme_tab_content' ) );
		add_shortcode( 'accordions', array( $this, 'republitheme_accordions' ) );
		add_shortcode( 'accordion', array( $this, 'republitheme_accordion' ) );
		add_shortcode( 'map', array( $this, 'republitheme_map' ) );
		add_shortcode( 'tooltip', array( $this, 'republitheme_tooltip' ) );
		add_shortcode( 'qrcode', array( $this, 'republitheme_qrcode' ) );
		add_shortcode( 'clear', array( $this, 'republitheme_clear' ) );
	}

	/**
	 * Button shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Button HTML.
	 */
	function republitheme_button( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type'      => 'default',
			'size'      => false,
			'link'      => '#',
			'class'     => false,
			'tooltip'   => false,
			'direction' => 'top'
		), $atts ) );

		$html = '<a href="' . $link . '" class="btn';
		$html .= ( $type ) ? ' btn-' . $type : '';
		$html .= ( $size ) ? ' btn-' . $size : '';
		$html .= ( $class ) ? ' ' . $class : '';
		$html .= ( $tooltip ) ? ' odin-tooltip' : '';
		$html .= '"';
		$html .= ( $tooltip ) ? ' data-placement="' . $direction . '" data-toggle="tooltip" data-original-title="' . $tooltip . '"' : '';
		$html .= '>';
		$html .= do_shortcode( $content );
		$html .= '</a>';

		return $html;
	}

	/**
	 * Button Group shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Button Group HTML.
	 */
	function republitheme_button_group( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type'  => 'group',
			'size'  => false,
			'justified' => false
		), $atts ) );

		$html = '<div class="btn-' . $type . '';
		$html .= ( $size ) ? ' btn-group-' . $size : '';
		$html .= ( $justified ) ? ' btn-group-justified' : '';
		$html .= '">';
		$html .= str_replace( '<br />', '', do_shortcode( $content ) );
		$html .= '</div>';

		return $html;
	}

	/**
	 * Alert shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Alert HTML.
	 */
	function republitheme_alert( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type'  => 'info',
			'close' => false
		), $atts ) );

		$html = '<div class="alert alert-' . $type;
		$html .= ( $close ) ? ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' : '">';
		$html .= do_shortcode( $content );
		$html .= '</div>';

		return $html;
	}

	/**
	 * Label shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Label HTML.
	 */
	function republitheme_label( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type' => 'default'
		), $atts ) );

		return '<span class="label label-' . $type . '">' . do_shortcode( $content ) . '</span>';
	}

	/**
	 * Badge shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Badge HTML.
	 */
	function republitheme_badge( $atts, $content = null ) {
		return '<span class="badge">' . do_shortcode( $content ) . '</span>';
	}

	/**
	 * Icon shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 *
	 * @return string          Icon HTML.
	 */
	function republitheme_icon( $atts ) {
		extract( shortcode_atts( array(
			'type' => 'thumbs-up'
		), $atts ) );

		return '<span class="glyphicon glyphicon-' . $type . '"></span>';
	}

	/**
	 * Well shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Well HTML.
	 */
	function republitheme_well( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'size' => false
		), $atts ) );

		$html = '<div class="well';
		$html .= ( $size ) ? ' well-' . $size . '">' : '">';
		$html .= do_shortcode( $content );
		$html .= '</div>';

		return $html;
	}

	/**
	 * Table shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Table HTML.
	 */
	function republitheme_table( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type'   => false,
			'border' => false,
			'cols'   => '',
			'rows'   => ''
		), $atts ) );

		$html = '<table class="table';
		$html .= ( $type ) ? ' table-' . $type : '';
		$html .= ( $border ) ? ' table-bordered">' . PHP_EOL : '">' . PHP_EOL;
		$html .= '<thead>' . PHP_EOL;
		$html .= '<tr>' . PHP_EOL;

		foreach ( explode( ',', $cols ) as $col ) {
			$html .= '<th>' . $col . '</th>' . PHP_EOL;
		}

		$html .= '</tr>' . PHP_EOL;
		$html .= '</thead>' . PHP_EOL;
		$html .= '<tbody>' . PHP_EOL;

		foreach ( explode( '|', $rows ) as $row ) {
			$html .= '<tr>' . PHP_EOL;

			foreach ( explode( ',', $row ) as $item ) {
				$html .= '<td>' . $item . '</td>' . PHP_EOL;
			}

			$html .= '</tr>' . PHP_EOL;
		}

		$html .= '</tbody>' . PHP_EOL;
		$html .= '</table>' . PHP_EOL;

		return $html;
	}

	/**
	 * Row shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Row HTML.
	 */
	function republitheme_row( $atts, $content = null ) {
		return '<div class="row">' . str_replace( 'div><br />', 'div>', do_shortcode( $content ) ) . '</div>';
	}

	/**
	 * Col shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Col HTML.
	 */
	function republitheme_col( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'class' => false
		), $atts ) );

		$html = '<div';
		$html .= ( $class ) ? ' class="' . $class . '"' : '';
		$html .= '>';
		$html .= do_shortcode( $content );
		$html .= '</div>';

		return $html;
	}

	/**
	 * Progress shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Progress HTML.
	 */
	function republitheme_progress( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type'  => false,
			'class' => false,
			'value' => 50,
			'max'   => 100,
			'min'   => 0
		), $atts ) );

		$html = '<div class="progress';
		$html .= ( $class ) ? ' ' . $class . '">' : '">';
		$html .= '<div class="progress-bar';
		$html .= ( $type ) ? ' progress-bar-' . $type . '" ' : '" ';
		$html .= 'role="progressbar" ';
		$html .= 'aria-valuenow="' . $value . '" ';
		$html .= 'aria-valuemin="' . $min . '" ';
		$html .= 'aria-valuemax="' . $max . '" ';
		$html .= 'style="width: ' . $value . '%">';
		$html .= ( $content ) ? '<span class="sr-only">' . $content . '</span>' : '';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}

	/**
	 * Panel shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Panel HTML.
	 */
	function republitheme_panel( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'type'  => 'default'
		), $atts ) );

		return '<div class="panel panel-' . $type . '">' . str_replace( '<br />', '', do_shortcode( $content ) ) . '</div>';
	}

	/**
	 * Panel Heading shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Panel Heading HTML.
	 */
	function republitheme_panel_heading( $atts, $content = null ) {
		return '<div class="panel-heading">' . do_shortcode( $content ) . '</div>';
	}

	/**
	 * Panel Body shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Panel Body HTML.
	 */
	function republitheme_panel_body( $atts, $content = null ) {
		return '<div class="panel-body">' . do_shortcode( $content ) . '</div>';
	}

	/**
	 * Panel Footer shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Panel Footer HTML.
	 */
	function republitheme_panel_footer( $atts, $content = null ) {
		return '<div class="panel-footer">' . do_shortcode( $content ) . '</div>';
	}

	/**
	 * Tabs shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Tabs HTML.
	 */
	function republitheme_tabs( $atts, $content = null ) {
		return '<ul class="nav nav-tabs odin-tabs">' . str_replace( '<br />', '', do_shortcode( $content ) ) . '</ul>';
	}

	/**
	 * Tab shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Tab HTML.
	 */
	function republitheme_tab( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'id'     => '',
			'active' => false
		), $atts ) );

		$html = '<li';
		$html .= ( $active ) ? ' class="active"' : '';
		$html .= '>';
		$html .= '<a href="#' . $id . '">';
		$html .= do_shortcode( $content );
		$html .= '</a>';
		$html .= '</li>';

		return $html;
	}

	/**
	 * Tab Dropdown shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Tab Dropdown HTML.
	 */
	function republitheme_tab_dropdown( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'title' => '',
		), $atts ) );

		$id = sanitize_title( $title );

		$html = '<li class="dropdown">';
		$html .= '<a href="#" id="' . $id . '" class="dropdown-toggle" data-toggle="dropdown">';
		$html .= $title;
		$html .= ' <b class="caret"></b>';
		$html .= '</a>';
		$html .= '<ul class="dropdown-menu" role="menu" aria-labelledby="' . $id . '">';
		$html .= do_shortcode( $content );
		$html .= '</ul>';
		$html .= '</li>';

		return $html;
	}

	/**
	 * Tabs Contents shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Tabs Contents HTML.
	 */
	function republitheme_tab_contents( $atts, $content = null ) {
		return '<div class="tab-content">' . str_replace( '<br />', '', do_shortcode( $content ) ) . '</div>';
	}

	/**
	 * Tabs Content shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Tabs Content HTML.
	 */
	function republitheme_tab_content( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'id' => '',
			'active' => false,
		), $atts ) );

		$html = '<div class="tab-pane';
		$html .= ( $active ) ? ' active"' : '"';
		$html .= ' id="' . $id . '">';
		$html .= do_shortcode( $content );
		$html .= '</div>';

		return $html;
	}

	/**
	 * Accordions shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Accordions HTML.
	 */
	function republitheme_accordions( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'id' => 'odin-accordion',
		), $atts ) );

		$html = '<div class="panel-group odin-accordion" id="' . $id . '">';
		$html .= str_replace( '<br />', '', do_shortcode( $content ) );
		$html .= '</div>';

		return $html;
	}

	/**
	 * Accordion shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Accordion HTML.
	 */
	function republitheme_accordion( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'id'     => 'odin-accordion',
			'title'  => '',
			'type'   => 'default',
			'active' => false
		), $atts ) );

		$accordion = sanitize_title( $title );

		$html = '<div class="panel panel-' . $type . '">';
		$html .= '<div class="panel-heading"><h4 class="panel-title">';
		$html .= '<a class="accordion-toggle" data-toggle="collapse" data-parent="#' . $id . '" href="#' . $accordion . '">';
		$html .= $title;
		$html .= '</a>';
		$html .= '</h4></div>';
		$html .= '<div id="' . $accordion . '" class="panel-collapse collapse';
		$html .= ( $active ) ? ' in">' : '">';
		$html .= '<div class="panel-body">';
		$html .= do_shortcode( $content );
		$html .= '</div>';
		$html .= '</div>';
		$html .= '</div>';

		return $html;
	}

	/**
	 * Tooltip shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Tooltip HTML.
	 */
	function republitheme_tooltip( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'title'     => '',
			'link'      => '#',
			'direction' => 'top'
		), $atts ) );

		$html = '<a class="odin-tooltip" data-original-title="' . $title . '" href="' . $link .'" data-placement="' . $direction . '" data-toggle="tooltip">';
		$html .= do_shortcode( $content );
		$html .= '</a>';

		return $html;
	}

	/**
	 * Google Maps shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 * @param  string $content Content.
	 *
	 * @return string          Google Maps HTML.
	 */
	function republitheme_map( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'id'                => 'odin_map',
			'latitude'          => '0',
			'longitude'         => '0',
			'zoom'              => '10',
			'width'             => '600',
			'height'            => '400',
			'maptype'           => 'ROADMAP',
			'address'           => false,
			'kml'               => false,
			'kmlautofit'        => true,
			'marker'            => false,
			'markerimage'       => false,
			'traffic'           => false,
			'bike'              => false,
			'fusion'            => false,
			'infowindow'        => false,
			'infowindowdefault' => true,
			'hidecontrols'      => 'false',
			'scale'             => 'false',
			'scrollwheel'       => 'true'
		), $atts ) );

		// JS var.
		$id = str_replace( '-', '_', $id );

		$html = '<div class="odin-map" id="' . $id . '" style="width: ' . $width . 'px; height: ' . $height . 'px;"></div>';

		$js = '<script type="text/javascript" src="//maps.google.com/maps/api/js?sensor=false"></script>';
		$html .= apply_filters( 'odin_map_shortcode_js_' . $id, $js );
		$html .= '<script type="text/javascript">var latlng = new google.maps.LatLng(' . $latitude . ', ' . $longitude . ');var myOptions = {zoom: ' . $zoom . ',center: latlng,scrollwheel: ' . $scrollwheel .',scaleControl: ' . $scale .',disableDefaultUI: ' . $hidecontrols .',mapTypeId: google.maps.MapTypeId.' . $maptype . '};var ' . $id . ' = new google.maps.Map(document.getElementById("' . $id . '"), myOptions);';

		// Kml.
		if ( $kml ) {
			if ( $kmlautofit ) {
				$html .= 'var kmlLayerOptions = {preserveViewport:true};';
			} else {
				$html .= 'var kmlLayerOptions = {preserveViewport:false};';
			}

			$html .= 'var kmllayer = new google.maps.KmlLayer("' . html_entity_decode( $kml ) . '", kmlLayerOptions);
				kmllayer.setMap(' . $id . ');';
		}

		// Traffic.
		if ( $traffic ) {
			$html .= 'var trafficLayer = new google.maps.TrafficLayer();trafficLayer.setMap(' . $id . ');';
		}

		// Bike.
		if ( $bike ) {
			$html .= 'var bikeLayer = new google.maps.BicyclingLayer();bikeLayer.setMap(' . $id . ');';
		}

		// Fusion tables.
		if ( $fusion ) {
			$html .= 'var fusionLayer = new google.maps.FusionTablesLayer(' . $fusion . ');fusionLayer.setMap(' . $id . ');';
		}

		// Address.
		if ( $address ) {
			$html .= 'var geocoder_' . $id . ' = new google.maps.Geocoder();var address = \'' . $address . '\';geocoder_' . $id . '.geocode( { \'address\': address}, function(results, status) { if (status == google.maps.GeocoderStatus.OK) {' . $id . '.setCenter(results[0].geometry.location);';

			if ( $marker ) {
				// Add custom image.
				if ( $markerimage ) {
					$html .= 'var image = "'. $markerimage .'";';
				}

				$html .= 'var marker = new google.maps.Marker({ map: ' . $id . ',';
				if ( $markerimage ) {
					$html .= 'icon: image,';
				}

				$html .= 'position: ' . $id . '.getCenter() });';

				// Infowindow
				if ( $infowindow ) {
					// First convert and decode html chars.
					$thiscontent = htmlspecialchars_decode( $infowindow );
					$html .= 'var contentString = "' . $thiscontent . '";var infowindow = new google.maps.InfoWindow({content: contentString});google.maps.event.addListener(marker, \'click\', function() { infowindow.open(' . $id . ',marker);});';

					// Infowindow default
					if ( $infowindowdefault ) {
						$html .= 'infowindow.open(' . $id . ', marker);';
					}
				}
			}

			$html .= '} else { document.getElementById(' . $id . ').style.display = "block"; }});';
		}

		// Marker: show if address is not specified.
		if ( $marker && $address ) {
			// Add custom image.
			if ( $markerimage ) {
				$html .= 'var image = "'. $markerimage .'";';
			}

			$html .= 'var marker = new google.maps.Marker({ map: ' . $id . ',';

			if ( $markerimage ) {
				$html .= 'icon: image,';
			}

			$html .= 'position: ' . $id . '.getCenter()});';

			// Infowindow.
			if ( $infowindow ) {
				$html .= 'var contentString = "' . $infowindow . '";var infowindow = new google.maps.InfoWindow({content: contentString});google.maps.event.addListener(marker, \'click\', function() {infowindow.open(' . $id . ',marker);});';

				// Infowindow default
				if ( $infowindowdefault ) {
					$html .= 'infowindow.open(' . $id . ',marker);';
				}
			}
		}

		$html .= '</script>';

		return $html;
	}

	/**
	 * QR Code shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 *
	 * @return string          QR Code HTML.
	 */
	function republitheme_qrcode( $atts ) {
		extract( shortcode_atts( array(
			'data'  => '',
			'size'  => '150x150',
			'title' => ''
		), $atts ) );

		$url = 'http://api.qrserver.com/v1/create-qr-code/?data=' . rawurlencode( $data ) . '&size=' . $size;

		return '<img src="' . $url . '" title="' . $title . '" title="' . $title . '" />';
	}

	/**
	 * Clear Float shortcode.
	 *
	 * @param  array  $atts    Shortcode attributes.
	 *
	 * @return string          Clear Float HTML.
	 */
	function republitheme_clear( $atts ) {
		return '<br class="clear" />';
	}

}

new Republitheme_Shortcodes;
