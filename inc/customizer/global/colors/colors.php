<?php
function mfp_global_colors($wp_customize)
{
    $global_colors_child_1 = new PE_WP_Customize_Panel($wp_customize, 'global_colors_child_1', array(
        'title' => 'Colors',
        'panel' => 'global_parent_panel',
    ));

    $wp_customize->add_panel($global_colors_child_1);


    $wp_customize->add_section('global_colors_section', array(
        'title' => 'Base Colors',
        'panel' => 'global_colors_child_1',
    ));

    $wp_customize->add_setting(
        'global_text_color',
        array(
            'default' => '#404040',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
        )
    );

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'global_text_color',
        array(
            'label' => __('Text Color'),
            'description' => esc_html__(''),
            'section' => 'global_colors_section',
            'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
            'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7'
            )
        )
    ));

    $wp_customize->add_setting(
        'global_Link_Color',
        array(
            'default' => '#0073aa',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
        )
    );

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'global_Link_Color',
        array(
            'label' => __('Link Color'),
            'description' => esc_html__(''),
            'section' => 'global_colors_section',
            'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
            'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7'
            )
        )
    ));

    $wp_customize->add_setting(
        'global_Link_Hover_Color',
        array(
            'default' => 'rgba(209,0,55,0.7)',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
        )
    );

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'global_Link_Hover_Color',
        array(
            'label' => __('Link Hover Color'),
            'description' => esc_html__(''),
            'section' => 'global_colors_section',
            'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
            'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7'
            )
        )
    ));

    $wp_customize->add_setting(
        'global_Content_Background_Color',
        array(
            'default' => '#fff',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
        )
    );

    $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
        $wp_customize,
        'global_Content_Background_Color',
        array(
            'label' => __('Content Background Color'),
            'description' => esc_html__(''),
            'section' => 'global_colors_section',
            'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
            'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                '#000',
                '#fff',
                '#df312c',
                '#df9a23',
                '#eef000',
                '#7ed934',
                '#1571c1',
                '#8309e7'
            )
        )
    ));

    
    
    
}
add_action('customize_register', 'mfp_global_colors');
