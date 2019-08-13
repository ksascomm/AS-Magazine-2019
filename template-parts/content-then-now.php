<?php
/**
 * The default template for displaying Then & Now categorized content
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
	<?php if ( function_exists('get_field') && get_field( 'show_featured_image' ) == 1 ) {
			get_template_part( 'template-parts/featured-image' ); 
		} else {
		//do nothing	
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
<div id="then-now-container" class="twentytwenty-container">
  <?php $then_image = get_field( 'then_image' ); ?>
<?php if ( $then_image ) { ?>
	<img src="<?php echo $then_image['url']; ?>" alt="<?php echo $then_image['alt']; ?>" />
<?php } ?>
<?php $now_image = get_field( 'now_image' ); ?>
<?php if ( $now_image ) { ?>
	<img src="<?php echo $now_image['url']; ?>" alt="<?php echo $now_image['alt']; ?>" />
<?php } ?>
</div>
