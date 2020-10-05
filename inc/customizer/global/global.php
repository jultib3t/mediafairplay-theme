<?php


if (class_exists('WP_Customize_Panel')) {

    class PE_WP_Customize_Panel extends WP_Customize_Panel
    {

        public $panel;

        public $type = 'pe_panel';

        public function json()
        {

            $array = wp_array_slice_assoc((array) $this, array('id', 'description', 'priority', 'type', 'panel',));
            $array['title'] = html_entity_decode($this->title, ENT_QUOTES, get_bloginfo('charset'));
            $array['content'] = $this->get_content();
            $array['active'] = $this->active();
            $array['instanceNumber'] = $this->instance_number;

            return $array;
        }
    }
}

if (class_exists('WP_Customize_Section')) {

    class PE_WP_Customize_Section extends WP_Customize_Section
    {

        public $section;

        public $type = 'pe_section';

        public function json()
        {

            $array = wp_array_slice_assoc((array) $this, array('id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section',));
            $array['title'] = html_entity_decode($this->title, ENT_QUOTES, get_bloginfo('charset'));
            $array['content'] = $this->get_content();
            $array['active'] = $this->active();
            $array['instanceNumber'] = $this->instance_number;

            if ($this->panel) {

                $array['customizeAction'] = sprintf('Customizing &#9656; %s', esc_html($this->manager->get_panel($this->panel)->title));
            } else {

                $array['customizeAction'] = 'Customizing';
            }

            return $array;
        }
    }
}

// Enqueue our scripts and styles
function pe_customize_controls_scripts()
{

    wp_enqueue_script('pe-customize-controls', get_theme_file_uri('/js/pe-customize-controls.js'), array(), '1.0', true);
}

add_action('customize_controls_enqueue_scripts', 'pe_customize_controls_scripts');

function pe_customize_controls_styles()
{

    wp_enqueue_style('pe-customize-controls', get_theme_file_uri('/css/pe-customize-controls.css'), array(), '1.0');
}

add_action('customize_controls_print_styles', 'pe_customize_controls_styles');

