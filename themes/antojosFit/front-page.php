<?php get_header('front'); ?>

<section class="bienvenida text-center seccion">
    <h2 class="texto-primario"><?php the_field('encabezado_bienvenida'); ?></h2>
    <p><?php the_field('texto_bienvenida'); ?></p>
</section>

<section class="clases">
    <div class="contenedor seccion">
        <!--<h2 class="text-center texto-primario">Nuestros Productos</h2>-->
        <img class="logo-blog" src=<?php echo get_template_directory_uri()."/img/anto-jos-fit-TYPO.png" ?> width=200 alt="logo">
        <?php antojosfit_lista_productos(4); ?>
        <div class="contenedor-boton">
            <a class="boton boton-primario" href="<?php echo esc_url(get_permalink(get_page_by_title('shop'))); ?>">Ver Carta Completa</a>
        </div>
    </div>
</section>


<section class="blog contenedor seccion">
    <img class="logo-blog" src=<?php echo get_template_directory_uri()."/img/anto-jos-fit-TYPO_blog.png" ?> alt="logo-blog">
    <ul class="listado-blog">
    <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 4
        );
        $blog =new WP_Query($args);
        while($blog->have_posts()) : $blog->the_post();
        get_template_part('template-parts/loop-blog');
        endwhile; wp_reset_postdata();
    ?>
    </ul>
</section>

<section class="blog contenedor seccion">
<img class="logo-blog" src=<?php echo get_template_directory_uri()."/img/instagramText.png" ?> alt="header-instagram">
<?php get_sidebar('instagram'); //el string que pasamos es el slug del sidebar que queremos?>
</section>


<?php get_footer(); ?>