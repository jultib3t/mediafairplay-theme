<?php
function mfp_register_sidebars()
{
  register_sidebar(array(
    'name'          => __('Footer Area 1', 'mfp'),
    'id'            => 'mfp-footer-1',
    'description'   => __('First Footer Area', 'mfp'),
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
  ));

  register_sidebar(array(
    'name'          => __('Footer Area 2', 'mfp'),
    'id'            => 'mfp-footer-2',
    'description'   => __('Second Footer Area', 'mfp'),
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
  ));
  register_sidebar(array(
    'name'          => __('Footer Area 3', 'mfp'),
    'id'            => 'mfp-footer-3',
    'description'   => __('Second Footer Area', 'mfp'),
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
  ));
  register_sidebar(array(
    'name'          => __('Footer Bar Area 1', 'mfp'),
    'id'            => 'mfp-copyrights-footer',
    'description'   => __('Copyrights Footer Area', 'mfp'),
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
  ));
  register_sidebar(array(
    'name'          => __('Footer Bar Area 2', 'mfp'),
    'id'            => 'mfp-copyrights-footer-2',
    'description'   => __('Copyrights Footer Area', 'mfp'),
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widgettitle">',
    'after_title'   => '</h2>',
  ));
}
add_action('widgets_init', 'mfp_register_sidebars');