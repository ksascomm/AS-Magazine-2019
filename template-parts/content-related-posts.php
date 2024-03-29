<?php
/**
 * Template part for related posts on single.php
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

?>
<?php
$categories = get_the_category();
$thiscat    = $categories[0]->cat_ID;
$catname    = $categories[0]->name;
$catslug    = $categories[0]->slug;

$tags = wp_get_post_tags( $post->ID );
if ( $tags ) :
	?>
<div class="related-posts-container" role="complementary" aria-labelledby="comp2">
	<div class="grid-container">
		<h3 id="comp2">Related Stories</h3>
		<div class="grid-x grid-margin-x small-up-1 medium-up-2 large-up-4">		
		<?php
			// list 4 post titles related to first tag on current post

			$first_tag           = $tags[0]->term_id;
			$first_tag_name      = $tags[0]->name;
			$related_posts_query = new WP_Query(
				array(
					'tag__in'        => array( $first_tag ),
					'post__not_in'   => array( $post->ID ),
					'orderby'        => 'rand',
					'posts_per_page' => 4,
				)
			);
		?>
			<?php
			if ( $related_posts_query->have_posts() ) :
				while ( $related_posts_query->have_posts() ) :
					$related_posts_query->the_post();
					$issues = get_the_terms( $post->ID, 'volume' );
					if ( $issues && ! is_wp_error( $issues ) ) :
						$issue_names = array();
						foreach ( $issues as $issue ) {
							$issue_names[] = $issue->name;
						}
						$issue_name = join( ' ', $issue_names );
				endif;
					?>
				<article class="cell related-post" aria-labelledby="post-<?php the_ID(); ?>">
					<div class="card">
						<div class="related-image-box">
							<div class="category-title">
								<?php echo $catname; ?>
							</div>
							<?php the_post_thumbnail( 'related-posts' ); ?>
						</div>
						<div class="card-section">
							<h4><a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a></h4>
							<h5><?php echo $issue->name; ?></h5>
						</div>
					</div>
				</article>
							<?php
			endwhile;
endif;
			wp_reset_postdata();
			?>
		</div>
	</div>
</div>
<?php endif; ?>
