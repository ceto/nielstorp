<div class="sec__header">
	<div class="wrapper wrapper--wide">
		<h1 class="sec__header__title"><?= __('News','nt') ?></h1>
	  <ul class="nav nav--sub">
		  <?php
				$args = array(
					'show_option_all'    => __('All','nt'),
					'hide_empty'         => 0,
					'hierarchical'       => 0,
					'exclude'            => '1',
					'title_li'           => '',
					'show_option_none'   => __( 'No categories','nt' )
				);
				wp_list_categories( $args );
			?>
		</ul>

	</div>
</div>
