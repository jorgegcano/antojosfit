</div>
<footer class="site-footer">
<div class="logo-footer">
<a href="<?php echo esc_url(site_url('/')); ?>">
<img width=180 src=<?php echo get_template_directory_uri()."/img/anto-jos-fit-LOGO_WHITE.png" ?>>
</a>
</div>
<hr>
<div class="contenido-footer">
<?php
    $args = array(
        'theme_location' => 'menu_principal',
        'container' => 'nav',
        'container_class' => 'menu-principal'
    );
    wp_nav_menu($args);
?>
    <div class="icons-content">
        <a class="icons-link" href="https://www.instagram.com/antojosfit.es/" target="_blank"><i class="fab fa-instagram icons-footer"></i></a>
        <a class="icons-link" href="https://www.facebook.com/antojosfit.es" target="_blank"><i class="fab fa-facebook-square icons-footer"></i></a>
    </div>
</div>
<p class="copyright">&copy; <?php echo date('Y')." ".get_bloginfo( 'name' ); ?> - Todos los derechos reservados</p>
</footer>
<?php wp_footer() ?>
</body>
</html>