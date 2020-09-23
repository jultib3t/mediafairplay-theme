<?php
function wd_admin_menu_rename()
{
    global $menu;
    global $submenu; // Global to get menu array
    $menu[2][0] = 'MFP Dashboard'; // Change name of Dshboard to mfp dashboard
    $menu[5][0] = 'MFP Posts'; // Change name of Dshboard to mfp dashboard
    $menu[20][0] = 'MFP Pages'; // Change name of pages to mfp pages
    $menu[10][0] = 'MFP Media'; // Change name of pages to mfp pages
    $menu[60][0] = 'MFP Appearance'; // Change name of pages to mfp pages
    $menu[65][0] = 'MFP Plugins'; // Change name of pages to mfp pages
    $menu[70][0] = 'MFP Users'; // Change name of pages to mfp pages
    $menu[75][0] = 'MFP Tools'; // Change name of pages to mfp pages
    $menu[80][0] = 'MFP Settings'; // Change name of pages to mfp pages

    $submenu['index.php'][0][0] = 'MFP Home';

    // remove_menu_page('edit-comments.php');
    // remove_submenu_page( 'plugins.php', 'plugin-editor.php' );

    // remove_submenu_page( 'themes.php', 'theme-editor.php' );


    global $submenu;
    // print_r($submenu);

    /*   echo '<pre>';
    var_dump($menu);
    echo '</pre>';
    die(); */

/*     echo '<style>
    li#wp-admin-bar-comments {
        display: none;
    }</style>';
    
    li#wp-admin-bar-new-content {
        display: none;
    }
    </style>'; */
}
add_action('admin_menu', 'wd_admin_menu_rename');
