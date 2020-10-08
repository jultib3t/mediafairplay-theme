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

<footer>
    <style>
        .last-update {
            background: red;
            max-width: 1200px;
            margin: 0 auto;
            padding-right: 0.83em;
            padding-left: 0.83em;
            padding-top: 0.83em;
            padding-bottom: 0.83em;
            margin-bottom: 10px;
        }
    </style>
    <section class="last-update-wrapper">
        <div class="last-update">
            <?php echo '<span> Last Modified: </span>'; ?>
            <?php echo '<time>' . get_the_modified_date() . '</time>'; ?>
        </div>
    </section>

    <?php
    /* if (!is_active_sidebar('mfp-footer-1')) {
    return;
}
if (!is_active_sidebar('mfp-footer-2')) {
    return;
}
if (!is_active_sidebar('mfp-footer-3')) {
    return;
} */
    // check if any of the widgets is active, even if one is active - show
    if (is_active_sidebar('mfp-footer-1')  || is_active_sidebar('mfp-footer-2') || is_active_sidebar('mfp-footer-3')) { ?>
        <style>
            section#wrapper-widget-footer {
                background-color: <?php echo get_theme_mod('mfp_footer_background_color', '#728d9e'); ?>;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside {
                max-width: <?php echo get_theme_mod('site_content_width', '1200'); ?>px;
                width: 100%;
                margin: 0 auto;
                display: flex;
                align-items: baseline;
                justify-content: space-between;
                padding: 25px 0;
                padding-right: 0.83em;
                padding-left: 0.83em;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside li {
                list-style: none;
                margin: 0;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside div {
                max-width: 100%;
                width: 100%;
                color: #fff;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside li a {
                color: #fff;
                text-decoration: none;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside .second-footer-widget-wrapper {
                display: flex;
                justify-content: center;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside .third-footer-widget-wrapper {
                text-align: right;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside li .menu-footer-container ul#menu-footer {
                padding-inline-start: 0;
            }

            @media(max-width: 1000px) {
                section#wrapper-widget-footer .footer-widget-wrapper-inside {
                    flex-direction: column;
                    padding-right: 10px;
                    padding-left: 10px;
                }

                section#wrapper-widget-footer .footer-widget-wrapper-inside .third-footer-widget-wrapper {
                    text-align: left;
                }

                section#wrapper-widget-footer .footer-widget-wrapper-inside .second-footer-widget-wrapper {
                    justify-content: flex-start;
                }
            }
        </style>
        <section id="wrapper-widget-footer" class="wrapper-widget-footer">
            <div class="footer-widget-wrapper-inside">
                <?php if (is_active_sidebar('mfp-footer-1')) : ?>
                    <div class="first-footer-widget-wrapper">
                        <?php dynamic_sidebar('mfp-footer-1'); ?>
                    </div>
                <?php endif;    ?>
                <?php if (is_active_sidebar('mfp-footer-2')) : ?>
                    <div class="second-footer-widget-wrapper">
                        <?php dynamic_sidebar('mfp-footer-2'); ?>
                    </div>
                <?php endif;    ?>
                <?php if (is_active_sidebar('mfp-footer-3')) : ?>
                    <div class="third-footer-widget-wrapper">
                        <?php dynamic_sidebar('mfp-footer-3'); ?>
                    </div>
                <?php endif;    ?>
            </div>


        </section>

    <?php } ?>

    <?php if (is_active_sidebar('mfp-copyrights-footer')) : ?>
        <style>
            .footer-copyrights-wrapper {
                background: <?php echo get_theme_mod('mfp_copyright_background_color', '#000') ?>;
                padding: 15px 5px;
            }

            .footer-copyrights li.widget.widget_text {
                list-style: none;
                margin: 0;
            }

            .footer-copyrights li.widget.widget_text p {
                margin: 0;
                color: <?php echo get_theme_mod('mfp_copyright_text_color', '#fff') ?>;
            }

            .footer-copyrights {
                max-width: <?php echo get_theme_mod('site_content_width', '1200') ?>px;
                margin: 0 auto;
                width: 100%;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                padding-right: 0.83em;
                padding-left: 0.83em;
            }

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
                max-width: <?php echo get_theme_mod('site_content_width', '1200') ?>px;
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

            @media(max-width: 1000px) {
                .footer-copyrights {
                    flex-direction: column;
                    align-items: center;
                }
            }
        </style>

        <div class="footer-copyrights-wrapper">
            <div class="footer-copyrights">
                <?php dynamic_sidebar('mfp-copyrights-footer'); ?>
            </div>
        </div>

    <?php endif; ?>
</footer>

<!-- Footer End -->
</div>
<!-- Page End -->
<style>

html .indicator,
body .indicator {
  position: fixed;
  display: block;
  background-color: #d6d35d;
  height: 5px;
  top: 0;
}



    </style>
    <div class="indicator"></div>
 <script>
var body = document.body;
var html = document.documentElement;

var height = 0;
var h = 0;

var initiateHeights = function () {
  height = Math.max( body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight );
  h = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
  console.log("heights were initialised:", height, h);
}

initiateHeights();

var resize = function (e) {
  var scrolled = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
  height > 0 ? e[0].style.width = scrolled/(height-h) * 100 + "%" : e.style.width = 0 + "%";
}

document.onscroll = function () {
  resize(document.getElementsByClassName("indicator"));
};

window.onresize = function () {
  initiateHeights();
}

 </script>
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