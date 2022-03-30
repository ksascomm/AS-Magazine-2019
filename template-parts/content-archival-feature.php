<?php
/**
 * The default template for displaying News content
 *
 * Used for both single and index/archive/search.
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	<div class="entry-meta">
		<?php asmagazine_entry_meta(); ?>
		<p class="byline issue">
			<?php $volume_name = get_the_volume_name( $post ); ?>
			Issue: <a href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo $volume_name; ?></a>
		</p>		
		<p class="byline other-credits">
			<?php if ( function_exists( 'get_field' ) && get_field( 'ecpt_other_credits' ) ) : ?>
				<?php the_field( 'ecpt_other_credits' ); ?>
			<?php endif; ?>
		</p>
	</div>
	<?php
	if ( function_exists( 'get_field' ) && get_field( 'show_featured_image' ) == 1 ) {
			get_template_part( 'template-parts/featured-image' );
	} else {
		// do nothing
	}
	?>
	</header>
	<div class="grid-x">
		<div class="cell large-9">
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</article>
