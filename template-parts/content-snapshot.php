<?php
/**
 * The default template for displaying Snapshot tagged content
 *
 * Used for both single and index/archive/search.
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

?>
<?php
$categories  = get_the_category();
$thiscat     = $categories[0]->cat_ID;
$catname     = $categories[0]->name;
$catslug     = $categories[0]->slug;
$volume_name = get_the_volume_name( $post );
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
			<?php asmagazine_entry_meta(); ?>
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
		<div class="cell large-10">
			<div class="entry-content">
			<?php the_content(); ?>
			<?php edit_post_link( __( '(Edit)', 'asmagazine' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
		</div>
	</div>
</article>
