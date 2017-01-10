<header class="banner navbar" role="banner">
  <div class="wrapper wrapper--tricky">
    <div class="banner__inner">
    <div class="navbar__header">
      <label class="navbar__toggle" for="nav__toggle"><i class="ion ion-navicon"></i></label>
      <a class="navbar__brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
      <div class="headaside">
        <?php dynamic_sidebar('sidebar-header'); ?>
      </div>
    </div>
    <input type="checkbox" id="nav__toggle">
    <nav class="navbar__navigation" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new Roots_Nav_Walker(), 'menu_class' => 'nav nav--main'));
        endif;
      ?>
    </nav>
    </div>
  </div>
</header>
