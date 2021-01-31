<?php

function antojosfit_lista_productos($cantidad = -1) { ?>

    <ul class=" <?php if(is_page('venta')) echo 'lista-productos'; else echo 'listado-productos'; ?>">
        <?php
            $args = array(
                'post_type'=>'product',
                'posts_per_page' => $cantidad,
            );
            $productos = new WP_Query($args);
            while($productos->have_posts()) : $productos->the_post();

            if(is_page('venta')) :
        ?>

            <li class="producto card">
            <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
            <?php the_post_thumbnail('mediano'); ?>
            <div class="contenido text-center">
                <h3><?php the_title(); ?></h3>
                <p><?php the_field('alergenos_'); ?></p>
                <p><?php the_field('precio_'); ?></p>
            </div>
            </li>

            <?php else : ?>

            <li class="producto front-page">
            <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
            <?php the_post_thumbnail('mediano'); ?>
            <div class="contenido text-center">
                <h3><?php the_title(); ?></h3>
                <?php the_content(); ?>
            </div>
            </li>


            <?php endif;  endwhile; wp_reset_postdata(); ?>
    </ul>
<?php
}