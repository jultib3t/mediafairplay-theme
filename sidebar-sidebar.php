<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mediafairplay
 */

 if (is_active_sidebar('mfp-sidebar')) : ?>
    <aside>
                <div class="sidebar">
                    <?php dynamic_sidebar('mfp-sidebar'); ?>
                </div>
        </aside>
<?php endif;    ?>