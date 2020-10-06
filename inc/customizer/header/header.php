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
            'title' => __('Header ( Beta )', 'mediafairplay'),
            'description' => esc_html__('Adjust your Header', 'mediafairplay'),
            'priority'       => 40,
        )
    );

    /**
     * Hedaer Direction section
     */
    $wp_customize->add_section(
        'mfp_header_direction_section',
        array(
            'title' => __('Header Direction', 'mediafairplay'),
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
            'title' => __('Header Fonts', 'mediafairplay'),
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
            'title' => __('Header Width / Height', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_header_panel',
            'priority'       => 30
        )
    );
    /**
     * Hedaer Mobile menu
     */
    $wp_customize->add_section(
        'mfp_header_mobile_menu',
        array(
            'title' => __('Header Mobile', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_header_panel',
            'priority'       => 30
        )
    );
    // header menu animation on mobile
    $wp_customize->add_setting(
        'header_menu_mobile_animation',
        array(
            'default' => 'doublespin',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_radio_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Text_Radio_Button_Custom_Control(
        $wp_customize,
        'header_menu_mobile_animation',
        array(
            'label' => __('Mobile Menu Hamburger Animation', 'mediafairplay'),
            'description' => esc_html__('Mobile Menu Hamburger Animation', 'mediafairplay'),
            'section' => 'mfp_header_mobile_menu',
            'choices' => array(
                'spin' => __('spin', 'mediafairplay'),
                'doublespin' => __('DoubleSpin', 'mediafairplay')
            )
        )
    ));

    /** Header Sticky / fixed / default */
    $wp_customize->add_setting(
        'header_navbar_style',
        array(
            'default' => 'default',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_radio_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Text_Radio_Button_Custom_Control(
        $wp_customize,
        'header_navbar_style',
        array(
            'label' => __('Choose The Header Position'),
            'description' => esc_html__('Choose The Header Position'),
            'priority'       => 0,
            'section' => 'mfp_header_position_section',
            'choices' => array(
                'default' => __('Default'), // Required. Setting for this particular radio button choice and the text to display
                'fixed' => __('Fixed'),
                'bottom fixed' => __('Bottom Fixed') // Required. Setting for this particular radio button choice and the text to display
            )
        )
    ));
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
            'label' => __('IF HEADER FIXED', 'mediafairplay'),
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
            'default' => '#fff',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'header_background_color',
        array(
            'label' => __('Choose Background Color'),
            'description' => esc_html__('add your own background color'),
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
            'description' => esc_html__('choose color'),
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
            'description' => esc_html__('choose color'),
            'section' => 'mfp_header_colors_section',
            'show_opacity' => true
        )
    ));

    /** header font size desktop*/
    $wp_customize->add_setting(
        'header_font_size_desktop',
        array(
            'default' => 17,
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
                'max' => 200,
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
                'max' => 200,
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
        'header_alignmment',
        array(
            'default' => 'left',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_radio_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Text_Radio_Button_Custom_Control(
        $wp_customize,
        'header_alignmment',
        array(
            'label' => __('Choose The Header Direction'),
            'description' => esc_html__('Sample custom control description'),
            'priority'       => 0,
            'section' => 'mfp_header_direction_section',
            'choices' => array(
                'left' => __('Left'), // Required. Setting for this particular radio button choice and the text to display
                'right' => __('Right') // Required. Setting for this particular radio button choice and the text to display
            )
        )
    ));
    /** Header Logo size Tablet */
    $wp_customize->add_setting(
        'header_logo_size_tablet',
        array(
            'default' => 200,
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
                'min' => 50,
                'max' => 2000,
                'step' => 1,
            ),
        )
    ));
    /** Header Logo size Mobile */
    $wp_customize->add_setting(
        'header_logo_size_mobile',
        array(
            'default' => 200,
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
                'min' => 10,
                'max' => 2000,
                'step' => 1,
            ),
        )
    ));
}
add_action('customize_register', 'register_header_customizer');