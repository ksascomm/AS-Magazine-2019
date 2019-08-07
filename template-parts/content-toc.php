<?php
/**
 * The default template for displaying posts on a the Table of Contents page template
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>



<div class="grid-x grid-padding-x grid-margin-x story">
	<div class="cell small-12 large-9">
        <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
        	<!--<?php $posttags = get_the_tags();
			if ($posttags) :
			  foreach($posttags as $tag) :?>
			  	<p class="button"><?php echo $tag->name;?></p>
			<?php endforeach; endif;?>-->
			<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?> 
				<p><?php the_field( 'ecpt_tagline' ); ?></p>
			<?php else: ?>
			<?php the_excerpt();?>
		<?php endif;?>
    </div>
</div>