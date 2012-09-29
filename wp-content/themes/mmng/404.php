<?php get_header(); ?>
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
	<section class="shadow"></section>



	<article class="content">
        <p>404: Page not found. I'm sorry, it looks like you requested a page that doesn't exist. CLick <a href="/">here</a> to return to the Moltz Morton and Glenn home page.</p>
	</article>
</section>
<?php get_footer(); ?>
