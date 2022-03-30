<?php
/**
 * The default template for displaying search results content
 *
 * Used for both single and index/archive/search.
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

?>
<article aria-labelledby="post-<?php the_ID(); ?>" <?php post_class( 'post-listing news-article single-search-result' ); ?>>
	<header>
		<h3>
			<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>">	
				<?php the_title(); ?>
			</a>
		</h3>
		<h4>
			<?php $volume_name = get_the_volume_name( $post ); ?>
			Issue: <?php echo $volume_name; ?>
		</h4>
	</header>

	<div class="entry-content">
		<?php
		$content         = get_the_excerpt();
		$trimmed_content = wp_trim_words( $content, 15, '...' );
		?>
		<p><?php echo $trimmed_content; ?></p>
	</div>	
</article>
