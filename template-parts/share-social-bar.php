<?php
/**
 * Template part for sticky social bar
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div class="share-section">
	<h4>Share This Story</h4>
	<ul class="menu">
		<li>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" target="_blank" aria-label="Share this on Facebook"><span class="fab fa-facebook fa-2x"></span><span class="screen-reader-text">Facebook</span></a>
		</li>
		<li>
			<a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ) ?>&amp;url=<?php echo urlencode( get_permalink() ); ?>&amp;via=JHUArtsSciences" target="_blank" aria-label="Share this on Twitter"><span class="fab fa-twitter fa-2x"></span><span class="screen-reader-text">Twitter</span></a>
		</li>
	</ul>
</div>
