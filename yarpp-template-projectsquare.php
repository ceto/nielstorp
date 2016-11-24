<?php
/*
YARPP Template: Square Projects
Description: Requires a theme which supports post thumbnails
Author: Gabor Szabó <szabogabi@gmail.com>
*/ ?>

	<h3 class="related__title"><?= __('Similar Projects','nt') ?></h3>
	<?php if (have_posts()):?>
		<section class="projectgrid projectgrid--similar">
			<?php while (have_posts()) : the_post(); ?>
				<?php if (has_post_thumbnail()):?>
				<?php get_template_part('templates/square','project' ); ?>
				<?php endif; ?>

			<?php endwhile; ?>
		</section>
		<?php else: ?>
		<p>No related projects.</p>
	<?php endif; ?>
