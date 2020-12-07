<?php

/**
 * mediafairplay functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package mediafairplay
 */
$show = false;
show_admin_bar($show);

if (!defined('_S_VERSION')) {
  // Replace the version number of the theme on each release.
  define('_S_VERSION', '1.0.0');
}

if (!function_exists('mediafairplay_setup')) :
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */

  function mediafairplay_setup()
  {
    /*		tes
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on mediafairplay, use a find and replace
		 * to change 'mediafairplay' to the name of your theme in all the template files.
		 */
    load_theme_textdomain('mediafairplay', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
    add_theme_support('title-tag');

    /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
      array(
        'Header' => esc_html__('Header', 'mediafairplay'),
        'Footer' => esc_html__('Footer', 'mediafairplay'),
      )
    );

    /*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
    add_theme_support(
      'html5',
      array(
        'search-form',
        /* 'comment-form', */
        /* 'comment-list', */
        'gallery',
        'caption',
        'style',
        'script',
      )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
      'custom-logo',
      array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
      )
    );
  }
endif;
add_action('after_setup_theme', 'mediafairplay_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mediafairplay_content_width()
{
  // This variable is intended to be overruled from themes.
  // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
  // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
  $GLOBALS['content_width'] = apply_filters('mediafairplay_content_width', 640);
}
add_action('after_setup_theme', 'mediafairplay_content_width', 0);


/**
 * Enqueue scripts and styles.
 */
function mediafairplay_scripts()
{
  wp_enqueue_style('mediafairplay-style', get_stylesheet_uri(), array(), _S_VERSION);
  wp_style_add_data('mediafairplay-style', 'rtl', 'replace');
}
add_action('wp_enqueue_scripts', 'mediafairplay_scripts');

/**
 * Custom header
 */

require get_template_directory() . '/inc/menus/custom_header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
  require get_template_directory() . '/inc/jetpack.php';
}
/**
 * Set our skyrockect file
 */
include_once trailingslashit(dirname(__FILE__)) . 'inc/customizer/skyrocket.php';

/**
 * Set our custom site settings
 */
// include_once trailingslashit(dirname(__FILE__)) . 'inc/custom_site_settings.php';

/**
 * Load all our Customizer options
 */
include_once trailingslashit(dirname(__FILE__)) . 'inc/customizer/customizer.php';

/**
 * Custome LOGIN page
 */
include_once trailingslashit(dirname(__FILE__)) . 'inc/login/custom_login.php';

/**
 * Custome Admin panel menus
 */
include_once trailingslashit(dirname(__FILE__)) . 'inc/admin/custom_admin.php';

/**
 * ACF
 */
include_once trailingslashit(dirname(__FILE__)) . 'inc/acf/custom_acf.php';

/**
 * USERS
 */
include_once trailingslashit(dirname(__FILE__)) . 'inc/users/custom_users.php';

/** 
 * MFP SHORT CODES
 */
 include_once trailingslashit(dirname(__FILE__)) . 'inc/shortcodes/mfp_table_cards.php';
// include_once trailingslashit(dirname(__FILE__)) . 'inc/shortcodes/mfp_table_cards_2.php';


/**
 * Hide ACF from Admin Menu
 */
 // add_filter('acf/settings/show_admin', '__return_false');
/**
 * Custom blocks
 */
include_once trailingslashit(dirname(__FILE__)) . 'inc/custom_blocks.php';

function gb_gutenberg_admin_styles()
{
  echo '
        <style>
            /* Main column width */
            .wp-block {
                max-width: 100%;
            }
            /* Width of "wide" blocks */
            .wp-block[data-align="wide"] {
                max-width: 1080px;
            }
 
            /* Width of "full-wide" blocks */
            .wp-block[data-align="full"] {
                max-width: none;
            }	
        </style>
    ';
}
add_action('admin_head', 'gb_gutenberg_admin_styles');

/**
 * Add Widget throught sidebar.php
 */
include_once trailingslashit(dirname(__FILE__)) . 'inc/widgets/widgets.php';

/**
 * Register support for Gutenberg wide images in your theme
 */
function mytheme_setup()
{
  add_theme_support('align-wide');
}
add_action('after_setup_theme', 'mytheme_setup');

function set_default_admin_color($user_id)
{
  $args = array(
    'ID' => $user_id,
    'admin_color' => 'modern'
  );
  wp_update_user($args);
}
add_action('user_register', 'set_default_admin_color');

remove_action('welcome_panel', 'wp_welcome_panel');
/**
 * Custom welcome panel function
 *
 * @access      public
 * @since       1.0 
 * @return      void
 */
