<section class="post__meta">
<p class="byline meta__author vcard"><i class="ion ion-person"></i> <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" rel="author" class="fn"><?php echo get_the_author(); ?></a></p> 
<i class="ion ion-ios-pricetags"></i>
<ul class="meta__categories">
<?php 
    $args = array(	
    	'title_li' => '',
    	'exclude' => 1,
    );
    wp_list_categories( $args ); 
?>
</ul>
</section>