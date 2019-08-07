<?php
/**
 * Template part for related posts on single.php
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php 
$categories = get_the_category();
$thiscat = $categories[0]->cat_ID;
$catname = $categories[0]->name;
$catslug = $categories[0]->slug;

$tags = wp_get_post_tags($post->ID);
if ($tags) :?>
<div class="related-posts-container">
	<div class="grid-container">
		<h3>Related Stories</h3>
		<div class="grid-x grid-margin-x small-up-2 medium-up-4">		
		 <?php //list 4 post titles related to first tag on current post

		 	$first_tag = $tags[0]->term_id;
			$first_tag_name = $tags[0]->name;
			$related_posts_query = new WP_Query(array(
				'tag__in' => array($first_tag),
				'post__not_in' => array($post->ID),
				'orderby' => 'rand',
				'posts_per_page' => 4,
			)); ?>
			<?php if( $related_posts_query->have_posts() ) : while ($related_posts_query->have_posts()) : $related_posts_query->the_post(); 
				$issues = get_the_terms($post->ID, 'volume');
				if($issues && !is_wp_error($issues)) :
				$issue_names = array();
				foreach($issues as $issue) {
					$issue_names[] = $issue->name;
				}
				$issue_name = join(" ", $issue_names); endif; ?>
				<div class="cell">
					<div class="card">
						<div class="related-image-box">
							<div class="category-title">
								<?php echo $catname ;?>
							</div>
							<?php the_post_thumbnail('home-featured');?>
						</div>
						<div class="card-section">
							<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
							<h5><?php echo $issue->name; ?></h5>
						</div>
					</div>
				</div>
			<?php endwhile; endif; wp_reset_query();?>
		</div>
	</div>
</div>
<?php endif; ?>