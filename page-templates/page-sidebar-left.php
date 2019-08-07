<?php
/*
Template Name: Left Sidebar
*/
get_header(); ?>

<?php get_template_part( 'template-parts/featured-image' ); ?>
<div class="main-container">
	<div class="main-grid sidebar-left">
		<main class="main-content">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
			  yoast_breadcrumb( '<p class="breadcrumbs" id="breadcrumbs">','</p>' );
			}
			?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'page' ); ?>
			<?php endwhile; ?>
		 </main>
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();
