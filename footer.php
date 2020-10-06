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
<!-- Footer End -->
</div>
<!-- Page End -->

<?php wp_footer(); ?>

<?php if (get_theme_mod('mfp_enable_back_to_top')) : ?>
    <!-- begin Back to Top button -->
    <style>
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