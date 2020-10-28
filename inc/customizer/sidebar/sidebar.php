<?php
function mfp_sidebar_control($wp_customize)
{

    $wp_customize->add_section(
        'mfp_sidebar_section',
        array(
            'title' => __('Sidebar ( Beta )'),
            'description' => esc_html__('These are an example of Customizer Custom Controls.'),
            'panel' => '', // Only needed if adding your Section to a Panel
            'priority' => 40, // Not typically needed. Default is 160
            'capability' => 'edit_theme_options', // Not typically needed. Default is edit_theme_options
            'theme_supports' => '', // Rarely needed
            'active_callback' => '', // Rarely needed
            'description_hidden' => 'false', // Rarely needed. Default is False
        )
    );
    /** Pages */
    $wp_customize->add_setting(
        'mfp_sidebar_page_select',
        array(
            'default' => 'ns',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'mfp_sidebar_page_select',
        array(
            'label' => __('Pages', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'section' => 'mfp_sidebar_section',
            'input_attrs' => array(
                'placeholder' => __('Please select a state...', 'mediafairplay'),
                'multiselect' => false,
            ),
            'choices' => array(
                'ns' => __('No Sidebar', 'mediafairplay'),
                'rs' => __('Right Sidebar', 'mediafairplay'),
                'ls' => __('Left Sidebar', 'mediafairplay'),
            )
        )
    ));
    /** Blog Posts */
    $wp_customize->add_setting(
        'mfp_sidebar_blog_post_select',
        array(
            'default' => 'ns',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'mfp_sidebar_blog_post_select',
        array(
            'label' => __('Blog Posts', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'section' => 'mfp_sidebar_section',
            'input_attrs' => array(
                'placeholder' => __('Please select a state...', 'mediafairplay'),
                'multiselect' => false,
            ),
            'choices' => array(
                'ns' => __('No Sidebar', 'mediafairplay'),
                'rs' => __('Right Sidebar', 'mediafairplay'),
                'ls' => __('Left Sidebar', 'mediafairplay'),
            )
        )
    ));
    /** Archives */
    $wp_customize->add_setting(
        'mfp_sidebar_archive_select',
        array(
            'default' => 'ns',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'mfp_sidebar_archive_select',
        array(
            'label' => __('Archives', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'section' => 'mfp_sidebar_section',
            'input_attrs' => array(
                'placeholder' => __('Please select a state...', 'mediafairplay'),
                'multiselect' => false,
            ),
            'choices' => array(
                'ns' => __('No Sidebar', 'mediafairplay'),
                'rs' => __('Right Sidebar', 'mediafairplay'),
                'ls' => __('Left Sidebar', 'mediafairplay'),
            )
        )
    ));
    /** Sidebar Width */
    $wp_customize->add_setting(
        'mfp_sidebar_width',
        array(
            'default' => 48,
            'transport' => 'postMessage',
            'sanitize_callback' => 'skyrocket_sanitize_integer'
        )
    );
    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'mfp_sidebar_width',
        array(
            'label' => esc_html__('Sidebar Width'),
            'description' => esc_html__( 'Sidebar width will apply only when one of the above sidebar is set' ),
            'section' => 'mfp_sidebar_section',
            'input_attrs' => array(
                'min' => 0, // Required. Minimum value for the slider
                'max' => 100, // Required. Maximum value for the slider
                'step' => 1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));
}
add_action('customize_register', 'mfp_sidebar_control');
