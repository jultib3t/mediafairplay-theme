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
    <?php $last_modifited_toggle = get_theme_mod('mfp_header_Last_Modifited_toggle', 0); ?>
    <?php if ($last_modifited_toggle) : ?>
        <style>
            .last-update {
                background: <?php echo get_theme_mod('last_mod_bg', '#000'); ?>;
                max-width: 1200px;
                margin: 0 auto;
                padding-right: 0.83em;
                padding-left: 0.83em;
                padding-top: 0.83em;
                padding-bottom: 0.83em;
                margin-bottom: 10px;
                color: <?php echo get_theme_mod('last_mod_txt_color', '#fff'); ?>;
                font-size: <?php echo get_theme_mod('last_mod_font_size', '15'); ?>px;
            }
        </style>
        <section class="last-update-wrapper">
            <div class="last-update">
                <?php echo '<span> Last Modified: </span>'; ?>
                <?php echo '<time>' . get_the_modified_date() . '</time>'; ?>
            </div>
        </section>
    <?php endif; ?>

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
                background-color: <?php echo get_theme_mod('mfp_footer_bg_color', '#728d9e'); ?>;
                color: <?php echo get_theme_mod('mfp_footer_text_color', '#fff') ?>;
            }

            section#wrapper-widget-footer h1,
            section#wrapper-widget-footer h2,
            section#wrapper-widget-footer h3,
            section#wrapper-widget-footer h4,
            section#wrapper-widget-footer h5,
            section#wrapper-widget-footer h6 {
                color: <?php echo get_theme_mod('mfp_footer_titles_color', '#728d9e'); ?>;
                font-size: <?php echo get_theme_mod('mfp_footer_titles_font_size', '25'); ?>px;
            }

            section#wrapper-widget-footer a {
                color: <?php echo get_theme_mod('mfp_footer_link_color', '#fff'); ?>;
            }

            section#wrapper-widget-footer a:hover {
                color: <?php echo get_theme_mod('mfp_footer_link_h_color', 'blue'); ?>;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside {
                <?php
                $footer_footer_width = get_theme_mod('footer_container_width', 'default');
                if ($footer_footer_width == 'default') :  ?>max-width: <?php echo get_theme_mod('site_content_width', '1200'); ?>px;
                <?php elseif ($footer_footer_width == 'container') : ?>max-width: <?php echo get_theme_mod('footer_container_container_width', '1200'); ?>px;
                <?php elseif ($footer_footer_width == 'full_width') : ?>max-width: 100%;
                <?php endif; ?>width: 100%;
                margin: 0 auto;
                display: flex;
                justify-content: space-between;
                padding: 25px 0;
                padding-right: 0.83em;
                padding-left: 0.83em;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside li {
                list-style: none;
                margin: 0;
            }

            .footer-widget-wrapper-inside li h2 {
                margin-top: 0;
                margin-bottom: 0;
            }

            .footer-widget-wrapper-inside li ul {
                padding-inline-start: 0;
                margin-left: 0;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside div {
                max-width: 100%;
                width: 100%;
                color: #fff;
            }

            section#wrapper-widget-footer .footer-widget-wrapper-inside li a {
                text-decoration: none;
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

    <?php if (is_active_sidebar('mfp-copyrights-footer')  || is_active_sidebar('mfp-copyrights-footer-2')) : ?>


        <style>
            .footer-copyrights-wrapper {
                background: <?php echo get_theme_mod('mfp_footer_bar_bg_color', '#000'); ?>;
                padding: 30px 5px;
            }

            .footer-copyrights {
                <?php
                $footer_width = get_theme_mod('footer_bar_container_width', 'default');

                if ($footer_width == 'default') :  ?>max-width: <?php echo get_theme_mod('site_content_width', '1200'); ?>px;
                <?php elseif ($footer_width == 'container') : ?>max-width: <?php echo get_theme_mod('footer_bar_container_container_width', '1200'); ?>px;
                <?php elseif ($footer_width == 'full_width') : ?>max-width: 100%;
                <?php endif; ?>margin: 0 auto;
                width: 100%;
                display: flex;
                flex-direction: row;
                justify-content: space-between;
                padding-right: 0.83em;
                padding-left: 0.83em;
                color: <?php echo get_theme_mod('mfp_footer_bar_text_color', '#fff'); ?>;
            }

            .footer-copyrights h1,
            .footer-copyrights h2,
            .footer-copyrights h3,
            .footer-copyrights h4,
            .footer-copyrights h5,
            .footer-copyrights h6 {
                color: <?php echo get_theme_mod('mfp_footer_bar_title_color', '#fff'); ?>;
                font-size: <?php echo get_theme_mod('mfp_footer_bar_title_font_size', '25'); ?>px;
            }

            .footer-copyrights a {
                color: <?php echo get_theme_mod('mfp_footer_bar_link_color', '#fff'); ?>
            }

            .footer-copyrights a:hover {
                color: <?php echo get_theme_mod('mfp_footer_bar_h_link_color', 'blue'); ?>
            }

            .footer-copyrights li {
                list-style: none;
                margin: 0 5px;
                max-width: 100%;
                width: 100%;
            }

            .footer-copyrights li p {
                margin: 0;
            }

            .first-footer-wrapper {
                background-color: #b71c1c;
            }

            .footer-copyrights-wrapper .footer-copyrights li ul {
                padding-inline-start: 0;
                padding-inline-end: 0;
                margin-left: 0;
            }

            .first-footer-wrapper .first-footer {
                width: 100%;
                margin: 0 auto;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .first-footer-wrapper .first-footer ul {
                list-style: none;
            }

            <?php $footer_first_inner = get_theme_mod('mfp_footer_bar_column_width', 70); ?>.footer-copyrights .footer-copyrights-inner.first {
                width: <?php echo $footer_first_inner; ?>%;
                max-width: <?php echo $footer_first_inner; ?>%;
                height: auto;
                margin-right: 15px;
            }

            <?php
            $final_inner_width = 100;
            $final_inner_width -= $footer_first_inner;
            ?>.footer-copyrights-inner.sec {
                margin-left: 15px;
                width: <?php echo $final_inner_width; ?>%;
                max-width: <?php echo $final_inner_width; ?>%;
            }
        
            @media(max-width: <?php echo get_theme_mod('site_content_width', '1200'); ?>px) {
                .footer-copyrights {
                    flex-direction: column;
                }

                .footer-copyrights .footer-copyrights-inner.first,
                .footer-copyrights .footer-copyrights-inner.sec {
                    max-width: 100%;
                    width: 100%;
                    margin: 0;
                }

                .footer-copyrights>li:last-child {
                    align-items: baseline;
                }
            }
        </style>

        <div class="footer-copyrights-wrapper">
            <div class="footer-copyrights">
                <?php if (is_active_sidebar('mfp-copyrights-footer')) : ?>
                    <div class="footer-copyrights-inner first">
                        <?php dynamic_sidebar('mfp-copyrights-footer'); ?>
                    </div>
                <?php endif;  ?>
                <?php if (is_active_sidebar('mfp-copyrights-footer-2')) : ?>
                    <div class="footer-copyrights-inner sec">
                        <?php dynamic_sidebar('mfp-copyrights-footer-2'); ?>
                    </div>
                <?php endif;  ?>

            </div>

        </div>

    <?php endif; ?>
</footer>

<!-- Footer End -->
</div>
<!-- Page End -->
<?php if (get_theme_mod('display_indicator', 1)) : ?>
    <style>
        html .indicator,
        body .indicator {
            position: fixed;
            display: block;
            background-color: <?php echo get_theme_mod('indicator_bg', '#d6d35d') ?>;
            height: 5px;
            top: 0;
            z-index: 99;
        }
    </style>
    <div class="indicator"></div>
    <script>
        var body = document.body;
        var html = document.documentElement;

        var height = 0;
        var h = 0;

        var initiateHeights = function() {
            height = Math.max(body.scrollHeight, body.offsetHeight, html.clientHeight, html.scrollHeight, html.offsetHeight);
            h = window.innerHeight || document.documentElement.clientHeight || document.body.clientHeight;
            // console.log("heights were initialised:", height, h);
        }

        initiateHeights();

        var resize = function(e) {
            var scrolled = Math.max(document.body.scrollTop, document.documentElement.scrollTop);
            height > 0 ? e[0].style.width = scrolled / (height - h) * 100 + "%" : e.style.width = 0 + "%";
        }

        document.onscroll = function() {
            resize(document.getElementsByClassName("indicator"));
        };

        window.onresize = function() {
            initiateHeights();
        }
    </script>
<?php endif; ?>
<?php
// $blocks = parse_blocks( $post->post_content );
// print_r($blocks);
// Use || instead
// this code check if the MFP TABLE Short code is exist. we need to change the block from shortcode to mfp tables block etc. do it after you developed the code
$default_info_show_ = get_theme_mod('mfp_cards_default_info_toggle', 1);
if ( $default_info_show_ ): 
if (has_block('core/shortcode')) : ?>
    <script>
        const cards = document.querySelectorAll(".icon-info-wr");

        function flipCard() {
            this.parentElement.parentElement.classList.toggle("is-flipped");
        }
        cards.forEach((card) => card.addEventListener("click", flipCard));
    </script>
<?php endif; ?>
<?php endif; ?>
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