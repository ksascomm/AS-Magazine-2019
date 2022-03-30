<?php
/**
 * The default template for displaying page content
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>
	<div class="entry-content">
		<?php the_content(); ?>
		<?php edit_post_link( __( '(Edit)', 'asmagazine' ), '<span class="edit-link">', '</span>' ); ?>
	</div>
</article>
