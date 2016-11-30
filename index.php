<?php get_template_part('templates/header', 'blog'); ?>
<div class="csuszat">
  <div class="subtoggler">
    <a href="#" class="subnav-toggle"><i class="ion ion-funnel"></i></a>
    <span class="subtoggler__title"><?php _e('News','nt'); ?></span>
  </div>
  <?php if (!have_posts()) : ?>
    <div class="wrapper wrapper--normal">
      <div class="alert alert-warning">
        <?php _e('Sorry, no results were found.', 'nt'); ?>
      </div>
    </div>
    <?php get_search_form(); ?>
  <?php endif; ?>
  <div class="wrapper wrapper--wide">
    <div class="bloginner">
      <?php while (have_posts()) : the_post(); ?>
        <?php //get_template_part('templates/content', get_post_format()); ?>
        <?php get_template_part('templates/content', 'squared'); ?>
      <?php endwhile; ?>
    </div>
  </div>

  <?php if ($wp_query->max_num_pages > 1) : ?>
    <nav class="post-nav">
      <div class="wrapper wrapper--wide">
        <ul class="pager">
          <li class="previous"><?php next_posts_link(__('&larr; Older posts', 'nt')); ?></li>
          <li class="next"><?php previous_posts_link(__('Newer posts &rarr;', 'nt')); ?></li>
        </ul>
      </div>
    </nav>
  <?php endif; ?>
</div>