function pe_customize_register($wp_customize)
{
    // Has to be at the top
    $wp_customize->register_panel_type('PE_WP_Customize_Panel');
    $wp_customize->register_section_type('PE_WP_Customize_Section');


    // Below this there is only demo code, safe to delete and add your own
    // panels/sections/controls

    // Add three levels on panels
    $global_parent_panel = new PE_WP_Customize_Panel($wp_customize, 'global_parent_panel', array(
        'title' => 'Global ( Beta )',
        'priority' => 2,
    ));
    $wp_customize->add_panel($global_parent_panel);

    $global_child_1_panel = new PE_WP_Customize_Panel($wp_customize, 'global_child_1_panel', array(
        'title' => 'Typography ( Beta )',
        'panel' => 'global_parent_panel',
    ));

    $wp_customize->add_panel($global_child_1_panel);

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

    /*  $global_container = new PE_WP_Customize_Panel($wp_customize, 'global_container', array(
        'title' => 'Container',
        'panel' => 'global_parent_panel',
    ));
    $wp_customize->add_panel($global_container); */

    $wp_customize->add_section('global_container', array(
        'title' => 'Container ( Beta )',
        'panel' => 'global_parent_panel',
    ));


    $wp_customize->add_setting(
        'global_container_width',
        array(
            'default' => 1200,
            'transport' => 'refresh',
            'sanitize_callback' => 'absint'
        )
    );
    $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
        $wp_customize,
        'global_container_width',
        array(
            'label' => __('Width', 'mediafairplay'),
            'section' => 'global_container',
            'input_attrs' => array(
                'min' => 100,
                'max' => 1920,
                'step' => 20,
            ),
        )
    ));

    $wp_customize->add_setting(
        'global_layout_layout',
        array(
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_layout_layout',
        array(
            'label' => __('Default Layout', 'mediafairplay'),
            'description' => esc_html__('', 'skyrocket'),
            'section' => 'global_container',
            'input_attrs' => array(
                'placeholder' => false,
                'multiselect' => false,
            ),
            'choices' => array(
                'container' => __('Container', 'mediafairplay'),
                'Full_Width' => __('Full Width', 'mediafairplay'),
            )
        )
    ));

    $wp_customize->add_setting(
        'global_layout_page',
        array(
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_layout_page',
        array(
            'label' => __('Page Layout', 'mediafairplay'),
            'description' => esc_html__('', 'skyrocket'),
            'section' => 'global_container',
            'input_attrs' => array(
                'placeholder' => false,
                'multiselect' => false,
            ),
            'choices' => array(
                'default' => __('Default', 'mediafairplay'),
                'container' => __('Container', 'mediafairplay'),
                'Full_Width' => __('Full Width', 'mediafairplay'),
            )
        )
    ));
    $wp_customize->add_setting(
        'global_layout_blog_post_layout',
        array(
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_layout_blog_post_layout',
        array(
            'label' => __('Blog Post Layout', 'mediafairplay'),
            'description' => esc_html__('', 'skyrocket'),
            'section' => 'global_container',
            'input_attrs' => array(
                'placeholder' => false,
                'multiselect' => false,
            ),
            'choices' => array(
                'default' => __('Default', 'mediafairplay'),
                'container' => __('Container', 'mediafairplay'),
                'Full_Width' => __('Full Width', 'mediafairplay'),
            )
        )
    ));

    $wp_customize->add_setting(
        'global_layout_archives_layout',
        array(
            'transport' => 'refresh',
            'sanitize_callback' => 'skyrocket_text_sanitization'
        )
    );
    $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
        $wp_customize,
        'global_layout_archives_layout',
        array(
            'label' => __('Archives Layout', 'mediafairplay'),
            'description' => esc_html__('', 'skyrocket'),
            'section' => 'global_container',
            'input_attrs' => array(
                'placeholder' => false,
                'multiselect' => false,
            ),
            'choices' => array(
                'default' => __('Default', 'mediafairplay'),
                'container' => __('Container', 'mediafairplay'),
                'Full_Width' => __('Full Width', 'mediafairplay'),
            )
        )
    ));





    $global_child_2_panel = new PE_WP_Customize_Panel($wp_customize, 'global_child_2_panel', array(
        'title' => 'Level 3',
        'panel' => 'global_child_1_panel',
        'priority' => 1,
    ));

    $wp_customize->add_panel($global_child_2_panel);

    // Add example section and controls to the final (third) panel
    $wp_customize->add_section('pe_section', array(
        'title' => 'Section Test',
        'panel' => 'global_child_2_panel',
    ));

    $wp_customize->add_setting('pe_test', array(
        'default' => 'default value here',
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('pe_test', array(
        'type' => 'text',
        'label' => 'Some text control',
        'section' => 'pe_section',
    ));

    // Add example section and controls to the middle (second) panel
    $wp_customize->add_section('base_typography_section', array(
        'title' => 'Base Typography',
        'panel' => 'global_child_1_panel',
        'priority' => 2,
    ));

    $wp_customize->add_section('pe_section_2_1', array(
        'title' => 'Heading',
        'panel' => 'global_child_1_panel',
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
            'section' => 'pe_section_2_1',
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

    // Add example section and controls to another section
    $lvl1ParentSection = new PE_WP_Customize_Section($wp_customize, 'lvl_1_parent_section', array(
        'title' => 'Level 1 Section',
        'panel' => 'lvl_3_parent_panel',
    ));

    $wp_customize->add_section($lvl1ParentSection);

    $lv21ParentSection = new PE_WP_Customize_Section($wp_customize, 'lvl_2_parent_section', array(
        'title' => 'Level 2 Section',
        'section' => 'lvl_1_parent_section',
        'panel' => 'lvl_3_parent_panel',
    ));

    $wp_customize->add_section($lv21ParentSection);

    $wp_customize->add_setting('pe_test_3', array(
        'default' => 'default value here',
        'sanitize_callback' => 'wp_kses_post',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('pe_test_3', array(
        'type' => 'text',
        'label' => 'Some text control 3',
        'section' => 'lvl_2_parent_section',
    ));
}

add_action('customize_register', 'pe_customize_register');