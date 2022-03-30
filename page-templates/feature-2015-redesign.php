<?php
/**
 * Template Name: Feature (2015 Redesign)
 */

get_header();
?>

<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_asmag_css' ) ) : ?> 
	<style><?php the_field( 'ecpt_asmag_css' ); ?></style>
<?php endif; ?>

<?php
$volume_name = get_the_volume_name( $post );
?>

<?php get_template_part( 'template-parts/featured-image-horizontal' ); ?>
<div class="main-container" id="page">
	<div class="main-grid feature-2015">
		<main class="main-content features">
			<?php
			while ( have_posts() ) :
				the_post();
				?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="hide-for-medium">
						<h1><?php the_title(); ?></h1>
					<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_tagline' ) ) : ?> 
						<h2><?php the_field( 'ecpt_tagline' ); ?></h2>
					<?php endif; ?>
					</header>
					<div class="entry-content">
						<div class="entry-meta">
						<?php asmagazine_entry_meta(); ?>
						<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_other_credits' ) ) : ?> 
							<p class="byline credits"><?php the_field( 'ecpt_other_credits' ); ?></p>
						<?php endif; ?>
							<p class="byline issue">Issue: <a href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo $volume_name; ?></a></p>
						</div>
						<?php the_content(); ?>
						<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_second_section' ) ) : ?> 
							<div class="second-section">
								<p><?php the_field( 'ecpt_second_section' ); ?></p>
							</div>
						<?php endif; ?>	
						<?php edit_post_link( __( '(Edit)', 'asmagazine' ), '<span class="edit-link">', '</span>' ); ?>
					</div>
				</article>
			<?php endwhile; ?>
		</main>		
	</div>
	<?php get_template_part( 'template-parts/explore-and-share' ); ?>
</div>
<?php get_template_part( 'template-parts/feature', 'footer' ); ?>
<?php
get_footer();
