<?php
/*
Template Name: News
*/
?>

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
	<section class="shadow"></section>

	<article class="content_attorneys">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
		the_content();
		endwhile; endif; ?>
	</article>
</section>
<?php get_footer(); ?>