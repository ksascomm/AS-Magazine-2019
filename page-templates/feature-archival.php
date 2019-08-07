<?php
/*
Template Name: Feature (Archival)
*/
get_header(); ?>


<?php if ( function_exists('get_field') && get_field('ecpt_asmag_css')):?> 
	<style><?php the_field( 'ecpt_asmag_css' );?></style>
<?php endif;?>

<?php $volume = get_the_volume($post); $volume_name = get_the_volume_name($post);?>

<div class="main-container">
	<div class="main-grid feature-archive">
		<main class="main-content-full-width">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
			  yoast_breadcrumb( '<p class="breadcrumbs" id="breadcrumbs">','</p>' );
			}
			?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php get_template_part( 'template-parts/content', 'archival-feature' ); ?>
			<?php endwhile; ?>
		</main>
	</div>
	<?php get_template_part('template-parts/explore-and-share');?>
</div>
<?php get_template_part( 'template-parts/feature', 'footer' ); ?>
<?php get_footer();
