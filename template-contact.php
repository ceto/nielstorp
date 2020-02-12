<?php
/*
Template Name: Contact Template
*/
?>

<?php while (have_posts()) : the_post(); ?>

<div class="wrapper wrapper--wide">


    <div class="contactpage__content">
        <div class="incsi">
            <?php the_content(); ?>
            <div class="soci">
                <h3><?= __('Follow Us','nt') ?></h3>
                <a target="_blank" href="https://www.facebook.com/Niels-Torp-Arkitekter-966095843424952/"><i
                        class="ion ion-social-facebook"></i>Facebook</a>
                <a target="_blank" href="https://www.instagram.com/nielstorp_architects/"><i
                        class="ion ion-social-instagram"></i>Instagram</a>
                <a target="_blank" href="https://twitter.com/NIELSTORP_Arch/"><i
                        class="ion ion-social-twitter"></i>Twitter</a>
                <a target="_blank"
                    href="https://www.linkedin.com/company/niels-torp-arkitekter-as?trk=biz-companies-cym/"><i
                        class="ion ion-social-linkedin"></i>Linkedin</a>
                <a target="_blank" href="https://aboutme.google.com/u/0/b/109200847459827917765/"><i
                        class="ion ion-social-youtube"></i>YouTube</a>
            </div>
        </div>
    </div>

    <figure class="contactpage__ill">
        <?php the_post_thumbnail('full') ?>
    </figure>

</div>


<?php endwhile; ?>