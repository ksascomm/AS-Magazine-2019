<?php
/*
Template Name: Front Curated
*/
?>

<?php get_header(); ?>

<?php do_action( 'foundationpress_before_content' ); ?>
<?php 
$currentissue = asmag_get_theme_option( 'input_example' );

$volume = get_the_volume($post); $parent = get_queried_object_id();
	$asmag_homepage_coverstory_query = new WP_Query(array(
		'post_type' => 'page',
		'volume' => $currentissue,
		//'post_parent' => $parent,
		//category must be 'Cover Story!'
		'category__in' => array(136),
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'posts_per_page' => 1
	));
	$asmag_homepage_highlighted_news_query = new WP_Query(array(
		'post_type' => 'post',
		'volume' => $currentissue,
		'title' => "Dean's Desktop",
		'category__in' => array(1),
		'orderby' => 'modified',
		'order' => 'DESC',
		'posts_per_page' => 1
	));
	$asmag_homepage_seenheard_news_query = new WP_Query(array(
		'post_type' => 'post',
		'volume' => $currentissue,
		'tag' => 'seen-heard',
		'orderby' => 'rand',
		'order' => 'DESC',
		'posts_per_page' => 1
	));		
	$curated_content = (array(
		'posts_per_page' => 6,
		'post_type' => array('post', 'page'),
		'volume' => $currentissue,
		'meta_query' => array(
			array(
		 		'key' => 'curated_content',
				'value' => '1',
				'compare' => '='
		 	),
		 ),
		'meta_key' => 'curated_order',
		'orderby' => 'meta_value',
		'order'=>'ASC'
	));

	$asmag_homepage_news_query = new WP_Query(array(
		'post_type' => 'post',
		'volume' => $currentissue,
		'category__in' => array(1),
		'tag__not_in' => array(100,141),
		'orderby' => 'modified',
		'order' => 'DESC',
		'posts_per_page' => '-1'
	));	
