<?php

//Collect current theme option values
	function asmag_get_global_options(){
		$asmag_option = array();
		$asmag_option 	= get_option('asmag_options');
	return $asmag_option;
	}

//Function to call theme options in theme files
	$asmag_option = asmag_get_global_options();

function get_the_volume($post) {
			wp_reset_query();
			$post = get_queried_object_id();
			$terms = get_the_terms($post, 'volume');
			$asmag_option = asmag_get_global_options();
			if(is_array($terms)) {
				$term_slugs = array();
				foreach( $terms as $term) {
					if($term->slug != 'feature') {
						$term_slugs[] = $term->slug;
					}
					$volume = implode('', $term_slugs); }
				} else { $volume = $terms['volume']; }
			if(isset($_GET['volume'])) {
				$volume = $_GET['volume'];
			}
			if ($volume == null) {
			$volume = $asmag_option['asmag_current_issue']; }
	return $volume;
}

function get_the_volume_name($post) {
	$post = get_queried_object_id();
	$terms = get_the_terms($post, 'volume');
	$asmag_option = asmag_get_global_options();

		if(is_array($terms)) {
			$term_names = array();
			foreach( $terms as $term) {
				if($term->name != 'Feature') {
					$term_names[] = $term->name;
				}
			 }
			 $volume_name = implode('', $term_names);
		}

		else { $volume_name = $terms; }

		if(isset($_GET['volume'])) {
			$new_volume = $_GET['volume'];
			$new_volume_data = get_term_by('slug', $new_volume, 'volume');
			$volume_name = $new_volume_data->name;
		}

		if ($volume_name == null) {
			$new_volume = $asmag_option['asmag_current_issue'];
			$new_volume_data = get_term_by('slug', $new_volume, 'volume');
			$volume_name = $new_volume_data->name;
		}

	return $volume_name;
}

// add tag and category support to pages
function tags_categories_support_all() {
  register_taxonomy_for_object_type('post_tag', 'page');
  register_taxonomy_for_object_type('category', 'page');  
}

// ensure all tags and categories are included in queries
function tags_categories_support_query($wp_query) {
  if ($wp_query->get('tag')) $wp_query->set('post_type', 'any');
  if ($wp_query->get('category_name')) $wp_query->set('post_type', 'any');
}

// tag and category hooks
add_action('init', 'tags_categories_support_all');
add_action('pre_get_posts', 'tags_categories_support_query');