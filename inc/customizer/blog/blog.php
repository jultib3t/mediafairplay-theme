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
            'title' => __('Single Post', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_blog_panel',
            'priority'       => 30
        )
    );

    $wp_customize->add_setting(
        'mfp_blog_post_pagination',
        array(
            'default' => 0,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_switch_sanitization'
        )
    );

    $wp_customize->add_control(new Skyrocket_Toggle_Switch_Custom_control(
        $wp_customize,
        'mfp_blog_post_pagination',
        array(
            'label' => esc_html__('Display Post Pagination'),
            'section' => 'mfp_blog_scetion'
        )
    ));

    $wp_customize->add_setting(
        'mfp_blog_post_posted_in',
        array(
            'default' => 0,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_switch_sanitization'
        )
    );

    $wp_customize->add_control(new Skyrocket_Toggle_Switch_Custom_control(
        $wp_customize,
        'mfp_blog_post_posted_in',
        array(
            'label' => esc_html__('Display Posted In'),
            'section' => 'mfp_blog_scetion'
        )
    ));

    $wp_customize->add_setting(
        'mfp_blog_post_by',
        array(
            'default' => 0,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_switch_sanitization'
        )
    );

    $wp_customize->add_control(new Skyrocket_Toggle_Switch_Custom_control(
        $wp_customize,
        'mfp_blog_post_by',
        array(
            'label' => esc_html__('Display Author'),
            'section' => 'mfp_blog_scetion'
        )
    ));
}
add_action('customize_register', 'mfp_blog_control');
