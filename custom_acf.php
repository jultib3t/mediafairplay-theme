<?php
 function pands_admin_colors()
{
    echo '<style type="text/css">
            h2.hndle.ui-sortable-handle a.acf-hndle-cog { display: none; visibility: hidden }
          </style>';
}

add_action('admin_head', 'pands_admin_colors');

/*
add_filter('acf/settings/show_admin', '__return_false');

function secret_plugin_webcusp()
{
    global $wp_list_table;
    $hidearr = array('advanced-custom-fields-pro-master/acf.php', 'user-role-editor/user-role-editor.php');
    $myplugins = $wp_list_table->items;
    foreach ($myplugins as $key => $val) {
        if (in_array($key, $hidearr)) {
            unset($wp_list_table->items[$key]);
        }
    }
}
add_action('pre_current_active_plugins', 'secret_plugin_webcusp'); */
// Define path and URL to the ACF plugin.

define( 'MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/' );

// Include the ACF plugin.
include_once( get_stylesheet_directory() . '/inc/acf/acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// (Optional) Hide the ACF admin menu item.
// add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');function my_acf_settings_show_admin( $show_admin ) {return false;}