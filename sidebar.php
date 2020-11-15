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