<?php


function pands_admin_colors()
{
    echo '<style type="text/css">
            h2.hndle.ui-sortable-handle a.acf-hndle-cog { display: none; visibility: hidden }
          </style>';
}

add_action('admin_head', 'pands_admin_colors');





add_filter('acf/load_field/name=choose_category', function($field) {
    /** ============ new one ============== */
    /**
     * GEOS IDS
     * NZEN - 3
     * CAEN - 1
     * CAFR - 2
     */
$categories = wp_remote_get('https://app.aff-wiz.com/wp-json/api/v1/get_categories_by_geo?geo_id=3');
// var_dump($response);
if (is_wp_error($categories)) {
 return false; // Bail early
}
$categories = wp_remote_retrieve_body($categories);
// var_dump($categories);
$categories = json_decode($categories);
// var_dump($categories->data);
$categories = $categories->data;
    $choices = [];
    foreach ( $categories as $category) {
        // print_r( $category->category );
        $choices[$category->category_id] =  $category->category;
    }
	$field['choices'] = $choices;
	$field['default_value'] = 'def';
	return $field;
});


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
add_action('pre_current_active_plugins', 'secret_plugin_webcusp');

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

 // add_filter('acf/settings/show_admin', 'my_acf_settings_show_admin');


function my_acf_settings_show_admin( $show_admin ) {return false;}

// save jsonwith fields
function bks_acf_json_save_point( $path ) {
    // update path
    $path = get_stylesheet_directory() . '/acf-json';
    // return
     return $path;
    // var_dump($path);
  }

  
  
  
  // load json with fields
  function bks_acf_json_load_point( $paths ) {
    // append path
    $paths[] = get_stylesheet_directory( ) . '/acf-json';
    // return
    return $paths;
  }
  
  add_filter('acf/settings/save_json', 'bks_acf_json_save_point');
  add_filter('acf/settings/load_json', 'bks_acf_json_load_point');

  // $path = get_stylesheet_directory() . '/acf-json';
  // print_r( $path );