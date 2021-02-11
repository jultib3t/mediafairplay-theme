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
            'panel' => 'mfp_pages_panel',
            /* 'active_callback' => function() {
            return ! is_404();
        }, */
        )
    );

    // visit page section

    $wp_customize->add_section(
        'mfp_pages_visit',
        array(
            'title' => __('Visit', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'panel' => 'mfp_pages_panel',
            /* 'active_callback' => function() {
            return ! is_404();
        }, */
        )
    );
    // choose 404 page


    $wp_customize->add_setting(
        'mfp_404_page_choose_img',
        array(
            'transport' => 'refresh', // Add Default Image URL 
        )
    );

    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'mfp_404_page_choose_img',
        array(
            'label' => 'Upload Logo',
            'priority' => 20,
            'section' => 'mfp_pages_404',
            /* 'settings' => 'diwp_logo', */
            'button_labels' => array( // All These labels are optional
                'select' => 'Select Logo',
                'remove' => 'Remove Logo',
                'change' => 'Change Logo',
            )
        )
    ));


    $wp_customize->add_setting('visit_php_image', array(
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control( new WP_Customize_Image_Control( 
        $wp_customize, 
        'visit_php_image',
         array(
        'label'             => __('Choose Image For VISIT Page', 'mediafairplay'),
        'priority'       => 130,
        'section'           => 'mfp_pages_visit',
    )));
}
add_action('customize_register', 'mfp_pages_customizer');
