<?php
function mfp_blog_control($wp_customize)
{
    $wp_customize->add_panel(
        'mfp_blog_panel',
        array(
            'title' => __('Blog ( Beta )', 'mediafairplay'),
            'description' => esc_html__('Adjust your Header', 'mediafairplay'),
            'priority'       => 40,
        )
    );
    $wp_customize->add_section(
        'mfp_blog_scetion',
        array(
            'title' => __('Blog', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_blog_panel',
            'priority'       => 30
        )
    );

    $wp_customize->add_setting('test________', array(
        'default' => 'default value here',
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('test________', array(
        'type' => 'text',
        'label' => 'Some text control',
        'section' => 'mfp_blog_scetion',
    ));

}
add_action('customize_register', 'mfp_blog_control');