<?php
/*
Template Name: Feature (Vertical Featured Image)
*/
get_header(); ?>

<?php $volume = get_the_volume($post); $volume_name = get_the_volume_name($post);?>

<?php get_template_part( 'template-parts/featured-image-vertical' ); ?>
<div class="main-container" id="page">
	<div class="main-grid feature-2019">
		<main class="main-content features">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<div class="entry-content">
						<?php the_content(); ?>
						<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
					</div>
				</article>
			<?php endwhile; ?>
		</main>
	</div>
<?php get_template_part('template-parts/explore-and-share');?>
		
</div>
<?php get_template_part( 'template-parts/feature', 'footer' ); ?>

<?php get_footer();
