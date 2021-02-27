<?php get_header(); ?>
<main class="contenedor pagina seccion con-sidebar">
    <div class="contenido-principal">
        <?php get_template_part('template-parts/loop-pages'); ?>
        <div class="comments">
        <?php comments_template(); ?>
        </div>
    </div>
    <?php get_sidebar('blog'); ?>
</main>
<?php get_footer(); ?>