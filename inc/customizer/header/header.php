<?php

function register_header_customizer($wp_customize)
{
    /** Header Control */

    /**
     *  Add Our Main Header panel
     */
    $wp_customize->add_panel(
        'mfp_header_panel',
        array(
            'title' => __('Header', 'mediafairplay'),
            'description' => esc_html__('Adjust your Header', 'mediafairplay'),
            'priority'       => 40,
        )
    );

    /**
     * Hedaer Direction section
     */
    $wp_customize->add_section(
        'mfp_header_layout_section',
        array(
            'title' => __('Header Layout ( Beta )', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_header_panel',
            'priority'       => 30
        )
    );

    /**
     * Hedaer Position section
     */
    $wp_customize->add_section(
        'mfp_header_position_section',
        array(
            'title' => __('Header Position', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_header_panel',
            'priority'       => 30
        )
    );
    /**
     * Hedaer Fonts section
     */
    $wp_customize->add_section(
        'mfp_header_fonts_section',
        array(
            'title' => __('Fonts Size', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_header_panel',
            'priority'       => 30
        )
    );
    /**
     * Hedaer Colors section
     */
    $wp_customize->add_section(
        'mfp_header_colors_section',
        array(
            'title' => __('Header Colors', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_header_panel',
            'priority'       => 30
        )
    );
    /**
     * Hedaer Width Height section
     */
    $wp_customize->add_section(
        'mfp_header_width_height_section',
        array(
            'title' => __('Header Height', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_header_panel',
            'priority'       => 30
        )
    );
    /** header height desktop*/
    $wp_customize->add_setting(
        'header_height_desktop',
        array(
            'default' => 110,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'header_height_desktop',
        array(
            'label' => __('Desktop', 'mediafairplay'),
            'section' => 'mfp_header_width_height_section',
            'input_attrs' => array(
                'min' => 1,
                'max' => 1000,
                'step' => 10,
            ),
        )
    ));
    /** header height tablet */
    $wp_customize->add_setting(
        'header_height_tablet',
        array(
            'default' => 61,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'header_height_tablet',
        array(
            'label' => __('Tablet', 'mediafairplay'),
            'section' => 'mfp_header_width_height_section',
            'input_attrs' => array(
                'min' => 1,
                'max' => 1000,
                'step' => 10,
            ),
        )
    ));
    /** header height mobile */
    $wp_customize->add_setting(
        'header_height_mobile',
        array(
            'default' => 61,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'header_height_mobile',
        array(
            'label' => __('Mobile', 'mediafairplay'),
            'section' => 'mfp_header_width_height_section',
            'input_attrs' => array(
                'min' => 1,
                'max' => 1000,
                'step' => 10,
            ),
        )
    ));
    /**
     * Hedaer Mobile menu
     */

    /** If header fixed - margin - Desktop*/
    $wp_customize->add_setting(
        'header_fixed_margin_top_desktop',
        array(
            'default' =>    50,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new mfp_Slider_Custom_Control_With_title_description(
        $wp_customize,
        'header_fixed_margin_top_desktop',
        array(
            'label' => __('margin top - Dekstop', 'mediafairplay'),
            'description' => __('margin top - Dekstop', 'mediafairplay'),
            'section' => 'mfp_header_position_section',
            'input_attrs' => array(
                'min' => 1,
                'max' => 200,
                'step' => 1,
            ),
        )
    ));
    /** If header fixed - margin - Tablet */
    $wp_customize->add_setting(
        'header_fixed_margin_top_tablet',
        array(
            'default' =>    50,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new mfp_Slider_Custom_Control(
        $wp_customize,
        'header_fixed_margin_top_tablet',
        array(
            'label' => __('', 'mediafairplay'),
            'description' => __('margin top - Tablet', 'mediafairplay'),
            'section' => 'mfp_header_position_section',
            'input_attrs' => array(
                'min' => 1,
                'max' => 200,
                'step' => 1,
            ),
        )
    ));
    /** If header fixed - margin - Mobile */
    $wp_customize->add_setting(
        'header_fixed_margin_top_mobile',
        array(
            'default' =>    40,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new mfp_Slider_Custom_Control(
        $wp_customize,
        'header_fixed_margin_top_mobile',
        array(
            'label' => __('', 'mediafairplay'),
            'description' => __('margin top - Mobile', 'mediafairplay'),
            'section' => 'mfp_header_position_section',
            'input_attrs' => array(
                'min' => 1,
                'max' => 200,
                'step' => 1,
            ),
        )
    ));
    /** header background color */
    $wp_customize->add_setting(
        'header_background_color',
        array(
            'default' => 'blue',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'header_background_color',
        array(
            'label' => __('Choose Background Color'),
            'description' => esc_html__(''),
            'section' => 'mfp_header_colors_section',
            'show_opacity' => true
        )
    ));

    /** header text color */
    $wp_customize->add_setting(
        'header_text_color',
        array(
            'default' => '#000',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'header_text_color',
        array(
            'label' => __('Choose Text Color'),
            'description' => esc_html__(''),
            'section' => 'mfp_header_colors_section',
            'show_opacity' => true
        )
    ));
    /** caret color */
    $wp_customize->add_setting(
        'header_caret_color',
        array(
            'default' => 'red',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'header_caret_color',
        array(
            'label' => __('Caret Color'),
            'description' => esc_html__(''),
            'section' => 'mfp_header_colors_section',
            'show_opacity' => true
        )
    ));
    /** hamburger color */
    $wp_customize->add_setting(
        'header_hamburger_color',
        array(
            'default' => 'red',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'header_hamburger_color',
        array(
            'label' => __('Hamburger Color'),
            'description' => esc_html__(''),
            'section' => 'mfp_header_colors_section',
            'show_opacity' => true
        )
    ));
    /** header background hover color */
    $wp_customize->add_setting(
        'header_background_hover_color',
        array(
            'default' => 'rgba(209,0,55,0.7)',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'header_background_hover_color',
        array(
            'label' => __('Choose Background Hover Color'),
            'description' => esc_html__('add your own background color'),
            'section' => 'mfp_header_colors_section',
            'show_opacity' => true
        )
    ));
    /** header text color hover */
    $wp_customize->add_setting(
        'header_text_color_hover',
        array(
            'default' => '#fff',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'header_text_color_hover',
        array(
            'label' => __('Choose Hover Text Color'),
            'description' => esc_html__(''),
            'section' => 'mfp_header_colors_section',
            'show_opacity' => true
        )
    ));

    /** header DROP down background color */
    $wp_customize->add_setting(
        'menu_drop_down_bg',
        array(
            'default' => '#fff',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'menu_drop_down_bg',
        array(
            'label' => __('Drop Down Background Color'),
            'description' => esc_html__(''),
            'section' => 'mfp_header_colors_section',
            'show_opacity' => true
        )
    ));

    /** header font size desktop*/
    $wp_customize->add_setting(
        'header_font_size_desktop',
        array(
            'default' => 16,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'header_font_size_desktop',
        array(
            'label' => __('Desktop - Font Size (px)', 'mediafairplay'),
            'section' => 'mfp_header_fonts_section',
            'input_attrs' => array(
                'min' => 1,
                'max' => 100,
                'step' => 1,
            ),
        )
    ));
    /** header font size tablet*/
    $wp_customize->add_setting(
        'header_font_size_tablet',
        array(
            'default' => 14,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'header_font_size_tablet',
        array(
            'label' => __('Tablet - Font Size (px)', 'mediafairplay'),
            'section' => 'mfp_header_fonts_section',
            'input_attrs' => array(
                'min' => 1,
                'max' => 100,
                'step' => 1,
            ),
        )
    ));
    /** header font size mobile*/
    $wp_customize->add_setting(
        'header_font_size_mobile',
        array(
            'default' => 14,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'header_font_size_mobile',
        array(
            'label' => __('Mobile - Font Size (px)', 'mediafairplay'),
            'section' => 'mfp_header_fonts_section',
            'input_attrs' => array(
                'min' => 1,
                'max' => 200,
                'step' => 1,
            ),
        )
    ));
    $wp_customize->add_setting(
        'mfp_header_font_weight',
        array(
            'default' => '400',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'mfp_header_font_weight',
        array(
            'label' => __('', 'mediafairplay'),
            'description' => esc_html__('Choose Header Font Weight', 'mediafairplay'),
            'section' => 'mfp_header_fonts_section',
            'input_attrs' => array(
                'placeholder' => __('Please select a state...', 'mediafairplay'),
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
    /** Header Alignment */
    $wp_customize->add_setting(
        'global_layout_choose',
        array(
            'default' => 'layout_1',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );

    $wp_customize->add_control(new Skyrocket_Image_Radio_Button_Custom_Control(
        $wp_customize,
        'global_layout_choose',
        array(
            'label' => __('Header Layout'),
            'description' => esc_html__(''),
            'section' => 'mfp_header_layout_section',
            'choices' => array(
                'layout_1' => array(  // Required. Setting for this particular radio button choice
                    'image' => trailingslashit(get_template_directory_uri()) . 'images/layout_1.png', // Required. URL for the image
                    'name' => __('layout_1') // Required. Title text to display
                ),
                'layout_2' => array(
                    'image' => trailingslashit(get_template_directory_uri()) . 'images/layout_2.png',
                    'name' => __('layout_2')
                )
            )
        )
    ));
    $wp_customize->add_setting(
        'global_header_width',
        array(
            'default' => 1200,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'global_header_width',
        array(
            'label' => __('Width', 'mediafairplay'),
            'section' => 'mfp_header_layout_section',
            'input_attrs' => array(
                'min' => 100,
                'max' => 1920,
                'step' => 20,
            ),
        )
    ));

    $wp_customize->add_setting(
        'global_haeder_width_layout',
        array(
            'default' => 'default',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_haeder_width_layout',
        array(
            'label' => __('Default Layout', 'mediafairplay'),
            'description' => esc_html__('', 'skyrocket'),
            'section' => 'mfp_header_layout_section',
            'input_attrs' => array(
                'placeholder' => false,
                'multiselect' => false,
            ),
            'choices' => array(
                'default' => __('Default', 'mediafairplay'),
                'container' => __('Container', 'mediafairplay'),
                'Full_Width' => __('Full Width', 'mediafairplay'),
            )
        )
    ));

    $wp_customize->add_setting(
        'header_alignment',
        array(
            'default' => 'ltr',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_radio_sanitization'
        )
    );

    $wp_customize->add_control(new Skyrocket_Text_Radio_Button_Custom_Control(
        $wp_customize,
        'header_alignment',
        array(
            'label' => __('Header Alignment'),
            'description' => esc_html__('Sample custom control description'),
            'section' => 'mfp_header_layout_section',
            'choices' => array(
                'ltr' => __('Left'), // Required. Setting for this particular radio button choice and the text to display
                'centered' => __('Centered'), // Required. Setting for this particular radio button choice and the text to display
                'rtl' => __('Right') // Required. Setting for this particular radio button choice and the text to display
            )
        )
    ));

    $wp_customize->add_setting(
        'header_alignment_mobile',
        array(
            'default' => 'm_r_l_l',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );

    $wp_customize->add_control(new Skyrocket_Image_Radio_Button_Custom_Control(
        $wp_customize,
        'header_alignment_mobile',
        array(
            'label' => __('Header Alignment Mobile'),
            'description' => esc_html__('Right now availble only for Layout 1'),
            'section' => 'mfp_header_layout_section',
            'choices' => array(
                'm_r_l_c' => array( // Required. Setting for this particular radio button choice
                    'image' => trailingslashit(get_template_directory_uri()) . 'images/h_m_1.png', // Required. URL for the image
                    'name' => __('Menu Right Logo Center') // Required. Title text to display
                ),
                'm_l_l_c' => array(
                    'image' => trailingslashit(get_template_directory_uri()) . 'images/h_m_2.png',
                    'name' => __('Menu Left Logo Center')
                ),
                'm_l_l_r' => array(
                    'image' => trailingslashit(get_template_directory_uri()) . 'images/h_m_3.png',
                    'name' => __('Menu Left Logo Right')
                ),
                'm_r_l_l' => array(
                    'image' => trailingslashit(get_template_directory_uri()) . 'images/h_m_4.png',
                    'name' => __('Menu Right Logo Left')
                )
            )
        )
    ));



    /** Header Logo size Tablet */
    $wp_customize->add_setting(
        'header_logo_size_tablet',
        array(
            'default' => 150,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'header_logo_size_tablet',
        array(
            'label' => __('Tablet - Logo Size (px)', 'mediafairplay'),
            'section' => 'title_tagline',
            'priority'       => 8,
            'input_attrs' => array(
                'min' => 0,
                'max' => 300,
                'step' => 1,
            ),
        )
    ));
    /** Header Logo size Mobile */
    $wp_customize->add_setting(
        'header_logo_size_mobile',
        array(
            'default' => 100,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'header_logo_size_mobile',
        array(
            'label' => __('Mobile - Logo Size (px)', 'mediafairplay'),
            'section' => 'title_tagline',
            'priority'       => 9,
            'input_attrs' => array(
                'min' => 0,
                'max' => 500,
                'step' => 1,
            ),
        )
    ));
}
add_action('customize_register', 'register_header_customizer');
