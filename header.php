<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id = 'content'>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mediafairplay
 */

?>
<!doctype html>
<html <?php language_attributes();
      ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='profile' href='https://gmpg.org/xfn/11'>

  <?php wp_head(); ?>

  <?php
  /**
   * 
   * call the FAQ block SCHEMA For Google. Look at functions.php -> cunstiom_blocks
   * 
   */
  // Check if the MFP FAQ Block exist or NOT
  $blocks = parse_blocks($post->post_content);
  $objects = json_decode(json_encode($blocks));
  $array = array();
  foreach ($objects as $object) {
    if ($object->blockName == 'acf/mfp-faq') {
      echo ldJson();
    }
  }

  // Google Tag Manager Head
  if (get_theme_mod('Google_Tag_Manager_Head')) {
    echo get_theme_mod('Google_Tag_Manager_Head', '<script></script>');
  }
  ?>
</head>

<body <?php body_class(); ?>>

  <?php
  // Google Tag Manager Body
  if (get_theme_mod('Google_Tag_Manager_Body')) {
    echo get_theme_mod('Google_Tag_Manager_Body', '<script></script>');
  }

  wp_body_open(); ?>

  <?php
  // By location.
  $menu_name = 'Header';
  $locations = get_nav_menu_locations();
  $menu_id   = $locations[$menu_name];

  function wp_get_menu_array($menu_id)
  {
    //$logo = the_custom_logo();
    $array_menu = wp_get_nav_menu_items($menu_id);
    $menu = array();
    foreach ($array_menu as $father) {
      if (empty($father->menu_item_parent)) {
        $menu[$father->ID] = array();
        $menu[$father->ID]['ID']             =   $father->ID;
        $menu[$father->ID]['title']          =   $father->title;
        $menu[$father->ID]['url']            =   $father->url;
        $menu[$father->ID]['children']       =   array();
        $childMenu = array();
        foreach ($array_menu as $child) {
          if ($child->menu_item_parent == $father->ID) {
            $childMenu[$child->ID] = array();
            $childMenu[$child->ID]['ID']          =   $child->ID;
            $childMenu[$child->ID]['title']       =   $child->title;
            $childMenu[$child->ID]['url']         =   $child->url;
            $childMenu[$child->ID]['children']       =   array();
            $grandChildMenu = array();
            foreach ($array_menu as $grandfather) {
              if ($grandfather->menu_item_parent == $child->ID) {
                $grandChildMenu[$grandfather->ID] = array();
                $grandChildMenu[$grandfather->ID]['ID']          =   $grandfather->ID;
                $grandChildMenu[$grandfather->ID]['title']       =   $grandfather->title;
                $grandChildMenu[$grandfather->ID]['url']         =   $grandfather->url;
                $childMenu[$grandfather->menu_item_parent]['children'][$grandfather->ID] = $grandChildMenu[$grandfather->ID];
              }
            }
            $menu[$child->menu_item_parent]['children'][$child->ID] = $childMenu[$child->ID];
          }
        }
      }
    }
    return $menu;
  }

  function custom_header_menu($menu_id)
  {
    $items = wp_get_menu_array($menu_id);
    echo '<ul class="main-menu clearfix">';
    foreach ($items as $item) {
      if (!empty($item['children'])) {
        $subs = $item['children'];
        
        $string = str_replace(' ', '', $item['title']);
        // print_r($subs);
        echo '<li>
                      <a href="' . $item['url'] . '">' . __($item['title'], 'mediafairplay') . ' <span class="caret"></span>
                        <label class="caret" for="' .$string . '" title=""></label></a>
                      <input id="' . $string . '" type="checkbox" />
                      <ul class="sub-menu">';
        foreach ($subs as $sub) {
          if (!empty($sub['children'])) {
            $string = str_replace(' ', '', $sub['title']);
            $grand_subs = $sub['children'];
            echo ' 
                            <li>
                                    <a href="' . $sub['url'] . '">' . __($sub['title'], 'mediafairplay') . ' <span class="caret"></span>
                                      <label class="caret" for="' .$string . '" title=""></label></a>
                                    <input id="' . $string . '" type="checkbox" />
                                    <ul class="sub-menu">';
            foreach ($grand_subs as $grand) {
              if (!empty($grand['children'])) {
                echo '<li>
                                        <a href="' . $grand['url'] . '">' . $grand['title'] . ' <span class="caret"></span><label class="caret" for="Test2" title=""></label></a><input id="Test2" type="checkbox" />
                                        <ul class="sub-menu">
                                          <li>
                                            <a href="#">A</a>
                                          </li>
                                          <li>
                                            <a href="#">B</a>
                                          </li>
                                        </ul>
                                      </li>';
              } else {
                echo '<li>
                                              <a href="' . $grand['url'] . '">' . $grand['title'] . '</a>
                                            </li>';
              }
            }
            echo '</ul>
                          </li>';
          } else {
            echo ' 
                          <li>
                                <a href="' . $sub['url'] . '">' . $sub['title'] . '</a>
                      </li>';
          }
        }
        echo  '</ul>
                      </li>';
      } else {
        echo '<li>
                <a class="" href="' . $item['url'] . '">' . $item['title'] . '</a>
              </li>';
      }
    }
    echo '</ul>';
  }


  //$logo = the_custom_logo();
  $custom_logo_id = get_theme_mod('custom_logo', 'logo');
  //var_dump( $custom_logo_id );
  $image_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', TRUE);
  $image = wp_get_attachment_image_src($custom_logo_id, 'full');


  ?>

  <!-- Header CSS - REMOVE IT ON PRODUCTION !! -->
  <style>
    .limit-width {
      max-width: 1200px;
      width: 100%;
      margin: 0 auto;
      padding: 0 10px;
    }

    <?php
    $post = get_post();
    $blocks = parse_blocks($post->post_content);
    foreach ($blocks as $block) {
      if ($block['blockName'] === 'core/latest-posts') {  ?>ul.wp-block-latest-posts.wp-block-latest-posts__list li {
      display: flex;
      flex-direction: column;
      margin-right: 0;
      padding: 0 15px;
      background-color: <?php echo get_theme_mod('mfp_latest_post_background_color', '#fff') ?>;
      box-shadow:
        <?php echo get_theme_mod('latest_posts_horizontal_length', '0') ?>px <?php echo get_theme_mod('latest_posts_vertical_Length', '3') ?>px <?php echo get_theme_mod('latest_posts_blur_radius', '5') ?>px <?php echo get_theme_mod('latest_posts_spread_radius', '3') ?>px <?php echo get_theme_mod('mfp_latest_post_shadow_color', 'rgba(0, 0, 0, .3)') ?>;
      border-radius: <?php echo get_theme_mod('latest_posts_border_radius', '4') ?>px;
      border: <?php echo get_theme_mod('latest_posts_border_thikness', '0') ?>px solid <?php echo get_theme_mod('mfp_latest_post_border_color', '#000') ?>;
    }

    .wp-block-latest-posts.is-grid li .wp-block-latest-posts__featured-image img {
      max-width: 100% !important;
      width: 100% !important;
      height: 190px;
      border-top-left-radius: <?php echo get_theme_mod('latest_posts_border_radius', '4') ?>px;
      border-top-right-radius: <?php echo get_theme_mod('latest_posts_border_radius', '4') ?>px;
    }

    .wp-block-latest-posts.is-grid li .wp-block-latest-posts__featured-image {
      margin-bottom: 0;
      margin-right: -15px;
      margin-left: -15px;
      border-radius: <?php echo get_theme_mod('latest_posts_border_radius', '4') ?>px;
    }

    .wp-block-latest-posts.is-grid li .wp-block-latest-posts__featured-image a {
      height: 100%;
      display: flex;
    }

    ul.wp-block-latest-posts.wp-block-latest-posts__list li a {
      height: auto;
      display: flex;
      flex-direction: column;
      justify-content: flex-start;
      text-decoration: none;
      font-size: <?php echo get_theme_mod('latest_posts_title_font_size', '14') ?>px;
      color: <?php echo get_theme_mod('mfp_latest_post_title_color', '#000') ?>;
      font-weight: <?php echo get_theme_mod('latest_posts_title_font_weight', '400') ?>;
    }

    ul.wp-block-latest-posts.wp-block-latest-posts__list li time.wp-block-latest-posts__post-date {
      font-size: <?php echo get_theme_mod('latest_posts_date_font_size', '14') ?>px;
      font-weight: <?php echo get_theme_mod('latest_posts_date_font_weight', '400') ?>;
      color: <?php echo get_theme_mod('mfp_latest_post_date_color', '#6c7781') ?>;
    }

    .wp-block-latest-posts__post-excerpt {
      font-size: <?php echo get_theme_mod('latest_posts_excerpt_font_size', '16') ?>px;
      font-weight: <?php echo get_theme_mod('latest_posts_excerpt_font_weight', '400') ?>;
      color: <?php echo get_theme_mod('mfp_latest_post_excerpt_color', '#000') ?>;
    }

    .wp-block-latest-posts.is-grid {
      justify-content: space-between;
    }

    <?php } ?><?php } ?>body {
      font-family: <?php echo get_theme_mod('mfp_font_familiy_control') ?>;
      background-color: <?php echo get_theme_mod('content_background_color', '#fff') ?>;
    }


    <?php

    /** Check if the breadcrumbs enables - if yes - enque style */
    if (get_theme_mods('mfp_enable_breadcrumbs')) { ?>p#breadcrumbs a,
    p#breadcrumbs {
      color: <?php echo get_theme_mod('mfp_breadcrumbs_color', '#000') ?>;
      text-decoration: none;
      font-size: <?php echo get_theme_mod('mfp_breadcrumbs_font_size_desktop', 14) ?>px;
      margin-top: 0;
      margin-bottom: 0;
    }

    <?php }
    ?>main#primary header.entry-header h1.entry-title {
      margin-block-start: 0;
      margin-block-end: 0;
    }

    /** Start Header Margin */

    /** Dektop */
    @media(min-width: 1000px) {
      .site-main {
        margin-top: <?php echo get_theme_mod('header_fixed_margin_top_desktop', 14) ?>px;
      }
    }

    /** Tablet */
    @media(max-width: 1000px) {
      .site-main {
        margin-top: <?php echo get_theme_mod('header_fixed_margin_top_tablet', 14) ?>px;
      }
    }

    /** Mobile */
    @media(max-width: 500px) {
      .site-main {
        margin-top: <?php echo get_theme_mod('header_fixed_margin_top_mobile', 14) ?>px;
      }
    }

    /** END Header Margin */
  </style>
  <!-- Header CSS END - REMOVE IT ON PRODUCTION !! -->

  <!-- Page Start -->
  <div id='page' class='site'>

    <style>
      .caret {
        width: 0px;
        height: 0px;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid red;
        display: inline-block;
        margin-right: 8px;
        vertical-align: middle;
      }

      .mfp-menu ul {
        margin: 0;
        padding: 0;
      }

      .mfp-menu .main-menu {
        display: none;
      }

      #menutoggle:checked~.main-menu {
        display: block;
        margin: 0 -2.83em;
      }

      #menutoggle:checked+.extra {
        display: flex;
        flex-direction: row-reverse;
        align-items: center;
      }

      .mfp-menu input[type="checkbox"],
      .mfp-menu ul span.caret {
        display: none;
      }

      .mfp-menu li,
      .mfp-menu .sub-menu {
        border-style: solid;
        border-color: rgba(0, 0, 0, 0.05);
      }

      .mfp-menu .sub-menu li a:hover,
      .mfp-menu .sub-menu li a:focus {
        color: #fff;
      }

      .mfp-menu .sub-menu li .caret {
        position: absolute;
        left: 1.5em;
        top: 20px;
        transform: rotate(90deg);
        -webkit-transform: rotate(90deg);
      }

      .mfp-menu .sub-menu li label.caret {
        transform: rotate(0deg);
        -webkit-transform: rotate(0deg);
      }

      .mfp-menu li,
      #toggle-menu {
        border-width: 0 0 1px;
      }

      .mfp-menu .sub-menu {
        background-color: #fff;
        border-width: 1px 1px 0;
      }

      .mfp-menu .sub-menu li:last-child {
        border-width: 0;
      }

      .mfp-menu li,
      #toggle-menu,
      .mfp-menu a {
        position: relative;
        display: block;
        color: <?php echo get_theme_mod('header_text_color', '#000') ?>;
        text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.125);
      }

      #toggle-menu,
      .mfp-menu a {
        padding: 18px 30px;
        text-decoration: none;
        font-weight: 700;
      }

      .mfp-menu a {
        transition: all 0.125s ease-in-out;
        -webkit-transition: all 0.125s ease-in-out;
      }

      .mfp-menu a:hover,
      .mfp-menu a:focus,
      .mfp-menu a.active {
        background-color: <?php echo get_theme_mod('header_background_hover_color', 'blue') ?>;
        color: <?php echo get_theme_mod('header_text_color_hover', '#fff') ?>;
      }

      .mfp-menu .sub-menu {
        display: none;
      }

      .mfp-menu input[type="checkbox"]:checked+.sub-menu {
        display: block;
      }

      .mfp-menu .sub-menu a:hover {
        color: #444;
      }

      #toggle-menu .caret {
        position: absolute;
        left: 1.5em;
        top: 25px;
      }

      .mfp-menu li label.caret {
        border: 0;
        position: absolute;
        left: 0 !important;
        top: 0 !important;
        right: 0 !important;
        width: 100%;
        height: 100%;
        margin-left: 0 !important;
      }

      #toggle-menu .caret,
      .mfp-menu li label.caret:after {
        content: "";
        width: 0px;
        height: 0px;
        border-left: 5px solid transparent;
        border-right: 5px solid transparent;
        border-top: 5px solid #fff;
        display: inline-block;
        left: 1.5em;
        position: absolute;
        top: 25px;
      }

      .mfp-menu .caret {
        line-height: 1;
      }

      .company-logo-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        display: flex;
        align-items: center;
      }

      nav.mfp-menu {
        position: relative;
      }

      .search .search-container .search-field {
        border-radius: 20px;
        border: 1px solid #a8c1c9;
        color: #3c4c54;
        font-size: 16px;
        text-align: center;
        padding: 7px 42px 7px 14px;
        background: #f7f7f7 url(../images/search_icon.svg) no-repeat scroll calc(100% - 12px) 6px;
        box-sizing: border-box;
        width: 100%;
        max-width: 300px;
        -webkit-appearance: none;
        font-family: muli;
      }

      .btn2 {
        position: absolute;
        width: 60px;
        height: 60px;
        top: 100px;
        left: 120px;
        -webkit-transition-duration: 0.5s;
        transition-duration: 0.5s;
      }

      .btn2 .icon {
        -webkit-transition-duration: 0.5s;
        transition-duration: 0.5s;
        position: absolute;
        height: 8px;
        width: 60px;
        top: 30px;
        background-color: #212121;
      }

      .btn2 .icon:before {
        -webkit-transition-duration: 0.5s;
        transition-duration: 0.5s;
        position: absolute;
        width: 60px;
        height: 8px;
        background-color: #212121;
        content: "";
        top: -20px;
      }

      .btn2 .icon:after {
        -webkit-transition-duration: 0.5s;
        transition-duration: 0.5s;
        position: absolute;
        width: 60px;
        height: 8px;
        background-color: #212121;
        content: "";
        top: 20px;
      }

      .btn2.open .icon {
        -webkit-transition-duration: 0.5s;
        transition-duration: 0.5s;
        background: transparent;
      }

      .btn2.open .icon:before {
        -webkit-transform: rotateZ(45deg) scaleX(1.25) translate(13px, 13px);
        transform: rotateZ(45deg) scaleX(1.25) translate(13px, 13px);
      }

      .btn2.open .icon:after {
        -webkit-transform: rotateZ(-45deg) scaleX(1.25) translate(12px, -12px);
        transform: rotateZ(-45deg) scaleX(1.25) translate(12px, -12px);
      }

      .btn2:hover {
        cursor: pointer;
      }

      .header-wrapper-mfp {
        position: fixed;
        width: 100%;
        max-width: 100%;
        background-color: <?php echo get_theme_mod('header_background_color', '#fff') ?>;
        box-shadow: 0 1px 6px 0 rgba(32, 33, 36, 0.28);
        z-index: 9;
        top: 0;
        padding: 0 2.83em;
      }

      li.languegue-switcher a.true-active {
        color: #7d010a;
      }

      li.languegue-switcher a.not-active {
        color: red;
      }

      li.languegue-switcher a.not-active:hover {
        text-decoration: underline;
        transition: all .3s ease;
        background-color: unset;
      }

      li.languegue-switcher a.true-active:focus {
        background: transparent;
      }

      span.true-active.avoid-clicks {
        display: flex;
        align-items: center;
        padding: 10px;
        padding-top: 0;
        padding-bottom: 0;
      }

      li.search-wrapper input#search-term:focus {
        border-color: red !important;
        color: red !important;
        border: 1px solid red;
        outline: none !important;
        border: 1px solid red;
        box-shadow: 0 0 10px #719ECE;
      }

      input#search-term {
        border-radius: 20px;
        text-align: center;
      }

      .footer-widget-wrapper-inside .third-footer-widget-wrapper li.widget.widget_text .textwidget img {
        max-width: 60px;
      }

      .footer-widget-wrapper-inside .third-footer-widget-wrapper li.widget.widget_text .textwidget {
        display: flex;
        justify-content: flex-end;
      }
      li.languegue-switcher a:last-child {
          border-left: 2px solid #d6d6d6;
        }
      @media only screen and (min-width: 1000px) {

        #toggle-menu,
        .mfp-menu a {
          padding: 11px 20px;
          text-decoration: none;
          font-weight: 700;
        }

        .mfp-menu .sub-menu li {
          width: auto;
        }

        .mfp-menu .main-menu {
          display: flex;
          flex-direction: row;
          flex-wrap: nowrap;
        }

        #toggle-menu,
        .mfp-menu label.caret {
          display: none;
        }

        .mfp-menu ul span.caret {
          display: inline-block;
        }

        .mfp-menu li {
          float: left;
          border-width: 0 1px 0 0;

        }

        .mfp-menu .sub-menu li {
          float: none;
        }

        .mfp-menu .sub-menu {
          border-width: 0;
          margin: 0;
          position: absolute;
          top: 100%;
          right: 0;
          width: 14em;
          z-index: 3000;
        }

        .mfp-menu .sub-menu,
        .mfp-menu input[type="checkbox"]:checked+.sub-menu {
          display: none;
        }

        .mfp-menu .sub-menu li {
          border-width: 0 0 1px;
        }

        .mfp-menu .sub-menu .sub-menu {
          top: 0;
          right: 100%;
        }

        .mfp-menu li:hover>input[type="checkbox"]+.sub-menu {
          display: block;
        }

        li.languegue-switcher {
          display: flex;
          flex-direction: row-reverse;
          border: none;
        }

        li.languegue-switcher a {
          padding: 10px;
          font-weight: 100;
          font-size: 16px;
          padding-top: 2px;
          padding-bottom: 2px;
          display: flex;
          align-items: center;
        }

        li.languegue-switcher a:hover {
          background: none;
          color: red;
        }

        .search-container {
          height: 100%;
          display: flex;
          align-items: center;
        }

        ul.main-menu.clearfix.extra {
          padding: 15px 0px;
        }

        ul.main-menu.clearfix.extra li.search-wrapper {
          margin-right: 10px;
        }

        #menutoggle:checked~.main-menu {
          display: flex;
          flex-direction: row;
          margin: unset;
        }

        header.header-wrapper-mfp nav.mfp-menu {
          max-width: <?php echo get_theme_mod('site_content_width', '1200') ?>px;
          margin: 0 auto;
        }
      }

      .company-logo-wrapper a.custom-logo-link:hover {
        background-color: unset;
      }

      @media(max-width: 1000px) {
        .red {
          color: red;
          text-decoration: underline;
          transition: all .3s ease;
        }

        .company-logo-wrapper {
          height: 61px;
          margin-right: -1.83em;
          margin-left: -2.5em;
        }

        .company-logo-wrapper a.custom-logo-link {
          padding: 0;
          display: flex;
          align-items: center;
        }

        .btn2 {
          top: 0;
          right: 15px;

        }

        .menu.btn2 {
          display: flex;
          justify-content: end;
          right: 0;
          width: 90px;
          padding-right: 15px;
        }

        .btn2 .icon {
          background: red;
          height: 2px;
          width: 20px;
        }

        .btn2 .icon:before {
          background: red;
          top: -5px;
          width: 20px;
          height: 2px;
        }

        .btn2 .icon:after {
          background: red;
          height: 2px;
          top: 5px;
          width: 20px;
        }

        .btn2.open .icon:before {
          transform: rotateZ(45deg) scaleX(0.9) translate(3px, 3px);
        }

        .btn2.open .icon:after {
          transform: rotateZ(-45deg) scaleX(0.9) translate(4px, -5px);
        }

        .mfp-menu li label.caret:after {
          border-top: 5px solid red;
        }

        label#toggle-menu {
          padding: 18px 40px;
          width: 20%;
          margin: 0 -2.83em;
        }

        label#toggle-menu span {
          pointer-events: none;
          font-size: 14px;
        }

        .menu.btn2:focus {
          outline: none;
          -webkit-touch-callout: none;
          -webkit-user-select: none;
          -khtml-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
          -webkit-tap-highlight-color: transparent;
        }

        .menu.btn2 {
          outline: none;
          -webkit-touch-callout: none;
          -webkit-user-select: none;
          -khtml-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
          -webkit-tap-highlight-color: transparent;
        }

        ul.main-menu.clearfix.extra {
          background-color: #e3e3e3;
          box-shadow: inset 0 3px 2px -2px #e3e3e3;
        }

        li.search-wrapper {
          width: 80%;
          padding-right: 30px;
          border: none;
        }

        li.languegue-switcher {
          /* width: 100%; */
          display: flex;
          width: 20%;
          justify-content: center;
        }

        li.languegue-switcher a {
          padding-right: 5px;
          padding-left: 5px;
          font-weight: 300;
        }

        li.search-wrapper input {
          width: 100%;
        }

        li.search-wrapper input#search-term {
          width: 100%;
          margin: 0 auto;
          border-radius: 15px;
          padding-right: 10px;
        }

        .footer-widget-wrapper-inside .third-footer-widget-wrapper li.widget.widget_text .textwidget {
          display: flex;
          justify-content: flex-start;
        }



        section#wrapper-widget-footer .footer-widget-wrapper-inside .second-footer-widget-wrapper {
          justify-content: flex-start;
        }

        section#wrapper-widget-footer .footer-widget-wrapper-inside .third-footer-widget-wrapper {
          text-align: left;
        }
      }

      .company-logo-wrapper a.custom-logo-link {
        padding: 0;
      }

      @media(max-width: 440px) {

        label#toggle-menu span {
          font-size: 12px;
        }
      }
    </style>
    <style>
      /** Start LOGO sizes */

      /** Tablet */
      @media(max-width: 1000px) {

        .company-logo-wrapper a.custom-logo-link img.custom-logo {
          max-width: <?php echo get_theme_mod('header_logo_size_tablet', '200') ?>px;
          width: 100%;
        }
      }

      /** Mobile */
      @media(max-width: 500px) {
        .company-logo-wrapper a.custom-logo-link img.custom-logo {
          max-width: <?php echo get_theme_mod('header_logo_size_mobile', '200') ?>px;
          width: 100%;
        }
      }

      /** END LOGO sizes */
    </style>
    <header class="header-wrapper-mfp">

      <nav dir="rtl" class="mfp-menu">
        <label for="menutoggle" id="toggle-menu">
          <span class="menu-text">Menu</span>
          <div class="menu btn2" data-menu="2">
            <div class="icon"></div>
          </div>
        </label>
        <input id="menutoggle" type="checkbox" />
        <ul class="main-menu clearfix extra">
          <li class="languegue-switcher">
            <?php
            $translations = pll_the_languages(array('raw' => 1));
            /* echo '<pre>';
                var_dump($translations);
              echo '</pre>'; */
            foreach ($translations as $translation) {
              //  print_r($translation);
              if ($translation['current_lang']) {
                $active_lang = 'true-active avoid-clicks';
                echo '<span class="' . $active_lang . '">' . ucwords($translation['slug']) . '</span>';
              } else {
                $active_lang = 'not-active';
                echo '<a class="' . $active_lang . '" href="' . $translation['url'] . '">' . ucwords($translation['slug']) . '</a>';
              }
              //slug

            }
            ?>

          </li>
          <li class="search-wrapper">

            <div class="search-container">

              <form method="get" action="/" _lpchecked="1">
                <label for="search-term" style="position: absolute; left: -9999px; height:0; width:0;">Search</label>
                <input id="search-term" type="text" name="s" class="search-field" placeholder="Search" value="Search">
                <input type="submit" style="position: absolute; left: -9999px; height:0; width:0;">
              </form>
            </div>

          </li>
        </ul>
        <?php echo custom_header_menu($menu_id); ?>
        <div class="company-logo-wrapper">
          <?php echo the_custom_logo(); ?>
        </div>
      </nav>

    </header>
    <script>
      const menu = document.querySelector('.menu');
      menu.addEventListener("click", menuclick);

      function menuclick() {
        this.classList.toggle("open");
        const menuText = document.querySelector('.menu-text');
        menuText.classList.toggle("red");
      }
    </script>