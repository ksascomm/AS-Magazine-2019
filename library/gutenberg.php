<?php

if ( ! function_exists( 'asmagazine_gutenberg_support' ) ) :
	function asmagazine_gutenberg_support() {

		// Enable widge alignments
		add_theme_support( 'align-wide' );

    // Add foundation color palette to the editor
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __( 'Primary Color', 'asmagazine' ),
            'slug' => 'primary',
            'color' => '#31261d',
        ),
        array(
            'name' => __( 'Secondary Color', 'asmagazine' ),
            'slug' => 'secondary',
            'color' => '#002d72',
        )
    ) );

	}

	add_action( 'after_setup_theme', 'asmagazine_gutenberg_support' );
endif;

/**
 * Gutenberg scripts
 * @link https://www.billerickson.net/block-styles-in-gutenberg/
 */
function custom_gutenberg_scripts() {
	wp_enqueue_script(
		'custom-editor',
		get_stylesheet_directory_uri() . '/gutenberg-editor/editor.js',
		array( 'wp-blocks', 'wp-dom' ),
		filemtime( get_stylesheet_directory() . '/gutenberg-editor/editor.js' ),
		true
	);
}
add_action( 'enqueue_block_editor_assets', 'custom_gutenberg_scripts' );

add_action( 'after_setup_theme', 'custom_gutenberg_css' );

function custom_gutenberg_css(){

	add_theme_support( 'editor-styles' ); // if you don't add this line, your stylesheet won't be added.
	add_editor_style( 'gutenberg-editor/editor-style.css' ); // tries to include editor-style.css directly from your theme folder.

}
