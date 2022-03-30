<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package ASMagazine
 * @since ASMagazine 1.0.0
 */

if ( have_comments() ) :
	?>
	<section id="comment-section">
		<?php

		wp_list_comments(
			array(
				'walker'            => new asmagazine_Comments(),
				'max_depth'         => '',
				'style'             => 'ol',
				'callback'          => null,
				'end-callback'      => null,
				'type'              => 'all',
				'reply_text'        => __( 'Reply', 'asmagazine' ),
				'page'              => '',
				'per_page'          => '',
				'avatar_size'       => 48,
				'reverse_top_level' => null,
				'reverse_children'  => '',
				'format'            => 'html5',
				'short_ping'        => false,
				'echo'              => true,
				'moderation'        => __( 'Your comment is awaiting moderation.', 'asmagazine' ),
			)
		);

		?>
		<?php
			asmagazine_the_comments_pagination();
		?>
	</section>
	<?php
endif;
?>

<?php

	/*
	Do not delete these lines.
	Prevent access to this file directly
	*/

	defined( 'ABSPATH' ) || die( __( 'Please do not load this page directly. Thanks!', 'asmagazine' ) );

if ( post_password_required() ) {
	?>
	<section id="comments">
		<div class="notice">
			<p class="bottom"><?php _e( 'This post is password protected. Enter the password to view comments.', 'asmagazine' ); ?></p>
		</div>
	</section>
	<?php
	return;
}
?>

<?php
if ( comments_open() ) :
	?>
<section id="response">
	<?php
		comment_form(
			array(
				'class_submit' => 'button',
			)
		);
	?>
</section>
	<?php
	endif; // If you delete this the sky will fall on your head.
