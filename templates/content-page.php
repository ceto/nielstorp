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
<div class="csuszat">
<?php if ((wp_get_post_parent_id(get_the_id())==71) || is_page(71)): ?>
  <div class="subtoggler">
    <a href="#" class="subnav-toggle"><i class="ion ion-android-more-vertical"></i> SHOW MORE</a>
    <span class="subtoggler__title">About</span>
  </div>
<?php endif; ?>
<div class="page__header">
  <div class="wrapper wrapper--wide">
      <figure class="page__featimage">
      	<?php the_post_thumbnail('large31') ?>
      </figure>
  </div>
</div>

<div class="wrapper wrapper--wide">
	<div class="page__content">
		<?php the_content(); ?>
  </div>
</div>
</div>