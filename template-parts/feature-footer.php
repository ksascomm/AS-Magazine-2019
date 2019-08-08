<?php
/**
 * Template part for footers on features
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php $volume = get_the_volume($post); $volume_name = get_the_volume_name($post);?>
<?php $features_footer_query = new WP_Query(array(
		'post_type' => 'page',
		'tax_query' => array (
		'relation' => 'AND',array (
			'taxonomy' => 'volume',
			'terms' => array( $volume, 'feature' ),
			'field' => 'slug',
			'include_children' => false,
			'operator' => 'AND')),
		'order' => 'ASC',
		'post__not_in' => array( $post->ID ),
		'posts_per_page' => 5));
			
if ($features_footer_query->have_posts()) : ?>
<div class="related-features-container">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<h3>Other <?php echo $volume_name; ?> Features</h3>

			<div class="grid-x grid-padding-x small-up-2 medium-up-3">
				<?php while ($features_footer_query->have_posts()) : $features_footer_query->the_post(); ?>
				<div class="cell">
					<div class="card feature">
						<?php the_post_thumbnail('home-featured'); ?>
						<div class="card-section">
							<h4><a href="<?php the_permalink() ?>"><?php the_title();?></a></h4>
							<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?>
								<p><?php the_field( 'ecpt_tagline' ); ?></p>
							<?php else: ?>
								<p><?php get_the_excerpt();?></p>
							<?php endif;?>
						</div>
					</div>
				</div>
				<?php endwhile;?>
			</div>
		</div>
	</div>
</div>
<?php endif;?>