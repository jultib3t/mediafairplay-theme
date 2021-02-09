<?php
function mfp_pages_customizer($wp_customize)
{
    $wp_customize->add_panel(
        'mfp_pages_panel',
        array(
            'title' => __('pages', 'mediafairplay'),
            'description' => esc_html__('Adjust your Header', 'mediafairplay'),
            'priority' => 50,
        )
    );
    // 404 section
    $wp_customize->add_section(
        'mfp_pages_404',
        array(
            'title' => __('404', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_pages_panel'
        )
    );
    // choose 404 page
    $wp_customize->add_setting(
        'mfp_404_page_choose',
        array(
            'default' => 1200,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer'
        )
    );

    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'mfp_404_page_choose',
        array(
            'label' => esc_html__('Container Width'),
            'section' => 'mfp_pages_404',
            'input_attrs' => array(
                'min' => 1, // Required. Minimum value for the slider
                'max' => 1920, // Required. Maximum value for the slider
                'step' => 10, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));


 
   
}
add_action('customize_register', 'mfp_pages_customizer');