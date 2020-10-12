<?php
function mfp_sidebar_control($wp_customize)
{
    $wp_customize->add_panel(
        'mfp_sidebar_panel',
        array(
            'title' => __('Sidebar( Beta )', 'mediafairplay'),
            'description' => esc_html__('Adjust your Header', 'mediafairplay'),
            'priority'       => 40,
        )
    );
    $wp_customize->add_section(
        'mfp_sidebar_scetion',
        array(
            'title' => __('Blog', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_sidebar_panel',
            'priority'       => 30
        )
    );

    $wp_customize->add_setting('test_________', array(
        'default' => 'default value here',
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('test_________', array(
        'type' => 'text',
        'label' => 'Some text control',
        'section' => 'mfp_sidebar_scetion',
    ));

}
add_action('customize_register', 'mfp_sidebar_control');