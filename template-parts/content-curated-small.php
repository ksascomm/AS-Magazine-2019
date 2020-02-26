<?php $field = get_field_object('curated_order'); $value = $field['value']; ?>
<article class="curated-post small order-<?php echo $value; ?>" aria-labelledby="post-<?php the_ID(); ?>">
	<div class="card">
		<div class="card-section">
			<?php $categories = get_the_category();
			if ( ! empty( $categories ) ) {
			    echo '<a class="button small category" href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a>';
			}?>	
			<header>		
				<div class="post-image">
					<?php the_post_thumbnail(array( 350, 350)); ?>
				</div>
				<h1>
					<a href="<?php the_permalink(); ?>" id="post-<?php the_ID(); ?>"><?php the_title(); ?></a>
				</h1>	
			</header>
			<div class="excerpt">
				<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?>
					<p><?php the_field( 'ecpt_tagline' ); ?></p>
				<?php else: ?>
					<?php the_excerpt();?>
				<?php endif;?>
			</div>
		</div>
	</div>
</article>