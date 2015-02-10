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
  
  <figure class="square__figure">
  	<a href="<?php the_permalink(); ?>">
  		<?php the_post_thumbnail('small11'); ?>
  	</a>
  </figure>

  <header class="square__datapanel">
   	<a href="<?php the_permalink(); ?>">
    <h2 class="square__title">
      <?php the_title(); ?>
    </h2>
    <p class="square__details"> Lorem ipsum dolor</p>
    </a>
  </header>
</article>
