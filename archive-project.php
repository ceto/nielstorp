<?php get_template_part('templates/header', 'projects'); ?>

<?php if (!have_posts()) : ?>
  <div class="wrapper wrapper--normal">
    <div class="alert alert-warning">
      <?php _e('Sorry, no results were found.', 'roots'); ?>
    </div>
  </div>
  <?php get_search_form(); ?>
<?php endif; ?>



<section class="projectgrid">
  <div class="wrapper wrapper--fullwidth">
  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/square', 'project'); ?>
  <?php endwhile; ?>
  </section>
</div>


