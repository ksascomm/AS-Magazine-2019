<?php
/**
 * Specific functions for this theme
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

/**
 * Collect current theme option values.
 */
function asmag_get_global_options() {
	$asmag_option = array();
	$asmag_option = get_option( 'asmag_options' );
	return $asmag_option;
}
/**
 * Function to call theme options in theme files.
 */
$asmag_option = asmag_get_global_options();
function get_the_volume( $post ) {
	wp_reset_postdata();
	$post         = get_queried_object_id();
	$terms        = get_the_terms( $post, 'volume' );
	$asmag_option = asmag_get_global_options();
	if ( is_array( $terms ) ) {
		$term_slugs = array();
		foreach ( $terms as $term ) {
			if ( $term->slug != 'feature' ) {
				$term_slugs[] = $term->slug;
			}
			$volume = implode( '', $term_slugs ); }
	} else {
		$volume = $terms['volume']; }
	if ( isset( $_GET['volume'] ) ) {
		$volume = $_GET['volume'];
	}
	if ( $volume == null ) {
		$volume = $asmag_option['asmag_current_issue']; }
	return $volume;
}

/**
 * Get the Volume Name
 */
function get_the_volume_name( $post ) {
	$post         = get_queried_object_id();
	$terms        = get_the_terms( $post, 'volume' );
	$asmag_option = asmag_get_global_options();

	if ( is_array( $terms ) ) {
		$term_names = array();
		foreach ( $terms as $term ) {
			if ( $term->name != 'Feature' ) {
				$term_names[] = $term->name;
			}
		}
		$volume_name = implode( '', $term_names );
	} else {
		$volume_name = $terms; }

	if ( isset( $_GET['volume'] ) ) {
		$new_volume      = $_GET['volume'];
		$new_volume_data = get_term_by( 'slug', $new_volume, 'volume' );
		$volume_name     = $new_volume_data->name;
	}

	if ( $volume_name == null ) {
		$new_volume      = $asmag_option['asmag_current_issue'];
		$new_volume_data = get_term_by( 'slug', $new_volume, 'volume' );
		$volume_name     = $new_volume_data->name;
	}

	return $volume_name;
}

/**
 * Add tag and category support to pages.
 */
function tags_categories_support_all() {
	register_taxonomy_for_object_type( 'post_tag', 'page' );
	register_taxonomy_for_object_type( 'category', 'page' );
}

/**
 * Ensure all tags and categories are included in queries.
 */
function tags_categories_support_query( $wp_query ) {
	if ( $wp_query->get( 'tag' ) ) {
		$wp_query->set( 'post_type', 'any' );
	}
	if ( $wp_query->get( 'category_name' ) ) {
		$wp_query->set( 'post_type', 'any' );
	}
}

// tag and category hooks.
add_action( 'init', 'tags_categories_support_all' );
add_action( 'pre_get_posts', 'tags_categories_support_query' );

/**
 * Add PAGE post type to author.php loop.
 */
function wpbrigade_author_custom_post_types( $query ) {
	if ( is_author() && empty( $query->query_vars['suppress_filters'] ) ) {
		$query->set(
			'post_type',
			array(
				'post',
				'page',
			)
		);
		return $query;
	}
}
add_filter( 'pre_get_posts', 'wpbrigade_author_custom_post_types' );
