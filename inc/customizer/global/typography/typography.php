<?php
function mfp_global_typohraphy($wp_customize)
{

    $global_typography_panel = new PE_WP_Customize_Panel($wp_customize, 'global_typography_panel', array(
        'title' => 'Typography',
        'panel' => 'global_parent_panel',
    ));

    $wp_customize->add_panel($global_typography_panel);

    $wp_customize->add_section('global_base_typography_section', array(
        'title' => 'Base Typography',
        'panel' => 'global_typography_panel',

    ));

    $global_heading_panel = new PE_WP_Customize_Panel($wp_customize, 'global_heading_panel', array(
        'title' => 'Heading ( Beta )',
        'panel' => 'global_typography_panel',
        'priority' => 9999
    ));
    $wp_customize->add_panel($global_heading_panel);

    $wp_customize->add_section('global_heading_section', array(
        'title' => 'H1',
        'panel' => 'global_heading_panel',
    ));
    // Test of Dropdown Select2 Control (single select)
    $wp_customize->add_setting(
        'global_typo_h1_font_family',
        array(
            'default' => 'vic',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_typo_h1_font_family',
        array(
            'label' => __('Font Family', 'skyrocket'),
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

    $wp_customize->add_section('global_heading_section_h2', array(
        'title' => 'H2',
        'panel' => 'global_heading_panel',
    ));
    // Test of Dropdown Select2 Control (single select)
    $wp_customize->add_setting(
        'global_typo_h2_font_family',
        array(
            'default' => 'vic',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_typo_h2_font_family',
        array(
            'label' => __('Font Family', 'skyrocket'),
            'description' => esc_html__('Sample Dropdown Select2 custom control (Single Select)', 'skyrocket'),
            'section' => 'global_heading_section_h2',
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

    $wp_customize->add_section('global_heading_section_h3', array(
        'title' => 'H3',
        'panel' => 'global_heading_panel',
    ));
    // Test of Dropdown Select2 Control (single select)
    $wp_customize->add_setting(
        'global_typo_h3_font_family',
        array(
            'default' => 'vic',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_typo_h3_font_family',
        array(
            'label' => __('Font Family', 'skyrocket'),
            'description' => esc_html__('Sample Dropdown Select2 custom control (Single Select)', 'skyrocket'),
            'section' => 'global_heading_section_h3',
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

    $wp_customize->add_section('global_heading_section_h4', array(
        'title' => 'H4',
        'panel' => 'global_heading_panel',
    ));
    // Test of Dropdown Select2 Control (single select)
    $wp_customize->add_setting(
        'global_typo_h4_font_family',
        array(
            'default' => 'vic',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_typo_h4_font_family',
        array(
            'label' => __('Font Family', 'skyrocket'),
            'description' => esc_html__('Sample Dropdown Select2 custom control (Single Select)', 'skyrocket'),
            'section' => 'global_heading_section_h4',
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

    $wp_customize->add_section('global_heading_section_h5', array(
        'title' => 'H5',
        'panel' => 'global_heading_panel',
    ));
    // Test of Dropdown Select2 Control (single select)
    $wp_customize->add_setting(
        'global_typo_h5_font_family',
        array(
            'default' => 'vic',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_typo_h5_font_family',
        array(
            'label' => __('Font Family', 'skyrocket'),
            'description' => esc_html__('Sample Dropdown Select2 custom control (Single Select)', 'skyrocket'),
            'section' => 'global_heading_section_h5',
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

    $wp_customize->add_section('global_heading_section_h6', array(
        'title' => 'H6',
        'panel' => 'global_heading_panel',
    ));
    // Test of Dropdown Select2 Control (single select)
    $wp_customize->add_setting(
        'global_typo_h6_font_family',
        array(
            'default' => 'vic',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_typo_h6_font_family',
        array(
            'label' => __('Font Family', 'skyrocket'),
            'description' => esc_html__('Sample Dropdown Select2 custom control (Single Select)', 'skyrocket'),
            'section' => 'global_heading_section_h6',
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





    // Test of Dropdown Select2 Control (single select)
    $wp_customize->add_setting(
        'global_typo_family',
        array(
            'default' => 'arial',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_typo_family',
        array(
            'label' => __('Family', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'section' => 'global_base_typography_section',
            'input_attrs' => array(
                'placeholder' => __('Please select a state...', 'mediafairplay'),
                'multiselect' => false,
            ),
            'choices' => array(
                'arial' => __('Arial', 'mediafairplay'),
                'vic' => __('Victoria', 'mediafairplay'),
                'qld' => __('Queensland', 'mediafairplay'),
                'wa' => __('Western Australia', 'mediafairplay'),
                'sa' => __('South Australia', 'mediafairplay'),
                'tas' => __('Tasmania', 'mediafairplay'),
                'act' => __('Australian Capital Territory', 'mediafairplay'),
                'nt' => __('Northern Territory', 'mediafairplay'),
            )
        )
    ));

    $wp_customize->add_setting(
        'global_typo_font_size',
        array(
            'default' => 16,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );

    $wp_customize->add_control(
        'global_typo_font_size',
        array(
            'label' => __('Font Size'),
            'description' => esc_html__(''),
            'section' => 'global_base_typography_section',
            'type' => 'number', // Can be either text, email, url, number, hidden, or date
            'capability' => 'edit_theme_options', // Optional. Default: 'edit_theme_options'
            'input_attrs' => array( // Optional.
                'class' => 'my-custom-class',
                'placeholder' => __('Enter name...'),
            ),
        )
    );
    $wp_customize->add_setting(
        'global_typo_font_weight',
        array(
            'default' => '400',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_typo_font_weight',
        array(
            'label' => __('Font Weight', 'mediafairplay'),
            'description' => esc_html__('', 'mediafairplay'),
            'section' => 'global_base_typography_section',
            'input_attrs' => array(
                'placeholder' => __('Please select a state...', 'mediafairplay'),
                'multiselect' => false,
            ),
            'choices' => array(
                '100' => __('100', 'mediafairplay'),
                '200' => __('200', 'mediafairplay'),
                '300' => __('300', 'mediafairplay'),
                '400' => __('400', 'mediafairplay'),
                '500' => __('500', 'mediafairplay'),
                '600' => __('600', 'mediafairplay'),
                '700' => __('700', 'mediafairplay'),
                '800' => __('800', 'mediafairplay'),
                '900' => __('900', 'mediafairplay'),
            )
        )
    ));

    $wp_customize->add_setting(
        'global_typo_text_transform',
        array(
            'default' => 'None',
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );

    $wp_customize->add_control(new Skyrocket_Image_Radio_Button_Custom_Control(
        $wp_customize,
        'global_typo_text_transform',
        array(
            'label' => __('Text Transform'),
            'description' => esc_html__(''),
            'section' => 'global_base_typography_section',
            'choices' => array(
                'None' => array(  // Required. Setting for this particular radio button choice
                    'image' => trailingslashit(get_template_directory_uri()) . 'images/none.png', // Required. URL for the image
                    'name' => __('None') // Required. Title text to display
                ),
                'upercase' => array(
                    'image' => trailingslashit(get_template_directory_uri()) . 'images/AllCaps.png',
                    'name' => __('uppercase')
                ),
                'lowercase' => array(
                    'image' => trailingslashit(get_template_directory_uri()) . 'images/lowercase.png',
                    'name' => __('lowercase')
                )
            )
        )
    ));
    $wp_customize->add_setting(
        'global_typo_line_height',
        array(
            'default' => 1.5,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer'
        )
    );

    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'global_typo_line_height',
        array(
            'label' => esc_html__('Line Height'),
            'section' => 'global_base_typography_section',
            'input_attrs' => array(
                'min' => 0, // Required. Minimum value for the slider
                'max' => 5, // Required. Maximum value for the slider
                'step' => 0.1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));

    $wp_customize->add_setting(
        'global_typo_p_margin_bottom',
        array(
            'default' => 1.5,
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_sanitize_integer'
        )
    );

    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'global_typo_p_margin_bottom',
        array(
            'label' => esc_html__('Paragraph Margin Bottom'),
            'section' => 'global_base_typography_section',
            'input_attrs' => array(
                'min' => 0, // Required. Minimum value for the slider
                'max' => 5, // Required. Maximum value for the slider
                'step' => 0.1, // Required. The size of each interval or step the slider takes between the minimum and maximum values
            ),
        )
    ));
}
add_action('customize_register', 'mfp_global_typohraphy');
