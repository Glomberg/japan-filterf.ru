<?php
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
if ( function_exists( 'add_theme_support' ) ) {
add_theme_support( 'post-thumbnails' );
}
function no_more_jumping($post) {  
  return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'... Читать далее.'.'</a>';  
}  
add_filter('the_content_more_link', 'no_more_jumping'); 
function new_excerpt_more($more) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');
// pagination
function bazz_pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;
     global $paged;
     if(empty($paged)) $paged = 1;
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span> ". __('Страница', 'existentia') ." </span>\n<ul>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<li><a href='' class='active'>".$i."</a></li>":
				 "<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
             }
         }
         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>&rsaquo;</a>";
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
         echo "</ul>\n</div>\n";
     }
}
function bazz_pagination_comments() //прикольно получилось, но стало не нужно :(
{
    global $wp_query;
	$pages = '';
	$max = $wp_query->max_num_pages;
	if (!$current = get_query_var('paged')) $current = 1;
	$a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
	$a['total'] = $max;
	$a['current'] = $current;
	$total = 1;
	$a['mid_size'] = 999999;
	$a['end_size'] = 999999;
	$a['prev_text'] = '';
	$a['next_text'] = '';
		if ($max > 1) echo ("<div class=\"comment-navigation\">");
		if ($total == 1 && $max > 1) $pages = "<span>Страница </span>";
		echo $pages . paginate_links($a);
		if ($max > 1) echo ("</div>");
}
?>