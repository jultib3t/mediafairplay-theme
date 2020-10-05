<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mediafairplay
 */

?>

<style>
    section.first-footer-wrapper {
        background-color: #b71c1c;
    }

    section.first-footer-wrapper .first-footer {
        width: 100%;
        margin: 0 auto;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    section.lower-footer-wrapper .lower-footer {
        max-width: <?php echo get_theme_mod('site_content_width', '1200')?>px;
        width: 100%;
        margin: 0 auto;
    }

    .lower-footer .allrights {
        display: flex;
        justify-content: space-between;
        padding: 15px 0px;
    }

    section.first-footer-wrapper .first-footer ul {
        list-style: none;
    }

    /* begin begin Back to Top button  */

    .back_to_top {
        position: fixed;
        bottom: <?php echo get_theme_mod('back_to_top_position_bottom', '80') ?>px;
        <?php echo get_theme_mod('back_to_top_position', 'right'); ?>: <?php echo get_theme_mod('back_to_top_position_sides', '40') ?>px;
        z-index: 9999;
        width: <?php echo get_theme_mod('back_to_top_width', '40') ?>px;
        height: <?php echo get_theme_mod('back_to_top_height', '40') ?>px;
        text-align: center;
        line-height: <?php echo get_theme_mod('back_to_top_height', '30') ?>px;
        background-color: <?php echo get_theme_mod('mfp_back_to_top_background_color', '#000000') ?>;
        color: <?php echo get_theme_mod('mfp_back_to_top_text_color', '#ffffff') ?>;
        cursor: pointer;
        border-radius: <?php echo get_theme_mod('mfp_back_to_top_radius', '2') ?>px;
        display: none;
    }

    .back_to_top:hover {
        background-color: <?php echo get_theme_mod('mfp_back_to_top_hover_background_color', '#111111') ?>;
        color: <?php echo get_theme_mod('mfp_back_to_top_text_color', '#ffffff') ?>;
    }

    .back_to_top-show {
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>


<?php 

$img_trust_logo_url =  get_theme_mod('footer_trust_logo', 'https://www.casinocanuck.ca/wp-content/uploads/2018/03/BeGambleAware-Canada.png');

// This is getting the image / url
$feature1 = get_theme_mod('footer_trust_logo');

// This is getting the post id
$feature1_id = attachment_url_to_postid($feature1);
// This is getting the alt text from the image that is set in the media area
$image1_alt = get_post_meta($feature1_id, '_wp_attachment_image_alt', true);
// title
$image_title = get_the_title($feature1_id);
// trust icon blank
$trut_url_blank = get_theme_mod('footer_trust_url_blank');

$footer_trust_url_yes_no = get_theme_mod('footer_trust_url_yes_no');

$footer_trust_icon_url = get_theme_mod('footer_trust_icon_url', 'https://');

?>



<!-- 
<footer>
    <?php if (get_theme_mod('mfp_copyright')) : ?>
        <section class="lower-footer-wrapper" style="background-color: <?php echo get_theme_mod('mfp_copyright_background_color', '#000'); ?>">
            <div class="lower-footer" style="font-size:<?php echo get_theme_mod('mfp_copyright_text_size', '14'); ?>px; color: <?php echo get_theme_mod('mfp_copyright_text_color', '#fff'); ?>;">
                <div class="allrights">
                    <?php // if (get_theme_mod('mfp_copyright_text')) : 
                    ?>
                    <div>
                        Copyright 2020, All Right Reserved. Casino Canuck
                        <?php //echo get_theme_mod('mfp_copyright_text','Copyright 2020, All Right Reserved. Casino Canuck'); 
                        ?>
                    </div>
                    <?php // endif; 
                    ?>
                    <div>Website Operated by Yuba Technologies Ltd</div>
                </div>
            </div>

        </section>
    <?php endif; ?>
</footer> -->

<!-- Footer End -->
</div>
<!-- Page End -->

<?php wp_footer(); ?>

<?php if (get_theme_mod('mfp_enable_back_to_top')) : ?>
    <!-- begin Back to Top button -->
    <a class="back_to_top" title="Back To Top">&#8593;</a>
    <!-- end Back to Top button -->

    <!-- START Back To Top script-->
    <?php
    // back to top speed
    $speed = get_theme_mod('back_to_top_speed', '35');
    ?>
    <script>
        /* begin begin Back to Top button  */
        (function() {
            'use strict';

            function trackScroll() {
                var scrolled = window.pageYOffset;
                var coords = document.documentElement.clientHeight;

                if (scrolled > coords) {
                    goTopBtn.classList.add('back_to_top-show');
                }
                if (scrolled < coords) {
                    goTopBtn.classList.remove('back_to_top-show');
                }
            }

            function backToTop() {
                if (window.pageYOffset > 0) {
                    window.scrollBy(0, -<?php echo $speed; ?>);
                    setTimeout(backToTop, 0);
                }
            }

            var goTopBtn = document.querySelector('.back_to_top');

            window.addEventListener('scroll', trackScroll);
            goTopBtn.addEventListener('click', backToTop);
        })();
        /* end begin Back to Top button  */
    </script>
    <!-- END Back To Top script-->
<?php endif; ?>


</body>

</html>