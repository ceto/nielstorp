<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('project--single'); ?>>
  <div class="wrapper wrapper--wide">
    <section class="project__gallery">

			<?php
				$galleryfiles = get_post_meta( $post->ID , '_pdata_gallery', 1 );
				if ($galleryfiles!='') {
			?>
        <a href="#" class="fulltoggle"><i class="ion ion-arrow-expand"></i></a>
				<div class="project__theslider master-slider ms-skin-default" id="project__theslider">

          <?php if (get_post_meta( $post->ID , '_pdata_video', 1 )) :?>
            <?php
              $image_url_array = wp_get_attachment_image_src(get_post_meta( $post->ID , '_pdata_videoimg_id', 1 ), 'full', true);
              $image_url = $image_url_array[0];
              $thumb_url_array = wp_get_attachment_image_src(get_post_meta( $post->ID , '_pdata_videoimg_id', 1 ), 'tiny169', true);
              $thumb_url = $thumb_url_array[0];
            ?>
            <div class="ms-slide">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/masterslider/blank.gif" data-src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>"/>
              <img src="<?php echo $thumb_url; ?>" width="480" height="270" alt="<?php the_title(); ?>" class="ms-thumb"/>
              <a href="<?php echo str_replace('watch?v=','embed/',get_post_meta( $post->ID , '_pdata_video', 1 )); ?>" data-type="video">
                <?php the_title(); ?> video
              </a>
              <div class="ms-info"><?= __('Press play to start video','nt')  ?></div>
            </div>
          <?php endif; ?>

          <?php foreach ( (array) $galleryfiles as $attachment_id => $attachment_url ) { ?>
						<?php
							$image_url_array = wp_get_attachment_image_src($attachment_id, 'full', true);
							$image_url = $image_url_array[0];
							$thumb_url_array = wp_get_attachment_image_src($attachment_id, 'tiny169', true);
							$thumb_url = $thumb_url_array[0];
						?>

						<div class="ms-slide">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/masterslider/blank.gif" data-src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>"/>
							<img src="<?php echo $thumb_url; ?>" width="480" height="270" alt="<?php the_title(); ?>" class="ms-thumb"/>
							<div class="ms-info"><?php the_title(); ?></div>
						</div>
					<?php } ?>
				</div>
			<?php } else { the_post_thumbnail('large169'); } ?>




    </section>




    <header class="project__header">
      <h1 class="project__title"><?php the_title(); ?></h1>
      <section class="project__params">
        <h3 class="param__title"><?= __('Project details','nt') ?></h3>
        <p class="param__item"><span><?= __('Location','nt') ?>:</span> <?php echo get_post_meta( $post->ID, '_pdata_location', true ); ?></p>
        <p class="param__item"><span><?= __('Size','nt') ?>:</span> <?php echo get_post_meta( $post->ID, '_pdata_size', true ); ?></p>
        <p class="param__item"><span><?= __('Client','nt') ?>:</span> <?php echo get_post_meta( $post->ID, '_pdata_client', true ); ?></p>
        <p class="param__item"><span><?= __('Recognition','nt') ?>:</span> <?php echo get_post_meta( $post->ID, '_pdata_recognition', true ); ?></p>
        <p class="param__item"><span><?= __('Built:','nt') ?></span> <?php echo get_post_meta( $post->ID, '_pdata_built', true ); ?></p>
      </section>

      <nav class="refnav">
        <hr>
        <div class="refnav__wrap">
          <?php next_post_link('%link','<i class="ion ion-ios-arrow-left"></i><span>'.__('Previous project','nt').'</span><p class="navtext">%title</p>'); ?>
          <a href="<?php echo get_post_type_archive_link('project'); ?>" class="refnav__all">
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