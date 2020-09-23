<?php

function register_MFP_IconsList_Widget() {
    register_widget( 'MFP_IconsList_Widget' );
}
add_action( 'widgets_init', 'register_MFP_IconsList_Widget' );


class MFP_IconsList_Widget extends WP_Widget {

    static  $counter=0;

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct('MFP_IconsList_widget',esc_html__( 'Icon', 'text_domain' ),array( 'description' => esc_html__( 'MFP Icon List', 'text_domain' ), ));
        // Register stylesheets for Admin Area
        add_action('admin_print_styles', array( $this , 'register_widget_styles'));
        // Register stylesheets for the Front-end
        add_action('wp_enqueue_scripts' , array( $this , 'register_widget_styles') );


        add_filter('delete_widget', [$this, 'removeWidget'], 10, 4);


        if(function_exists( 'wp_enqueue_media' )){
            wp_enqueue_media();
        }else{
            wp_enqueue_style('thickbox');
            wp_enqueue_script('media-upload');
            wp_enqueue_script('thickbox');
        }

        add_action( 'admin_footer', [$this,'js_niv_uploader'] );
        add_action( 'customize_controls_enqueue_scripts', [$this,'js_niv_uploader'] );


    }

    function js_niv_uploader()
    {
        wp_enqueue_script( 'custom_js_uploader', '/wp-content/themes/mediafairplay/inc/widgets/icons/uploader_widget.js', array(), 1.99 , true);
    }

    public function register_widget_styles()
    {
        $file_dir=get_bloginfo('template_directory');
        wp_enqueue_style("functions", $file_dir."/inc/widgets/icons/css.css", false, "1.1", "all");
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        self::$counter++;

        if(self::$counter === 1) {
            echo '<div class="gal">';
        }
        if (!empty($instance['icon']) && !empty($instance['target_URL'])) {
            echo '<a href="'.$instance['target_URL'].'"><img src="' . apply_filters( 'widget_title', $instance['icon'] ) . '" class="iconList"/></a>';
        }
        if(self::$counter==get_option('MFP_IconsList')){
            echo '</div>';
        }
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        
        $target_URL = ! empty( $instance['target_URL'] ) ? $instance['target_URL'] : "";
        $icon = ! empty( $instance['icon'] ) ? $instance['icon'] : "";
        if(!empty($icon)) {
            echo '<img src="'.$icon.'" class="custom_media_image attachment-thumb" data-id="'.esc_attr( $this->get_field_id( 'icon' ) ).'"/>';
        }
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>"><?php esc_attr_e( 'Icon:', 'text_domain' ); ?></label>
            <input class="widefat custom_media_url" id="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'icon' ) ); ?>" type="text" value="<?php echo esc_attr( $icon ); ?>" data-id="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>">

            <button class="button button-primary custom_media_upload" data-id="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>" style="margin-top:3px;">Choose Image / Icon</button>
        </p>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'target_URL' ) ); ?>"><?php esc_attr_e( 'Target URL:', 'text_domain' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'target_URL' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'target_URL' ) ); ?>" type="text" value="<?php echo esc_attr( $target_URL ); ?>">
        </p>
        <div class="media-widget-preview media_image populated"><img class="custom_media_image attachment-thumb" data-id="<?php echo esc_attr( $this->get_field_id( 'icon' ) ); ?>" src="" /></div>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['icon'] = ( ! empty( $new_instance['icon'] ) ) ? sanitize_text_field( $new_instance['icon'] ) : '';
        $instance['target_URL'] = ( ! empty( $new_instance['target_URL'] ) ) ? sanitize_text_field( $new_instance['target_URL'] ) : '';
        if(empty($old_instance)) {
            update_option('MFP_IconsList',(get_option('MFP_IconsList')+1));
        }
        return $instance;
    }


    function removeWidget( $widget_id,  $sidebar_id,  $id_base)
    {
        if($id_base == 'MFP_iconslist_widget') {
            update_option('MFP_IconsList',(get_option('MFP_IconsList')-1));
        }
    }



}