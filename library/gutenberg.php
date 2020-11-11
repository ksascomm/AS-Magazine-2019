<?php

if ( ! function_exists( 'foundationpress_gutenberg_support' ) ) :
	function foundationpress_gutenberg_support() {

    // Add foundation color palette to the editor
    add_theme_support( 'editor-color-palette', array(
        array(
            'name' => __( 'Primary Color', 'foundationpress' ),
            'slug' => 'primary',
            'color' => '#31261d',
        ),
        array(
            'name' => __( 'Secondary Color', 'foundationpress' ),
            'slug' => 'secondary',
            'color' => '#002d72',
        )
    ) );

	}

	add_action( 'after_setup_theme', 'foundationpress_gutenberg_support' );
endif;
