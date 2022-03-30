<?php
/**
 * Register widget areas
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

if ( ! function_exists( 'asmagazine_sidebar_widgets' ) ) :
	function asmagazine_sidebar_widgets() {
		register_sidebar(
			array(
				'id'            => 'sidebar-widgets',
				'name'          => __( 'Sidebar widgets', 'asmagazine' ),
				'description'   => __( 'Drag widgets to this sidebar container.', 'asmagazine' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h6>',
				'after_title'   => '</h6>',
			)
		);

		register_sidebar(
			array(
				'id'            => 'footer-widgets',
				'name'          => __( 'Footer widgets', 'asmagazine' ),
				'description'   => __( 'Drag widgets to this footer container', 'asmagazine' ),
				'before_widget' => '<section id="%1$s" class="widget %2$s">',
				'after_widget'  => '</section>',
				'before_title'  => '<h6>',
				'after_title'   => '</h6>',
			)
		);
	}

	add_action( 'widgets_init', 'asmagazine_sidebar_widgets' );
endif;
