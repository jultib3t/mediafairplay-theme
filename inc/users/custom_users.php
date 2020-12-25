<?php

/**
function role_exists($role)
{

    if (!empty($role)) {
        return $GLOBALS['wp_roles']->is_role($role);
    }

    return false;
}
if (!role_exists('seo_manager')) {
    // The 'editor' role exists!
    function mfp_set_users()
    {
        $admin_role_set = get_role('administrator')->capabilities;
         Create Staff Member User Role 
        add_role(
            'seo_manager', //  System name of the role.
            __('SEO Manager'), // Display name of the role.
            $admin_role_set
        );
    }
    add_action('admin_init', 'mfp_set_users');
}

function check_if_user_can()
{
    if (current_user_can('seo_manager')) {
            remove_menu_page( 'tools.php' );
            // remove_menu_page( 'admin.php?page=mlang');
            remove_menu_page( 'plugins.php' );
            remove_menu_page( 'edit-comments.php' );
            remove_submenu_page('themes.php', 'theme-editor.php');
            remove_submenu_page('themes.php', 'themes.php');
            remove_submenu_page('users.php', 'users.php');
            remove_submenu_page('users.php', 'user-new.php');
            // remove_submenu_page('index.php', 'update-core.php');  
    }
}
add_action('admin_init', 'check_if_user_can');




// $current_user = wp_get_current_user();
// print_r( $current_user->roles[0]);


// print_r( $admin_role_set);
/* remove_role( 'editor' );
remove_role( 'author' );
remove_role( 'contributor' );
remove_role( 'subscriber' );
remove_role( 'staff_member' );
remove_role( 'staff_member_new' ); */
remove_role( 'seo_manager' );