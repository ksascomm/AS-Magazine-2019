<?php
/*
Template Name: Feature (2015 Redesign)
*/
get_header(); ?>


<?php if ( function_exists('get_field') && get_field('ecpt_asmag_css')):?> 
	<style><?php the_field( 'ecpt_asmag_css' );?></style>
<?php endif;?>

<?php $volume = get_the_volume($post); $volume_name = get_the_volume_name($post);?>

<?php get_template_part( 'template-parts/feature-2015-featured-image' ); ?>
<div class="main-container">
	<div class="main-grid feature-2015">
		<main class="main-content features" >
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="show-for-small-only">
					<h1><?php the_title(); ?></h1>
					<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?> 
						<h2><?php the_field( 'ecpt_tagline' ); ?></h2>
					<?php endif;?>
					</header>
					<div class="entry-content" id="sticky">
						<?php if ( function_exists('get_field') && get_field('ecpt_other_credits')):?> 
							<h4><?php the_field( 'ecpt_other_credits' );?></h4>
						<?php endif;?>
						<h5>Issue: <a href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo $volume_name; ?></a></h5>
						<?php the_content(); ?>
						<?php if ( function_exists('get_field') && get_field('ecpt_second_section')):?> 
							<div class="second-section">
								<p><?php the_field( 'ecpt_second_section' );?></p>
							</div>
						<?php endif; ?>	
						<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
					</div>
				</article>
			<?php endwhile; ?>
		</main>
		<?php get_template_part( 'template-parts/sticky-social-bar' ); ?>
		
	</div>
</div>
<?php get_template_part( 'template-parts/feature', 'footer' ); ?>
<?php get_footer();