function wpex_wp_welcome_panel()
{ ?>


  <style>
    a.welcome-panel-close {
      display: none;
    }

    input#welcomepanelnonce {
      display: none;
    }

    .google-charts {
      width: 900px;
      height: 200px;
      margin: 0 auto;
    }

    table {
      margin: 0 auto;
      width: 100%;
    }

    td div svg g text {
      font-size: 14px;
    }

    div#welcome-panel {
      padding-top: 0;
    }

    .chart_div_wrapper {
      position: relative;
      border: 1px solid rgba(0, 0, 0, 0.1);
      margin-top: 10px;
    }

    .loading {
      position: absolute;
      width: 100%;
      text-align: center;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100%;
      z-index: 9;
      background: #fff;
    }
  </style>
  <div class="custom-welcome-panel-content">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    
    <h3><?php _e('PageSpeed Insights'); ?></h3>
    <div class="chart_div_wrapper">
      <div class="loading"> <img src="<?php echo get_template_directory_uri(); ?>/images/831.gif" alt=""></div>
      <div id="chart_div" class="google-charts"></div>
    </div>

    <h3><?php _e('Welcome to your custom dashboard Message!'); ?></h3>
    <p class="about-description"><?php _e('Here you can place your custom text, give your customers instructions, place an ad or your contact information.'); ?></p>
    <div class="welcome-panel-column-container">
      <div class="welcome-panel-column">
        <h4><?php _e("Let's Get Started"); ?></h4>
        <a class="button button-primary button-hero load-customize hide-if-no-customize" href="http://your-website.com"><?php _e('Call me maybe !'); ?></a>
        <p class="hide-if-no-customize"><?php printf(__('or, <a href="%s">edit your site settings</a>'), admin_url('options-general.php')); ?></p>
      </div><!-- .welcome-panel-column -->
      <div class="welcome-panel-column">
        <h4><?php _e('Next Steps'); ?></h4>
        <ul>
          <?php if ('page' == get_option('show_on_front') && !get_option('page_for_posts')) : ?>
            <li><?php printf('<a href="%s" class="welcome-icon welcome-edit-page">' . __('Edit your front page') . '</a>', get_edit_post_link(get_option('page_on_front'))); ?></li>
            <li><?php printf('<a href="%s" class="welcome-icon welcome-add-page">' . __('Add additional pages') . '</a>', admin_url('post-new.php?post_type=page')); ?></li>
          <?php elseif ('page' == get_option('show_on_front')) : ?>
            <li><?php printf('<a href="%s" class="welcome-icon welcome-edit-page">' . __('Edit your front page') . '</a>', get_edit_post_link(get_option('page_on_front'))); ?></li>
            <li><?php printf('<a href="%s" class="welcome-icon welcome-add-page">' . __('Add additional pages') . '</a>', admin_url('post-new.php?post_type=page')); ?></li>
            <li><?php printf('<a href="%s" class="welcome-icon welcome-write-blog">' . __('Add a blog post') . '</a>', admin_url('post-new.php')); ?></li>
          <?php else : ?>
            <li><?php printf('<a href="%s" class="welcome-icon welcome-write-blog">' . __('Write your first blog post') . '</a>', admin_url('post-new.php')); ?></li>
            <li><?php printf('<a href="%s" class="welcome-icon welcome-add-page">' . __('Add an About page') . '</a>', admin_url('post-new.php?post_type=page')); ?></li>
          <?php endif; ?>
          <li><?php printf('<a href="%s" class="welcome-icon welcome-view-site">' . __('View your site') . '</a>', home_url('/')); ?></li>
        </ul>
      </div><!-- .welcome-panel-column -->
      <div class="welcome-panel-column welcome-panel-last">
        <h4><?php _e('More Actions'); ?></h4>
        <ul>
          <li><?php printf('<div class="welcome-icon welcome-widgets-menus">' . __('Manage <a href="%1$s">widgets</a> or <a href="%2$s">menus</a>') . '</div>', admin_url('widgets.php'), admin_url('nav-menus.php')); ?></li>
          <li><?php printf('<a href="%s" class="welcome-icon welcome-comments">' . __('Turn comments on or off') . '</a>', admin_url('options-discussion.php')); ?></li>
          <li><?php printf('<a href="%s" class="welcome-icon welcome-learn-more">' . __('Learn more about getting started') . '</a>', __('http://codex.wordpress.org/First_Steps_With_WordPress')); ?></li>
        </ul>
      </div><!-- .welcome-panel-column welcome-panel-last -->
    </div><!-- .welcome-panel-column-container -->
    <div>
      <script>
        /* Google Charts */
        google.charts.load('current', {
          'packages': ['gauge']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Label', 'Value'],
            ['Performance', 0],
            ['Accessibility', 0],
            ['Best Practies', 0],
            ['SEO', 0]
          ]);
          var options = {
            width: 750,
            height: 250,
            redFrom: 0,
            redTo: 50,
            yellowFrom: 50,
            yellowTo: 80,
            greenFrom: 80,
            greenTo: 100,
            minorTicks: 5
          };

          var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

          // google.visualization.events.addListener(chart, 'ready', afterDraw);

          chart.draw(data, options);

          function getRandomIntInclusive(min, max) {
            min = Math.ceil(min);
            max = Math.floor(max);
            return Math.floor(Math.random() * (max - min + 1) + min); //The maximum is inclusive and the minimum is inclusive 
          }

          setInterval(function() {
            data.setValue(0, 1, getRandomIntInclusive(99, 100));
            chart.draw(data, options);
          }, 500);
          setInterval(function() {
            data.setValue(1, 1, getRandomIntInclusive(99, 100));
            chart.draw(data, options);
          }, 500);
          setInterval(function() {
            data.setValue(2, 1, getRandomIntInclusive(99, 100));
            chart.draw(data, options);
          }, 500);
          setInterval(function() {
            data.setValue(3, 1, getRandomIntInclusive(99, 100));
            chart.draw(data, options);
          }, 500);

        }
        jQuery(".loading").fadeOut(100, function() {
          // fadeOut complete. Remove the loading div
          jQuery(".loading").remove(); //makes page more lightweight

        });
      </script>
    

    <?php }
  add_action('welcome_panel', 'wpex_wp_welcome_panel');



  remove_filter('the_content', 'wpautop');
  /**
   * Force You welcome Message to be display all the time
   */

  function wrapper()
  {

    add_action('load-index.php', 'show_welcome_panel');

    function show_welcome_panel()
    {
      // get the current user ID
      $user_id = get_current_user_id();

      if (1 != get_user_meta($user_id, 'show_welcome_panel', true)) // check if the welcome message is true or not in the datavase
        update_user_meta($user_id, 'show_welcome_panel', 1); // Update the user meta
    }
  }

  add_action('admin_init', 'wrapper');



  // Remove jQuery Migrate Script from header and Load jQuery from Google API
