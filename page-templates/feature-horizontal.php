<?php
/*
Template Name: Feature (Horizontal Featured Image)
*/
get_header(); ?>


<?php $volume = get_the_volume($post); $volume_name = get_the_volume_name($post);?>

<?php get_template_part( 'template-parts/featured-image-horizontal' ); ?>
<div class="main-container" id="page">
	<div class="main-grid feature-2019">
		<main class="main-content features">
			<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="small-title-tag">
					<div class="show-for-small-only">
						<h1><?php the_title(); ?></h1>
					<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?> 
						<h2><?php the_field( 'ecpt_tagline' ); ?></h2>
					<?php endif;?>
					</div>
					<div class="entry-meta">
						<?php foundationpress_entry_meta(); ?>
						<?php $volume_name = get_the_volume_name($post); ?>
							<p class="byline issue">Issue: <a href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo $volume_name; ?></a></p>
						<?php if ( function_exists('get_field') && get_field('ecpt_other_credits')):?> 
							<p class="byline credits"><?php the_field( 'ecpt_other_credits' );?></p>
						<?php endif;?>
					</div>				
					</header>
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
<div class="grid-container">
	<?php comments_template(); ?>
</div>
<?php get_footer();
