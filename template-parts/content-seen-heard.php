<?php
/**
 * The default template for displaying Seen & Heard tagged content
 *
 * Used for both single and index/archive/search.
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
	<?php
	if ( is_single() ) {
		the_title( '<h1 class="entry-title">', '</h1>' );
	} else {
		the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	}
	?>
	</header>

	<div class="grid-x">
		<div class="cell large-9">
			<div class="entry-content">
				<?php the_content(); ?>
				<cite>
					<?php if ( function_exists( 'get_field' ) && get_field( 'seen_heard_citation' ) ) : ?>
						<?php the_field( 'seen_heard_citation' ); ?>
					<?php endif; ?>
					<?php if ( function_exists( 'get_field' ) && get_field( 'seen_heard_source' ) || get_field( 'seen_heard_source_date' ) ) : ?>
						<p class="source"><em><?php the_field( 'seen_heard_source' ); ?></em>, <?php the_field( 'seen_heard_source_date' ); ?></p>
					<?php endif; ?>
				</cite>
				<?php edit_post_link( __( '(Edit)', 'asmagazine' ), '<span class="edit-link">', '</span>' ); ?>
			</div>
		</div>
	</div>
	
</article>
