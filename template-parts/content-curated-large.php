<div class="curated-post large">
	<div class="card">
		<div class="card-section">
			<?php $categories = get_the_category();
			if ( ! empty( $categories ) ) {
			    echo '<a class="button small category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
			}?>	
			<h1><?php $field = get_field_object('curated_order'); $value = $field['value']; ?>
			<?php echo $value; ?>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>
			<div class="excerpt">
				<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?>
				<p><?php the_field( 'ecpt_tagline' ); ?></p>
				<?php else: ?>
				<?php the_excerpt();?>
				<?php endif;?>
			</div>
			<div class="post-image">
				<?php //the_post_thumbnail(array( 650, 650)); ?>
				<img src="http://via.placeholder.com/650x350" alt="">
			</div>	
		</div>
	</div>
</div>