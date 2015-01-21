<header class="banner navbar" role="banner">
  <div class="wrapper wrapper--wide">
    <div class="navbar__header">
      <a class="navbar__toggle"><i class="ion ion-navicon"></i></a>
      <a class="navbar__brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
    </div>

    <nav class="navbar__navigation" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new Roots_Nav_Walker(), 'menu_class' => 'nav nav--main'));
        endif;
      ?>
    </nav>
  </div>
</header>
