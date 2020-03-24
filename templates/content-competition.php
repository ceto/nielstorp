<?php while (have_posts()) : the_post(); ?>
<br>
  <article <?php post_class('project--single'); ?>>
  <div class="wrapper wrapper--wide">
    <section class="project__gallery">

    <?php $galleryfiles = get_post_meta( $post->ID , '_pdata_gallery', 1 ); ?>
        <?php if ($galleryfiles!='') : ?>
          <section id="referenceswipe" class="refcarouselmono" itemscope itemtype="http://schema.org/ImageGallery">
            <?php foreach ( (array) $galleryfiles as $attachment_id => $attachment_url ) : ?>
              <?php
                $image_url_array = wp_get_attachment_image_src($attachment_id, 'full', true);
                $image_url = $image_url_array[0];
              ?>
              <div class="refcarousel__item">
                <?php
                    $ratio=56.25;
                    $psattr='data-size="1600x900';
                    $titi=wp_get_attachment_image_src($attachment_id, 'full', true);
                    $ratio = $titi[2] / $titi[1] * 100;
                    $targimage = wp_get_attachment_image_src($attachment_id, 'full', true);
                    $psattr = 'data-imagetarget="'.$targimage[0].'" data-size="'.$targimage['1'].'x'.$targimage['2'].'"';
                ?>
                <figure class="referencecard" style="/* padding-bottom: <?= $ratio ?>%*/" itemscope itemtype="http://schema.org/ImageObject">
                  <a href="<?php echo '#'; //echo $targimage[0]; ?>" <?= $psattr; ?>>
                    <?= wp_get_attachment_image($attachment_id, 'full', true); ?>
                  </a>
                  <figcaption class="referencecard__title"><?php the_title(); ?></figcaption>
                </figure>
              </div>
            <?php endforeach; ?>
          </section>
          <br>
          <nav id="refnavi" class="refnavi">
          <?php foreach ( (array) $galleryfiles as $attachment_id => $attachment_url ) : ?>
              <?php
                $image_url_array = wp_get_attachment_image_src($attachment_id, 'tiny11', true);
                $image_url = $image_url_array[0];
              ?>
              <div class="refnavi__item">
                <?php
                    $ratio=56.25;
                    $psattr='data-size="1600x900';
                    $titi=wp_get_attachment_image_src($attachment_id, 'tiny11', true);
                    $ratio = $titi[2] / $titi[1] * 100;
                    $targimage = wp_get_attachment_image_src($attachment_id, 'tiny11', true);
                    $psattr = 'data-imagetarget="'.$targimage[0].'" data-size="'.$targimage['1'].'x'.$targimage['2'].'"';
                ?>
                <figure class="refnavcard" style="/* padding-bottom: <?= $ratio ?>%*/" itemscope itemtype="http://schema.org/ImageObject">
                  <a href="<?php echo '#'; //echo $targimage[0]; ?>" <?= $psattr; ?>>
                    <?= wp_get_attachment_image($attachment_id, 'tiny11', true); ?>
                  </a>
                </figure>
              </div>
            <?php endforeach; ?>

          </nav>


        <?php else : ?>
          <?php the_post_thumbnail('large169'); ?>
        <?php endif; ?>



    </section>




    <header class="project__header">
      <h1 class="project__title"><?php the_title(); ?></h1>
      <section class="project__params">
        <h3 class="param__title"><?= __('Project details','nt') ?></h3>
        <p class="param__item"><span><?= __('Location','nt') ?>:</span> <?php echo get_post_meta( $post->ID, '_pdata_location', true ); ?></p>
        <p class="param__item"><span><?= __('Size','nt') ?>:</span> <?php echo get_post_meta( $post->ID, '_pdata_size', true ); ?></p>
        <p class="param__item"><span><?= __('Client','nt') ?>:</span> <?php echo get_post_meta( $post->ID, '_pdata_client', true ); ?></p>
        <p class="param__item"><span><?= __('Recognition','nt') ?>:</span> <?php echo get_post_meta( $post->ID, '_pdata_recognition', true ); ?></p>
        <p class="param__item"><span><?= __('Built','nt') ?>:</span> <?php echo get_post_meta( $post->ID, '_pdata_built', true ); ?></p>
      </section>
        <nav class="refnav">
        <hr>
        <div class="refnav__wrap">
          <?php next_post_link('%link','<i class="ion ion-ios-arrow-left"></i><span>'.__('Previous project','nt').'</span><p class="navtext">%title</p>'); ?>
          <a href="<?php echo get_post_type_archive_link('competition'); ?>" class="refnav__all">
            <i class="ion ion-grid"></i>
            <p class="navtext"><?= __('Show All','nt') ?></p>
          </a>
          <?php previous_post_link('%link','<p class="navtext">%title</p><span>'.__('Next project','nt').'</span><i class="ion ion-ios-arrow-right"></i>'); ?>
        </div>
       </nav>
    </header>
    <div class="project__content">
      <h3 class="pd"><?= __('Project description','nt') ?></h3>
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
            'post_type' => array('competition' ),
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
                                    'competitions' => 1,
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
