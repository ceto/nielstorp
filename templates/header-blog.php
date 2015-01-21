<div class="sec__header">
	<div class="wrapper wrapper--wide">  
	  <ul class="nav nav--sub">
		  <?php 
				$args = array(
					'show_option_all'    => 'All',
					'hide_empty'         => 0,
					'hierarchical'       => 0,
					'exclude'            => '1',
					'title_li'           => '',
					'show_option_none'   => __( 'No categories' ),
				);
				wp_list_categories( $args ); 
			?>
		</ul>
		<h1 class="sec__header__title"><?php echo roots_title(); ?></h1>
	</div>
</div>
