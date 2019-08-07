<?php
/**
 * The default template for displaying Snapshot tagged content
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php
$categories = get_the_category();
$thiscat = $categories[0]->cat_ID;
$catname = $categories[0]->name;
$catslug = $categories[0]->slug;
$volume = get_the_volume($post); 
$volume_name = get_the_volume_name($post); 
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="post-header">
		<?php
			if ( is_single() ) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			}
		?>
		<div class="entry-meta">
			<p class="byline issue"><?php echo $volume_name; ?></p>
			<?php foundationpress_entry_meta(); ?>
		</div>
		<?php if ( get_field( 'show_featured_image' ) == 0 ) { 
			} else { 
				get_template_part( 'template-parts/featured-image' ); 
			} 
		?>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php edit_post_link( __( '(Edit)', 'foundationpress' ), '<span class="edit-link">', '</span>' ); ?>
		</div>	
	</div>
	<footer>
		<div class="grid-x">
			<div class="cell small-12 large-6">
				<div class="related-tags">
					<h5>Explore Related Topics: <?php echo get_the_tag_list('<span class="tags">',', ','</span>'); ?></h5>
				</div>
			</div>
			<div class="cell small-12 large-6">
				<?php get_template_part( 'template-parts/share-social-bar' ); ?>
			</div>
		</div>	
	</footer>
</article>
