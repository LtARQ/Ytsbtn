<?php
/**
 *  Add Youtube subscribe button widget.
 */
class Ytsbtn_Widget extends WP_Widget {
    // Register widget with wordpress.
    function __construct(){
        parent::__construct(
            'ytsbtn_widget', //Base ID
            esc_html__( 'Youtube Button', 'ytsbtn_domain' ), // Name
            array('description' => esc_html__('Widget to display Youtube Button', 'ytsbtn_domain'),) // Args
        );
    }
    /**
     *  Front_end display of widget.
     * 
     * @see WP_Widget::widget()
     * 
     * @param array $args   Widgets arguments. 
     * @param array $instance Saved values from database.
     */
    public function widget( $arg, $instance ) {
        echo $arg['before_widget'];
        if ( !empty($instance['title']) ) {
            echo $arg['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $arg['after_title'];
        }
        echo '<div class="g-ytsubscribe" data-channelid="'.$instance['channel'].'" data-layout="'.$instance['layout'].'" data-count="'.$instance['count'].'"></div>';                       
        echo $arg['after_widget'];
    }
    /**
     *  Back_end widget form. 
     * 
     * @see WP_Widget::form()
     * 
     * @param array $instance Saved values from database.
     */
    public function form($instance){
        $title = ! empty($instance['title']) ? $instance['title'] : esc_html__( 'Youtube', 'ytsbtn_domain' );
        $channel = ! empty($instance['channel']) ? $instance['channel'] : esc_html__( 'UCOLjECrqSlKFUrX0fIBCE7A', 'ytsbtn_domain' );
        $layout = ! empty($instance['layout']) ? $instance['layout'] : esc_html__( 'default', 'ytsbtn_domain' );
        $count = ! empty($instance['count']) ? $instance['count'] : esc_html__( 'default', 'ytsbtn_domain' );
        ?>
        <!-- This is for Title input form admin in HTML on the dashbaord --> 
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('title') );?>">
            <?php esc_attr_e( 'Title:', 'ytsbtn_domain' ); ?>
            </label>
            <input
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id('title') );?>" 
                name="<?php echo esc_attr( $this->get_field_name('title') ); ?>" 
                type="text" 
                value="<?php echo esc_attr( $title ); ?>" >
        </P>
        <!-- This is for channel input in HTML --> 
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('channel') );?>">
            <?php esc_attr_e( 'Channel ID:', 'ytsbtn_domain' ); ?>
            </label>
            <input
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id('channel') );?>" 
                name="<?php echo esc_attr( $this->get_field_name('channel') ); ?>" 
                type="text" 
                value="<?php echo esc_attr( $channel ); ?>" >
        </P>
        <!-- This is for layout input in Html -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('layout') );?>">
            <?php esc_attr_e( 'Layout:', 'ytsbtn_domain' ); ?>
            </label>
            <select
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id('layout') );?>" 
                name="<?php echo esc_attr( $this->get_field_name('layout') ); ?>" >
            <option value="default" <?php echo ($layout == 'default') ? 'selected' : ''; ?>>Default</option>
            <option value="full" <?php echo ($layout == 'full') ? 'selected' : ''; ?>>Full</option>
            </select>
        </P>
        <!-- This is for Subscriber Count input in HTML -->
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id('count') );?>">
            <?php esc_attr_e( 'Subscribers:', 'ytsbtn_domain' ); ?>
            </label>
            <select
                class="widefat" 
                id="<?php echo esc_attr( $this->get_field_id('count') );?>" 
                name="<?php echo esc_attr( $this->get_field_name('count') ); ?>" >
            <option value="default" <?php echo ($count == 'default') ? 'selected' : ''; ?>>Show</option>
            <option value="hidden" <?php echo ($count == 'hidden') ? 'selected' : ''; ?>>Hidden</option>
            </select>
        </P>
        <?php
    }
    /**
     * Sanitize widget from values as they re saved. 
     * 
     * @see WP_Widget::update()
     * 
     * @param array $new_instance values just sent to be saved.
     */
    public function update($new_instance, $old_instance){
        $instance = array();
        $instance['title'] = (! empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['channel'] = (! empty($new_instance['channel'])) ? strip_tags($new_instance['channel']) : '';
        $instance['layout'] = (! empty($new_instance['layout'])) ? strip_tags($new_instance['layout']) : '';
        $instance['count'] = (! empty($new_instance['count'])) ? strip_tags($new_instance['count']) : '';
        return $instance;
    }
}