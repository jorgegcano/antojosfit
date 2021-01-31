<?php get_header() ?>
<main class="contenedor pagina seccion con-sidebar">
    <div class="contenido-principal">
        <?php get_template_part('template-parts/loop-pages'); ?>
    </div>
    <?php get_sidebar('productos'); //el string que pasamos es el slug del sidebar que queremos?>
</main>
<?php get_footer(); ?>