<?php

/**
 * mediafairplay Theme Customizer
 *
 * @package mediafairplay
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function mediafairplay_customize_register($wp_customize)
{
    $wp_customize->get_setting('blogname')->transport         = 'postMessage';
    $wp_customize->get_setting('blogdescription')->transport  = 'postMessage';
    $wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

    if (isset($wp_customize->selective_refresh)) {
        $wp_customize->selective_refresh->add_partial(
            'blogname',
            array(
                'selector'        => '.site-title a',
                'render_callback' => 'mediafairplay_customize_partial_blogname',
            )
        );
        $wp_customize->selective_refresh->add_partial(
            'blogdescription',
            array(
                'selector'        => '.site-description',
                'render_callback' => 'mediafairplay_customize_partial_blogdescription',
            )
        );
    }
}
add_action('customize_register', 'mediafairplay_customize_register');

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function mediafairplay_customize_partial_blogname()
{
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function mediafairplay_customize_partial_blogdescription()
{
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function mediafairplay_customize_preview_js()
{
    wp_enqueue_script('mediafairplay-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), '20151215', true);
}
add_action('customize_preview_init', 'mediafairplay_customize_preview_js');

/**
 * Customizer Setup and Custom Controls
 *
 */

/**
 * Adds the individual sections, settings, and controls to the theme customizer
 */
