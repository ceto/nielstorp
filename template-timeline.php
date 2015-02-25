<?php
/*
Template Name: Timeline Template
*/
?>

<?php while (have_posts()) : the_post(); ?>

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



	

<?php if ($timeline = get_post_meta( get_the_ID(), '_data_timeline', true )) : ?>
  
<section class="timeline csuszat">
	<div class="wrapper wrapper--wide">
		  <div class="subtoggler">
      <a href="#" class="subnav-toggle"><i class="ion ion-more"></i></a>
      <span class="subtoggler__title">Projects</span>
    </div>
  
  <div class="inner">
	<?php 
		$i=0;
		foreach ( (array) $timeline as $key => $element ) {  ?>
	  <article class="panel" id="panel-<?php echo $key; ?>">
	    <header class="panel__header">
	    	<figure class="panel__fig">
	    		<?php 
	    			echo wp_get_attachment_image( $element['image_id'], 'large' );
	    			//echo $element['image'];
	    		?>
	    	</figure>
	      <h3 class="panel__title">
	        <?php echo $element['title']; ?>
	      </h3>
	    </header>
	    <div class="panel__body">
	      <?php echo wpautop($element['content']); ?>
	    </div>
	    <div class="panel__footer">
	      <span class="panel__date"><?php echo date('F, Y',$element['date']); ?></span>
	    </div>
	 	</article>
	<?php } ?>
	</div>


	</div>
</section> 

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


<?php endwhile; ?>
