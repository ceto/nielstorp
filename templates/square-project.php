<article <?php post_class('projectsquare'); ?>>
  
  <figure class="projectsquare__figure">
  	<a href="<?php the_permalink(); ?>">
  		<?php the_post_thumbnail('small11'); ?>
  	</a>
  </figure>

  <header class="projectsquare__datapanel">
   	<a href="<?php the_permalink(); ?>">
    <h2 class="projectsquare__title">
      <?php the_title(); ?>
    </h2>
    <p class="projectsquare__details"> Lorem ipsum dolor</p>
    </a>
  </header>
</article>