?>

	<?php if ( $asmag_homepage_coverstory_query->have_posts() ) : while ($asmag_homepage_coverstory_query->have_posts()) : $asmag_homepage_coverstory_query->the_post(); ?>
		<?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
		<div class="cover-story show-for-large" style="background: url('<?php echo $backgroundImg[0]; ?>') no-repeat; background-size: cover; background-position: center;">
			<div class="middle-content-section">
				<div class="marketing">
					<a href="<?php the_permalink();?>">
					<div class="tagline">
						<h1><span class="cover">Cover Story:</span>
							<?php the_title();?></h1>
						<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?>
						<h2><?php the_field( 'ecpt_tagline' ); ?></h2>
						<?php endif;?>
					</div>
					</a>
				</div>
			</div>
		</div>
		<!--Mobile Version-->
		<div class="cover-story mobile hide-for-large">
			<div class="cover-story-image">
				<?php the_post_thumbnail('featured-medium'); ?>
			</div>
			<div class="grid-container">
				<div class="grid-x grid-padding-x padding-top">
					<div class="cover-story-title">
						<h1>Cover Story: <?php the_title(); ?></h1>
					</div>					
					<div class="cover-story-excerpt">
						<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?>
							<p><?php the_field( 'ecpt_tagline' ); ?></p>
						<?php else: ?>
							<?php the_excerpt();?>
						<?php endif;?>
						<p><a href="<?php the_permalink();?>" class="button">Read This Story</a></p>
					</div>
				</div>
			</div>
		</div>

	<?php endwhile; endif;?>
	<div class="curated-posts-section-wrapper">
		<div class="grid-container">
			<div class="grid-x grid-padding-x padding-top">
				<?php $curated_content_query = new WP_Query($curated_content);
				//$count = 0;
				if ($curated_content_query->have_posts()) : ?>
					<div class="curated-posts grid-x">
						<h1 class="show-for-small-only">Inside this Issue</h1>
						<?php
						while ($curated_content_query->have_posts()) : $curated_content_query->the_post();
						//$count++; 
						//if ($count == 1 || $count == 6) :
						if ( function_exists('get_field') && ( get_field('curated_order') == '1' || get_field('curated_order') == '6')): ?>
							<div class="cell small-12 large-6">
								<?php get_template_part( 'template-parts/content', 'curated-large' ); ?>
							</div>
						<?php else: ?>
							<div class="cell small-12 large-3">
								<?php get_template_part( 'template-parts/content', 'curated-small' ); ?>
							</div>
						<?php endif; endwhile;?>
					</div>
				<?php wp_reset_postdata(); endif;?>
				<?php if ( function_exists('get_field') && get_field('current_issue_link')):?>
				<div class="cell small-12 cta-section">
					<div class="float-right cta-link">
						<h3>
							<?php $current_issue_link = get_field( 'current_issue_link' ); ?>
							<?php if ( $current_issue_link ) { ?>
								<a href="<?php echo $current_issue_link; ?>">View The Rest Of This Issue <span class="fas fa-arrow-circle-right"></span></a>
							<?php } ?>
						
						</h3>
					</div>
				</div>
				<?php endif;?>				
			</div> 
		</div>
	</div>
	<div class="section-spacer"></div>
	<div class="news-section-wrapper">
		<div class="grid-container">
			<h1>News</h1>
			<div class="grid-x grid-padding-x padding-top">
				<?php if($asmag_homepage_news_query->have_posts()) :?>
				<div class="news-section">
					<div class="news-carousel" data-equalizer>
					<?php while ($asmag_homepage_news_query->have_posts() ) : $asmag_homepage_news_query->the_post(); ?>
						
						<div data-equalizer-watch>
							<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
							<?php if ( function_exists('get_field') && get_field('ecpt_tagline')):?>
								<p><?php the_field( 'ecpt_tagline' ); ?></p>
							<?php else: ?>
								<?php the_excerpt();?>
							<?php endif;?>
						</div>						
					
					<?php endwhile;?>
					</div>	
				</div> 
				<?php wp_reset_postdata(); endif;?>
				<?php if ( function_exists('get_field') && get_field('contact_link')):?>
				<div class="cell small-12 cta-section">
					<div class="float-right cta-link">
						<h3>
							<?php $contact_link = get_field( 'contact_link' ); ?>
							<?php if ( $contact_link ) { ?>
								<a href="<?php echo $contact_link; ?>">Send Us Your News <span class="far fa-thumbs-up"></span></a>
							<?php } ?>							
						</h3>
					</div>
				</div>
				<?php endif;?>
			</div>
		</div>
	</div>
	<div class="section-spacer"></div>
	<div class="dean-seen-section-wrapper">	
		<div class="grid-container">
			<div class="grid-x grid-padding-x padding-top" data-equalizer>
			<?php if ( $asmag_homepage_highlighted_news_query->have_posts() ) : while ($asmag_homepage_highlighted_news_query->have_posts()) : $asmag_homepage_highlighted_news_query->the_post(); ?>
				<div class="cell small-12 large-6">	
					<div class="callout deans-desktop" data-equalizer-watch>
						<h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
						<div class="media-object stack-for-small">
								<div class="media-object-section">
								<?php the_post_thumbnail('home-post', array('class' => 'home-post-image')); ?>
							</div>
							<div class="media-object-section middle">
								<?php echo strip_tags( get_the_excerpt() ); ?>
							</div>
						</div>
					</div>
				</div>	
				<?php endwhile; wp_reset_postdata(); endif;?>
				
				<?php if ( $asmag_homepage_seenheard_news_query->have_posts() ) : while ($asmag_homepage_seenheard_news_query->have_posts()) : $asmag_homepage_seenheard_news_query->the_post(); ?>
					<div class="cell small-12 large-6">
						<div class="callout seen-heard" data-equalizer-watch>
						<?php $seenheardtags = get_the_tags();
							if ( ! empty( $seenheardtags ) ) {
							    echo '<a class="button small tag" href="' . esc_url( get_tag_link( $seenheardtags[0]->term_id ) ) . '">' . esc_html( $seenheardtags[0]->name ) . '</a>';
							}?>							
							<blockquote><?php the_content();?></blockquote>
							<cite>
								<?php if ( function_exists('get_field') && get_field('seen_heard_citation')):?>
									<?php the_field( 'seen_heard_citation' ); ?>
								<?php endif;?>
								<?php if ( function_exists('get_field') && get_field('seen_heard_source')):?>
									<?php the_field( 'seen_heard_source' ); ?>
								<?php endif;?>
							</cite>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata(); endif;?>
			</div>
		</div>
	</div>
	<div class="section-spacer"></div>
	<div class="social-section-wrapper">
		<div class="grid-container">
			<h1>Social</h1>
 				<?php echo do_shortcode('[instagram-feed disablelightbox=true hovertextcolor=#fff hovercolor=#ff0000 hoverdisplay="caption"]');?>
			<div class="grid-x grid-padding-x padding-top">
			<div class="cell small-12 cta-section">
					<div class="float-right cta-link">
						<ul class="menu simple">
							<li class="text">Follow us @jhuartsciences</li>
							<li><a href="http://facebook.com/JHUArtsSciences"><span class="fab fa-facebook fa-2x"></span><span class="screen-reader-text">Facebook</span></a></li>
							<li><a href="https://www.instagram.com/JHUArtsSciences/"><span class="fab fa-instagram fa-2x"></span><span class="screen-reader-text">Instagram</span></a></li>
							<li><a href="https://twitter.com/JHUArtsSciences"><span class="fab fa-twitter fa-2x"></span><span class="screen-reader-text">Twitter</span></a></li>
							<li><a href="https://www.youtube.com/user/jhuksas"><span class="fab fa-youtube fa-2x"></span><span class="screen-reader-text">YouTube</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="section-spacer"></div>
	<div class="past-issues-section-wrapper">
		<div class="grid-container">
			<h1>Browse Issues</h1>
			<div class="grid-x grid-padding-x padding-top small-up-2 medium-up-4">
				<div class="cell">
					<div class="past-issue card">
						<p>
							<a href="https://magazine.local/spring-2019-v16n2/"><img src="http://magazine.local/wp-content/uploads/2019/05/Sp19-ASMagCover-1.jpg" /></a>
						</p>
						<div class="card-section">
							<p>
								Spring 2019
							</p>
						</div>
					</div>
				</div>
				<div class="cell">
					<div class="past-issue card">
						<p>
							<a href="https://magazine.local/fall-2018-v16n1/"><img src="http://magazine.local/wp-content/uploads/2019/05/f18-cover.jpg" /></a>
						</p>
						<div class="card-section">
							<p>
								Fall 2018
							</p>
						</div>
					</div>
				</div>
				<div class="cell">
					<div class="past-issue card">
						<p><a href="https://magazine.local/spring-2018-volume-15-number-2/"><img src="http://magazine.local/wp-content/uploads/2018/11/sp18-archive-thm.jpg" /></a></p>
						<div class="card-section">
							<p>
								Spring 2018
							</p>
						</div>
					</div>
				</div>
				<div class="cell">
					<div class="past-issue card">
						<p><a href="http://magazine.local/v15n1/"><img src="http://magazine.local/wp-content/uploads/2018/05/F17-cover.jpg" /></a></p>
						<div class="card-section">
							<p>
								Fall 2017
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php get_footer();