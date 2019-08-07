<?php
/*
Template Name: Front
*/
?>

<?php get_header(); ?>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php $volume = get_the_volume($post); $parent = get_queried_object_id();
	$asmag_homepage_features_query = new WP_Query(array(
		'post_type' => 'page',
		'volume' => $volume,
		'post_parent' => $parent,
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => '5'
	));
	$asmag_homepage_news_query = new WP_Query(array(
		'post_type' => 'post',
		'volume' => $volume,
		'category__in' => array(1),
		'orderby' => 'modified',
		'order' => 'DESC',
		'post__not_in' => array(8019),
		'posts_per_page' => '-1'
	));
	$asmag_homepage_highlighted_news_query = new WP_Query(array(
		'post_type' => 'post',
		'volume' => $volume,
		'title' => "Dean's Desktop",
		'category__in' => array(1),
		'orderby' => 'modified',
		'order' => 'DESC',
		'posts_per_page' => '1'
	));	
	$asmag_homepage_bigideas_query = new WP_Query(array(
		'post_type' => 'post',
		'volume' => $volume,
		'category__in' => array(70),
		'orderby' => 'modified',
		'order' => 'DESC',
		'posts_per_page' => '-1'
	));
	$asmag_homepage_students_query = new WP_Query(array(
		'post_type' => 'post',
		'volume' => $volume,
		'category__in' => array(76),
		'orderby' => 'modified',
		'order' => 'DESC',
		'posts_per_page' => '-1'
	));
	$asmag_homepage_alumni_query = new WP_Query(array(
		'post_type' => 'post',
		'volume' => $volume,
		'category__in' => array(69),
		'orderby' => 'modified',
		'order' => 'DESC',
		'posts_per_page' => '-1'
	));	
	$asmag_homepage_snapshot_query = new WP_Query(array(
		'post_type' => 'post',
		'volume' => $volume,
		'tag' => 'Snapshot',
		'posts_per_page' => '1'
));	?>


<?php $volume = get_the_volume($post); $parent = get_queried_object_id();
		$asmag_homepage_coverstory_query = new WP_Query(array(
			'post_type' => 'page',
			'volume' => $volume,
			'post_parent' => $parent,
			//category must be 'Cover Story!'
			'category__in' => array(136),
			'orderby' => 'menu_order',
			'order' => 'ASC',
			'posts_per_page' => '1'
		));
		?>
	<?php if ( $asmag_homepage_coverstory_query->have_posts() ) : while ($asmag_homepage_coverstory_query->have_posts()) : $asmag_homepage_coverstory_query->the_post(); ?>
		<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
		<div class="cover-story" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: center;">
			<div class="middle-content-section">
				<div class="marketing">
					<div class="tagline">
						<h1><span class="cover">Cover Story:</span><br><?php the_title();?></h1>
						<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?>
						<h4><?php the_field( 'ecpt_tagline' ); ?></h4>
						<?php endif;?>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile;?>

	<?php endif;?>


<div class="grid-container">
	<div class="grid-x grid-padding-x padding-top">
		<div class="large-12 cell">
			<div class="inside-issue">
				<h1 class="hide-for-small-only inside-issue-title">In this Issue</h1>
			</div>
			<?php if ( $asmag_homepage_features_query->have_posts() ) : ?>
			<div class="toc features home">
				<h3>Features</h3>
				<div class="grid-x grid-padding-x small-up-1 medium-up-2 large-up-4">
					<?php while ($asmag_homepage_features_query->have_posts()) : $asmag_homepage_features_query->the_post(); ?>
					<div class="cell">
						<div class="card">
							<a href="<?php the_permalink();?>"><?php the_post_thumbnail('home-featured');?></a>
							<div class="card-section">
								<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
								<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?>
								<p><?php the_field( 'ecpt_tagline' ); ?></p>
								<?php else: ?>
								<?php the_excerpt();?>
								<?php endif;?>
							</div>
						</div>
					</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
			<?php endif;?>
		</div>
	</div>
</div>
<div class="news-section">
<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div class="large-12 cell">
			<div class="toc news home">
				<h3>News</h3>
				<div class="grid-x grid-padding-x">
					<div class="cell small-12 large-8">
						<div class="highlighted-article">
							<h4>Featured Article</h4>
							<?php if ( $asmag_homepage_highlighted_news_query->have_posts() ) : while ($asmag_homepage_highlighted_news_query->have_posts()) : $asmag_homepage_highlighted_news_query->the_post(); ?>
							<div class="media-object stack-for-small">
  								<div class="media-object-section">
									<?php the_post_thumbnail('home-post', array('class' => 'home-post-image')); ?>
								</div>
								<div class="media-object-section middle">
									<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
									<?php echo strip_tags( get_the_excerpt() ); ?>
								</div>
							</div>	
							<?php endwhile; endif;?>
						</div>
					</div>
					<div class="cell small-12 large-4">
						<div class="also-news">
							<h4>Also in News</h4>
							<?php if ( $asmag_homepage_news_query->have_posts() ) : ?>
							<ul class="fa-ul no-left-margin">
							<?php while ($asmag_homepage_news_query->have_posts()) : $asmag_homepage_news_query->the_post(); ?>
								<li><span class="fa-li" ><i class="fas fa-newspaper"></i></span><a href="<?php the_permalink();?>"><?php the_title(); ?></a></li>
							<!--<div class="cell">
								<div class="card">
									<a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'home-post', array( 'class' => 'home-post-image aligncenter' ) );?></a>
									<div class="card-section">
										<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
										<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?>
										<p><?php the_field( 'ecpt_tagline' ); ?></p>
										<?php else: ?>
										<?php the_excerpt();?>
										<?php endif;?>
									</div>
								</div>
							</div>-->
							
						<?php endwhile; wp_reset_postdata(); ?>
						</ul>
					</div>
					</div>
				</div>
			</div>
			<?php endif;?>
		</div>
	</div>
