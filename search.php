<?php
/**
 * The template for displaying search results pages.
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

get_header();
?>

<div class="main-container" id="page">
	<div class="main-grid">
		<main id="search-results" class="main-content">

		<header>
			<h1 class="entry-title"><?php _e( 'Search Results for', 'asmagazine' ); ?> "<?php echo esc_attr( get_search_query() ); ?>"</h1>
		</header>

		<gcse:search></gcse:search>


		</main>
	<?php get_sidebar(); ?>

	</div>
</div>
<?php
get_footer();
