<?php
/**
 * The sidebar containing the main widget area
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<?php if(is_tag()):?>
	<aside class="sidebar">
		<ul class="vertical menu tag-list">
			<li class="tag-title">Other Topics</li>
		    <?php
		        $tags = get_tags();
		        foreach ( $tags as $tag ) :
		        $tag_link = get_tag_link( $tag->term_id );
		    ?>
		    <li class="tag-link">
		        <a href='<?php echo $tag_link; ?>' title='<?php echo $tag->name; ?>' class='<?php echo $tag->slug ?>'><?php echo $tag->name ?></a>
		    </li>
		    <?php
		        endforeach;
		    ?>
		</ul>
	</aside>
<?php endif;?>