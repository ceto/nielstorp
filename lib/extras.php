<?php
/**
 * Clean up the_excerpt()
 */
function roots_excerpt_more() {
  return ' &hellip; <br><a class="btn btn--readmore" href="' . get_permalink() . '">' . __('Continue reading', 'roots') . '</a>';
}
add_filter('excerpt_more', 'roots_excerpt_more');
