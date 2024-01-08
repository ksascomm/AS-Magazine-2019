<?php
/**
 * Entry meta information for posts
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

if ( ! function_exists( 'asmagazine_entry_meta' ) ) :
	function asmagazine_entry_meta() {
		$author = get_post_field( 'post_author', get_the_ID() );
		// KSASComm.
		if ( $author == '1' ) {
			echo '<p class="byline author">' . __( 'By Magazine Staff', 'asmagazine' ) . '</p>';
		} elseif ( $author == '2' ) {
			// KSASComm.
			echo '<p class="byline author">' . __( 'By Magazine Staff', 'asmagazine' ) . '</p>';

		} elseif ( $author == '5' ) {
			// Kathy.
			echo '<p class="byline author">' . __( 'By Magazine Staff', 'asmagazine' ) . '</p>';

		} elseif ( $author == '151' ) {
			// Morgan.
			echo '<p class="byline author">' . __( 'By Magazine Staff', 'asmagazine' ) . '</p>';

		} elseif ( $author == '378' ) {
			// Rebecca.
			echo '<p class="byline author">' . __( 'By Magazine Staff', 'asmagazine' ) . '</p>';

		} else {
			if ( is_plugin_active( 'publishpress-authors-pro/publishpress-authors-pro.php' ) ) {
				do_action( 'pp_multiple_authors_show_author_box', false, 'inline' );
			} else {
				echo '<p class="byline author">' . __( 'By', 'asmagazine' ) . ' <a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" rel="author" class="fn">' . get_the_author() . '</a></p>';
			}
		}
	}
endif;
