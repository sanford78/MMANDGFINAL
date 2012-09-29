<?php get_header(); ?>
<script type="text/javascript">
	jQuery(window).load(function() {
         jQuery('#sub-header').orbit({
         	directionalNav: false,
         	animation: 'fade',
         	animationSpeed: 1200
         });
     });
</script>

<section id="sub-header-wrap">
	<section id="sub-header-main">
		<div id="sub-header">
			<?php $loop = new WP_Query(array( 'post_type' => 'sub-header')); ?>
		    <?php while ( $loop->have_posts() ) : $loop->the_post();
			$url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
			<img src="<?php echo $url; ?>" />
			<?php
			endwhile; ?>
		</div>
	</section>
</section>
			<section class="main">
				<article class="content">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
						<div class="post_list_item">
							<?php if (has_post_thumbnail( $post->ID ) ): ?>
								<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
								<a class="post_list_item_image" href="<?php the_permalink(); ?>"><img alt="<?php the_title(); ?>" src="<?php echo $image[0]; ?>" /></a>
							<?php endif; ?>
							<div class="post_list_item_text">
								<h2 class="post_list_item_title"><a class="post_list_item_title_link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								<div class="post_list_item_date"><?php the_time('F jS, Y') ?></div>	
								<div class="post_list_item_excerpt"><?php the_excerpt(); ?></div>
								<a class="post_list_item_more" href="<?php the_permalink(); ?>">Read More</a>
							</div>
						</div>
					<?php endwhile; endif; ?>
				</article>
				<!--<?php get_sidebar(); ?>-->
			</section>
			<section class="shadow"></section>
<?php get_footer(); ?>