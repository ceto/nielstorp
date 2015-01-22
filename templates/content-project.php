<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('project--single'); ?>>
  <div class="wrapper wrapper--wide">
    <section class="project__gallery">
      <?php the_post_thumbnail('medium11') ?>
    </section>

    <header class="project__header">
      <h1 class="project__title"><?php the_title(); ?></h1>
      <section class="project__params">
        <h3 class="param__title">Project details</h3>
        <p class="param__item"><span>Location:</span> <?php echo get_post_meta( $post->ID, '_pdata_location', true ); ?></p>
        <p class="param__item"><span>Size:</span> <?php echo get_post_meta( $post->ID, '_pdata_size', true ); ?></p>
        <p class="param__item"><span>Client:</span> <?php echo get_post_meta( $post->ID, '_pdata_client', true ); ?></p>
        <p class="param__item"><span>Recognition:</span> <?php echo get_post_meta( $post->ID, '_pdata_recognition', true ); ?></p>
        <p class="param__item"><span>Built:</span> <?php echo get_post_meta( $post->ID, '_pdata_built', true ); ?></p>        
      </section>
    </header>
    <div class="project__content">
      <h3 class="pd">Project description</h3>
      <?php the_content(); ?>
    </div>
    <footer class="project__footer">
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php //comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>

<footer class="project__related">
  <div class="wrapper wrapper--wide">
    <?php 
         
        yarpp_related(
          array(
            // Pool options: these determine the "pool" of entities which are considered
            'post_type' => array('project' ),
            'show_pass_post' => false, // show password-protected posts
            'past_only' => false, // show only posts which were published before the reference post
            'exclude' => array(), // a list of term_taxonomy_ids. entities with any of these terms will be excluded from consideration.
            'recent' => false, // to limit to entries published recently, set to something like '15 day', '20 week', or '12 month'.
            // Relatedness options: these determine how "relatedness" is computed
            // Weights are used to construct the "match score" between candidates and the reference post
            'weight' => array(
                          'body' => 2,
                          'title' => 2, // larger weights mean this criteria will be weighted more heavily
                          'tax' => array(
                                    'projects' => 1,
                                   )
                        ),

            // 'require_tax' => array(
            //     'projects' => 1
            // ),  

            'threshold' => 5,
            'template' => 'yarpp-template-projectsquare.php',
            'limit' => 8, // maximum number of results
            'order' => 'score DESC'
          ),
          $post->ID, 
          true // (optional) true to echo the HTML block; false to return it
        ); 

      ?>
  </div>
</footer>