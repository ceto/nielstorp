<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more() {
  return ' &hellip; <br><a class="btn btn--readmore" href="' . get_permalink() . '">' . __('Continue reading', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');


function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );