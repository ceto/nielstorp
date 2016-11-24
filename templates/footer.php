<?php if (!is_front_page()): ?>

<footer class="sitefooter" role="contentinfo">
  <div class="wrapper wrapper--wide">
    <div class="sitefooter__left">
    <?= __('&copy; 2014 &middot; All rights are reserved! &middot; Niels Torp as Arkitekter &middot; Industrigaten 59 &middot; 0357, Oslo <br> Phone: <a href="tel:+47 23 36 68 00">+47 23 36 68 00</a> &middot; Fax: +47 23 36 68 01 &middot; eMail: <a href="mailto:firmapost@nielstorp.no">firmapost@nielstorp.no</a>','nt') ?>
    </div>

    <?php dynamic_sidebar('sidebar-footer'); ?>


  </div>
</footer>
<?php endif ?>
