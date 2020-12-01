<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mediafairplay
 */
$display_sidebar = get_theme_mod('mfp_sidebar_page_select', 'ns');
if( $display_sidebar !== 'ns') :
 if (is_active_sidebar('mfp-sidebar')) : ?>
    <aside>
                <div class="sidebar">
                    <?php dynamic_sidebar('mfp-sidebar'); ?>
                </div>
        </aside>
<?php endif; ?>
<?php endif; ?>