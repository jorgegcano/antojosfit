<?php
/*
* Template Name: Contenido Centrado (no sidebars)
*/

get_header(); ?>

<main class="contenedor pagina seccion no-sidebar">
    <div class="contenido-principal">
        <?php get_template_part('template-parts/loop-pages'); ?>
    </div>
</main>
<?php get_footer(); ?>