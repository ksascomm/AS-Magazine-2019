<?php
/**
 * Template part for featured images on 2019+ era features
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
	<?php if ( function_exists('get_field') && get_field('header_background_color')):?> 
		<style>
			.feature-2019-redesign-heading {
				 background-color: <?php the_field('header_background_color'); ?>;
			}
		</style>
	<?php endif;?>
	<header class="feature-2019-redesign-heading" role="banner" data-interchange="[<?php the_post_thumbnail_url( 'featured-small' ); ?>, small], [<?php the_post_thumbnail_url( 'featured-medium' ); ?>, medium], [<?php the_post_thumbnail_url( 'featured-large' ); ?>, large], [<?php the_post_thumbnail_url( 'full' ); ?>, xlarge]">
		<div class="feature-2019-redesign-heading-area hide-for-small-only">
			<div class="feature-2019-redesign-heading-text">
				<h1><?php the_title(); ?></h1>
				<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?> 
					<h2><?php the_field( 'ecpt_tagline' ); ?></h2>
				<?php endif;?>
				<?php if ( function_exists('get_field') && get_field('ecpt_author_byline')):?> 
					<h4>By <?php the_field( 'ecpt_author_byline' );?></h4>
				<?php endif;?>
				<?php if ( function_exists('get_field') && get_field('ecpt_other_credits')):?> 
					<h4><?php the_field( 'ecpt_other_credits' );?></h4>
				<?php endif;?>
			</div>
		</div>
	</header>
<?php endif;
