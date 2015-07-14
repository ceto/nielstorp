<?php
/*
Template Name: Home Template with Slides
*/
?>

<?php while (have_posts()) : the_post(); ?>
<div class="wrapper wrapper--fullwidth">
	<div class="home__slidercont">
      <?php 
        $galleryfiles = get_post_meta( $post->ID , '_homemeta_slides', 1 );
        if ($galleryfiles!='') {
      ?>
        <div class="home__theslider master-slider ms-skin-default" id="home__theslider">
          
          <?php foreach ( (array) $galleryfiles as $attachment_id => $attachment_url ) { ?>
            <?php 
              $image_url_array = wp_get_attachment_image_src($attachment_id, 'full', true);
              $image_url = $image_url_array[0];
              $thumb_url_array = wp_get_attachment_image_src($attachment_id, 'tiny169', true);
              $thumb_url = $thumb_url_array[0];
            ?>

            <div class="ms-slide">
              <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/masterslider/blank.gif" data-src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>"/>
            </div>
          <?php } ?>
        </div>
      <?php }  ?>
    
  </div>

</div>


<?php endwhile; ?>
