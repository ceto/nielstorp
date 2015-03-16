<article <?php post_class('post--squared'); ?>>
	<figure class="post--squared__figure">
		<a href="<?php the_permalink(); ?>">
			<?php the_post_thumbnail('small916'); ?>
		</a>
    <?php if (get_post_meta( $post->ID , '_postdata_video', 1 )) :?>
      <div class="archive__icons">
        <a class="popup--video" href="<?php echo get_post_meta( $post->ID , '_postdata_video', 1 ); ?>">
          <i class="ion ion-ios-videocam"></i>
        </a>
      </div>
    <?php endif; ?>
	</figure>

  <div class="post--squared__summary">
    <header class="post--squared__header">
      <?php get_template_part('templates/post-updated'); ?>
      <h2 class="post--squared__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    </header>
    <div class="post--squared__excerpt">
		 <?php the_excerpt(); ?>
	  </div>
  </div>
</article>
