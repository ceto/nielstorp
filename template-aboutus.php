<?php
/*
Template Name: About US Template
*/
?>

<?php while (have_posts()) : the_post(); ?>

	<?php if ((wp_get_post_parent_id(get_the_id())==71) || is_page(71)): ?>
		<div class="sec__header">
			<div class="wrapper wrapper--wide">  
					<h1 class="sec__header__title">About</h1>
					<?php
		        if (has_nav_menu('secondary_navigation')) :
		          wp_nav_menu(array('theme_location' => 'secondary_navigation', 'walker' => new Roots_Nav_Walker(), 'menu_class' => 'nav nav--sub'));
		        endif;
		      ?>
			</div>
		</div>
	<?php endif ?>

<section class="about csuszat">
  <div class="subtoggler">
  	<a href="#" class="subnav-toggle"><i class="ion ion-android-more-vertical"></i> SHOW MORE</a>
    <span class="subtoggler__title">About</span>
  </div>

	<div class="wrapper wrapper--wide">
		<div class="aboutpage__fullofphotos">

		    <section class="team__gallery">
					
					<?php 
						$galleryfiles = get_post_meta( $post->ID , '_data_timeline', 1 );
						if ($galleryfiles!='') {
					?>
						<div class="project__theslider master-slider ms-skin-default" id="team__theslider">
							
		          <?php foreach ( (array) $galleryfiles as $attachment_id => $attachment_url ) { ?>
								<?php

									$image_alt = get_post_meta($attachment_id, '_wp_attachment_alt', true);
									$imi= get_post($attachment_id);
									$image_title = $imi->post_title;

									$image_url_array = wp_get_attachment_image_src($attachment_id, 'full', true);
									$image_url = $image_url_array[0];
									$thumb_url_array = wp_get_attachment_image_src($attachment_id, 'tiny169', true);
									$thumb_url = $thumb_url_array[0];
								?>

								<div class="ms-slide">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/vendor/masterslider/blank.gif" data-src="<?php echo $image_url; ?>" alt="<?php the_title(); ?>"/>
									<div class="ms-info"><?php echo $image_title; ?></div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				
	    </section>



			<section class="about__gallery">
					
					<?php 
						$galleryfiles = get_post_meta( $post->ID , '_data_gallery', 1 );
						if ($galleryfiles!='') {
					?>
						<div class="abgallery abgallery--tiles popup--gallery">
							
		          <?php foreach ( (array) $galleryfiles as $attachment_id => $attachment_url ) { ?>
								<?php

									$image_alt = get_post_meta($attachment_id, '_wp_attachment_alt', true);
									$imi= get_post($attachment_id);
									$image_title = $imi->post_title;

									$image_url_array = wp_get_attachment_image_src($attachment_id, 'full', true);
									$image_url = $image_url_array[0];
									$thumb_url_array = wp_get_attachment_image_src($attachment_id, 'tiny11', true);
									$thumb_url = $thumb_url_array[0];
								?>

								<div class="abgallery__tile">
									<a href="<?php echo $image_url; ?>" title="<?php echo $image_title; ?>">
										<img src="<?php echo $thumb_url; ?>" alt="<?php echo $image_title; ?>"/>
									</a>
								</div>
							<?php } ?>
						</div>
					<?php }  ?>
				
	    </section>


	  </div>
		<div class="aboutpage__content">
			<?php the_content(); ?>
	  </div>
	</div>

</section>

<?php endwhile; ?>
