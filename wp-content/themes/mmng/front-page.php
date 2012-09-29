<?php get_header(); ?>
<section id="lower_wrapper">
<script type="text/javascript">
	$ = jQuery;
	$(window).load(function() {
         $('#slider').orbit({
         	directionalNav: false,
         	animation: 'fade',
         	animationSpeed: 1200
         });
     });
</script>
<section id="slider-wrap">
	<section id="slider-main">
		<div id="slider">
			<?php $loop = new WP_Query(array( 'post_type' => 'slide')); ?>
		    <?php while ( $loop->have_posts() ) : $loop->the_post();
			$url = wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>
			<img src="<?php echo $url; ?>" />
			<?php
			endwhile; ?>
		</div>
	</section>
</section>
<section id="main-frontpage" class="main">
	
	<section id="peer-review"><img src="<?php bloginfo('template_url'); ?>/images/peer-review.png" /></section>
	
	<article id="main-frontpage-content" class="content-left">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
		the_content();
		endwhile; endif; ?>
	</article>
	<aside id="main-frontpage-sidebar" class="sidebar">
		<h2>News</h2>
		<ul id="main-frontpage-sidebar-newslist">
			<?php
			global $post;
			$args = array( 'numberposts' => 5);
			$myposts = get_posts( $args );
			foreach( $myposts as $post ) :	setup_postdata($post); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
			<?php endforeach; ?>
		</ul>
		
	</aside>
</section>
<?php get_footer(); ?>
</section>
