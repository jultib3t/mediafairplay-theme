<?php
  function mfp_features_controls($wp_customize)
  {
          /**
       *  Add Our mfp features panel
       */
      $wp_customize->add_panel(
          'mfp_features_panel',
          array(
              'title' => __('MFP Features', 'mediafairplay'),
              'description' => esc_html__('Adjust your Features', 'mediafairplay'),
              'priority'       => 80,
          )
      );
      /**
       * mfp_features_ section
       */
      $wp_customize->add_section('mfp_features_section', [
          'title' => __('Back To Top', 'mediafairplay'),
          'panel'    => 'mfp_features_panel'
      ]);
      /**
       * mfp_breadcrumbs_section
       */
      $wp_customize->add_section('mfp_breadcrumbs_section', [
          'title' => __('Breadcrumbs', 'mediafairplay'),
          'panel'    => 'mfp_features_panel'
      ]);
      /**
       * mfp_latest_post_section
       */
      $wp_customize->add_section('mfp_latest_post_section', [
          'title' => __('Latest Posts', 'mediafairplay'),
          'panel'    => 'mfp_features_panel'
      ]);
      /** START FAQ */
      $wp_customize->add_section('mfp_faq', [
          'title' => __('MFP FAQ', 'mediafairplay'),
          'panel'    => 'mfp_features_panel'
      ]);
      /** END FAQ */
      
      /** -------- START FOR FAQ ---------- */
      $wp_customize->add_setting(
          'faq_question_font_size',
          array(
              'default' => 15,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new mfp_faq_answer_control(
          $wp_customize,
          'faq_question_font_size',
          array(
              'label' => __('Question Font Size', 'mediafairplay'),
              'section' => 'mfp_faq',
              'input_attrs' => array(
                  'min' => 1,
                  'max' => 100,
                  'step' => 1,
              ),
          )
      ));
      // FOR ANSWER
      $wp_customize->add_setting(
          'faq_answer_font_size',
          array(
              'default' => 14,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new mfp_faq_answer_control(
          $wp_customize,
          'faq_answer_font_size',
          array(
              'label' => __('Answer Font Size', 'mediafairplay'),
              'section' => 'mfp_faq',
              'input_attrs' => array(
                  'min' => 1,
                  'max' => 100,
                  'step' => 1,
              ),
          )
      ));

      $wp_customize->add_setting(
          'mfp_faq_question_color',
          array(
              'default' => '#35353f',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
          $wp_customize,
          'mfp_faq_question_color',
          array(
              'label' => __('Question Color'),
              'description' => esc_html__(''),
              'section' => 'mfp_faq',
              'show_opacity' => true
          )
      ));

      $wp_customize->add_setting(
          'mfp_faq_question_background_color',
          array(
              'default' => '#fff',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
          $wp_customize,
          'mfp_faq_question_background_color',
          array(
              'label' => __('Question Background Color'),
              'description' => esc_html__(''),
              'section' => 'mfp_faq',
              'show_opacity' => true
          )
      ));

      $wp_customize->add_setting(
          'mfp_faq_question_hover_background_color',
          array(
              'default' => 'rgba(0,0,0,0.1)',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
          $wp_customize,
          'mfp_faq_question_hover_background_color',
          array(
              'label' => __('Question Hover Background Color'),
              'description' => esc_html__(''),
              'section' => 'mfp_faq',
              'show_opacity' => true
          )
      ));

      $wp_customize->add_setting(
          'mfp_faq_answer_color',
          array(
              'default' => '#35353f',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
          $wp_customize,
          'mfp_faq_answer_color',
          array(
              'label' => __('Answer Color'),
              'description' => esc_html__(''),
              'section' => 'mfp_faq',
              'show_opacity' => true
          )
      ));

      $wp_customize->add_setting(
          'mfp_faq_answer_background_color',
          array(
              'default' => '#f8f8f8',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
          $wp_customize,
          'mfp_faq_answer_background_color',
          array(
              'label' => __('Answer Background Color'),
              'description' => esc_html__(''),
              'section' => 'mfp_faq',
              'show_opacity' => true
          )
      ));
      /** -------- END FOR FAQ ---------- */


      /** ----------- Start of latest post ----------- */

      /** latest posts title font size */
      $wp_customize->add_setting(
          'latest_posts_title_font_size',
          array(
              'default' => 16,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Mfp_latest_post_title_custom_slider(
          $wp_customize,
          'latest_posts_title_font_size',
          array(
              'label' => __('Title Font size', 'mediafairplay'),
              'section' => 'mfp_latest_post_section',
              'input_attrs' => array(
                  'min' => 1,
                  'max' => 100,
                  'step' => 1,
              ),
          )
      ));
      /** Latest posts title color */
      $wp_customize->add_setting(
          'mfp_latest_post_title_color',
          array(
              'default' => '#000',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
          $wp_customize,
          'mfp_latest_post_title_color',
          array(
              'label' => __('Title Color'),
              'description' => esc_html__(''),
              'section' => 'mfp_latest_post_section',
              'show_opacity' => true
          )
      ));
      /** Latest posts title font weight */
      $wp_customize->add_setting(
          'latest_posts_title_font_weight',
          array(
              'default' => '400',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_text_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
          $wp_customize,
          'latest_posts_title_font_weight',
          array(
              'label' => __('Title Font Weight', 'mediafairplay'),
              'description' => esc_html__('', 'mediafairplay'),
              'section' => 'mfp_latest_post_section',
              'input_attrs' => array(
                  'placeholder' => __('Please select font weight...', 'mediafairplay'),
                  'multiselect' => false,
              ),
              'choices' => array(
                  '100' => __('100', 'mediafairplay'),
                  '200' => __('200', 'mediafairplay'),
                  '300' => __('300', 'mediafairplay'),
                  '400' => __('400', 'mediafairplay'),
                  '500' => __('500', 'mediafairplay'),
                  '600' => __('600', 'mediafairplay'),
                  '700' => __('700', 'mediafairplay'),
                  '800' => __('800', 'mediafairplay'),
                  '900' => __('900', 'mediafairplay'),
              )
          )
      ));
      /** latest posts date font size */
      $wp_customize->add_setting(
          'latest_posts_date_font_size',
          array(
              'default' => 11,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Mfp_latest_post_date_custom_slider(
          $wp_customize,
          'latest_posts_date_font_size',
          array(
              'label' => __('Date Font size', 'mediafairplay'),
              'section' => 'mfp_latest_post_section',
              'input_attrs' => array(
                  'min' => 1,
                  'max' => 100,
                  'step' => 1,
              ),
          )
      ));
      /** Latest posts date color */
      $wp_customize->add_setting(
          'mfp_latest_post_date_color',
          array(
              'default' => '#6c7781',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
          $wp_customize,
          'mfp_latest_post_date_color',
          array(
              'label' => __('Date Color'),
              'description' => esc_html__(''),
              'section' => 'mfp_latest_post_section',
              'show_opacity' => true
          )
      ));
      /** Latest posts date font weight */
      $wp_customize->add_setting(
          'latest_posts_date_font_weight',
          array(
              'default' => '400',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_text_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
          $wp_customize,
          'latest_posts_date_font_weight',
          array(
              'label' => __('Date Font Weight', 'mediafairplay'),
              'description' => esc_html__('', 'mediafairplay'),
              'section' => 'mfp_latest_post_section',
              'input_attrs' => array(
                  'placeholder' => __('Please select font weight...', 'mediafairplay'),
                  'multiselect' => false,
              ),
              'choices' => array(
                  '100' => __('100', 'mediafairplay'),
                  '200' => __('200', 'mediafairplay'),
                  '300' => __('300', 'mediafairplay'),
                  '400' => __('400', 'mediafairplay'),
                  '500' => __('500', 'mediafairplay'),
                  '600' => __('600', 'mediafairplay'),
                  '700' => __('700', 'mediafairplay'),
                  '800' => __('800', 'mediafairplay'),
                  '900' => __('900', 'mediafairplay'),
              )
          )
      ));
      /** Latest posts excerpt font size */
      $wp_customize->add_setting(
          'latest_posts_excerpt_font_size',
          array(
              'default' => 16,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Mfp_latest_post_Excerpt_custom_slider(
          $wp_customize,
          'latest_posts_excerpt_font_size',
          array(
              'label' => __('Excerpt Font size', 'mediafairplay'),
              'section' => 'mfp_latest_post_section',
              'input_attrs' => array(
                  'min' => 1,
                  'max' => 100,
                  'step' => 1,
              ),
          )
      ));
      /** Latest posts excerpt color */
      $wp_customize->add_setting(
          'mfp_latest_post_excerpt_color',
          array(
              'default' => '#000',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
          $wp_customize,
          'mfp_latest_post_excerpt_color',
          array(
              'label' => __('Excerpt Color'),
              'description' => esc_html__(''),
              'section' => 'mfp_latest_post_section',
              'show_opacity' => true
          )
      ));
      /** Latest posts excerpt font weight */
      $wp_customize->add_setting(
          'latest_posts_excerpt_font_weight',
          array(
              'default' => '400',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_text_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
          $wp_customize,
          'latest_posts_excerpt_font_weight',
          array(
              'label' => __('Excerpt Font Weight', 'mediafairplay'),
              'description' => esc_html__('', 'mediafairplay'),
              'section' => 'mfp_latest_post_section',
              'input_attrs' => array(
                  'placeholder' => __('Please select font weight...', 'mediafairplay'),
                  'multiselect' => false,
              ),
              'choices' => array(
                  '100' => __('100', 'mediafairplay'),
                  '200' => __('200', 'mediafairplay'),
                  '300' => __('300', 'mediafairplay'),
                  '400' => __('400', 'mediafairplay'),
                  '500' => __('500', 'mediafairplay'),
                  '600' => __('600', 'mediafairplay'),
                  '700' => __('700', 'mediafairplay'),
                  '800' => __('800', 'mediafairplay'),
                  '900' => __('900', 'mediafairplay'),
              )
          )
      ));
      /** Latest Posts text background color */
      $wp_customize->add_setting(
          'mfp_latest_post_background_color',
          array(
              'default' => '#fff',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
          )
      );
      $wp_customize->add_control(new MFP_latest_post_background_Customize_Alpha_Color_Control(
          $wp_customize,
          'mfp_latest_post_background_color',
          array(
              'label' => __('Background Color'),
              'description' => esc_html__(''),
              'section' => 'mfp_latest_post_section',
              'show_opacity' => true
          )
      ));
      /** Latest posts border thikness */
      $wp_customize->add_setting(
          'latest_posts_border_thikness',
          array(
              'default' => 0,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Mfp_latest_post_border_custom_slider(
          $wp_customize,
          'latest_posts_border_thikness',
          array(
              'label' => __('Border Thikness', 'mediafairplay'),
              'section' => 'mfp_latest_post_section',
              'input_attrs' => array(
                  'min' => 0,
                  'max' => 200,
                  'step' => 1,
              ),
          )
      ));
      /** Latest posts Border Radius */
      $wp_customize->add_setting(
          'latest_posts_border_radius',
          array(
              'default' => 4,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
          $wp_customize,
          'latest_posts_border_radius',
          array(
              'label' => __('Border Radius', 'mediafairplay'),
              'section' => 'mfp_latest_post_section',
              'input_attrs' => array(
                  'min' => 1,
                  'max' => 50,
                  'step' => 1,
              ),
          )
      ));
      /** Lateest posts border color */
      $wp_customize->add_setting(
          'mfp_latest_post_border_color',
          array(
              'default' => '#000',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
          $wp_customize,
          'mfp_latest_post_border_color',
          array(
              'label' => __('Border Color'),
              'description' => esc_html__(''),
              'section' => 'mfp_latest_post_section',
              'show_opacity' => true
          )
      ));
      /** latest posts horizontal length shadow */
      $wp_customize->add_setting(
          'latest_posts_horizontal_length',
          array(
              'default' => 0,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Mfp_latest_post_horizontal_custom_slider(
          $wp_customize,
          'latest_posts_horizontal_length',
          array(
              'label' => __('Horizontal Length', 'mediafairplay'),
              'section' => 'mfp_latest_post_section',
              'input_attrs' => array(
                  'min' => -200,
                  'max' => 200,
                  'step' => 1,
              ),
          )
      ));
      /** latest posts Vertical Length shadow */
      $wp_customize->add_setting(
          'latest_posts_vertical_Length',
          array(
              'default' => 3,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
          $wp_customize,
          'latest_posts_vertical_Length',
          array(
              'label' => __('Vertical Length', 'mediafairplay'),
              'section' => 'mfp_latest_post_section',
              'input_attrs' => array(
                  'min' => -200,
                  'max' => 200,
                  'step' => 1,
              ),
          )
      ));
      /** latest posts Blur Radius shadow */
      $wp_customize->add_setting(
          'latest_posts_blur_radius',
          array(
              'default' => 5,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
          $wp_customize,
          'latest_posts_blur_radius',
          array(
              'label' => __('Blur Radius', 'mediafairplay'),
              'section' => 'mfp_latest_post_section',
              'input_attrs' => array(
                  'min' => 0,
                  'max' => 300,
                  'step' => 1,
              ),
          )
      ));
      /** latest posts Spread Radius shadow */
      $wp_customize->add_setting(
          'latest_posts_spread_radius',
          array(
              'default' => 3,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
          $wp_customize,
          'latest_posts_spread_radius',
          array(
              'label' => __('Vertical Length', 'mediafairplay'),
              'section' => 'mfp_latest_post_section',
              'input_attrs' => array(
                  'min' => -200,
                  'max' => 200,
                  'step' => 1,
              ),
          )
      ));
      /** latest posts shadow color */
      $wp_customize->add_setting(
          'mfp_latest_post_shadow_color',
          array(
              'default' => 'rgba(0, 0, 0, .3)',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
          $wp_customize,
          'mfp_latest_post_shadow_color',
          array(
              'label' => __('Shadow Color'),
              'description' => esc_html__(''),
              'section' => 'mfp_latest_post_section',
              'show_opacity' => true
          )
      ));
      /** latest posts shadow outline / inset */
      $wp_customize->add_setting(
          'mfp_latest_post_shadow_outline_inset',
          array(
              'default' => 0,
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_switch_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Toggle_Switch_Custom_control(
          $wp_customize,
          'mfp_latest_post_shadow_outline_inset',
          array(
              'label' => __('Outline or Inset', 'mediafairplay'),
              'description' => esc_html__('', 'mediafairplay'),
              'section' => 'mfp_features_section'
          )
      ));

      /** ----------- End of latest post ----------- */

      /** Show MFP Back To Top (feature) */
      $wp_customize->add_setting(
          'mfp_enable_back_to_top',
          array(
              'default' => 0,
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_switch_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Toggle_Switch_Custom_control(
          $wp_customize,
          'mfp_enable_back_to_top',
          array(
              'label' => __('Enable Back To Top', 'mediafairplay'),
              'description' => esc_html__('WARNING - this feature may add extra js to our theme', 'mediafairplay'),
              'section' => 'mfp_features_section'
          )
      ));
      /** Back to top speed */
      $wp_customize->add_setting(
          'back_to_top_speed',
          array(
              'default' => 35,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
          $wp_customize,
          'back_to_top_speed',
          array(
              'label' => __('Speed To Top', 'mediafairplay'),
              'section' => 'mfp_features_section',
              'input_attrs' => array(
                  'min' => 1,
                  'max' => 200,
                  'step' => 1,
              ),
          )
      ));
      /** Back To Top background color */
      $wp_customize->add_setting(
          'mfp_back_to_top_background_color',
          array(
              'default' => '#000000',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
          $wp_customize,
          'mfp_back_to_top_background_color',
          array(
              'label' => __('Background Color'),
              'description' => esc_html__('choose background color'),
              'section' => 'mfp_features_section',
              'show_opacity' => true
          )
      ));
      /** Back To Top Hover background color */
      $wp_customize->add_setting(
          'mfp_back_to_top_hover_background_color',
          array(
              'default' => '#111111',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
          $wp_customize,
          'mfp_back_to_top_hover_background_color',
          array(
              'label' => __('Hover Background Color'),
              'description' => esc_html__('choose Hover background'),
              'section' => 'mfp_features_section',
              'show_opacity' => true
          )
      ));
      /** Back To Top text color */
      $wp_customize->add_setting(
          'mfp_back_to_top_text_color',
          array(
              'default' => '#ffffff',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
          $wp_customize,
          'mfp_back_to_top_text_color',
          array(
              'label' => __('Icon Color'),
              'description' => esc_html__('choose text color'),
              'section' => 'mfp_features_section',
              'show_opacity' => true
          )
      ));
      /** Back to top Width */
      $wp_customize->add_setting(
          'back_to_top_width',
          array(
              'default' => 40,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
          $wp_customize,
          'back_to_top_width',
          array(
              'label' => __('Width', 'mediafairplay'),
              'section' => 'mfp_features_section',
              'input_attrs' => array(
                  'min' => 10,
                  'max' => 200,
                  'step' => 1,
              ),
          )
      ));
      /** Back to top Height */
      $wp_customize->add_setting(
          'back_to_top_height',
          array(
              'default' => 40,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
          $wp_customize,
          'back_to_top_height',
          array(
              'label' => __('Height', 'mediafairplay'),
              'section' => 'mfp_features_section',
              'input_attrs' => array(
                  'min' => 10,
                  'max' => 200,
                  'step' => 1,
              ),
          )
      ));
      /** Back to top Radius */
      $wp_customize->add_setting(
          'mfp_back_to_top_radius',
          array(
              'default' => 2,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
          $wp_customize,
          'mfp_back_to_top_radius',
          array(
              'label' => __('Radius', 'mediafairplay'),
              'section' => 'mfp_features_section',
              'input_attrs' => array(
                  'min' => 1,
                  'max' => 50,
                  'step' => 1,
              ),
          )
      ));
      /** Back To Top Poistion */
      $wp_customize->add_setting(
          'back_to_top_position',
          array(
              'default' => 'right',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_radio_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Text_Radio_Button_Custom_Control(
          $wp_customize,
          'back_to_top_position',
          array(
              'label' => __('Position', 'mediafairplay'),
              'description' => esc_html__('Change Button Position', 'mediafairplay'),
              'section' => 'mfp_features_section',
              'choices' => array(
                  'left' => __('Left', 'mediafairplay'),
                  'right' => __('Right', 'mediafairplay')
              )
          )
      ));
      /** Back To Top Poistion sides */
      $wp_customize->add_setting(
          'back_to_top_position_sides',
          array(
              'default' => 40,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
          $wp_customize,
          'back_to_top_position_sides',
          array(
              'label' => __('position to the sides', 'mediafairplay'),
              'section' => 'mfp_features_section',
              'input_attrs' => array(
                  'min' => 0,
                  'max' => 300,
                  'step' => 1,
              ),
          )
      ));
      /** Back To Top Poistion Bottom */
      $wp_customize->add_setting(
          'back_to_top_position_bottom',
          array(
              'default' => 80,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
          $wp_customize,
          'back_to_top_position_bottom',
          array(
              'label' => __('position bottom', 'mediafairplay'),
              'section' => 'mfp_features_section',
              'input_attrs' => array(
                  'min' => 0,
                  'max' => 500,
                  'step' => 1,
              ),
          )
      ));

      /** Mfp breadcrubs Show it or not */
      $wp_customize->add_setting(
          'mfp_enable_breadcrumbs',
          array(
              'default' => 0,
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_switch_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Toggle_Switch_Custom_control(
          $wp_customize,
          'mfp_enable_breadcrumbs',
          array(
              'label' => __('Enable Breadcrumbs', 'mediafairplay'),
              'description' => esc_html__('WARNING - you need to enable this feature from yoast seo', 'mediafairplay'),
              'section' => 'mfp_breadcrumbs_section'
          )
      ));
      /** MFP BREADCRUMS Color */
      $wp_customize->add_setting(
          'mfp_breadcrumbs_color',
          array(
              'default' => '#000000',
              'transport' => 'refresh',
              'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
          )
      );
      $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
          $wp_customize,
          'mfp_breadcrumbs_color',
          array(
              'label' => __('Text Color'),
              'description' => esc_html__('choose text color'),
              'section' => 'mfp_breadcrumbs_section',
              'show_opacity' => true
          )
      ));
      /** MFP BReadcrumbs font size Desktop */
      $wp_customize->add_setting(
          'mfp_breadcrumbs_font_size_desktop',
          array(
              'default' => 11,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
          $wp_customize,
          'mfp_breadcrumbs_font_size_desktop',
          array(
              'label' => __('Font Size - Desktop', 'mediafairplay'),
              'section' => 'mfp_breadcrumbs_section',
              'input_attrs' => array(
                  'min' => 1,
                  'max' => 200,
                  'step' => 1,
              ),
          )
      ));
      /** MFP BReadcrumbs font size Tablet */
      $wp_customize->add_setting(
          'mfp_breadcrumbs_font_size_tablet',
          array(
              'default' => 11,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
          $wp_customize,
          'mfp_breadcrumbs_font_size_tablet',
          array(
              'label' => __('Font Size - Tablet', 'mediafairplay'),
              'section' => 'mfp_breadcrumbs_section',
              'input_attrs' => array(
                  'min' => 1,
                  'max' => 200,
                  'step' => 1,
              ),
          )
      ));
      /** MFP BReadcrumbs font size Mobile */
      $wp_customize->add_setting(
          'mfp_breadcrumbs_font_size_mobile',
          array(
              'default' => 11,
              'transport' => 'refresh',
              'sanitize_callback' => 'absint'
          )
      );
      $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
          $wp_customize,
          'mfp_breadcrumbs_font_size_mobile',
          array(
              'label' => __('Font Size - Mobile', 'mediafairplay'),
              'section' => 'mfp_breadcrumbs_section',
              'input_attrs' => array(
                  'min' => 1,
                  'max' => 200,
                  'step' => 1,
              ),
          )
      ));
  }
  add_action('customize_register', 'mfp_features_controls');