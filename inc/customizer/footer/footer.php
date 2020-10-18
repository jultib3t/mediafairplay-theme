<?php
function mfp_footer_control($wp_customize)
{
    $wp_customize->add_panel(
        'mfp_footer_panel',
        array(
            'title' => __('Footer ( Beta )', 'mediafairplay'),
            'description' => esc_html__('Adjust your Header', 'mediafairplay'),
            'priority' => 40,
        )
    );
    $wp_customize->add_section(
        'mfp_footer_scetion',
        array(
            'title' => __('Footer', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_footer_panel',
            'priority' => 30,
        )
    );

    $wp_customize->add_setting(
        'mfp_footer_bg_color',
        array(
            'default' => 'rgba(209,0,55,0.7)',
            'transport' => 'postMessage',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
        )
    );

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control($wp_customize,
        'mfp_footer_bg_color',
        array(
            'label' => __('Background Color'),
            'description' => esc_html__('Sample custom control description'),
            'section' => 'mfp_footer_scetion',
            'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
            'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
            ),
        )
    ));

    $wp_customize->add_section(
        'mfp_footer_bar_scetion',
        array(
            'title' => __('Footer Bar', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_footer_panel',
            'priority' => 30,
        )
    );

    $wp_customize->add_setting(
        'mfp_footer_bar_bg_color',
        array(
            'default' => '#000',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
        )
    );

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control($wp_customize,
        'mfp_footer_bar_bg_color',
        array(
            'label' => __('Background Color'),
            'description' => esc_html__(''),
            'section' => 'mfp_footer_bar_scetion',
            'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
            'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
            ),
        )
    ));
    $wp_customize->add_setting(
      'mfp_footer_bar_title_color',
      array(
          'default' => '#fff',
          'transport' => 'refresh',
          'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
      )
  );

  $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control($wp_customize,
      'mfp_footer_bar_title_color',
      array(
          'label' => __('Title Color'),
          'description' => esc_html__(''),
          'section' => 'mfp_footer_bar_scetion',
          'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
          'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
              '#000',
              '#fff',
              '#df312c',
              '#df9a23',
          ),
      )
  ));
    /** Footer bar text color */
    $wp_customize->add_setting(
      'mfp_footer_bar_text_color',
      array(
          'default' => '#fff',
          'transport' => 'refresh',
          'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
      )
  );

  $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control($wp_customize,
      'mfp_footer_bar_text_color',
      array(
          'label' => __('Text Color'),
          'description' => esc_html__(''),
          'section' => 'mfp_footer_bar_scetion',
          'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
          'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
              '#000',
              '#fff',
              '#df312c',
              '#df9a23',
          ),
      )
  ));
  /** Footer bar Link color */
  $wp_customize->add_setting(
   'mfp_footer_bar_link_color',
   array(
       'default' => '#fff',
       'transport' => 'refresh',
       'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
   )
);

$wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control($wp_customize,
   'mfp_footer_bar_link_color',
   array(
       'label' => __('Link Color'),
       'description' => esc_html__(''),
       'section' => 'mfp_footer_bar_scetion',
       'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
       'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
           '#000',
           '#fff',
           '#df312c',
           '#df9a23',
       ),
   )
));
  /** Footer bar hover Link Color */
  $wp_customize->add_setting(
   'mfp_footer_bar_h_link_color',
   array(
       'default' => 'blue',
       'transport' => 'refresh',
       'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
   )
);

$wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control($wp_customize,
   'mfp_footer_bar_h_link_color',
   array(
       'label' => __('Link Hover Color'),
       'description' => esc_html__(''),
       'section' => 'mfp_footer_bar_scetion',
       'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
       'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
           '#000',
           '#fff',
           '#df312c',
           '#df9a23',
       ),
   )
));


}
add_action('customize_register', 'mfp_footer_control');
