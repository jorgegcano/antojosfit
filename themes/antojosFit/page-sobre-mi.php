<?php
/*
* Template Name: sobre-mi
*/
get_header(); ?>
<main class="contenedor pagina seccion">
    <div class="contenido-principal">
        <?php while(have_posts()) : the_post(); ?>
            <?php
                $galeria = get_post_gallery(get_the_ID(), false);
                $galeria_imagenes_ID = explode(',', $galeria['ids']);
            ?>

            <ul class="galeria-imagenes">
                <?php
                $i = 1;
                foreach($galeria_imagenes_ID as $id) :
                    $size = ($i == 4 || $i == 6) ? 'portrait' : 'square';
                $imagenThumb =wp_get_attachment_image_src($id, $size)[0];
                ?>
                <li>
                    <img src="<?php echo $imagenThumb; ?>" alt="imagen">
                </li>
                <?php $i++; endforeach; ?>
            </ul>
            <?php endwhile; ?>
            <?php the_content($more_link_text, $strip_teaser); ?>
    </div>
</main>
<?php get_footer(); ?>