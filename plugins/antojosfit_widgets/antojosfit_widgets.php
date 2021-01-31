<?php
/*
Plugin Name: antojosfit - Widgets
Plugin URI:
Description: Añade widgets personalizados al sitio antojosFit
Version: 1.0.0
Author: Jorge García Cano
Author URI: http://antojosfit.com
Text Domain: antojosfit
*/

if(!defined('ABSPATH')) die();

class Antojosfit_productos_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			esc_html__( 'Antojos Fit Productos', 'text_domain' ), // Name
			array( 'description' => esc_html__( 'Agrega los productos como widget ', 'text_domain' ), ) // Args
		);
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
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        $cantidad = $instance['cantidad'];
        if ($cantidad == '') {
            $cantidad = 3;
        }
    ?>

    <ul>
        <?php
            $args =array(
            'post_type' =>'antojosfit_productos',
            'posts_per_page' => $cantidad,
            );
            $productos = new WP_Query($args);
            while($productos->have_posts()): $productos->the_post();
        ?>

        <li class="producto-sidebar">
            <div class="imagen">
                <?php the_post_thumbnail('thumbnail'); ?>
            </div>
            <div class="contenido-producto">
                <a href="<?php the_permalink($post);?>">
                    <h3><?php the_title();?></h3>
                </a>
            </div>
        </li>

        <?php endwhile; wp_reset_postdata();?>

    </ul>

    <?php

		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        $cantidad = ! empty($instance['cantidad']) ?$instance['cantidad'] :esc_html__('¿Cuántos productos deseas mostrar?', 'antojosfit');
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_name('cantidad')); ?>">
                <?php echo esc_attr('¿Cuántos productos deseas mostrar?', 'antojosfit'); ?>
            </label>
            <input
            class="widefat"
            id="<?php echo esc_attr($this->get_field_name('cantidad')); ?>"
            name="<?php echo esc_attr($this->get_field_name('cantidad')); ?>"
            value="<?php echo esc_attr($cantidad); ?>"
            />
        </p>

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
		$instance['cantidad'] = ( ! empty( $new_instance['cantidad'] ) ) ? sanitize_text_field( $new_instance['cantidad'] ) : '';

		return $instance;
	}

} // class Foo_Widget

// register Foo_Widget widget
function antojosfit_register_widget() {
    register_widget( 'Antojosfit_productos_Widget' );
}
add_action( 'widgets_init', 'antojosfit_register_widget' );


?>