class skyrocket_initialise_customizer_settings
{
    // Get our default values
    private $defaults;
    // __construct
    public function __construct()
    {
        // Get our Customizer defaults
        $this->defaults = skyrocket_generate_defaults();
        // Register our Panels
        add_action('customize_register', array($this, 'skyrocket_add_customizer_panels'));
        // Register our sections
        add_action('customize_register', array($this, 'skyrocket_add_customizer_sections'));
        // Register customizer_global_changes
        add_action('customize_register', array($this, 'customizer_global_changes'));
        // Register our WooCommerce controls, only if WooCommerce is active
        if (skyrocket_is_woocommerce_active()) {
            add_action('customize_register', array($this, 'skyrocket_register_woocommerce_controls'));
        }
        // Register our sample Custom Control controls
        // add_action('customize_register', array($this, 'skyrocket_register_sample_custom_controls'));

        // Register Our Site General Control
        add_action('customize_register', array($this, 'mfp_site_general_controls'));
        // global control
        add_action('customize_register', array($this, 'mfp_global_controls'));
        // MFP TABLE
        add_action('customize_register', array($this, 'mfp_casino_table_controls'));
        // MFP CARDS
        add_action('customize_register', array($this, 'mfp_casino_cards_controls'));
    }
    public function skyrocket_add_customizer_panels($wp_customize)
    {

        /**
         *  Add Our Main typography panel
         */
        $wp_customize->add_panel(
            'mfp_typography_panel',
            array(
                'title' => __('MFP Typography', 'mediafairplay'),
                'description' => esc_html__('Adjust your Header', 'mediafairplay'),
                'priority'       => 60,
            )
        );
    }
    public function skyrocket_add_customizer_sections($wp_customize)
    {
        /**
         * Add our WooCommerce Layout Section, only if WooCommerce is active
         */
        $wp_customize->add_section(
            'woocommerce_layout_section',
            array(
                'title' => __('WooCommerce Layout', 'mediafairplay'),
                'description' => esc_html__('Adjust the layout of your WooCommerce shop.', 'mediafairplay'),
                'active_callback' => 'skyrocket_is_woocommerce_active'
            )
        );

        /**
         * Add our section that contains examples of our Custom Controls
         */
        $wp_customize->add_section(
            'sample_custom_controls_section',
            array(
                'title' => __('Sample Custom Controls', 'mediafairplay'),
                'description' => esc_html__('These are an example of Customizer Custom Controls.', 'mediafairplay')
            )
        );

        /**
         * Add our section that contains examples of the default Core Customizer Controls
         */
        $wp_customize->add_section(
            'default_controls_section',
            array(
                'title' => __('Default Controls', 'mediafairplay'),
                'description' => esc_html__('These are an example of the default Customizer Controls.', 'mediafairplay')
            )
        );
    }
    /** Site General Control */
    public function mfp_site_general_controls($wp_customize)
    {
        /** Change the title from site general to MFP Site General */
        $wp_customize->get_section('title_tagline')->title = 'Site Identity';
        /** Google tag manager Head */
        $wp_customize->add_setting(
            'Google_Tag_Manager_Head',
            [
                'default' => ''
            ]
        );
        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            'Google_Tag_Manager_Head',
            array(
                'label'      => __('Google Tag Manager', 'mediafairplay'),
                'description' => __('Add First Tag Inside head', 'textdomain'),
                'settings'   => 'Google_Tag_Manager_Head',
                'priority'       => 120,
                'section'    => 'title_tagline',
                'type'       => 'textarea',
            )
        ));
        /** Google tag manager Body */
        $wp_customize->add_setting(
            'Google_Tag_Manager_Body',
            [
                'default' => ''
            ]
        );
        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            'Google_Tag_Manager_Body',
            array(
                'label'      => __('', 'textdomain'),
                'description' => __('Add Second Tag Inside body', 'mediafairplay'),
                'settings'   => 'Google_Tag_Manager_Body',
                'priority'       => 130,
                'section'    => 'title_tagline',
                'type'       => 'textarea',
            )
        ));
        /** SITE IDENTITY BY APP WIZ */
        $wp_customize->add_setting(
            'connect_your_site_to_aff_wiz',
            [
                'default' => ''
            ]
        );
        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            'connect_your_site_to_aff_wiz',
            array(
                'label'      => __('Connect Your Site To AFF-WIZ', 'mediafairplay'),
                'description' => __('Please Check your ID from "Site Manager" in AFF WIZ', 'mediafairplay'),
                'priority'       => 130,
                'section'    => 'title_tagline',
                'type'       => 'number',
            )
        ));
        /** /// SITE IDENTITY BY APP WIZ */
        
         /** SITE IDENTITY BY APP WIZ GEO ID */
         $wp_customize->add_setting(
            'connect_your_site_to_aff_wiz_id',
            [
                'default' => ''
            ]
        );
        $wp_customize->add_control(new WP_Customize_Control(
            $wp_customize,
            'connect_your_site_to_aff_wiz_id',
            array(
                'label'      => __('Connect Your Site To AFF-WIZ BY GEO ID', 'mediafairplay'),
                'description' => __('Please Check your ID from "Site Manager" in AFF WIZ', 'mediafairplay'),
                'priority'       => 130,
                'section'    => 'title_tagline',
                'type'       => 'number',
            )
        ));
        /** /// SITE IDENTITY BY APP WIZ */

        /** Image control */
       
        /** // Image control */
    }
    /** Register our sample custom controls */
    public function skyrocket_register_sample_custom_controls($wp_customize)
    {
        $wp_customize->add_setting(
            'sample_toggle_switch',
            array(
                'default' => $this->defaults['sample_toggle_switch'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_switch_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Toggle_Switch_Custom_control(
            $wp_customize,
            'sample_toggle_switch',
            array(
                'label' => __('Toggle switch', 'mediafairplay'),
                'section' => 'sample_custom_controls_section'
            )
        ));

        // Test of Slider Custom Control
        $wp_customize->add_setting(
            'sample_slider_control',
            array(
                'default' => $this->defaults['sample_slider_control'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'sample_slider_control',
            array(
                'label' => __('Slider Control (px)', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'input_attrs' => array(
                    'min' => 10,
                    'max' => 90,
                    'step' => 1,
                ),
            )
        ));

        // Another Test of Slider Custom Control
        $wp_customize->add_setting(
            'sample_slider_control_small_step',
            array(
                'default' => $this->defaults['sample_slider_control_small_step'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_range_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'sample_slider_control_small_step',
            array(
                'label' => __('Slider Control With a Small Step', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 4,
                    'step' => .5,
                ),
            )
        ));

        // Add our Sortable Repeater setting and Custom Control for Social media URLs
        $wp_customize->add_setting(
            'sample_sortable_repeater_control',
            array(
                'default' => $this->defaults['sample_sortable_repeater_control'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_url_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Sortable_Repeater_Custom_Control(
            $wp_customize,
            'sample_sortable_repeater_control',
            array(
                'label' => __('Sortable Repeater', 'mediafairplay'),
                'description' => esc_html__('This is the control description.', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'button_labels' => array(
                    'add' => __('Add Row', 'mediafairplay'),
                )
            )
        ));

        // Test of Image Radio Button Custom Control
        $wp_customize->add_setting(
            'sample_image_radio_button',
            array(
                'default' => $this->defaults['sample_image_radio_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_radio_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Image_Radio_Button_Custom_Control(
            $wp_customize,
            'sample_image_radio_button',
            array(
                'label' => __('Image Radio Button Control', 'mediafairplay'),
                'description' => esc_html__('Sample custom control description', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'choices' => array(
                    'sidebarleft' => array(
                        'image' => trailingslashit(get_template_directory_uri()) . 'images/sidebar-left.png',
                        'name' => __('Left Sidebar', 'mediafairplay')
                    ),
                    'sidebarnone' => array(
                        'image' => trailingslashit(get_template_directory_uri()) . 'images/sidebar-none.png',
                        'name' => __('No Sidebar', 'mediafairplay')
                    ),
                    'sidebarright' => array(
                        'image' => trailingslashit(get_template_directory_uri()) . 'images/sidebar-right.png',
                        'name' => __('Right Sidebar', 'mediafairplay')
                    )
                )
            )
        ));

        // Test of Text Radio Button Custom Control
        $wp_customize->add_setting(
            'sample_text_radio_button',
            array(
                'default' => $this->defaults['sample_text_radio_button'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_radio_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Text_Radio_Button_Custom_Control(
            $wp_customize,
            'sample_text_radio_button',
            array(
                'label' => __('Text Radio Button Control', 'mediafairplay'),
                'description' => esc_html__('Sample custom control description', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'choices' => array(
                    'left' => __('Left', 'mediafairplay'),
                    'centered' => __('Centered', 'mediafairplay'),
                    'right' => __('Right', 'mediafairplay')
                )
            )
        ));

        // Test of Image Checkbox Custom Control
        $wp_customize->add_setting(
            'sample_image_checkbox',
            array(
                'default' => $this->defaults['sample_image_checkbox'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_text_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Image_checkbox_Custom_Control(
            $wp_customize,
            'sample_image_checkbox',
            array(
                'label' => __('Image Checkbox Control', 'mediafairplay'),
                'description' => esc_html__('Sample custom control description', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'choices' => array(
                    'stylebold' => array(
                        'image' => trailingslashit(get_template_directory_uri()) . 'images/bold.png',
                        'name' => __('Bold', 'mediafairplay')
                    ),
                    'styleitalic' => array(
                        'image' => trailingslashit(get_template_directory_uri()) . 'images/italic.png',
                        'name' => __('Italic', 'mediafairplay')
                    ),
                    'styleallcaps' => array(
                        'image' => trailingslashit(get_template_directory_uri()) . 'images/allcaps.png',
                        'name' => __('All Caps', 'mediafairplay')
                    ),
                    'styleunderline' => array(
                        'image' => trailingslashit(get_template_directory_uri()) . 'images/underline.png',
                        'name' => __('Underline', 'mediafairplay')
                    )
                )
            )
        ));

        // Test of Single Accordion Control
        $sampleIconsList = array(
            'Behance' => __('<i class="fab fa-behance"></i>', 'mediafairplay'),
            'Bitbucket' => __('<i class="fab fa-bitbucket"></i>', 'mediafairplay'),
            'CodePen' => __('<i class="fab fa-codepen"></i>', 'mediafairplay'),
            'DeviantArt' => __('<i class="fab fa-deviantart"></i>', 'mediafairplay'),
            'Discord' => __('<i class="fab fa-discord"></i>', 'mediafairplay'),
            'Dribbble' => __('<i class="fab fa-dribbble"></i>', 'mediafairplay'),
            'Etsy' => __('<i class="fab fa-etsy"></i>', 'mediafairplay'),
            'Facebook' => __('<i class="fab fa-facebook-f"></i>', 'mediafairplay'),
            'Flickr' => __('<i class="fab fa-flickr"></i>', 'mediafairplay'),
            'Foursquare' => __('<i class="fab fa-foursquare"></i>', 'mediafairplay'),
            'GitHub' => __('<i class="fab fa-github"></i>', 'mediafairplay'),
            'Google+' => __('<i class="fab fa-google-plus-g"></i>', 'mediafairplay'),
            'Instagram' => __('<i class="fab fa-instagram"></i>', 'mediafairplay'),
            'Kickstarter' => __('<i class="fab fa-kickstarter-k"></i>', 'mediafairplay'),
            'Last.fm' => __('<i class="fab fa-lastfm"></i>', 'mediafairplay'),
            'LinkedIn' => __('<i class="fab fa-linkedin-in"></i>', 'mediafairplay'),
            'Medium' => __('<i class="fab fa-medium-m"></i>', 'mediafairplay'),
            'Patreon' => __('<i class="fab fa-patreon"></i>', 'mediafairplay'),
            'Pinterest' => __('<i class="fab fa-pinterest-p"></i>', 'mediafairplay'),
            'Reddit' => __('<i class="fab fa-reddit-alien"></i>', 'mediafairplay'),
            'Slack' => __('<i class="fab fa-slack-hash"></i>', 'mediafairplay'),
            'SlideShare' => __('<i class="fab fa-slideshare"></i>', 'mediafairplay'),
            'Snapchat' => __('<i class="fab fa-snapchat-ghost"></i>', 'mediafairplay'),
            'SoundCloud' => __('<i class="fab fa-soundcloud"></i>', 'mediafairplay'),
            'Spotify' => __('<i class="fab fa-spotify"></i>', 'mediafairplay'),
            'Stack Overflow' => __('<i class="fab fa-stack-overflow"></i>', 'mediafairplay'),
            'Tumblr' => __('<i class="fab fa-tumblr"></i>', 'mediafairplay'),
            'Twitch' => __('<i class="fab fa-twitch"></i>', 'mediafairplay'),
            'Twitter' => __('<i class="fab fa-twitter"></i>', 'mediafairplay'),
            'Vimeo' => __('<i class="fab fa-vimeo-v"></i>', 'mediafairplay'),
            'Weibo' => __('<i class="fab fa-weibo"></i>', 'mediafairplay'),
            'YouTube' => __('<i class="fab fa-youtube"></i>', 'mediafairplay'),
        );
        $wp_customize->add_setting(
            'sample_single_accordion',
            array(
                'default' => $this->defaults['sample_single_accordion'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_text_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Single_Accordion_Custom_Control(
            $wp_customize,
            'sample_single_accordion',
            array(
                'label' => __('Single Accordion Control', 'mediafairplay'),
                'description' => $sampleIconsList,
                'section' => 'sample_custom_controls_section'
            )
        ));

        // Test of Alpha Color Picker Control
        $wp_customize->add_setting(
            'sample_alpha_color',
            array(
                'default' => $this->defaults['sample_alpha_color'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'sample_alpha_color',
            array(
                'label' => __('Alpha Color Picker Control', 'mediafairplay'),
                'description' => esc_html__('Sample custom control description', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'show_opacity' => true,
                'palette' => array(
                    '#000',
                    '#fff',
                    '#df312c',
                    '#df9a23',
                    '#eef000',
                    '#7ed934',
                    '#1571c1',
                    '#8309e7'
                )
            )
        ));

        // Test of WPColorPicker Alpha Color Picker Control
        $wp_customize->add_setting(
            'sample_wpcolorpicker_alpha_color',
            array(
                'default' => $this->defaults['sample_wpcolorpicker_alpha_color'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Alpha_Color_Control(
            $wp_customize,
            'sample_wpcolorpicker_alpha_color',
            array(
                'label' => __('WP ColorPicker Alpha Color Picker', 'mediafairplay'),
                'description' => esc_html__('Sample color control with Alpha channel', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'input_attrs' => array(
                    'palette' => array(
                        '#000000',
                        '#ffffff',
                        '#dd3333',
                        '#dd9933',
                        '#eeee22',
                        '#81d742',
                        '#1e73be',
                        '#8224e3',
                    )
                ),
            )
        ));

        // Another Test of WPColorPicker Alpha Color Picker Control
        $wp_customize->add_setting(
            'sample_wpcolorpicker_alpha_color2',
            array(
                'default' => $this->defaults['sample_wpcolorpicker_alpha_color2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_hex_rgba_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Alpha_Color_Control(
            $wp_customize,
            'sample_wpcolorpicker_alpha_color2',
            array(
                'label' => __('WP ColorPicker Alpha Color Picker', 'mediafairplay'),
                'description' => esc_html__('Sample color control with Alpha channel', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'input_attrs' => array(
                    'resetalpha' => false,
                    'palette' => array(
                        'rgba(99,78,150,1)',
                        'rgba(67,78,150,1)',
                        'rgba(34,78,150,.7)',
                        'rgba(3,78,150,1)',
                        'rgba(7,110,230,.9)',
                        'rgba(234,78,150,1)',
                        'rgba(99,78,150,.5)',
                        'rgba(190,120,120,.5)',
                    ),
                ),
            )
        ));

        // Test of Pill Checkbox Custom Control
        $wp_customize->add_setting(
            'sample_pill_checkbox',
            array(
                'default' => $this->defaults['sample_pill_checkbox'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_text_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Pill_Checkbox_Custom_Control(
            $wp_customize,
            'sample_pill_checkbox',
            array(
                'label' => __('Pill Checkbox Control', 'mediafairplay'),
                'description' => esc_html__('This is a sample Pill Checkbox Control', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'input_attrs' => array(
                    'sortable' => false,
                    'fullwidth' => false,
                ),
                'choices' => array(
                    'tiger' => __('Tiger', 'mediafairplay'),
                    'lion' => __('Lion', 'mediafairplay'),
                    'giraffe' => __('Giraffe', 'mediafairplay'),
                    'elephant' => __('Elephant', 'mediafairplay'),
                    'hippo' => __('Hippo', 'mediafairplay'),
                    'rhino' => __('Rhino', 'mediafairplay'),
                )
            )
        ));

        // Test of Pill Checkbox Custom Control
        $wp_customize->add_setting(
            'sample_pill_checkbox2',
            array(
                'default' => $this->defaults['sample_pill_checkbox2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_text_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Pill_Checkbox_Custom_Control(
            $wp_customize,
            'sample_pill_checkbox2',
            array(
                'label' => __('Pill Checkbox Control', 'mediafairplay'),
                'description' => esc_html__('This is a sample Sortable Pill Checkbox Control', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'input_attrs' => array(
                    'sortable' => true,
                    'fullwidth' => false,
                ),
                'choices' => array(
                    'captainamerica' => __('Captain America', 'mediafairplay'),
                    'ironman' => __('Iron Man', 'mediafairplay'),
                    'captainmarvel' => __('Captain Marvel', 'mediafairplay'),
                    'msmarvel' => __('Ms. Marvel', 'mediafairplay'),
                    'Jessicajones' => __('Jessica Jones', 'mediafairplay'),
                    'squirrelgirl' => __('Squirrel Girl', 'mediafairplay'),
                    'blackwidow' => __('Black Widow', 'mediafairplay'),
                    'hulk' => __('Hulk', 'mediafairplay'),
                )
            )
        ));

        // Test of Pill Checkbox Custom Control
        $wp_customize->add_setting(
            'sample_pill_checkbox3',
            array(
                'default' => $this->defaults['sample_pill_checkbox3'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_text_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Pill_Checkbox_Custom_Control(
            $wp_customize,
            'sample_pill_checkbox3',
            array(
                'label' => __('Pill Checkbox Control', 'mediafairplay'),
                'description' => esc_html__('This is a sample Sortable Fullwidth Pill Checkbox Control', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'input_attrs' => array(
                    'sortable' => true,
                    'fullwidth' => true,
                ),
                'choices' => array(
                    'date' => __('Date', 'mediafairplay'),
                    'author' => __('Author', 'mediafairplay'),
                    'categories' => __('Categories', 'mediafairplay'),
                    'tags' => __('Tags', 'mediafairplay'),
                    'comments' => __('Comments', 'mediafairplay'),
                )
            )
        ));

        // Test of Simple Notice control
        $wp_customize->add_setting(
            'sample_simple_notice',
            array(
                'default' => $this->defaults['sample_simple_notice'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'skyrocket_text_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Simple_Notice_Custom_control(
            $wp_customize,
            'sample_simple_notice',
            array(
                'label' => __('Simple Notice Control', 'mediafairplay'),
                'description' => __('This Custom Control allows you to display a simple title and description to your users. You can even include <a href="http://google.com" target="_blank">basic html</a>.', 'mediafairplay'),
                'section' => 'sample_custom_controls_section'
            )
        ));

        // Test of Dropdown Select2 Control (single select)
        $wp_customize->add_setting(
            'sample_dropdown_select2_control_single',
            array(
                'default' => $this->defaults['sample_dropdown_select2_control_single'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_text_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
            $wp_customize,
            'sample_dropdown_select2_control_single',
            array(
                'label' => __('Dropdown Select2 Control', 'mediafairplay'),
                'description' => esc_html__('Sample Dropdown Select2 custom control (Single Select)', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'input_attrs' => array(
                    'placeholder' => __('Please select a state...', 'mediafairplay'),
                    'multiselect' => false,
                ),
                'choices' => array(
                    'nsw' => __('New South Wales', 'mediafairplay'),
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

        // Test of Dropdown Select2 Control (Multi-Select)
        $wp_customize->add_setting(
            'sample_dropdown_select2_control_multi',
            array(
                'default' => $this->defaults['sample_dropdown_select2_control_multi'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_text_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
            $wp_customize,
            'sample_dropdown_select2_control_multi',
            array(
                'label' => __('Dropdown Select2 Control', 'mediafairplay'),
                'description' => esc_html__('Sample Dropdown Select2 custom control  (Multi-Select)', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'input_attrs' => array(
                    'multiselect' => true,
                ),
                'choices' => array(
                    __('Antarctica', 'mediafairplay') => array(
                        'Antarctica/Casey' => __('Casey', 'mediafairplay'),
                        'Antarctica/Davis' => __('Davis', 'mediafairplay'),
                        'Antarctica/DumontDurville' => __('DumontDUrville', 'mediafairplay'),
                        'Antarctica/Macquarie' => __('Macquarie', 'mediafairplay'),
                        'Antarctica/Mawson' => __('Mawson', 'mediafairplay'),
                        'Antarctica/McMurdo' => __('McMurdo', 'mediafairplay'),
                        'Antarctica/Palmer' => __('Palmer', 'mediafairplay'),
                        'Antarctica/Rothera' => __('Rothera', 'mediafairplay'),
                        'Antarctica/Syowa' => __('Syowa', 'mediafairplay'),
                        'Antarctica/Troll' => __('Troll', 'mediafairplay'),
                        'Antarctica/Vostok' => __('Vostok', 'mediafairplay'),
                    ),
                    __('Atlantic', 'mediafairplay') => array(
                        'Atlantic/Azores' => __('Azores', 'mediafairplay'),
                        'Atlantic/Bermuda' => __('Bermuda', 'mediafairplay'),
                        'Atlantic/Canary' => __('Canary', 'mediafairplay'),
                        'Atlantic/Cape_Verde' => __('Cape Verde', 'mediafairplay'),
                        'Atlantic/Faroe' => __('Faroe', 'mediafairplay'),
                        'Atlantic/Madeira' => __('Madeira', 'mediafairplay'),
                        'Atlantic/Reykjavik' => __('Reykjavik', 'mediafairplay'),
                        'Atlantic/South_Georgia' => __('South Georgia', 'mediafairplay'),
                        'Atlantic/Stanley' => __('Stanley', 'mediafairplay'),
                        'Atlantic/St_Helena' => __('St Helena', 'mediafairplay'),
                    ),
                    __('Australia', 'mediafairplay') => array(
                        'Australia/Adelaide' => __('Adelaide', 'mediafairplay'),
                        'Australia/Brisbane' => __('Brisbane', 'mediafairplay'),
                        'Australia/Broken_Hill' => __('Broken Hill', 'mediafairplay'),
                        'Australia/Currie' => __('Currie', 'mediafairplay'),
                        'Australia/Darwin' => __('Darwin', 'mediafairplay'),
                        'Australia/Eucla' => __('Eucla', 'mediafairplay'),
                        'Australia/Hobart' => __('Hobart', 'mediafairplay'),
                        'Australia/Lindeman' => __('Lindeman', 'mediafairplay'),
                        'Australia/Lord_Howe' => __('Lord Howe', 'mediafairplay'),
                        'Australia/Melbourne' => __('Melbourne', 'mediafairplay'),
                        'Australia/Perth' => __('Perth', 'mediafairplay'),
                        'Australia/Sydney' => __('Sydney', 'mediafairplay'),
                    )
                )
            )
        ));

        // Test of Dropdown Select2 Control (Multi-Select) with single array choice
        $wp_customize->add_setting(
            'sample_dropdown_select2_control_multi2',
            array(
                'default' => $this->defaults['sample_dropdown_select2_control_multi2'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_text_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Dropdown_Select2_Custom_Control(
            $wp_customize,
            'sample_dropdown_select2_control_multi2',
            array(
                'label' => __('Dropdown Select2 Control', 'mediafairplay'),
                'description' => esc_html__('Another Sample Dropdown Select2 custom control (Multi-Select)', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'input_attrs' => array(
                    'multiselect' => true,
                ),
                'choices' => array(
                    'Antarctica/Casey' => __('Casey', 'mediafairplay'),
                    'Antarctica/Davis' => __('Davis', 'mediafairplay'),
                    'Antarctica/DumontDurville' => __('DumontDUrville', 'mediafairplay'),
                    'Antarctica/Macquarie' => __('Macquarie', 'mediafairplay'),
                    'Antarctica/Mawson' => __('Mawson', 'mediafairplay'),
                    'Antarctica/McMurdo' => __('McMurdo', 'mediafairplay'),
                    'Antarctica/Palmer' => __('Palmer', 'mediafairplay'),
                    'Antarctica/Rothera' => __('Rothera', 'mediafairplay'),
                    'Antarctica/Syowa' => __('Syowa', 'mediafairplay'),
                    'Antarctica/Troll' => __('Troll', 'mediafairplay'),
                    'Antarctica/Vostok' => __('Vostok', 'mediafairplay'),
                    'Atlantic/Azores' => __('Azores', 'mediafairplay'),
                    'Atlantic/Bermuda' => __('Bermuda', 'mediafairplay'),
                    'Atlantic/Canary' => __('Canary', 'mediafairplay'),
                    'Atlantic/Cape_Verde' => __('Cape Verde', 'mediafairplay'),
                    'Atlantic/Faroe' => __('Faroe', 'mediafairplay'),
                    'Atlantic/Madeira' => __('Madeira', 'mediafairplay'),
                    'Atlantic/Reykjavik' => __('Reykjavik', 'mediafairplay'),
                    'Atlantic/South_Georgia' => __('South Georgia', 'mediafairplay'),
                    'Atlantic/Stanley' => __('Stanley', 'mediafairplay'),
                    'Atlantic/St_Helena' => __('St Helena', 'mediafairplay'),
                    'Australia/Adelaide' => __('Adelaide', 'mediafairplay'),
                    'Australia/Brisbane' => __('Brisbane', 'mediafairplay'),
                    'Australia/Broken_Hill' => __('Broken Hill', 'mediafairplay'),
                    'Australia/Currie' => __('Currie', 'mediafairplay'),
                    'Australia/Darwin' => __('Darwin', 'mediafairplay'),
                    'Australia/Eucla' => __('Eucla', 'mediafairplay'),
                    'Australia/Hobart' => __('Hobart', 'mediafairplay'),
                    'Australia/Lindeman' => __('Lindeman', 'mediafairplay'),
                    'Australia/Lord_Howe' => __('Lord Howe', 'mediafairplay'),
                    'Australia/Melbourne' => __('Melbourne', 'mediafairplay'),
                    'Australia/Perth' => __('Perth', 'mediafairplay'),
                    'Australia/Sydney' => __('Sydney', 'mediafairplay'),
                )
            )
        ));

        // Test of Dropdown Posts Control
        $wp_customize->add_setting(
            'sample_dropdown_posts_control',
            array(
                'default' => $this->defaults['sample_dropdown_posts_control'],
                'transport' => 'postMessage',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Dropdown_Posts_Custom_Control(
            $wp_customize,
            'sample_dropdown_posts_control',
            array(
                'label' => __('Dropdown Posts Control', 'mediafairplay'),
                'description' => esc_html__('Sample Dropdown Posts custom control description', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'input_attrs' => array(
                    'posts_per_page' => -1,
                    'orderby' => 'name',
                    'order' => 'ASC',
                ),
            )
        ));



        // Test of Google Font Select Control
        $wp_customize->add_setting(
            'sample_google_font_select',
            array(
                'default' => $this->defaults['sample_google_font_select'],
                'sanitize_callback' => 'skyrocket_google_font_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Google_Font_Select_Custom_Control(
            $wp_customize,
            'sample_google_font_select',
            array(
                'label' => __('Google Font Control', 'mediafairplay'),
                'description' => esc_html__('All Google Fonts sorted alphabetically', 'mediafairplay'),
                'section' => 'sample_custom_controls_section',
                'input_attrs' => array(
                    'font_count' => 'all',
                    'orderby' => 'alpha',
                ),
            )
        ));
    }
    /** Register our sample default controls */
    public function skyrocket_register_sample_default_controls($wp_customize)
    {
        // Test of Text Control
        $wp_customize->add_setting(
            'sample_default_text',
            array(
                'default' => $this->defaults['sample_default_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_text_sanitization'
            )
        );
        $wp_customize->add_control(
            'sample_default_text',
            array(
                'label' => __('Default Text Control', 'mediafairplay'),
                'description' => esc_html__('Text controls Type can be either text, email, url, number, hidden, or date', 'mediafairplay'),
                'section' => 'default_controls_section',
                'type' => 'text',
                'input_attrs' => array(
                    'class' => 'my-custom-class',
                    'placeholder' => __('Enter name...', 'mediafairplay'),
                ),
            )
        );

        // Test of Email Control
        $wp_customize->add_setting(
            'sample_email_text',
            array(
                'default' => $this->defaults['sample_email_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_email'
            )
        );
        $wp_customize->add_control(
            'sample_email_text',
            array(
                'label' => __('Default Email Control', 'mediafairplay'),
                'description' => esc_html__('Text controls Type can be either text, email, url, number, hidden, or date', 'mediafairplay'),
                'section' => 'default_controls_section',
                'type' => 'email'
            )
        );

        // Test of URL Control
        $wp_customize->add_setting(
            'sample_url_text',
            array(
                'default' => $this->defaults['sample_url_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_control(
            'sample_url_text',
            array(
                'label' => __('Default URL Control', 'mediafairplay'),
                'description' => esc_html__('Text controls Type can be either text, email, url, number, hidden, or date', 'mediafairplay'),
                'section' => 'default_controls_section',
                'type' => 'url'
            )
        );

        // Test of Number Control
        $wp_customize->add_setting(
            'sample_number_text',
            array(
                'default' => $this->defaults['sample_number_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_sanitize_integer'
            )
        );
        $wp_customize->add_control(
            'sample_number_text',
            array(
                'label' => __('Default Number Control', 'mediafairplay'),
                'description' => esc_html__('Text controls Type can be either text, email, url, number, hidden, or date', 'mediafairplay'),
                'section' => 'default_controls_section',
                'type' => 'number'
            )
        );

        // Test of Hidden Control
        $wp_customize->add_setting(
            'sample_hidden_text',
            array(
                'default' => $this->defaults['sample_hidden_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_text_sanitization'
            )
        );
        $wp_customize->add_control(
            'sample_hidden_text',
            array(
                'label' => __('Default Hidden Control', 'mediafairplay'),
                'description' => esc_html__('Text controls Type can be either text, email, url, number, hidden, or date', 'mediafairplay'),
                'section' => 'default_controls_section',
                'type' => 'hidden'
            )
        );

        // Test of Date Control
        $wp_customize->add_setting(
            'sample_date_text',
            array(
                'default' => $this->defaults['sample_date_text'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_text_sanitization'
            )
        );
        $wp_customize->add_control(
            'sample_date_text',
            array(
                'label' => __('Default Date Control', 'mediafairplay'),
                'description' => esc_html__('Text controls Type can be either text, email, url, number, hidden, or date', 'mediafairplay'),
                'section' => 'default_controls_section',
                'type' => 'text'
            )
        );

        // Test of Standard Checkbox Control
        $wp_customize->add_setting(
            'sample_default_checkbox',
            array(
                'default' => $this->defaults['sample_default_checkbox'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_switch_sanitization'
            )
        );
        $wp_customize->add_control(
            'sample_default_checkbox',
            array(
                'label' => __('Default Checkbox Control', 'mediafairplay'),
                'description' => esc_html__('Sample Checkbox description', 'mediafairplay'),
                'section' => 'default_controls_section',
                'type' => 'checkbox'
            )
        );

        // Test of Standard Select Control
        $wp_customize->add_setting(
            'sample_default_select',
            array(
                'default' => $this->defaults['sample_default_select'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_radio_sanitization'
            )
        );
        $wp_customize->add_control(
            'sample_default_select',
            array(
                'label' => __('Standard Select Control', 'mediafairplay'),
                'section' => 'default_controls_section',
                'type' => 'select',
                'choices' => array(
                    'wordpress' => __('WordPress', 'mediafairplay'),
                    'hamsters' => __('Hamsters', 'mediafairplay'),
                    'jet-fuel' => __('Jet Fuel', 'mediafairplay'),
                    'nuclear-energy' => __('Nuclear Energy', 'mediafairplay')
                )
            )
        );

        // Test of Standard Radio Control
        $wp_customize->add_setting(
            'sample_default_radio',
            array(
                'default' => $this->defaults['sample_default_radio'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_radio_sanitization'
            )
        );
        $wp_customize->add_control(
            'sample_default_radio',
            array(
                'label' => __('Standard Radio Control', 'mediafairplay'),
                'section' => 'default_controls_section',
                'type' => 'radio',
                'choices' => array(
                    'captain-america' => __('Captain America', 'mediafairplay'),
                    'iron-man' => __('Iron Man', 'mediafairplay'),
                    'spider-man' => __('Spider-Man', 'mediafairplay'),
                    'thor' => __('Thor', 'mediafairplay')
                )
            )
        );

        // Test of Dropdown Pages Control
        $wp_customize->add_setting(
            'sample_default_dropdownpages',
            array(
                'default' => $this->defaults['sample_default_dropdownpages'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(
            'sample_default_dropdownpages',
            array(
                'label' => __('Default Dropdown Pages Control', 'mediafairplay'),
                'section' => 'default_controls_section',
                'type' => 'dropdown-pages'
            )
        );

        // Test of Textarea Control
        $wp_customize->add_setting(
            'sample_default_textarea',
            array(
                'default' => $this->defaults['sample_default_textarea'],
                'transport' => 'refresh',
                'sanitize_callback' => 'wp_filter_nohtml_kses'
            )
        );
        $wp_customize->add_control(
            'sample_default_textarea',
            array(
                'label' => __('Default Textarea Control', 'mediafairplay'),
                'section' => 'default_controls_section',
                'type' => 'textarea',
                'input_attrs' => array(
                    'class' => 'my-custom-class',
                    'style' => 'border: 1px solid #999',
                    'placeholder' => __('Enter message...', 'mediafairplay'),
                ),
            )
        );

        // Test of Color Control
        $wp_customize->add_setting(
            'sample_default_color',
            array(
                'default' => $this->defaults['sample_default_color'],
                'transport' => 'refresh',
                'sanitize_callback' => 'sanitize_hex_color'
            )
        );
        $wp_customize->add_control(
            'sample_default_color',
            array(
                'label' => __('Default Color Control', 'mediafairplay'),
                'section' => 'default_controls_section',
                'type' => 'color'
            )
        );

        // Test of Media Control
        $wp_customize->add_setting(
            'sample_default_media',
            array(
                'default' => $this->defaults['sample_default_media'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new WP_Customize_Media_Control(
            $wp_customize,
            'sample_default_media',
            array(
                'label' => __('Default Media Control', 'mediafairplay'),
                'description' => esc_html__('This is the description for the Media Control', 'mediafairplay'),
                'section' => 'default_controls_section',
                'mime_type' => 'image',
                'button_labels' => array(
                    'select' => __('Select File', 'mediafairplay'),
                    'change' => __('Change File', 'mediafairplay'),
                    'default' => __('Default', 'mediafairplay'),
                    'remove' => __('Remove', 'mediafairplay'),
                    'placeholder' => __('No file selected', 'mediafairplay'),
                    'frame_title' => __('Select File', 'mediafairplay'),
                    'frame_button' => __('Choose File', 'mediafairplay'),
                )
            )
        ));

        // Test of Image Control
        $wp_customize->add_setting(
            'sample_default_image',
            array(
                'default' => $this->defaults['sample_default_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'esc_url_raw'
            )
        );
        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            'sample_default_image',
            array(
                'label' => __('Default Image Control', 'mediafairplay'),
                'description' => esc_html__('This is the description for the Image Control', 'mediafairplay'),
                'section' => 'default_controls_section',
                'button_labels' => array(
                    'select' => __('Select Image', 'mediafairplay'),
                    'change' => __('Change Image', 'mediafairplay'),
                    'remove' => __('Remove', 'mediafairplay'),
                    'default' => __('Default', 'mediafairplay'),
                    'placeholder' => __('No image selected', 'mediafairplay'),
                    'frame_title' => __('Select Image', 'mediafairplay'),
                    'frame_button' => __('Choose Image', 'mediafairplay'),
                )
            )
        ));

        // Test of Cropped Image Control
        $wp_customize->add_setting(
            'sample_default_cropped_image',
            array(
                'default' => $this->defaults['sample_default_cropped_image'],
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new WP_Customize_Cropped_Image_Control(
            $wp_customize,
            'sample_default_cropped_image',
            array(
                'label' => __('Default Cropped Image Control', 'mediafairplay'),
                'description' => esc_html__('This is the description for the Cropped Image Control', 'mediafairplay'),
                'section' => 'default_controls_section',
                'flex_width' => false,
                'flex_height' => false,
                'width' => 800,
                'height' => 400
            )
        ));

        // Test of Date/Time Control
        $wp_customize->add_setting(
            'sample_date_only',
            array(
                'default' => $this->defaults['sample_date_only'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_date_time_sanitization',
            )
        );
        $wp_customize->add_control(new WP_Customize_Date_Time_Control(
            $wp_customize,
            'sample_date_only',
            array(
                'label' => __('Default Date Control', 'mediafairplay'),
                'description' => esc_html__('This is the Date Time Control but is only displaying a date field. It also has Max and Min years set.', 'mediafairplay'),
                'section' => 'default_controls_section',
                'include_time' => false,
                'allow_past_date' => true,
                'twelve_hour_format' => true,
                'min_year' => '2016',
                'max_year' => '2025',
            )
        ));

        // Test of Date/Time Control
        $wp_customize->add_setting(
            'sample_date_time',
            array(
                'default' => $this->defaults['sample_date_time'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_date_time_sanitization',
            )
        );
        $wp_customize->add_control(new WP_Customize_Date_Time_Control(
            $wp_customize,
            'sample_date_time',
            array(
                'label' => __('Default Date Control', 'mediafairplay'),
                'description' => esc_html__('This is the Date Time Control. It also has Max and Min years set.', 'mediafairplay'),
                'section' => 'default_controls_section',
                'include_time' => true,
                'allow_past_date' => true,
                'twelve_hour_format' => true,
                'min_year' => '2010',
                'max_year' => '2020',
            )
        ));

        // Test of Date/Time Control
        $wp_customize->add_setting(
            'sample_date_time_no_past_date',
            array(
                'default' => $this->defaults['sample_date_time_no_past_date'],
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_date_time_sanitization',
            )
        );
        $wp_customize->add_control(new WP_Customize_Date_Time_Control(
            $wp_customize,
            'sample_date_time_no_past_date',
            array(
                'label' => __('Default Date Control', 'mediafairplay'),
                'description' => esc_html__("This is the Date Time Control but is only displaying a date field. Past dates are not allowed.", 'mediafairplay'),
                'section' => 'default_controls_section',
                'include_time' => false,
                'allow_past_date' => false,
                'twelve_hour_format' => true,
                'min_year' => '2016',
                'max_year' => '2099',
            )
        ));
    }
    public function customizer_global_changes($wp_customize)
    {
        $wp_customize->remove_section('custom_css');
    }
    public function mfp_casino_cards_controls($wp_customize)
    {
        /**
         *  Add Our MFP TABLE AND CARDS PANEL
         */
        $wp_customize->add_panel(
            'mfp_casino_cards_panel',
            array(
                'title' => __('MFP Casino Cards ( Beta )', 'mediafairplay'),
                'description' => esc_html__('Adjust your Tables and Crds', 'mediafairplay'),
                /* 'priority'       => 30, */
            )
        );
        // Cards Global Settings
        $wp_customize->add_section('mfp_casino_cards_global_section', [
            'title' => __('Global Settings', 'mediafairplay'),
            'panel'    => 'mfp_casino_cards_panel'
        ]);
        // card global backround color
        $wp_customize->add_setting(
            'mfp_casino_cards_global_bg_color',
            array(
                'default' => '#ebebeb',
                'transport' => 'refresh'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'mfp_casino_cards_global_bg_color',
            array(
                'label' => __('Choose Background Color'),
                'description' => esc_html__(''),
                'section' => 'mfp_casino_cards_global_section',
                'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
                'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                    '#000',
                    '#fff',
                    '#df312c',
                    '#df9a23',
                    '#eef000',
                    '#7ed934',
                    '#1571c1',
                    '#8309e7'
                )
            )
        ));
        $wp_customize->add_setting(
            'mfp_casino_cards_global_wrapper_bg_color',
            array(
                'default' => '#fff',
                'transport' => 'refresh'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'mfp_casino_cards_global_wrapper_bg_color',
            array(
                'label' => __('Choose Surrounding Background Color'),
                'description' => esc_html__(''),
                'section' => 'mfp_casino_cards_global_section',
                'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
                'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                    '#000',
                    '#fff',
                    '#df312c',
                    '#df9a23',
                    '#eef000',
                    '#7ed934',
                    '#1571c1',
                    '#8309e7'
                )
            )
        ));
        // card global width
        /*     $wp_customize->add_setting(
            'mfp_casino_cards_global_width',
            array(
                'default' => 'width',
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_text_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Text_Radio_Button_Custom_Control(
            $wp_customize,
            'mfp_casino_cards_global_width',
            array(
                'label' => __('Text Radio Button Control'),
                'description' => esc_html__('Sample custom control description'),
                'section' => 'mfp_casino_cards_global_section',
                'choices' => array(
                    'width' => __('Width'), // Required. Setting for this particular radio button choice and the text to display
                    'full_width' => __('Full Width') // Required. Setting for this particular radio button choice and the text to display // Required. Setting for this particular radio button choice and the text to display
                )
            )
        )); */
        // card height
        $wp_customize->add_setting(
            'mfp_cards_global_height',
            array(
                'default' =>    330,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_global_height',
            array(
                'label' => __('Cards Height', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_global_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 900,
                    'step' => 1,
                ),
            )
        ));
        // Rank
        $wp_customize->add_section('mfp_casino_cards_rank_section', [
            'title' => __('Rank + Info Icon', 'mediafairplay'),
            'panel'    => 'mfp_casino_cards_panel'
        ]);
        $wp_customize->add_setting(
            'mfp_casino_rank_display',
            array(
                'default' => 1,
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_switch_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Toggle_Switch_Custom_control(
            $wp_customize,
            'mfp_casino_rank_display',
            array(
                'label' => esc_html__('Display Rank?'),
                'section' => 'mfp_casino_cards_rank_section'
            )
        ));

        $wp_customize->add_setting(
            'mfp_casino_rank_color',
            array(
                'default' => '#cacaca',
                'transport' => 'refresh'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'mfp_casino_rank_color',
            array(
                'label' => __('Choose Color'),
                'description' => esc_html__(''),
                'section' => 'mfp_casino_cards_rank_section',
                'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
                'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                    '#000',
                    '#fff',
                    '#df312c',
                    '#df9a23',
                    '#eef000',
                    '#7ed934',
                    '#1571c1',
                    '#8309e7'
                )
            )
        ));

        $wp_customize->add_setting(
            'mfp_casino_rank_color_hover',
            array(
                'default' => '#ff2d2d',
                'transport' => 'refresh'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'mfp_casino_rank_color_hover',
            array(
                'label' => __('Choose Hover Color'),
                'description' => esc_html__(''),
                'section' => 'mfp_casino_cards_rank_section',
                'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
                'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                    '#000',
                    '#fff',
                    '#df312c',
                    '#df9a23',
                    '#eef000',
                    '#7ed934',
                    '#1571c1',
                    '#8309e7'
                )
            )
        ));


        // Border
        $wp_customize->add_section('mfp_casino_cards_border_section', [
            'title' => __('Border', 'mediafairplay'),
            'panel'    => 'mfp_casino_cards_panel'
        ]);
        // BORDER WIDTH
        $wp_customize->add_setting(
            'mfp_cards_border_width',
            array(
                'default' =>    1,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_border_width',
            array(
                'label' => __('Border Width', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_border_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
            )
        ));
        // BORDER COLOR
        $wp_customize->add_setting(
            'mfp_cards_border_color',
            array(
                'default' => 'rgba(0,0,0,0.1)',
                'transport' => 'refresh'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'mfp_cards_border_color',
            array(
                'label' => __('Border Color'),
                'description' => esc_html__('Choose Border Color'),
                'section' => 'mfp_casino_cards_border_section',
                'show_opacity' => true
            )
        ));
        // border radius
        $wp_customize->add_setting(
            'mfp_cards_border_radius',
            array(
                'default' =>    20,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_border_radius',
            array(
                'label' => __('Border Radius', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_border_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
            )
        ));

        // Shadows
        $wp_customize->add_section('mfp_casino_cards_shadow_section', [
            'title' => __('Shadows', 'mediafairplay'),
            'panel'    => 'mfp_casino_cards_panel'
        ]);
        // Shadows X offset
        $wp_customize->add_setting(
            'mfp_cards_shadows_x',
            array(
                'default' =>    0,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_shadows_x',
            array(
                'label' => __('X offset', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_shadow_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
            )
        ));
        // Shadows Y offset
        $wp_customize->add_setting(
            'mfp_cards_shadows_y',
            array(
                'default' =>    1,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_shadows_y',
            array(
                'label' => __('Y offset', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_shadow_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
            )
        ));
        // Shadows BLUR
        $wp_customize->add_setting(
            'mfp_cards_shadows_blur',
            array(
                'default' =>    2,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_shadows_blur',
            array(
                'label' => __('Shadows Blur', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_shadow_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
            )
        ));
        // Shadows Spread
        $wp_customize->add_setting(
            'mfp_cards_shadows_Spread',
            array(
                'default' =>    0,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_shadows_Spread',
            array(
                'label' => __('Shadows Spread', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_shadow_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
            )
        ));
        // Shaodw COLOR
        $wp_customize->add_setting(
            'mfp_cards_shadow_color',
            array(
                'default' => 'rgba(0,0,0,0.1)',
                'transport' => 'refresh'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'mfp_cards_shadow_color',
            array(
                'label' => __('Shaodw Color'),
                'description' => esc_html__('Choose Shaodw Color'),
                'section' => 'mfp_casino_cards_shadow_section',
                'show_opacity' => true
            )
        ));

        // Logo
        $wp_customize->add_section('mfp_casino_cards_logo_section', [
            'title' => __('Logos', 'mediafairplay'),
            'panel'    => 'mfp_casino_cards_panel'
        ]);
        $wp_customize->add_setting(
            'mfp_cards_choose_logo',
            array(
                'default' => 'logo1',
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_radio_sanitization'
            )
        );

        $wp_customize->add_control(new Skyrocket_Text_Radio_Button_Custom_Control(
            $wp_customize,
            'mfp_cards_choose_logo',
            array(
                'label' => __('Choose Logo Layout'),
                'description' => esc_html__('Logo 1 OR Logo 2'),
                'section' => 'mfp_casino_cards_logo_section',
                'choices' => array(
                    'logo1' => __(' Logo 1'), // Required. Setting for this particular radio button choice and the text to display
                    'logo2' => __('Logo 2')
                )
            )
        ));
        // Logo Desktop
        $wp_customize->add_setting(
            'mfp_cards_logo_desktop',
            array(
                'default' =>    167,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_logo_desktop',
            array(
                'label' => __('Desktop', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_logo_section',
                'input_attrs' => array(
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                ),
            )
        ));
        // Logo Tablet
        $wp_customize->add_setting(
            'mfp_cards_logo_tablet',
            array(
                'default' =>    167,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_logo_tablet',
            array(
                'label' => __('Tablet', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_logo_section',
                'input_attrs' => array(
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                ),
            )
        ));
        // Logo Mobile
        $wp_customize->add_setting(
            'mfp_cards_logo_mobile',
            array(
                'default' =>    167,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_logo_mobile',
            array(
                'label' => __('Mobile', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_logo_section',
                'input_attrs' => array(
                    'min' => 1,
                    'max' => 1000,
                    'step' => 1,
                ),
            )
        ));
        // Brand Name
        $wp_customize->add_section('mfp_casino_cards_brand_section', [
            'title' => __('Brand Name', 'mediafairplay'),
            'panel'    => 'mfp_casino_cards_panel'
        ]);
        // Brand Display Y/N
        $wp_customize->add_setting(
            'mfp_cards_brand_name_toggle',
            array(
                'default' => 1,
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_switch_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Toggle_Switch_Custom_control(
            $wp_customize,
            'mfp_cards_brand_name_toggle',
            array(
                'label' => esc_html__('Display With Link?'),
                'section' => 'mfp_casino_cards_brand_section'
            )
        ));
        // Brand COLOR
        $wp_customize->add_setting(
            'mfp_cards_brand_name_color',
            array(
                'default' => '#267aba',
                'transport' => 'refresh'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'mfp_cards_brand_name_color',
            array(
                'label' => __('Brand Name Color'),
                'description' => esc_html__('Choose Color'),
                'section' => 'mfp_casino_cards_brand_section',
                'show_opacity' => true
            )
        ));
        // Brand FONT Size
        $wp_customize->add_setting(
            'mfp_cards_brand_name_font_size',
            array(
                'default' =>    16,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_brand_name_font_size',
            array(
                'label' => __('Font Size', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_brand_section',
                'input_attrs' => array(
                    'min' => 1,
                    'max' => 200,
                    'step' => 1,
                ),
            )
        ));
        // Brand FONT WEIGHT
        $wp_customize->add_setting(
            'mfp_cards_brand_name_font_weight',
            array(
                'default' =>    700,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_brand_name_font_weight',
            array(
                'label' => __('Font Weight', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_brand_section',
                'input_attrs' => array(
                    'min' => 100,
                    'max' => 900,
                    'step' => 100,
                ),
            )
        ));

        // Bonus
        $wp_customize->add_section('mfp_casino_cards_bonus_section', [
            'title' => __('Bonus', 'mediafairplay'),
            'panel'    => 'mfp_casino_cards_panel'
        ]);
        // Bonus Display Y/N
        $wp_customize->add_setting(
            'mfp_cards_bonus_toggle',
            array(
                'default' => 1,
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_switch_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Toggle_Switch_Custom_control(
            $wp_customize,
            'mfp_cards_bonus_toggle',
            array(
                'label' => esc_html__('Display Bonus?'),
                'section' => 'mfp_casino_cards_bonus_section'
            )
        ));
        // Bonus COLOR
        $wp_customize->add_setting(
            'mfp_cards_bonus_color',
            array(
                'default' => '#000',
                'transport' => 'refresh'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'mfp_cards_bonus_color',
            array(
                'label' => __('Bonus Color'),
                'description' => esc_html__('Choose Color'),
                'section' => 'mfp_casino_cards_bonus_section',
                'show_opacity' => true
            )
        ));
        // Bonus FONT Size
        $wp_customize->add_setting(
            'mfp_cards_bonus_font_size',
            array(
                'default' =>    36,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_bonus_font_size',
            array(
                'label' => __('Font Size', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_bonus_section',
                'input_attrs' => array(
                    'min' => 1,
                    'max' => 200,
                    'step' => 1,
                ),
            )
        ));
        // Bonus FONT WEIGHT
        $wp_customize->add_setting(
            'mfp_cards_bonus_font_weight',
            array(
                'default' =>    700,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_bonus_font_weight',
            array(
                'label' => __('Font Weight', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_bonus_section',
                'input_attrs' => array(
                    'min' => 100,
                    'max' => 900,
                    'step' => 100,
                ),
            )
        ));


        // Free Spins
        $wp_customize->add_section('mfp_casino_cards_free_spins_section', [
            'title' => __('Free Spins', 'mediafairplay'),
            'panel'    => 'mfp_casino_cards_panel'
        ]);

        // Free Spins Display Y/N
        $wp_customize->add_setting(
            'mfp_cards_free_spins_toggle',
            array(
                'default' => 1,
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_switch_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Toggle_Switch_Custom_control(
            $wp_customize,
            'mfp_cards_free_spins_toggle',
            array(
                'label' => esc_html__('Display Free Spins?'),
                'section' => 'mfp_casino_cards_free_spins_section'
            )
        ));
        // Free Spins COLOR
        $wp_customize->add_setting(
            'mfp_cards_free_spins_color',
            array(
                'default' => '#3f3f3f',
                'transport' => 'refresh'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'mfp_cards_free_spins_color',
            array(
                'label' => __('Free Spins Color'),
                'description' => esc_html__('Choose Color'),
                'section' => 'mfp_casino_cards_free_spins_section',
                'show_opacity' => true
            )
        ));
        // Free Spins FONT Size
        $wp_customize->add_setting(
            'mfp_cards_free_spins_font_size',
            array(
                'default' =>    16,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_free_spins_font_size',
            array(
                'label' => __('Font Size', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_free_spins_section',
                'input_attrs' => array(
                    'min' => 1,
                    'max' => 900,
                    'step' => 100,
                ),
            )
        ));
        // Free Spins FONT WEIGHT
        $wp_customize->add_setting(
            'mfp_cards_free_spins_font_weight',
            array(
                'default' =>    700,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_free_spins_font_weight',
            array(
                'label' => __('Font Weight', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_free_spins_section',
                'input_attrs' => array(
                    'min' => 100,
                    'max' => 900,
                    'step' => 100,
                ),
            )
        ));




        // Default info
        $wp_customize->add_section('mfp_casino_cards_default_info_section', [
            'title' => __('Default info', 'mediafairplay'),
            'panel'    => 'mfp_casino_cards_panel'
        ]);
        // Default info Display Y/N
        $wp_customize->add_setting(
            'mfp_cards_default_info_toggle',
            array(
                'default' => 1,
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_switch_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Toggle_Switch_Custom_control(
            $wp_customize,
            'mfp_cards_default_info_toggle',
            array(
                'label' => esc_html__('Display Default info?'),
                'section' => 'mfp_casino_cards_default_info_section'
            )
        ));
        // Default info COLOR
        $wp_customize->add_setting(
            'mfp_cards_default_info_color',
            array(
                'default' => '#000',
                'transport' => 'refresh'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'mfp_cards_default_info_color',
            array(
                'label' => __('Default Info Color'),
                'description' => esc_html__('Choose Color'),
                'section' => 'mfp_casino_cards_default_info_section',
                'show_opacity' => true
            )
        ));
        // Default info FONT Size
        $wp_customize->add_setting(
            'mfp_cards_default_info_font_size',
            array(
                'default' =>    15,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_default_info_font_size',
            array(
                'label' => __('Font Size', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_default_info_section',
                'input_attrs' => array(
                    'min' => 1,
                    'max' => 200,
                    'step' => 1,
                ),
            )
        ));
        // Default info FONT WEIGHT
        $wp_customize->add_setting(
            'mfp_cards_default_info_font_weight',
            array(
                'default' =>    400,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_default_info_font_weight',
            array(
                'label' => __('Font Weight', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_default_info_section',
                'input_attrs' => array(
                    'min' => 100,
                    'max' => 900,
                    'step' => 100,
                ),
            )
        ));




        // button - play now
        $wp_customize->add_section('mfp_casino_cards_button_section', [
            'title' => __('Button ( Play Now )', 'mediafairplay'),
            'panel'    => 'mfp_casino_cards_panel'
        ]);
        $wp_customize->add_setting(
            'play_now_button_text',
            array(
                'default' => 'Play Now',
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_text_sanitization'
            )
        );
        $wp_customize->add_control(
            'play_now_button_text',
            array(
                'label' => __('Play Now Text'),
                'description' => esc_html__(''),
                'section' => 'mfp_casino_cards_button_section', // Optional. Order priority to load the control. Default: 10
                'type' => 'text', // Can be either text, email, url, number, hidden, or date
                'capability' => 'edit_theme_options' // Optional. Default: 'edit_theme_options'
            )
        );
        $wp_customize->add_setting(
            'mfp_casino_cards_button_font_size',
            array(
                'default' =>    26,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_casino_cards_button_font_size',
            array(
                'label' => __('Font Size', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_button_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
            )
        ));
        $wp_customize->add_setting(
            'mfp_casino_cards_button_text_color',
            array(
                'default' => '#fff',
                'transport' => 'refresh'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'mfp_casino_cards_button_text_color',
            array(
                'label' => __('Text Color'),
                'description' => esc_html__(''),
                'section' => 'mfp_casino_cards_button_section',
                'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
                'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                    '#000',
                    '#fff',
                    '#df312c',
                    '#df9a23',
                    '#eef000',
                    '#7ed934',
                    '#1571c1',
                    '#8309e7'
                )
            )
        ));
        $wp_customize->add_setting(
            'mfp_casino_cards_button_bg_color',
            array(
                'default' => '#267aba',
                'transport' => 'refresh'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'mfp_casino_cards_button_bg_color',
            array(
                'label' => __('Background Color'),
                'description' => esc_html__(''),
                'section' => 'mfp_casino_cards_button_section',
                'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
                'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                    '#000',
                    '#fff',
                    '#df312c',
                    '#df9a23',
                    '#eef000',
                    '#7ed934',
                    '#1571c1',
                    '#8309e7'
                )
            )
        ));
        $wp_customize->add_setting(
            'mfp_casino_cards_button_bg_color_hover',
            array(
                'default' => '#65b6fa',
                'transport' => 'refresh'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'mfp_casino_cards_button_bg_color_hover',
            array(
                'label' => __('Background Hover Color'),
                'description' => esc_html__(''),
                'section' => 'mfp_casino_cards_button_section',
                'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
                'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                    '#000',
                    '#fff',
                    '#df312c',
                    '#df9a23',
                    '#eef000',
                    '#7ed934',
                    '#1571c1',
                    '#8309e7'
                )
            )
        ));
        // Read review / Review link
        $wp_customize->add_section('mfp_casino_cards_review_link_section', [
            'title' => __('Review link', 'mediafairplay'),
            'panel'    => 'mfp_casino_cards_panel'
        ]);
        // Display Y/N
        $wp_customize->add_setting(
            'mfp_cards_review_link_toggle',
            array(
                'default' => 1,
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_switch_sanitization'
            )
        );
        $wp_customize->add_control(new Skyrocket_Toggle_Switch_Custom_control(
            $wp_customize,
            'mfp_cards_review_link_toggle',
            array(
                'label' => esc_html__('Display Review link?'),
                'section' => 'mfp_casino_cards_review_link_section'
            )
        ));
        $wp_customize->add_setting(
            'mfp_cards_review_link_text',
            array(
                'default' => 'Read Review',
                'transport' => 'refresh',
                'sanitize_callback' => 'skyrocket_text_sanitization'
            )
        );
        $wp_customize->add_control(
            'mfp_cards_review_link_text',
            array(
                'label' => __('Read Review Text'),
                'description' => esc_html__(''),
                'section' => 'mfp_casino_cards_review_link_section', // Optional. Order priority to load the control. Default: 10
                'type' => 'text', // Can be either text, email, url, number, hidden, or date
                'capability' => 'edit_theme_options' // Optional. Default: 'edit_theme_options'
            )
        );
        $wp_customize->add_setting(
            'mfp_cards_review_link_color',
            array(
                'default' => '#267aba',
                'transport' => 'refresh'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'mfp_cards_review_link_color',
            array(
                'label' => __('Color'),
                'description' => esc_html__(''),
                'section' => 'mfp_casino_cards_review_link_section',
                'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
                'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                    '#000',
                    '#fff',
                    '#df312c',
                    '#df9a23',
                    '#eef000',
                    '#7ed934',
                    '#1571c1',
                    '#8309e7'
                )
            )
        ));
        $wp_customize->add_setting(
            'mfp_cards_review_link_font_size',
            array(
                'default' =>    16,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_cards_review_link_font_size',
            array(
                'label' => __('Font Size', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_review_link_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
            )
        ));
        // t&c apply
        $wp_customize->add_section('mfp_casino_cards_t_c_apply_section', [
            'title' => __('T&Cs Apply', 'mediafairplay'),
            'panel'    => 'mfp_casino_cards_panel'
        ]);
        $wp_customize->add_setting(
            'mfp_casino_cards_t_c_apply_color',
            array(
                'default' => '#888',
                'transport' => 'refresh'
            )
        );
        $wp_customize->add_control(new Skyrocket_Customize_Alpha_Color_Control(
            $wp_customize,
            'mfp_casino_cards_t_c_apply_color',
            array(
                'label' => __('Color'),
                'description' => esc_html__(''),
                'section' => 'mfp_casino_cards_t_c_apply_section',
                'show_opacity' => true, // Optional. Show or hide the opacity value on the opacity slider handle. Default: true
                'palette' => array( // Optional. Select the colours for the colour palette . Default: WP color control palette
                    '#000',
                    '#fff',
                    '#df312c',
                    '#df9a23',
                    '#eef000',
                    '#7ed934',
                    '#1571c1',
                    '#8309e7'
                )
            )
        ));
        $wp_customize->add_setting(
            'mfp_casino_cards_t_c_apply_font_size',
            array(
                'default' =>    12,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_casino_cards_t_c_apply_font_size',
            array(
                'label' => __('Font Size', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_t_c_apply_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
            )
        ));
        $wp_customize->add_setting(
            'mfp_casino_cards_t_c_apply_font_weight',
            array(
                'default' =>    300,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_casino_cards_t_c_apply_font_weight',
            array(
                'label' => __('Font Weight', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_cards_t_c_apply_section',
                'input_attrs' => array(
                    'min' => 100,
                    'max' => 900,
                    'step' => 100,
                ),
            )
        ));
    }
    public function mfp_casino_table_controls($wp_customize)
    {
        /**
         *  Add Our MFP TABLE PANEL
         */
        $wp_customize->add_panel(
            'mfp_casino_table_panel',
            array(
                'title' => __('MFP Casino Table ( Beta )', 'mediafairplay'),
                'description' => esc_html__('Adjust your Tables and Crds', 'mediafairplay'),
                /* 'priority'       => 30, */
            )
        );
        // Border
        $wp_customize->add_section('mfp_casino_table_border_section', [
            'title' => __('Border', 'mediafairplay'),
            'panel'    => 'mfp_casino_table_panel'
        ]);
        // BORDER WIDTH
        $wp_customize->add_setting(
            'mfp_table_border_width',
            array(
                'default' =>    1,
                'transport' => 'refresh',
                'sanitize_callback' => 'absint'
            )
        );
        $wp_customize->add_control(new Skyrocket_Slider_Custom_Control(
            $wp_customize,
            'mfp_table_border_width',
            array(
                'label' => __('Border Width', 'mediafairplay'),
                'description' => __('', 'mediafairplay'),
                'section' => 'mfp_casino_table_border_section',
                'input_attrs' => array(
                    'min' => 0,
                    'max' => 100,
                    'step' => 1,
                ),
            )
        ));
    }
}
/**
 * Load all our Customizer Custom Controls
 */
require_once trailingslashit(dirname(__FILE__)) . 'custom-controls.php';
/**
 * Initialise our Customizer settings
 */
$skyrocket_settings = new skyrocket_initialise_customizer_settings();
function my_customizer_responsive_sizes()
{

    $mobile_margin_left = '-180px'; //Half of -$mobile_width
    $mobile_width = '360px';
    $mobile_height = '700px';
?>
    <style>
        .wp-customizer .preview-mobile .wp-full-overlay-main {
            margin-left: <?php echo $mobile_margin_left; ?>;
            width: <?php echo $mobile_width; ?>;
            height: <?php echo $mobile_height; ?>;
        }
    </style>
<?php
}
add_action('customize_controls_print_styles', 'my_customizer_responsive_sizes');
// Register our Global Custom Control controls
require_once trailingslashit(dirname(__FILE__)) . 'global/global.php';
// Register our Header Custom Control controls
require_once trailingslashit(dirname(__FILE__)) . 'header/header.php';
// Register our Blog Custom Control controls
require_once trailingslashit(dirname(__FILE__)) . 'blog/blog.php';
// Register our Sidebar Custom Control controls
require_once trailingslashit(dirname(__FILE__)) . 'sidebar/sidebar.php';
// Register our Footer Custom Control controls
require_once trailingslashit(dirname(__FILE__)) . 'footer/footer.php';
// Register our Features Custom Control controls
require_once trailingslashit(dirname(__FILE__)) . 'features/features.php';
// Register our PAGES Custom Control controls
require_once trailingslashit(dirname(__FILE__)) . 'pages/pages.php';
/**
 * This function adds some styles to the WordPress Customizer
 */
function my_customizer_styles()
{ ?>
    <style>
        li.accordion-section.control-section.control-panel.control-panel-nav_menus {
            margin-top: 10px;
        }
    </style>
<?php
}
add_action('customize_controls_print_styles', 'my_customizer_styles', 999);
