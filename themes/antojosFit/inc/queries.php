<?php

function antojosfit_lista_productos($cantidad = -1) { ?>

        <?php
            $args = array(
                'post_type'=>'product',
                'posts_per_page' => $cantidad,
            );
            $productos = new WP_Query($args);
            $ul = 0;
            $li = 0;
            while($productos->have_posts()) : $productos->the_post();
            
            if ($li %2 == 0) {
                if ($ul %2 == 0) {
                    echo "<ul class='fila-par'>";
                } else {
                    echo "<ul class='fila-impar'>";
                }
                $ul++;
            }            
        ?>

            <li class="producto front-page">
            <a href="<?php the_permalink() ?>">
            <?php the_post_thumbnail('mediano'); ?>
            <div class="contenido text-center">
                <h3><?php the_title(); ?></h3>
            </div>
            </a>
            </li>
            <?php if ($li %2 != 0) { 
                echo "</ul>";
                } 
                $li++; ?>
        
            <?php  endwhile; wp_reset_postdata(); ?>
<?php
}