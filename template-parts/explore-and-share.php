<?php
/**
 * Template part for explore topics and social bar
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div class="tags-share callout">
	<div class="grid-x">
		<?php if(get_the_tag_list()) : ?>
		<div class="cell small-12 large-8">
			<div class="related-tags">
				<h5>Explore Related Topics:
					<?php echo get_the_tag_list('<span class="tags">',', ','</span>');  ?>
				</h5>
			</div>
		</div>
		<?php endif; ?>
		<div class="cell small-12 large-4">
			<div class="share-section">
				<ul class="menu simple">
					<li class="menu-text">Share This Story:</li>
					<li>
						<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" target="_blank" aria-label="Share this on Facebook"><span class="fab fa-facebook fa-2x"></span><span class="screen-reader-text">Facebook</span></a>
					</li>
					<li>
						<a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ) ?>&amp;url=<?php echo urlencode( get_permalink() ); ?>&amp;via=JHUArtsSciences" target="_blank" aria-label="Share this on Twitter"><span class="fab fa-twitter fa-2x"></span><span class="screen-reader-text">Twitter</span></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
