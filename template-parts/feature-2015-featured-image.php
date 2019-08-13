<?php
/**
 * Template part for featured images on 2015 era features
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<?php
// If a featured image is set, insert into layout and use Interchange
// to select the optimal image size per named media query.
if ( has_post_thumbnail( $post->ID ) ) : ?>
	<header class="feature-2015-redesign-heading" role="banner" data-interchange="[<?php the_post_thumbnail_url( 'featured-small' ); ?>, small], [<?php the_post_thumbnail_url( 'featured-medium' ); ?>, medium], [<?php the_post_thumbnail_url( 'featured-large' ); ?>, large], [<?php the_post_thumbnail_url( 'full' ); ?>, xlarge]">
		<div class="feature-2015-redesign-heading-area show-for-large">
			<div class="feature-2015-redesign-heading-text">
				<h1><?php the_title(); ?></h1>
				<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?> 
					<h2><?php the_field( 'ecpt_tagline' ); ?></h2>
				<?php endif;?>
			</div>
		</div>
	</header>
<?php endif;
