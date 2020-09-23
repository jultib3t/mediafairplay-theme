<?php
/**
 * Add Theme Support for wide and full-width images.
 *
 * Add this to your theme's functions.php, or wherever else 
 * you are adding your add_theme_support() functions.
 * 
 * @action after_setup_theme
 */
function jr3_theme_setup()
{
    add_theme_support('align-wide');
}
add_action('after_setup_theme', 'jr3_theme_setup');


/** Create and register custom box section in wordpress dashboard page */
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');

function my_custom_dashboard_widgets()
{
    global $wp_meta_boxes;

    wp_add_dashboard_widget('custom_help_widget', 'MFP Site Support', 'custom_dashboard_help');
}

function custom_dashboard_help()
{
    echo '<div>
		<h2>Welcome <b>MFP Team</b> to our new Custom Theme!</h2>
		  <p><b>Need help?</b> Contact the MFP developers Team <a href="mailto:gal@mediafairplay.com">here</a>.</p>
		  <hr>
		  <h2> Whats New?</h2>
		 <div>
			 <ol>
				 <li>NEW EDITOR</li>
				 <li>NEW CUSTOMIZER</li>
				 <li>NEW PLUGINS</li>
				 <li>NEW APPEARANCE</li>
				 <li>NEW TOOLS</li>
			 </ol>
		 </div>
		 <p> Enjoy ! </p>
	  </div>';
}

/** remove dashboard meta Boxes*/
function remove_dashboard_meta()
{
    remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal'); //Removes the 'incoming links' widget
    remove_meta_box('dashboard_plugins', 'dashboard', 'normal'); //Removes the 'plugins' widget
    remove_meta_box('dashboard_primary', 'dashboard', 'normal'); //Removes the 'WordPress News' widget
    remove_meta_box('dashboard_secondary', 'dashboard', 'normal'); //Removes the secondary widget
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); //Removes the 'Quick Draft' widget
    remove_meta_box('dashboard_recent_drafts', 'dashboard', 'side'); //Removes the 'Recent Drafts' widget
    remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); //Removes the 'Activity' widget
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); //Removes the 'At a Glance' widget
    remove_meta_box('dashboard_activity', 'dashboard', 'normal'); //Removes the 'Activity' widget (since 3.8)
    remove_meta_box('dashboard_site_health', 'dashboard', 'normal'); // Removes the 'Site Health'
}
add_action('admin_init', 'remove_dashboard_meta');


/** Disable the wp-emoji script ? should we load it back? ask dale */
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

/** Disable some core js/css ask dale */


// Remove the REST API endpoint.
remove_action('rest_api_init', 'wp_oembed_register_route');

// Turn off oEmbed auto discovery.
add_filter('embed_oembed_discover', '__return_false');

// Don't filter oEmbed results.
remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);

// Remove oEmbed discovery links.
remove_action('wp_head', 'wp_oembed_add_discovery_links');

// Remove oEmbed-specific JavaScript from the front-end and back-end.
remove_action('wp_head', 'wp_oembed_add_host_js');

// Remove all embeds rewrite rules.
// add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );