<div class="page__content">
  <div class="wrapper wrapper--normal">
      <?php the_content(); ?>
  </div>
</div>
<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>