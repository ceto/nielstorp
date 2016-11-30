<?php get_template_part('templates/header', 'projects'); ?>


  <div class="wrapper wrapper--fullwidth csuszat">
    <div class="subtoggler">
      <a href="#" class="subnav-toggle"><i class="ion ion-funnel"></i></a>
      <span class="subtoggler__title"><?= __('Projects','nt') ?></span>
    </div>

    <section id="js-isotopegrid" class="js-isotopegrid projectgrid">

        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('templates/square', 'project'); ?>
        <?php endwhile; ?>
        <?php //get_template_part('templates/dummy','squares'); ?>

    </section>
  </div>

