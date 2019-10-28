<?php
/**
 * The default template for displaying posts on a category or tax Archive Page (issue name is below the permalink)
 *
 * Used for both single and index/archive/search.
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<?php 
$issues = get_the_terms($post->ID, 'volume');
if($issues && !is_wp_error($issues)) :
$issue_names = array();
foreach($issues as $issue) {
	if($issue->term_id !=114) { //exclude "Feature" from echo
		$issue_names[] = $issue->name;
	}
}
$issue_name = join(" ", $issue_names); endif; ?>
<div class="cell">
    <div class="taxonomy-archive card">
		<article aria-labelledby="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<?php if ( has_post_thumbnail( $post->ID ) ) : ?>
					<div class="related-image-box">          
			            <?php the_post_thumbnail('related-posts');?>
			        </div>
		    	<?php endif;?>
				<h1>
					<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a>
				</h1>
				<h2><?php echo $issue_name; ?></h2>
			</header>
			<div class="entry-content">
				<?php
		        $content = get_the_excerpt();
		  		$trimmed_content = wp_trim_words( $content, 15, '...' );
		        ?>
		  		<p><?php echo $trimmed_content; ?></p>
			</div>
		</article>
	</div>
</div>