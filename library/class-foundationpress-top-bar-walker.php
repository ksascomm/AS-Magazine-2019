<?php
/**
 * Customize the output of menus for Foundation top bar
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

/**
 * Big thanks to Brett Mason (https://github.com/brettsmason) for the awesome walker
 */

if ( ! class_exists( 'asmagazine_Top_Bar_Walker' ) ) :
	class asmagazine_Top_Bar_Walker extends Walker_Nav_Menu {
		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent  = str_repeat( "\t", $depth );
			$output .= "\n$indent<ul class=\"dropdown menu vertical\" data-toggle>\n";
		}
	}
endif;