</div>
</div>
<?php if ( $asmag_homepage_snapshot_query->have_posts() ) : while ($asmag_homepage_snapshot_query->have_posts()) : $asmag_homepage_snapshot_query->the_post(); ?>
<div class="snapshot-section">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<?php get_template_part( 'template-parts/content', 'snapshot' ); ?>
		</div>
	</div>	
</div>
<?php endwhile; endif;?>
<div class="bigidea-section">
<div class="grid-container">
	<div class="grid-x grid-padding-x">
		<div class="large-12 cell">
			<?php if ($asmag_homepage_bigideas_query->have_posts() ) : ?>
			<div class="toc home">
				<h3>Big Ideas</h3>
				<div class="grid-x grid-padding-x small-up-1 medium-up-5">
					<?php while ($asmag_homepage_bigideas_query->have_posts()) : $asmag_homepage_bigideas_query->the_post(); ?>
					<div class="cell">
						<div class="card">
							<a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'home-post', array( 'class' => 'home-post-image aligncenter' ) );?></a>
							<div class="card-section">
								<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
								<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?>
								<p><?php the_field( 'ecpt_tagline' ); ?></p>
								<?php else: ?>
								<?php the_excerpt();?>
								<?php endif;?>
							</div>
						</div>
					</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
			<?php endif;?>
		</div>
	</div>
</div>
</div>
<div class="student-section">
<div class="grid-container">	
	<div class="grid-x grid-padding-x">
		<div class="large-12 cell">
			<?php if ($asmag_homepage_students_query->have_posts() ) : ?>
			<div class="toc home">
				<h3>Student Digest</h3>
				<div class="grid-x grid-padding-x small-up-1 medium-up-3 large-up-5">
					<?php while ($asmag_homepage_students_query->have_posts()) : $asmag_homepage_students_query->the_post(); ?>
					<div class="cell">
						<div class="card">
							<a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'home-post', array( 'class' => 'home-post-image aligncenter' ) );?></a>
							<div class="card-section">
								<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
								<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?>
								<p><?php the_field( 'ecpt_tagline' ); ?></p>
								<?php else: ?>
								<?php the_excerpt();?>
								<?php endif;?>
							</div>
						</div>
					</div>
					<?php endwhile; wp_reset_postdata(); ?>
				</div>
			</div>
			<?php endif;?>
		</div>
	</div>
</div>
</div>
<div class="alumni-section">
	<div class="grid-container">
		<div class="grid-x grid-padding-x">
			<div class="large-12 cell">
				<?php if ($asmag_homepage_alumni_query->have_posts() ) : ?>
				<div class="toc home">
					<h3>Alumni</h3>
					<div class="grid-x grid-padding-x small-up-1 medium-up-4">
						<?php while ($asmag_homepage_alumni_query->have_posts()) : $asmag_homepage_alumni_query->the_post(); ?>
						<div class="cell">
							<div class="card">
								<a href="<?php the_permalink();?>"><?php the_post_thumbnail( 'home-post', array( 'class' => 'home-post-image aligncenter' ) );?></a>
								<div class="card-section">
									<h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
									<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?>
									<p><?php the_field( 'ecpt_tagline' ); ?></p>
									<?php else: ?>
									<?php the_excerpt();?>
									<?php endif;?>
								</div>
							</div>
						</div>
						<?php endwhile; wp_reset_postdata(); ?>
					</div>
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>
</div>
<div class="multimedia-section">
	<div class="grid-container">
		<div class="grid-x grid-padding-x multimedia">
			<div class="large-6 cell">
				<div class="home-video">
					<h1><a href="https://www.youtube.com/user/jhuksas"><span class="fab fa-youtube"></span> Magazine Video Extras</a></h1>
					<!--get video ID and place in data-id-->
					<div class="youtube-player" data-id="9Ivh-63QpCM"></div>
					<p>TG to build a custom field that contains the video info?</p>
				</div>
			</div>
			<div class="large-4 large-offset-2 cell">
				<div class="instagram-feed">
					<h1><a href="https://www.instagram.com/JHUArtsSciences/"><span class="fab fa-instagram"></span> JHUArtsSciences</a></h1>
					<div class="instagram-images">
						<?php echo do_shortcode('[instagram-feed disablelightbox=true]');?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer();