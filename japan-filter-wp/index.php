<?php get_header(); ?>
<div class="content">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<?php endwhile; ?>	
</div>
<?php get_footer(); ?>