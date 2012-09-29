<?php get_header(); ?>
			<section id="main">
				<article id="content">
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
					<?php endwhile; else: ?>
						<div class="post_list_item">Sorry, no posts matched your criteria.</div>
					<?php endif; ?>
				</article>
				<?php get_sidebar(); ?>
			</section>
		<?php get_footer(); ?>
	</section>
</body>
</html>