<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

get_header();
?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-container" id="page">
	<div class="main-grid">
		<main class="main-content">
			<?php
			if ( function_exists( 'yoast_breadcrumb' ) ) {
				yoast_breadcrumb( '<p class="breadcrumbs" id="breadcrumbs">', '</p>' );
			}
			?>
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php
get_footer();
