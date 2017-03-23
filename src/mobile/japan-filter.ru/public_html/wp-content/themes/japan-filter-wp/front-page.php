<?php get_header(); ?>

		<?php while ( have_posts() ) : the_post(); ?>
			<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
				<section>
					<h2>
						<a href="<?php the_permalink() ?>"> <?php the_title(); ?></a>
					</h2>	
					<div class="article-line"></div>
					<div class="clear"></div>
					<figure><?php if ( has_post_thumbnail() ) { ?>
						<a href="<?php the_permalink() ?>"> 
							<?php the_post_thumbnail();}  ?>
						</a>
					</figure>
					<p><?php the_content('... Читать далее.'); ?></p>
				</section>
			</article>
		<?php endwhile; ?>
		<?php if (function_exists('bazz_pagination')) bazz_pagination();  ?>
	<script>
		$("#menu-1 a").addClass("active");
	</script>
<?php get_footer(); ?>