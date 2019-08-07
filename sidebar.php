<?php
/**
 * The sidebar containing the main widget area
 *
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php if(is_single()):?>
<?php
$categories = get_the_category();
$thiscat = $categories[0]->cat_ID;
$catname = $categories[0]->name;
$catslug = $categories[0]->slug;
$volume = get_the_volume($post); 
$volume_name = get_the_volume_name($post); 
?>
<aside class="sidebar">
	<ul class="no-bullet">
		<?php foundationpress_entry_meta(); ?>
		<?php if ( function_exists('get_field') && get_field('ecpt_byline')) : ?>
			<li class="byline author">Written by <?php the_field( 'ecpt_byline' );?></li>
		<?php endif;?>
		<?php $volume_name = get_the_volume_name($post);?>
		<li>Category: <?php $categories = get_the_category(); if ( ! empty( $categories ) ) { echo '<a href="'.$categories[0]->slug.'">'. $categories[0]->name . '</a>';   } ?></li>
		<li>Issue: <?php echo $volume_name; ?></li>
		<li>Share This Story<br>			
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode( get_permalink() ); ?>" target="_blank"><span class="fab fa-facebook fa-2x"></span><span class="screen-reader-text">Facebook</span></a>		
			<a href="https://twitter.com/intent/tweet?text=<?php echo urlencode( get_the_title() ) ?>&amp;url=<?php echo urlencode( get_permalink() ); ?>&amp;via=JHUArtsSciences" target="_blank" title="Share this on Twitter"><span class="fab fa-twitter fa-2x"></span><span class="screen-reader-text">Twitter</span></a>
			<a href="#" data-open="exampleModal1"><span class="fa fa-envelope fa-2x"></span><span class="screen-reader-text">Email</span></a>
		</li>
	</ul>
	<div class="reveal" id="exampleModal1" data-reveal>
		<?php echo FrmFormsController::show_form('2', $key = '', $title=true, $description=true);?>
		<button class="close-button" data-close aria-label="Close modal" type="button">
		<span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="other-tags">
		<h4>Magazine Sections</h4>
			<div class="button-group">
				<?php $departments = get_terms('category', array(
				          'orderby'     => 'ID',
				          'post_type' => 'post',
				          'include' => array(1, 69, 76, 70,), //get IDs for News, Alumni, Student Digest, Big Ideas
				          'order'     => 'ASC',
				          'hide_empty'  => true,
				          //'parent'      => '81',
				          ));
					if ( ! empty( $departments ) && ! is_wp_error( $departments ) ) {
			            $count = count( $departments );
			            $i = 0;
			            $department_list = '';
			            foreach ( $departments as $department ) {
			                $i++;
			              $department_list .= '<a href="' . get_term_link( $department ) . '"class="button ' . $department->slug . '" title="' . sprintf( __( 'View all post filed under %s', 'my_localization_domain' ), $department->name ) . '">' . $department->name . '</a>';
			            }
			            echo $department_list;
			        } ?>
			</div>
	</div>	

</aside>
<?php endif;?>

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