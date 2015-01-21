<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('project--single'); ?>>
  <div class="wrapper wrapper--wide">
    <section class="project__gallery">
      <?php the_post_thumbnail('small11') ?>
    </section>

    <header class="project__header">
      <h1 class="project__title"><?php the_title(); ?></h1>
      <h3 class="">Project details</h3>
    </header>
    <div class="project__content">
      <h3 class="">Projectd escription</h3>
      <?php the_content(); ?>
    </div>
    <footer class="project__footer">
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php //comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
