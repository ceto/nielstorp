<div class="page__header">
  <div class="wrapper wrapper--wide">
      <figure class="page__featimage">
      	<?php the_post_thumbnail('large31') ?>
      </figure>
  </div>
</div>

<div class="wrapper wrapper--wide">
	<div class="page__content">
		<?php the_content(); ?>
  </div>
</div>
<?php wp_link_pages(array('before' => '<nav class="pagination">', 'after' => '</nav>')); ?>