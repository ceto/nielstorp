<!doctype html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="alternate" type="application/rss+xml" title="<?php echo get_bloginfo('name'); ?> Feed" href="<?php echo esc_url(get_feed_link()); ?>">
  <?php if (ICL_LANGUAGE_CODE!=='zh-hans') : ?>
      <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,700,800&amp;subset=latin-ext" rel="stylesheet">
  <?php endif ?>
  <!-- <link href="<?= get_stylesheet_directory_uri().'/assets/css/fonts.css';  ?>" rel="stylesheet"> -->
  <?php wp_head(); ?>
</head>
