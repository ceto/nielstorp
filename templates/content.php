<article <?php post_class('post--inlist'); ?>>
  <header class="post__header">
  	<div class="wrapper wrapper--wide">
	  	<figure class="post__figure">
	  		<a href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail('large31'); ?>
	  		</a>
	  	</figure>
  	</div>
    <div class="wrapper wrapper--wide">
      <div class="post__innerwrap">
        <?php get_template_part('templates/post-updated'); ?>
      	<h2 class="post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      	<?php get_template_part('templates/post-meta'); ?>
      </div>

  	</div>
  </header>
  <div class="post__summary">
		<div class="wrapper wrapper--wide">
      <div class="post__innerwrap">
			 <?php the_excerpt(); ?>
      </div>
		</div>
  </div>
</article>