function crunchify_stop_loading_wp_embed_and_jquery() {
	if (!is_admin()) {
		wp_deregister_script('wp-embed');
//		wp_deregister_script('jquery');  // Bonus: remove jquery too if it's not required
	}
}
add_action('init', 'crunchify_stop_loading_wp_embed_and_jquery');


remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
function disable_embeds_code_init() {

  // Remove the REST API endpoint.
  remove_action( 'rest_api_init', 'wp_oembed_register_route' );
 
  // Turn off oEmbed auto discovery.
  add_filter( 'embed_oembed_discover', '__return_false' );
 
  // Don't filter oEmbed results.
  remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
 
  // Remove oEmbed discovery links.
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
 
  // Remove oEmbed-specific JavaScript from the front-end and back-end.
  remove_action( 'wp_head', 'wp_oembed_add_host_js' );
  add_filter( 'tiny_mce_plugins', 'disable_embeds_tiny_mce_plugin' );
 
  // Remove all embeds rewrite rules.
  add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
 
  // Remove filter of the oEmbed result before any HTTP requests are made.
  remove_filter( 'pre_oembed_result', 'wp_filter_pre_oembed_result', 10 );
 }
 
 add_action( 'init', 'disable_embeds_code_init', 9999 );
 
 function disable_embeds_tiny_mce_plugin($plugins) {
     return array_diff($plugins, array('wpembed'));
 }
 
 function disable_embeds_rewrites($rules) {
     foreach($rules as $rule => $rewrite) {
         if(false !== strpos($rewrite, 'embed=true')) {
             unset($rules[$rule]);
         }
     }
     return $rules;
 }
// Remove dns-prefetch Link from WordPress Head (Frontend)
remove_action( 'wp_head', 'wp_resource_hints', 2 );

// increase the size of the sidebar inspector width
function gb_gutenberg_admin_styles__() {
  echo '
      <style>
      @media (min-width: 782px){
      .interface-complementary-area {
          width: 320px;
      }
    }
      </style>
  ';
}
add_action('admin_head', 'gb_gutenberg_admin_styles__');
// toj custom rewrite
function toj_custom_rewrites()
{
    $theme_path = get_template();
    // var_dump($theme_path);
    add_rewrite_rule('^visit/(.+)/?', '/wp-content/themes/' . $theme_path . '/visit.php?visit_url=$1', 'top');
    flush_rewrite_rules();
}
add_action('init', 'toj_custom_rewrites');


// var_dump(get_stylesheet_directory());

  require 'plugin-update-checker-master/plugin-update-checker.php';
  $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://github.com/mfpDevForce/mediafairplay/',
    __FILE__,
    'mfp-theme'
  );

  //Optional: If you're using a private repository, specify the access token like this:
  $myUpdateChecker->setAuthentication('c4e25096f7df32bfaf5ad77de7a34d1a62093390');

  //Optional: Set the branch that contains the stable release.
  $myUpdateChecker->setBranch('master');
  $myUpdateChecker->getVcsApi()->enableReleaseAssets();
  // $updateChecker->setBranch('master'); tes