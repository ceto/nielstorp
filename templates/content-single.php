<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class('post--single'); ?>>
    <header class="post__header">
      <div class="wrapper wrapper--wide">
        <figure class="post__figure">
          <?php the_post_thumbnail('large31'); ?>
        </figure>
      </div>
      <div class="wrapper wrapper--wide">
        <div class="post__innerwrap">
          <?php get_template_part('templates/post-updated'); ?>
          <h1 class="post__title"><?php the_title(); ?></h1>
          <?php get_template_part('templates/post-meta'); ?>
        </div>
      </div>
    </header>
    <div class="post__content">
      <div class="wrapper wrapper--wide">
        <div class="post__innerwrap">
          <?php the_content(); ?>
        </div>
      </div>
    </div>
    <footer class="post__footer">
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
    <?php //comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
