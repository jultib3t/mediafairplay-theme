<?php
function mfp_footer_control($wp_customize)
{
    $wp_customize->add_panel(
        'mfp_footer_panel',
        array(
            'title' => __('Footer', 'mediafairplay'),
            'description' => esc_html__('Adjust your Header', 'mediafairplay'),
            'priority' => 40,
        )
    );
    $wp_customize->add_section(
        'mfp_footer_scetion',
        array(
            'title' => __('Footer', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_footer_panel'
        )
    );
    $wp_customize->add_setting(
        'footer_container_container_width',
        array(
            'default' => 1200,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer'
        )
    );

    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'footer_container_container_width',
        array(
            'label' => esc_html__('Container Width'),
            'section' => 'mfp_footer_scetion',
            'input_attrs' => array(
                'min' => 1, // Required. Minimum value for the slider
                'max' => 1920, // Required. Maximum value for the slider
                'step' => 10, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));
    $wp_customize->add_setting(
        'footer_container_width',
        array(
            'default' => 'default',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'footer_container_width',
        array(
            'label' => __('Layout', 'mediafairplay'),
            'description' => esc_html__('', 'skyrocket'),
            'section' => 'mfp_footer_scetion',
            'input_attrs' => array(
                'placeholder' => false,
                'multiselect' => false,
            ),
            'choices' => array(
                'default' => __('Default', 'mediafairplay'),
                'container' => __('Container', 'mediafairplay'),
                'full_width' => __('Full Width', 'mediafairplay'),
            )
        )
    ));
    $wp_customize->add_setting(
        'mfp_footer_bg_color',
        array(
            'default' => '#000',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
        )
    );

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'mfp_footer_bg_color',
        array(
            'label' => __('Background Color'),
            'description' => esc_html__(''),
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

    $wp_customize->add_setting(
        'mfp_footer_titles_color',
        array(
            'default' => '#000',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
        )
    );

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'mfp_footer_titles_color',
        array(
            'label' => __('Titles Color'),
            'description' => esc_html__(''),
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

    $wp_customize->add_setting(
        'mfp_footer_titles_font_size',
        array(
            'default' => 25,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer'
        )
    );

    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'mfp_footer_titles_font_size',
        array(
            'label' => esc_html__('Titles Font Size'),
            'section' => 'mfp_footer_scetion',
            'input_attrs' => array(
                'min' => 1, // Required. Minimum value for the slider
                'max' => 300, // Required. Maximum value for the slider
                'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));

    $wp_customize->add_setting(
        'mfp_footer_text_color',
        array(
            'default' => '#000',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
        )
    );

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'mfp_footer_text_color',
        array(
            'label' => __('Text Color'),
            'description' => esc_html__(''),
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

    $wp_customize->add_setting(
        'mfp_footer_link_color',
        array(
            'default' => '#fff',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
        )
    );

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'mfp_footer_link_color',
        array(
            'label' => __('Link Color'),
            'description' => esc_html__(''),
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

    $wp_customize->add_setting(
        'mfp_footer_link_h_color',
        array(
            'default' => '#000',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
        )
    );

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'mfp_footer_link_h_color',
        array(
            'label' => __('Link Hover Color'),
            'description' => esc_html__(''),
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
        'footer_bar_container_container_width',
        array(
            'default' => 1200,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer'
        )
    );

    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'footer_bar_container_container_width',
        array(
            'label' => esc_html__('Container Width'),
            'section' => 'mfp_footer_bar_scetion',
            'input_attrs' => array(
                'min' => 1, // Required. Minimum value for the slider
                'max' => 1920, // Required. Maximum value for the slider
                'step' => 10, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));
    $wp_customize->add_setting(
        'footer_bar_container_width',
        array(
            'default' => 'default',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'footer_bar_container_width',
        array(
            'label' => __('Layout', 'mediafairplay'),
            'description' => esc_html__('', 'skyrocket'),
            'section' => 'mfp_footer_bar_scetion',
            'input_attrs' => array(
                'placeholder' => false,
                'multiselect' => false,
            ),
            'choices' => array(
                'default' => __('Default', 'mediafairplay'),
                'container' => __('Container', 'mediafairplay'),
                'full_width' => __('Full Width', 'mediafairplay'),
            )
        )
    ));
    $wp_customize->add_setting(
        'mfp_footer_bar_bg_color',
        array(
            'default' => '#000',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization',
        )
    );

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
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

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'mfp_footer_bar_title_color',
        array(
            'label' => __('Titles Color'),
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
    /** Fotter bar inner column width */
    $wp_customize->add_setting(
        'mfp_footer_bar_column_width',
        array(
            'default' => 70,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer'
        )
    );

    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'mfp_footer_bar_column_width',
        array(
            'label' => esc_html__('Inner Column Width'),
            'section' => 'mfp_footer_bar_scetion',
            'input_attrs' => array(
                'min' => 0, // Required. Minimum value for the slider
                'max' => 100, // Required. Maximum value for the slider
                'step' => 5, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));
    /** END Fotter bar inner column width */

    /**   Title fonts size  */
    $wp_customize->add_setting(
        'mfp_footer_bar_title_font_size',
        array(
            'default' => 25,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer'
        )
    );

    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'mfp_footer_bar_title_font_size',
        array(
            'label' => esc_html__('Titles Font Size'),
            'section' => 'mfp_footer_bar_scetion',
            'input_attrs' => array(
                'min' => 1, // Required. Minimum value for the slider
                'max' => 200, // Required. Maximum value for the slider
                'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
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

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
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

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
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

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
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
