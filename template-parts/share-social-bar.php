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
		<li>
			<a href="#" data-open="exampleModal1"><span class="fa fa-envelope fa-2x"></span><span class="screen-reader-text">Email</span></a>
		</li>
	</ul>
	<div class="reveal" id="exampleModal1" data-reveal>
		<?php echo FrmFormsController::show_form('2', $key = '', $title=true, $description=true);?>
		<button class="close-button" data-close aria-label="Close modal" type="button">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
</div>