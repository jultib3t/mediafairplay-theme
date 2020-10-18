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
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='profile' href='https://gmpg.org/xfn/11'>
  <?php wp_head(); ?>
  <?php
  $turn_google_api = get_theme_mod('turn_google_api_font');
  if ($turn_google_api) :
    $sitefonts = get_theme_mod('sample_google_font_select');
    $sitefonts = json_decode($sitefonts);
    $font = $sitefonts->font;
    $font = preg_replace('/\s+/', '+', $font);
    $weight = $sitefonts->boldweight;
    $category = $sitefonts->category; ?>

    <link href="https://fonts.googleapis.com/css2?family=<?php echo $font ?>&display=swap" rel="stylesheet">

  <?php endif; ?>

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

  wp_body_open();

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
      if ($block['blockName'] === 'core/latest-posts') { ?>ul.wp-block-latest-posts.wp-block-latest-posts__list li {
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
      <?php if ($turn_google_api) : ?>font-family: <?php echo $font ?>, <?php echo $category ?>;
      <?php else : ?>font-family: <?php echo get_theme_mod('global_typo_family', 'Arial') ?>;
      <?php endif; ?>background-color: <?php echo get_theme_mod('content_background_color', '#fff') ?>;
      font-size: <?php echo get_theme_mod('global_typo_font_size', 16); ?>px;
      font-weight: <?php echo get_theme_mod('global_typo_font_weight', 400); ?>;
      font-style: normal;
      text-transform: <?php echo get_theme_mod('global_typo_text_transform', 'capitalize'); ?>;
      margin: 0;
      line-height: <?php echo get_theme_mod('global_typo_line_height', 1.5); ?>;
      color: <?php echo get_theme_mod('global_text_color', '#404040'); ?>;
    }

    h1 {
      font-size: <?php echo get_theme_mod('global_h1_font_size', '48') ?>px;
      color: <?php echo get_theme_mod('h1_global_color', '#000') ?>;
    }

    h2 {
      font-size: <?php echo get_theme_mod('global_h2_font_size', '48') ?>px;
      color: <?php echo get_theme_mod('h2_global_color', '#000') ?>;
    }

    h3 {
      font-size: <?php echo get_theme_mod('global_h3_font_size', '48') ?>px;
      color: <?php echo get_theme_mod('h3_global_color', '#000') ?>;
    }

    h4 {
      font-size: <?php echo get_theme_mod('global_h4_font_size', '48') ?>px;
      color: <?php echo get_theme_mod('h4_global_color', '#000') ?>;
    }

    h5 {
      font-size: <?php echo get_theme_mod('global_h5_font_size', '48') ?>px;
      color: <?php echo get_theme_mod('h5_global_color', '#000') ?>;
    }

    h6 {
      font-size: <?php echo get_theme_mod('global_h6_font_size', '48') ?>px;
      color: <?php echo get_theme_mod('h6_global_color', '#000') ?>;
    }

    p {
      margin-bottom: <?php echo get_theme_mod('global_typo_p_margin_bottom', 1.5); ?>em;
    }

    a {
      color: <?php echo get_theme_mod('global_Link_Color', '#0073aa'); ?>;
    }

    a:active,
    a:focus,
    a:hover {
      color: <?php echo get_theme_mod('global_Link_Hover_Color', '#191970'); ?>;
    }

    a:focus {
      outline: thin dotted;
    }

    a:active,
    a:hover {
      outline: 0;
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

    /** -------- */
    .site-main {

      <?php
      $layout = get_theme_mod('global_layout_layout', 'container');
      if ($layout == 'container') : ?>max-width: <?php echo get_theme_mod('global_container_width', 1200); ?>px;
      <?php else : ?>max-width: 100%;
      <?php endif; ?>margin-right: auto;
      margin-left: auto;
      padding-right: 0.83em;
      padding-left: 0.83em;
      background-color: <?php echo get_theme_mod('global_Content_Background_Color', '#fff'); ?>;
    }

    <?php
    $layout = get_theme_mod('global_layout_layout', 'container');
    // Run code only for Single post page
    if (is_single() && 'post' == get_post_type()) :

      $layout_page = get_theme_mod('global_layout_blog_post_layout', 'default');
      if ($layout_page == 'default' || $layout_page == 'container') : ?>.site-main {
      max-width: <?php echo get_theme_mod('global_container_width', 1200); ?>px;
    }

    <?php else :
        echo 'max-width: 100%;';
      endif;
    endif;

    // run code for archive
    if (is_archive()) :
      $layout_page = get_theme_mod('global_layout_blog_post_layout', 'default');
      if ($layout_page == 'default' || $layout_page == 'container') : ?>.site-main {
      max-width: <?php echo get_theme_mod('global_container_width', 1200); ?>px;
    }

    <?php else :
        echo 'max-width: 100%;';
      endif;
    endif;

    // run code for pages
    if (is_page()) :
      $layout_page = get_theme_mod('global_layout_blog_post_layout', 'default');
      if ($layout_page == 'default' || $layout_page == 'container') : ?>.site-main {
      max-width: <?php echo get_theme_mod('global_container_width', 1200); ?>px;
    }

    <?php else :
        echo 'max-width: 100%;';
      endif;
    endif;
    ?>@media(max-width: <?php echo get_theme_mod('global_container_width', 1200); ?>px) {
      .site-main {
        margin-right: 0.83em;
        margin-left: 0.83em;
        padding-right: 10px;
        padding-left: 10px;
      }
    }

    /** Dektop */
    @media(min-width: 1000px) {
      .site-main {
        margin-top: <?php echo get_theme_mod('header_fixed_margin_top_desktop', 120) ?>px;
      }
    }

    /** Tablet */
    @media(max-width: 1000px) {
      .site-main {
        margin-top: <?php echo get_theme_mod('header_fixed_margin_top_tablet', 120) ?>px;
      }
    }

    /** Mobile */
    @media(max-width: 500px) {
      .site-main {
        margin-top: <?php echo get_theme_mod('header_fixed_margin_top_mobile', 70) ?>px;
        margin-right: 0;
        margin-left: 0;
      }
    }

    /** END Header Margin */
  </style>
  <style>
    .caret {
      width: 0px;
      height: 0px;
      border-left: 5px solid transparent;
      border-right: 5px solid transparent;
      border-top: 5px solid <?php echo get_theme_mod('header_caret_color', 'red') ?>;
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
      /* background-color: #fff; */
      background-color: <?php echo get_theme_mod('header_background_color', '#fff') ?>;
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
      text-align: left;
    }

    .mfp-menu a.menu-item:hover,
    .mfp-menu a.menu-item:focus,
    .mfp-menu a.menu-item.active {
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

    nav.mfp-menu ul li:last-child {
      border-width: 0;
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

    .company-logo-wrapper a.custom-logo-link {
      width: 100%;
      max-width: 100%;
      height: auto;
    }

    .company-logo-wrapper a.custom-logo-link img.custom-logo {
      width: 100%;
      max-width: 100%;
      height: 100%;
    }

    @media only screen and (min-width: 1000px) {

      #toggle-menu,
      .mfp-menu a {
        padding: 11px 20px;
        text-decoration: none;
        font-weight: 700;
      }

      .mfp-menu a {
        text-align: unset;
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
        transition: all .3s ease;
      }

      .mfp-menu a.menu-item:hover span.caret {
        transform: rotate(180deg);
        transition: all .3s ease;
      }

      .mfp-menu li {
        float: left;
        border-width: 0 0 0 1px;

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

      .header-wrapper-mfp {
        height: <?php echo get_theme_mod('header_height_desktop', '110') ?>px;
        display: flex;
        align-items: flex-end;
      }

      .header-wrapper-mfp nav.mfp-menu {
        max-width: <?php echo get_theme_mod('site_content_width', '1200') ?>px;
        margin: 0 auto;
        width: 100%;
        direction: <?php echo get_theme_mod('header_alignment', 'rtl') ?>;
      }

      <?php
      $header_alignment = get_theme_mod('header_alignment', 'rtl');
      if ($header_alignment == 'ltr') : ?>.company-logo-wrapper {
        right: 0;
        left: unset;
      }

      <?php elseif ($header_alignment == 'centered') : ?>nav.mfp-menu {
        display: flex;
        flex-direction: column-reverse;
        height: 100%;
        align-items: center;
      }

      .company-logo-wrapper {
        position: relative;
      }

      ul.main-menu.clearfix.extra {
        display: none;
      }

      <?php endif; ?>
    }

    .company-logo-wrapper a.custom-logo-link:hover {
      background-color: unset;
    }

    @media(max-width: 1000px) {
      .red {
        color: <?php echo get_theme_mod('header_hamburger_color', 'red') ?>;
        text-decoration: underline;
        transition: all .3s ease;
      }

      .company-logo-wrapper {
        height: <?php echo get_theme_mod('header_height_tablet', '61') ?>px;
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
        width: auto;
        padding-right: 15px;
        margin-left: 25px;
      }

      .btn2 .icon {
        background: <?php echo get_theme_mod('header_hamburger_color', 'red') ?>;
        height: 2px;
        width: 20px;
      }

      .btn2 .icon:before {
        background: <?php echo get_theme_mod('header_hamburger_color', 'red') ?>;
        top: -5px;
        width: 20px;
        height: 2px;
      }

      .btn2 .icon:after {
        background: <?php echo get_theme_mod('header_hamburger_color', 'red') ?>;
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
        left: unset;
        right: 1.5em;
      }

      label#toggle-menu {
        padding: 18px 40px;
        width: 20%;
        margin: 0 -2.83em;
        height: <?php echo get_theme_mod('header_height_tablet', '110') ?>px;
        display: flex;
        align-items: center;
        padding-right: 0.83em;
      }

      label#toggle-menu span {
        pointer-events: none;
        font-size: 14px;
        order: 2;
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
        position: relative;
        order: 1;
        padding-right: 10px;
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

      #menutoggle:checked+.extra {
        justify-content: center;
        padding-top: 10px;
        padding-bottom: 10px;
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

      .image-wrppaer img {
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

      .image-wrppaer img {
        max-width: <?php echo get_theme_mod('header_logo_size_mobile', '200') ?>px;
        width: 100%;
      }

      label#toggle-menu {
        height: <?php echo get_theme_mod('header_height_mobile', '61') ?>px;
      }

      .company-logo-wrapper {
        height: <?php echo get_theme_mod('header_height_mobile', '61') ?>px;
      }
    }

    /** END LOGO sizes */
  </style>
  <!-- Header CSS END - REMOVE IT ON PRODUCTION !! -->

  <!-- Page Start -->
  <div id='page' class='site'>

    <?php $layout_choose = get_theme_mod('global_layout_choose', 'layout_1'); ?>
    <?php if ($layout_choose == 'layout_1') : ?>
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

            <?php
            // check if polylang plugin exists
            if (function_exists('pll_the_languages')) { ?>
              <li class="languegue-switcher">
                <?php
                $translations = pll_the_languages(array('raw' => 1));
                foreach ($translations as $translation) {
                  if ($translation['current_lang']) {
                    $active_lang = 'true-active avoid-clicks';
                    echo '<span class="' . $active_lang . '">' . ucwords($translation['slug']) . '</span>';
                  } else {
                    $active_lang = 'not-active';
                    echo '<a class="' . $active_lang . '" href="' . $translation['url'] . '">' . ucwords($translation['slug']) . '</a>';
                  }
                } ?>
              </li>
            <?php
            }
            ?>

            <li class="search-wrapper">
              <div class="search-container">
                <form method="get" action="<?php echo home_url('/'); ?>" _lpchecked="1">
                  <label for="search-term" style="position: absolute; left: -9999px; height:0; width:0;">Search</label>
                  <input id="search-term" type="text" name="s" class="search-field" placeholder="Search" value="Search">
                  <input type="submit" style="position: absolute; left: -9999px; height:0; width:0;">
                </form>
              </div>
            </li>
          </ul>
          <?php
          // By location.
          $menu_name = 'Header';
          $locations = get_nav_menu_locations();
          $menu_id = $locations[$menu_name];
          // check if our custom header is empty or not
          if (!empty(custom_header_menu($menu_id))) {
            echo custom_header_menu($menu_id);
          } else {
            echo "menu is empty, please add a new menu call 'Header'";
          }
          ?>
          <div class="company-logo-wrapper">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo', 'logo');
            $image_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
            $image = wp_get_attachment_image_src($custom_logo_id, 'full');
            // check if the custom logo exists or not
            if (!empty($custom_logo_id)) {
              echo the_custom_logo();
            } else {
              echo '<a href="' . home_url('/') . '" class="custom-logo-link" rel="home" aria-current="page"><img width="225" height="90" src="' . get_stylesheet_directory_uri() . '/images/first_logo.png' . '" class="custom-logo" alt="Reputable Online Casinos"></a>';
            }
            ?>
          </div>
        </nav>
      </header>
      <script>
        // menu script
        const menu = document.querySelector('.menu');
        menu.addEventListener("click", menuclick);

        function menuclick() {
          this.classList.toggle("open");
          const menuText = document.querySelector('.menu-text');
          menuText.classList.toggle("red");
        }
      </script>
    <?php else : // if layout will be layout_2
    ?>
      <link type="text/css" rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/inc/menus/mmenu/mm_style.css" />
      <?php
      echo '<style>
	                .header-mfp-wrapper {
	                  background: ' . get_theme_mod('header_background_color', '#eee') . ';
	                  position: fixed;
	                  width: 100%;
	                  top: 0;
	                }
	                .header-mfp{
	                  background-color: inherit;
	                  position: relative;
	                  height: 110px;
	                  padding-top: 5px;
	                  padding-bottom: 5px;
	                  max-width: 1200px;
	                  margin: 0 auto;
	                }

	                .mm-spn ul{
	                  font-size: ' . get_theme_mod('header_font_size_desktop', 16) . 'px;
	                  font-weight: ' . get_theme_mod('mfp_header_font_weight', '400') . ';
	                }
	                @media(max-width: 1000px){
	                  .mm-spn ul{
	                    font-size: ' . get_theme_mod('header_font_size_tablet', 15) . 'px;
	                  }
	                }
	                @media(max-width: 500px){
	                  .mm-spn ul{
	                    font-size: ' . get_theme_mod('header_font_size_mobile', 14) . 'px;
	                  }
	                }
	            </style>';
      ?>
      <div class="header-mfp-wrapper">
        <div class="header-mfp">
          <a href="#menu" class="header-mfp-a"><span></span></a>
          <div class="image-wrppaer">
            <?php
            $custom_logo_id = get_theme_mod('custom_logo', 'logo');
            $image_alt = get_post_meta($custom_logo_id, '_wp_attachment_image_alt', true);
            $image = wp_get_attachment_image_src($custom_logo_id, 'full');
            // check if the custom logo exists or not
            if (!empty($custom_logo_id)) {
              echo the_custom_logo();
            } else {
              echo '<a href="' . home_url('/') . '" class="custom-logo-link" rel="home" aria-current="page"><img width="225" height="90" src="' . get_stylesheet_directory_uri() . '/images/first_logo.png' . '" class="custom-logo" alt="Reputable Online Casinos"></a>';
            }
            ?>

          </div>

          <?php
          // By location.
          $menu_name = 'Header';
          $locations = get_nav_menu_locations();
          $menu_id = $locations[$menu_name];
          // check if our custom header is empty or not
          if (!empty(custom_header_menu_2($menu_id))) {
            echo custom_header_menu_2($menu_id);
          } else {
            echo "menu is empty, please add a new menu call 'Header'";
          }
          ?>

        </div>
      </div>
      <script src="<?php echo get_template_directory_uri() ?>/inc/menus/mmenu/mm_script.js"></script>
      <script>
        var menu = new MmenuLight(
          document.querySelector('#menu'),
          'all'
        );

        var navigator = menu.navigation({
          selectedClass: 'Selected',
          slidingSubmenus: true,
          theme: 'light',
          title: 'Menu'
        });

        var drawer = menu.offcanvas({
          position: 'left'
        });

        //	Open the menu.
        document.querySelector('a[href="#menu"]')
          .addEventListener('click', evnt => {
            evnt.preventDefault();
            drawer.open();
          });
      </script>
    <?php endif; ?>