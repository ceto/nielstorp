<?php get_template_part('templates/header', 'employees'); ?>

<?php if (!have_posts()) : ?>
  <div class="wrapper wrapper--normal">
    <div class="alert alert-warning">
      <?php _e('Sorry, no results were found.', 'roots'); ?>
    </div>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>

  <div class="wrapper wrapper--fullwidth">
    <section id="js-isotopegrid" class="js-isotopegrid employeegrid">

        <?php while (have_posts()) : the_post(); ?>
          <?php get_template_part('templates/square', 'employee'); ?>
        <?php endwhile; ?>
        <?php get_template_part('templates/dummy','squares'); ?>

    </section>
  </div>