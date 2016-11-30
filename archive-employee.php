<?php get_template_part('templates/header', 'employees'); ?>


  <div class="wrapper wrapper--fullwidth csuszat">
  	<div class="subtoggler">
      <a href="#" class="subnav-toggle"><i class="ion ion-funnel"></i></a>
      <span class="subtoggler__title"><?= __('Employees','nt') ?></span>
    </div>
    <section id="js-isotopegrid" class="js-isotopegrid employeegrid">

        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('templates/square', 'employee'); ?>
        <?php endwhile; ?>
        <?php //get_template_part('templates/dummy','squares'); ?>

    </section>
  </div>