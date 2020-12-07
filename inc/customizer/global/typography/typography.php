<?php
function mfp_global_typohraphy($wp_customize)
{

    $global_typography_panel = new PE_WP_Customize_Panel($wp_customize, 'global_typography_panel', array(
        'title' => 'Typography',
        'panel' => 'global_parent_panel',
    ));

    $wp_customize->add_panel($global_typography_panel);

    $wp_customize->add_section('global_base_typography_section', array(
        'title' => 'Base Typography',
        'panel' => 'global_typography_panel',

    ));

    $global_heading_panel = new PE_WP_Customize_Panel($wp_customize, 'global_heading_panel', array(
        'title' => 'Heading',
        'panel' => 'global_typography_panel',
        'priority' => 9999,
    ));
    $wp_customize->add_panel($global_heading_panel);

    $wp_customize->add_section('global_heading_section', array(
        'title' => 'H1',
        'panel' => 'global_heading_panel',
    ));

    $wp_customize->add_setting(
        'h1_global_color',
        array(
            'default' => '#000',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
        )
    );

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'h1_global_color',
        array(
            'label' => __('H1 Color'),
            'description' => esc_html__(''),
            'section' => 'global_heading_section',
            'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
            'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7',
            ),
        )
    ));

    $wp_customize->add_setting(
        'global_h1_font_size',
        array(
            'default' => 48,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer',
        )
    );

    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'global_h1_font_size',
        array(
            'label' => esc_html__('H1 Font Size'),
            'section' => 'global_heading_section',
            'input_attrs' => array(
                'min' => 10, // Required. Minimum value for the slider
                'max' => 200, // Required. Maximum value for the slider
                'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));
    $wp_customize->add_setting(
        'global_h1_font_weghit',
        array(
            'default' => '400',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_h1_font_weghit',
        array(
            'label' => __('H1 Font Weight', 'mediafairplay'),
            'description' => esc_html__(''),
            'section' => 'global_heading_section',
            'input_attrs' => array(
                'placeholder' => __('Please select a state...', 'skyrocket'),
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
    /** H1 END */
    /** H2 */

    $wp_customize->add_section('global_heading_section_h2', array(
        'title' => 'H2',
        'panel' => 'global_heading_panel',
    ));

    $wp_customize->add_setting(
        'h2_global_color',
        array(
            'default' => '#000',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
        )
    );

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'h2_global_color',
        array(
            'label' => __('H2 Color'),
            'description' => esc_html__(''),
            'section' => 'global_heading_section_h2',
            'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
            'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7',
            ),
        )
    ));

    $wp_customize->add_setting(
        'global_h2_font_size',
        array(
            'default' => 48,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer',
        )
    );

    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'global_h2_font_size',
        array(
            'label' => esc_html__('H2 Font Size'),
            'section' => 'global_heading_section_h2',
            'input_attrs' => array(
                'min' => 10, // Required. Minimum value for the slider
                'max' => 200, // Required. Maximum value for the slider
                'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));
    $wp_customize->add_setting(
        'global_h2_font_weghit',
        array(
            'default' => '400',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_h2_font_weghit',
        array(
            'label' => __('H2 Font Weight', 'mediafairplay'),
            'description' => esc_html__(''),
            'section' => 'global_heading_section_h2',
            'input_attrs' => array(
                'placeholder' => __('Please select a state...', 'skyrocket'),
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
    /** h2 end */

    /** h3 start */
    $wp_customize->add_section('global_heading_section_h3', array(
        'title' => 'H3',
        'panel' => 'global_heading_panel',
    ));

    $wp_customize->add_setting(
        'h3_global_color',
        array(
            'default' => '#000',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
        )
    );

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'h3_global_color',
        array(
            'label' => __('H3 Color'),
            'description' => esc_html__(''),
            'section' => 'global_heading_section_h3',
            'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
            'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7',
            ),
        )
    ));

    $wp_customize->add_setting(
        'global_h3_font_size',
        array(
            'default' => 48,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer',
        )
    );

    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'global_h3_font_size',
        array(
            'label' => esc_html__('H3 Font Size'),
            'section' => 'global_heading_section_h3',
            'input_attrs' => array(
                'min' => 10, // Required. Minimum value for the slider
                'max' => 200, // Required. Maximum value for the slider
                'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));
    $wp_customize->add_setting(
        'global_h3_font_weghit',
        array(
            'default' => '400',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_h3_font_weghit',
        array(
            'label' => __('H3 Font Weight', 'mediafairplay'),
            'description' => esc_html__(''),
            'section' => 'global_heading_section_h3',
            'input_attrs' => array(
                'placeholder' => __('Please select a state...', 'skyrocket'),
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
    /** h3 end */
    /** h4 start */
    $wp_customize->add_section('global_heading_section_h4', array(
        'title' => 'H4',
        'panel' => 'global_heading_panel',
    ));

    $wp_customize->add_setting(
        'h4_global_color',
        array(
            'default' => '#000',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
        )
    );
    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'h4_global_color',
        array(
            'label' => __('H4 Color'),
            'description' => esc_html__(''),
            'section' => 'global_heading_section_h4',
            'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
            'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7',
            ),
        )
    ));
    $wp_customize->add_setting(
        'global_h4_font_size',
        array(
            'default' => 48,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer',
        )
    );
    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'global_h4_font_size',
        array(
            'label' => esc_html__('H4 Font Size'),
            'section' => 'global_heading_section_h4',
            'input_attrs' => array(
                'min' => 10, // Required. Minimum value for the slider
                'max' => 200, // Required. Maximum value for the slider
                'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));
    $wp_customize->add_setting(
        'global_h4_font_weghit',
        array(
            'default' => '400',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_h4_font_weghit',
        array(
            'label' => __('H4 Font Weight', 'mediafairplay'),
            'description' => esc_html__(''),
            'section' => 'global_heading_section_h4',
            'input_attrs' => array(
                'placeholder' => __('Please select a state...', 'skyrocket'),
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
    /** h4 end */
    /** h5 start */
    $wp_customize->add_section('global_heading_section_h5', array(
        'title' => 'H5',
        'panel' => 'global_heading_panel',
    ));
    $wp_customize->add_setting(
        'h5_global_color',
        array(
            'default' => '#000',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
        )
    );
    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'h5_global_color',
        array(
            'label' => __('H5 Color'),
            'description' => esc_html__(''),
            'section' => 'global_heading_section_h5',
            'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
            'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7',
            ),
        )
    ));
    $wp_customize->add_setting(
        'global_h5_font_size',
        array(
            'default' => 48,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer',
        )
    );
    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'global_h5_font_size',
        array(
            'label' => esc_html__('H5 Font Size'),
            'section' => 'global_heading_section_h5',
            'input_attrs' => array(
                'min' => 10, // Required. Minimum value for the slider
                'max' => 200, // Required. Maximum value for the slider
                'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));

    $wp_customize->add_setting(
        'global_h5_font_weghit',
        array(
            'default' => '400',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_h5_font_weghit',
        array(
            'label' => __('H5 Font Weight', 'mediafairplay'),
            'description' => esc_html__(''),
            'section' => 'global_heading_section_h5',
            'input_attrs' => array(
                'placeholder' => __('Please select a state...', 'skyrocket'),
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
    /** H5 end */

    /** H6 Start */
    $wp_customize->add_section('global_heading_section_h6', array(
        'title' => 'H6',
        'panel' => 'global_heading_panel',
    ));
    $wp_customize->add_setting(
        'h6_global_color',
        array(
            'default' => '#000',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
        )
    );
    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'h6_global_color',
        array(
            'label' => __('H6 Color'),
            'description' => esc_html__(''),
            'section' => 'global_heading_section_h6',
            'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
            'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7',
            ),
        )
    ));
    $wp_customize->add_setting(
        'global_h6_font_size',
        array(
            'default' => 48,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer',
        )
    );
    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'global_h6_font_size',
        array(
            'label' => esc_html__('H6 Font Size'),
            'section' => 'global_heading_section_h6',
            'input_attrs' => array(
                'min' => 10, // Required. Minimum value for the slider
                'max' => 200, // Required. Maximum value for the slider
                'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));
    $wp_customize->add_setting(
        'global_h6_font_weghit',
        array(
            'default' => '400',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_h6_font_weghit',
        array(
            'label' => __('H6 Font Weight', 'mediafairplay'),
            'description' => esc_html__(''),
            'section' => 'global_heading_section_h6',
            'input_attrs' => array(
                'placeholder' => __('Please select a state...', 'skyrocket'),
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
    /** h6 end */

    // Test of Dropdown Select2 Control (single select)
    $wp_customize->add_setting(
        'global_typo_family',
        array(
            'default' => 'arial',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization',
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_typo_family',
        array(
            'label' => __('Family', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'section' => 'global_base_typography_section',
            'input_attrs' => array(
                'placeholder' => __('Please select a state...', 'mediafairplay'),
                'multiselect' => false,
            ),
            'choices' => array(
                'arial' => __('Arial', 'mediafairplay'),
                'vic' => __('Victoria', 'mediafairplay'),
                'qld' => __('Queensland', 'mediafairplay'),
                'wa' => __('Western Australia', 'mediafairplay'),
                'sa' => __('South Australia', 'mediafairplay'),
                'tas' => __('Tasmania', 'mediafairplay'),
                'act' => __('Australian Capital Territory', 'mediafairplay'),
                'nt' => __('Northern Territory', 'mediafairplay'),
            ),
        )
    ));

    $wp_customize->add_setting(
        'turn_google_api_font',
        array(
            'default' => 0,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_switch_sanitization',
        )
    );

    $wp_customize->add_control(new Skyrocket_Toggle_Switch_Custom_control(
        $wp_customize,
        'turn_google_api_font',
        array(
            'label' => esc_html__('Turn On Google Fonts'),
            'section' => 'global_base_typography_section',
        )
    ));

    $wp_customize->add_setting(
        'sample_google_font_select',
        array(
            'default' => json_encode(
                array(
                    'font' => 'Open Sans',
                    'regularweight' => 'regular',
                    'italicweight' => 'italic',
                    'boldweight' => '700',
                    'category' => 'sans-serif',
                )
            ),
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_google_font_sanitization',
        )
    );

    $wp_customize->add_control(new Skyrocket_Google_Font_Select_Custom_Control(
        $wp_customize,
        'sample_google_font_select',
        array(
            'label' => __('Google Font Family'),
            'description' => esc_html__(''),
            'section' => 'global_base_typography_section',
            'input_attrs' => array(
                'font_count' => 'all',
                'orderby' => 'alpha',
            ),
        )
    ));

    $wp_customize->add_setting(
        'global_typo_font_size',
        array(
            'default' => 16,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization',
        )
    );

    $wp_customize->add_control(
        'global_typo_font_size',
        array(
            'label' => __('Font Size'),
            'description' => esc_html__(''),
            'section' => 'global_base_typography_section',
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
                'class' => 'my-custom-class',
                'placeholder' => __('Enter name...'),
            ),
        )
    );
    $wp_customize->add_setting(
        'global_typo_font_weight',
        array(
            'default' => '400',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization',
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_typo_font_weight',
        array(
            'label' => __('Font Weight', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'section' => 'global_base_typography_section',
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
            ),
        )
    ));

    $wp_customize->add_setting(
        'global_typo_text_transform',
        array(
            'default' => 'None',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization',
        )
    );

    $wp_customize->add_control(new Skyrocket_Image_Radio_Button_Custom_Control(
        $wp_customize,
        'global_typo_text_transform',
        array(
            'label' => __('Text Transform'),
            'description' => esc_html__(''),
            'section' => 'global_base_typography_section',
            'choices' => array(
                'None' => array( // Required. Setting for this particular radio button choice
                    'image' => trailingslashit(get_template_directory_uri()) . 'images/none.png', // Required. URL for the image
                    'name' => __('None'), // Required. Title text to display
                ),
                'upercase' => array(
                    'image' => trailingslashit(get_template_directory_uri()) . 'images/AllCaps.png',
                    'name' => __('uppercase'),
                ),
                'lowercase' => array(
                    'image' => trailingslashit(get_template_directory_uri()) . 'images/lowercase.png',
                    'name' => __('lowercase'),
                ),
            ),
        )
    ));
    $wp_customize->add_setting(
        'global_typo_line_height',
        array(
            'default' => 25,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer',
        )
    );

    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'global_typo_line_height',
        array(
            'label' => esc_html__('Line Height'),
            'section' => 'global_base_typography_section',
            'input_attrs' => array(
                'min' => 0, // Required. Minimum value for the slider
                'max' => 300, // Required. Maximum value for the slider
                'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));

    $wp_customize->add_setting(
        'global_typo_p_margin_bottom',
        array(
            'default' => 24,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer',
        )
    );

    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'global_typo_p_margin_bottom',
        array(
            'label' => esc_html__('Paragraph Margin Bottom'),
            'section' => 'global_base_typography_section',
            'input_attrs' => array(
                'min' => 0, // Required. Minimum value for the slider
                'max' => 300, // Required. Maximum value for the slider
                'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));
}
add_action('customize_register', 'mfp_global_typohraphy');
