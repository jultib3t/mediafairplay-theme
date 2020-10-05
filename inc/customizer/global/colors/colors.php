<?php
function mfp_global_colors($wp_customize)
{
    $global_colors_child_1 = new PE_WP_Customize_Panel($wp_customize, 'global_colors_child_1', array(
        'title' => 'Colors ( Beta )',
        'panel' => 'global_parent_panel',
    ));

    $wp_customize->add_panel($global_colors_child_1);


    $wp_customize->add_section('global_colors_section', array(
        'title' => 'Section Test',
        'panel' => 'global_colors_child_1',
    ));

    $wp_customize->add_setting('colors_tests_te', array(
        'default' => 'default value here',
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('colors_tests_te', array(
        'type' => 'text',
        'label' => 'Some text control',
        'section' => 'global_colors_section',
    ));
}
add_action('customize_register', 'mfp_global_colors');