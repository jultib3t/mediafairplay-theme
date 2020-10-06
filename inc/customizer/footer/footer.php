<?php
function mfp_footer_control($wp_customize)
{
    $wp_customize->add_panel(
        'mfp_footer_panel',
        array(
            'title' => __('Footer ( Beta )', 'mediafairplay'),
            'description' => esc_html__('Adjust your Header', 'mediafairplay'),
            'priority'       => 40,
        )
    );
    $wp_customize->add_section(
        'mfp_footer_scetion',
        array(
            'title' => __('Footer', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_footer_panel',
            'priority'       => 30
        )
    );

    $wp_customize->add_setting('test______', array(
        'default' => 'default value here',
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('test______', array(
        'type' => 'text',
        'label' => 'Some text control',
        'section' => 'mfp_footer_scetion',
    ));


    $wp_customize->add_section(
        'mfp_footer_bar_scetion',
        array(
            'title' => __('Footer Bar', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_footer_panel',
            'priority'       => 30
        )
    );

    $wp_customize->add_setting('test______2', array(
        'default' => 'default value here',
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('test______2', array(
        'type' => 'text',
        'label' => 'Some text control',
        'section' => 'mfp_footer_bar_scetion',
    ));
}
add_action('customize_register', 'mfp_footer_control');