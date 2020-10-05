<?php
function mfp_global_typohraphy($wp_customize)
{
    $global_typography_panel = new PE_WP_Customize_Panel($wp_customize, 'global_typography_panel', array(
        'title' => 'Typography ( Beta )',
        'panel' => 'global_parent_panel',
    ));

    $wp_customize->add_panel($global_typography_panel);
    
    $wp_customize->add_section('global_heading_section', array(
        'title' => 'Heading',
        'panel' => 'global_typography_panel',
        'priority' => 2,
    ));

    // Test of Dropdown Select2 Control (single select)
    $wp_customize->add_setting(
        'sample_dropdown_select2_control_single',
        array(
            'default' => 'vic',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'sample_dropdown_select2_control_single',
        array(
            'label' => __('Dropdown Select2 Control', 'skyrocket'),
            'description' => esc_html__('Sample Dropdown Select2 custom control (Single Select)', 'skyrocket'),
            'section' => 'global_heading_section',
            'input_attrs' => array(
                'placeholder' => __('Please select a state...', 'skyrocket'),
                'multiselect' => false,
            ),
            'choices' => array(
                'nsw' => __('New South Wales', 'skyrocket'),
                'vic' => __('Victoria', 'skyrocket'),
                'qld' => __('Queensland', 'skyrocket'),
                'wa' => __('Western Australia', 'skyrocket'),
                'sa' => __('South Australia', 'skyrocket'),
                'tas' => __('Tasmania', 'skyrocket'),
                'act' => __('Australian Capital Territory', 'skyrocket'),
                'nt' => __('Northern Territory', 'skyrocket'),
            )
        )
    ));
}
add_action('customize_register', 'mfp_global_typohraphy');