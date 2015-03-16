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


	<div class="wrapper wrapper--wide">
		<div class="aboutpage__fulofphotos">
			<?php the_post_thumbnail(); ?>
	  </div>
		<div class="aboutpage__content">
			<?php the_content(); ?>
	  </div>
	</div>


<?php endwhile; ?>
