<?php
  $termik = array();
  $ures = array();
  $nagytermlist=array_merge(
    get_the_terms( $post->ID, 'department' )?get_the_terms( $post->ID, 'department' ):$ures
  );
  foreach ( $nagytermlist as $term ) { $termik[] = $term->slug; }
  $projcat=join(" ", $termik );
?>
  


<article <?php post_class($projcat.' js-isotopeitem square'); ?>>
  
  <figure class="square__figure">
  	<a href="#">
      <?php the_post_thumbnail('small11'); ?>
    </a>
  </figure>

  <header class="square__datapanel">
    <div class="linka">
      <h2 class="square__title">
        <?php the_title(); ?>
      </h2>
      <h3 class="square__subtitle"><?php echo get_post_meta( $post->ID, '_edata_job', true ); ?></h3>
      <p class="square__details">
        <i class="ion ion-ios-telephone"></i> <a href="tel:<?php echo get_post_meta( $post->ID, '_edata_tel', true ); ?>"><?php echo get_post_meta( $post->ID, '_edata_tel', true ); ?></a><br>
        <i class="ion ion-ios-email"></i> <a href="mailto:<?php echo get_post_meta( $post->ID, '_edata_email', true ); ?>"><?php echo get_post_meta( $post->ID, '_edata_email', true ); ?></a>
      </p>
    </div>
  </header>
</article>
