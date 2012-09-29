<?php get_header(); ?>
<section class="main">
	<article class="content-left">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
		the_content();
		endwhile; endif; ?>
	</article>
	<aside class="sidebar">
		<?php get_sidebar(); ?>
	</aside>
</section>
<?php get_footer(); ?>