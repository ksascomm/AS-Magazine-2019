<?php
/**
 * Enqueue all styles and scripts
 *
 * Learn more about enqueue_script: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_script}
 * Learn more about enqueue_style: {@link https://codex.wordpress.org/Function_Reference/wp_enqueue_style }
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

// Check to see if rev-manifest exists for CSS and JS static asset revisioning
// https://github.com/sindresorhus/gulp-rev/blob/master/integration.md

if ( ! function_exists( 'asmagazine_asset_path' ) ) :
	function asmagazine_asset_path( $filename ) {
		$filename_split = explode( '.', $filename );
		$dir            = end( $filename_split );
		$manifest_path  = dirname( dirname( __FILE__ ) ) . '/dist/assets/' . $dir . '/rev-manifest.json';

		if ( file_exists( $manifest_path ) ) {
			$manifest = json_decode( file_get_contents( $manifest_path ), true );
		} else {
			$manifest = array();
		}

		if ( array_key_exists( $filename, $manifest ) ) {
			return $manifest[ $filename ];
		}
		return $filename;
	}
endif;


if ( ! function_exists( 'asmagazine_scripts' ) ) :
	function asmagazine_scripts() {

		// Enqueue the main Stylesheet.
		wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/dist/assets/css/app.css', array(), filemtime( get_template_directory() . '/src/assets/scss' ), 'all' );

		// Enqueue Foundation scripts
		wp_enqueue_script( 'foundation', get_stylesheet_directory_uri() . '/dist/assets/js/' . asmagazine_asset_path( 'app.js' ), array( 'jquery' ), '4.0.0', true );

		// Add the comment-reply library on pages where it is necessary
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	add_action( 'wp_enqueue_scripts', 'asmagazine_scripts' );
endif;

// Defer non-essential/plugin javascript files.
// Defer jQuery Parsing using the HTML5 defer property.
function defer_parsing_of_js( $url ) {
	if ( is_user_logged_in() ) {
		return $url; // don't break WP Admin!
	}
	if ( false === strpos( $url, '.js' ) ) {
		return $url;
	}
	if ( strpos( $url, 'jquery.min.js' ) ) {
		return $url;
	}
	return str_replace( ' src', ' defer src', $url );
}
add_filter( 'script_loader_tag', 'defer_parsing_of_js', 10 );


/**
 * Font Awesome Kit Setup
 *
 * This will add your Font Awesome Kit to the front-end, the admin back-end,
 * and the login screen area.
 */
if ( ! function_exists( 'fa_custom_setup_kit' ) ) {
	function fa_custom_setup_kit( $kit_url = '' ) {
		foreach ( array( 'wp_enqueue_scripts', 'admin_enqueue_scripts', 'login_enqueue_scripts' ) as $action ) {
			add_action(
				$action,
				function () use ( $kit_url ) {
					wp_enqueue_script( 'font-awesome-kit', $kit_url, array(), '6.5.1', false );
				}
			);
		}
	}
}

fa_custom_setup_kit( 'https://kit.fontawesome.com/72c92fef89.js' );
