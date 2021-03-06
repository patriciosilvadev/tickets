<?php
/**
 * The template for homepage posts with "Excerpt" style
 *
 * @package WordPress
 * @subpackage HYPNOTHERAPY
 * @since HYPNOTHERAPY 1.0
 */

hypnotherapy_storage_set('blog_archive', true);

get_header(); 

if (have_posts()) {

	echo get_query_var('blog_archive_start');

	?><div class="posts_container"><?php
	
	$hypnotherapy_stickies = is_home() ? get_option( 'sticky_posts' ) : false;
	$hypnotherapy_sticky_out = is_array($hypnotherapy_stickies) && count($hypnotherapy_stickies) > 0 && get_query_var( 'paged' ) < 1;
	if ($hypnotherapy_sticky_out) {
		?><div class="sticky_wrap columns_wrap"><?php	
	}
	while ( have_posts() ) { the_post(); 
		if ($hypnotherapy_sticky_out && !is_sticky()) {
			$hypnotherapy_sticky_out = false;
			?></div><?php
		}
		get_template_part( 'content', $hypnotherapy_sticky_out && is_sticky() ? 'sticky' : 'excerpt' );
	}
	if ($hypnotherapy_sticky_out) {
		$hypnotherapy_sticky_out = false;
		?></div><?php
	}
	
	?></div><?php

	hypnotherapy_show_pagination();

	echo get_query_var('blog_archive_end');

} else {

	if ( is_search() )
		get_template_part( 'content', 'none-search' );
	else
		get_template_part( 'content', 'none-archive' );

}

get_footer();
?>