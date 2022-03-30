<?php
/**
 * Entry meta information for posts
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

if ( ! function_exists( 'asmagazine_entry_meta' ) ) :
	function asmagazine_entry_meta() {
		$author = get_post_field('post_author', get_the_ID());
		//KSASComm
		if ($author == '1') {
			echo '<p class="byline author">' . __( 'By Magazine Staff', 'asmagazine' ) . '</p>';

		}
		//Also KSASComm
		elseif ($author == '2') {
			echo '<p class="byline author">' . __( 'By Magazine Staff', 'asmagazine' ) . '</p>';

		}
		//Kathy
		elseif ($author == '5') {
			echo '<p class="byline author">' . __( 'By Magazine Staff', 'asmagazine' ) . '</p>';

		}
		//Morgan
		elseif ($author == '151') {
			echo '<p class="byline author">' . __( 'By Magazine Staff', 'asmagazine' ) . '</p>';

		}
		//Rebecca
		elseif ($author == '378') {
			echo '<p class="byline author">' . __( 'By Magazine Staff', 'asmagazine' ) . '</p>';

		}
		else {
				if ( is_plugin_active('publishpress-authors-pro/publishpress-authors-pro.php') ) {
					echo '<p class="byline author">' . __( 'By', 'asmagazine' );
					do_action( 'pp_multiple_authors_show_author_box', false, 'inline' );
					echo '</p>';
				} else {
					echo '<p class="byline author">' . __( 'By', 'asmagazine' ) . ' <a href="' . get_author_posts_url( get_the_author_meta( 'ID' ) ) . '" rel="author" class="fn">' . get_the_author() . '</a></p>';
					/* translators: %1$s: current date, %2$s: current time */
					//echo '<time class="updated" datetime="' . get_the_time( 'c' ) . '">' . sprintf( __( 'Posted on %1$s at %2$s.', 'asmagazine' ), get_the_date(), get_the_time() ) . '</time>';
				}
		}
	}
endif;
