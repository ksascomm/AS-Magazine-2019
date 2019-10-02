<?php
/**
 * Template part for vertical featured images on 2019+ era features
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php $volume = get_the_volume($post); $volume_name = get_the_volume_name($post);?>
<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if ( has_post_thumbnail( $post->ID ) ) : ?>

<div class="grid-container">
	<div class="grid-x grid-padding-x vertical-featured-image-box">
		<div class="cell small-12 large-6">
			<div class="vertical-featured-image">
				<?php //the_post_thumbnail('cover-story-vertical-large'); ?>
				<img src="https://via.placeholder.com/650x700/68ace5/000000" alt="image">
			</div>
		</div>
		<div class="cell small-12 large-6">
			<div class="vertical-featured-image-text">
				<h1><?php the_title(); ?></h1>
				<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?> 
					<h2><?php the_field( 'ecpt_tagline' ); ?></h2>
				<?php endif;?>
				<div class="entry-meta">
					<?php foundationpress_entry_meta(); ?>
					<?php $volume_name = get_the_volume_name($post); ?>
						<p class="byline issue">Issue: <a href="<?php echo get_permalink( $post->post_parent ); ?>"><?php echo $volume_name; ?></a></p>
					<?php if ( function_exists('get_field') && get_field('ecpt_other_credits')):?> 
						<p class="byline credits"><?php the_field( 'ecpt_other_credits' );?></p>
					<?php endif;?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php endif;
