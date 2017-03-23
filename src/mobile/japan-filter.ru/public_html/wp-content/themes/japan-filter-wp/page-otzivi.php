<?php 
/*
*Template Name: Для "ОТЗЫВЫ"
*/
get_header(); ?>

	<?php iinclude_page(51); ?>
	<?php // If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || '0' != get_comments_number() ) :
		comments_template();
		endif;
	?>

<?php get_footer(); ?>