<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mediafairplay
 */

/**
 * START PAGE NAVIGATION - ( Custom ACF ) 
 */
$navigation_page_enable = get_field('enable_pagination_to_the_page');
// check if we enabled page navigation
if (is_null($navigation_page_enable)) {
    $navigation_page_enable = false;
} else {
    $navigation_page_enable = get_field('enable_pagination_to_the_page');
}
$next_page = get_field('next_page');
$previous_page = get_field('previous_page');
// PAGE navigation
if (is_page()) :
    if ($navigation_page_enable) :
        echo '
                <style>section.page_navigation_wrapper {
                    max-width: 1200px;
                    margin: 10px auto;
                    display: flex;
                    width: 100%;
                    justify-content: space-between;
                    padding: 0 10px;
                }
                .previous_page_navigation a, .next_page_navigation a {
                    background: #980525;
                    border-radius: 7px;
                    padding: 10px 30px;
                    color: #fff;
                    text-decoration: none;
                    transition: all .3s ease;
                }
                .previous_page_navigation a:hover,.next_page_navigation a:hover {
                    background: #000;
                    transition: all .3s ease;
                }
                .previous_page_navigation {}</style>
                <section class="page_navigation_wrapper">
                    <div class="previous_page_navigation"><a href="' . $previous_page . '">Previous</a></div>
                    <div class="next_page_navigation"><a href="' . $next_page . '">Next</a></div>
                </section>';
    endif;
endif;
/**
 * END OF PAGE NAVIGATION - ( Custom ACF ) 
 */
?>
<footer>
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
            align-items: center;
            justify-content: space-between;
            padding: 25px 0;
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
