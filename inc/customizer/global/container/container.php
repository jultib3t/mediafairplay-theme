<?php
function mfp_global_container($wp_customize)
{
    $wp_customize->add_section('global_container', array(
        'title' => 'Container ( Beta )',
        'panel' => 'global_parent_panel',
    ));

    $wp_customize->add_setting(
        'global_container_width',
        array(
            'default' => 1200,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'global_container_width',
        array(
            'label' => __('Width', 'mediafairplay'),
            'section' => 'global_container',
            'input_attrs' => array(
                'min' => 100,
                'max' => 1920,
                'step' => 20,
            ),
        )
    ));

    $wp_customize->add_setting(
        'global_layout_layout',
        array(
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_layout_layout',
        array(
            'label' => __('Default Layout', 'mediafairplay'),
            'description' => esc_html__('', 'skyrocket'),
            'section' => 'global_container',
            'input_attrs' => array(
                'placeholder' => false,
                'multiselect' => false,
            ),
            'choices' => array(
                'container' => __('Container', 'mediafairplay'),
                'Full_Width' => __('Full Width', 'mediafairplay'),
            )
        )
    ));

    $wp_customize->add_setting(
        'global_layout_page',
        array(
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_layout_page',
        array(
            'label' => __('Page Layout', 'mediafairplay'),
            'description' => esc_html__('', 'skyrocket'),
            'section' => 'global_container',
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
        'global_layout_blog_post_layout',
        array(
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_layout_blog_post_layout',
        array(
            'label' => __('Blog Post Layout', 'mediafairplay'),
            'description' => esc_html__('', 'skyrocket'),
            'section' => 'global_container',
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
        'global_layout_archives_layout',
        array(
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_layout_archives_layout',
        array(
            'label' => __('Archives Layout', 'mediafairplay'),
            'description' => esc_html__('', 'skyrocket'),
            'section' => 'global_container',
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
}
add_action('customize_register', 'mfp_global_container');