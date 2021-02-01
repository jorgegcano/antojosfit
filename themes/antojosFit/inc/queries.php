<?php

function antojosfit_lista_productos($cantidad = -1) { ?>

    <ul class=" <?php echo 'listado-productos'; ?>">
        <?php
            $args = array(
                'post_type'=>'product',
                'posts_per_page' => $cantidad,
            );
            $productos = new WP_Query($args);
            while($productos->have_posts()) : $productos->the_post();
        ?>

            <li class="producto front-page">
            <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>
            <?php the_post_thumbnail('mediano'); ?>
            <div class="contenido text-center">
                <h3><?php the_title(); ?></h3>
            </div>
            </li>


            <?php endwhile; wp_reset_postdata(); ?>
    </ul>
<?php
}