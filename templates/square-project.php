<?php
  $termik = array();
  $ures = array();
  $nagytermlist=array_merge(
    get_the_terms( $post->ID, 'projects' )?get_the_terms( $post->ID, 'projects' ):$ures
  );
  foreach ( $nagytermlist as $term ) { $termik[] = $term->slug; }
  $projcat=join(" ", $termik );
?>
  


<article <?php post_class($projcat.' js-isotopeitem square'); ?>>
  <?php if (get_post_meta( $post->ID , '_pdata_video', 1 )) :?>
    <div class="square__icons">
      <a class="popup--video" href="<?php echo get_post_meta( $post->ID , '_pdata_video', 1 ); ?>">
        <i class="ion ion-ios-videocam"></i>
      </a>
    </div>
  <?php endif; ?>

  <figure class="square__figure">
  	<a href="<?php the_permalink(); ?>">
  		<?php the_post_thumbnail('small11'); ?>
  	</a>
  </figure>

  <header class="square__datapanel">
   	<a href="<?php the_permalink(); ?>">
    <h2 class="square__title">
      <?php the_title(); ?> &middot; <?php echo get_post_meta( $post->ID , '_pdata_built', 1 ) ?>
    </h2>
    <p class="square__details">
      
      <?php echo get_post_meta( $post->ID , '_pdata_size', 1 ); ?> &middot;
      <?php echo get_post_meta( $post->ID , '_pdata_client', 1 ) ?> 
      
      
    </p>
    </a>
  </header>
</article>
