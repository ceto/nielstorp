<div class="sec__header">
	<div class="wrapper wrapper--wide">
		<h1 class="sec__header__title"><?= __('Competitions','nt') ?></h1>
		<ul class="nav nav--sub js-isotopefilter">
			<li class="js-isotopefilter__item filter__item-all active">
				<a href="<?php echo get_post_type_archive_link('competition'); ?>" data-filter-value="*">
					<?= __('All<span> Comp.</span>','nt') ?>
				</a>
			</li>
			<?php $filtlist=get_terms('competitions',array('hide_empty' => false)); ?>
			<?php foreach ( $filtlist as $term ) {  ?>
			<li class="js-isotopefilter__item filter__item-<?php echo $term->slug; ?>">
				<a href="<?php echo get_term_link( $term ); ?>" data-filter-value=".<?php echo $term->slug; ?>">
					<?php echo $term->name; ?>
				</a>
			</li>
			<?php } ?>
		</ul>
	</div>
</div>